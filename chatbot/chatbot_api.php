<?php
declare(strict_types=1);

/**
 * ============================================================================
 * ENDPOINT BACKEND - ASISTENTE VIRTUAL IA (SISTEMA CTTTVEN911)
 * ============================================================================
 * Procesa consultas por AJAX (JSON), gestiona la memoria de conversación en sesión
 * e interactúa con la API de Google Gemini (o base de conocimiento local de contingencia).
 * Compatible con PHP 8.0+ sin Warnings ni Notices.
 */

// Encabezados HTTP
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// Control seguro de sesión
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    @session_start();
}

// ============================================================================
// 1. CONFIGURACIÓN DE LA API DE IA
// ============================================================================
// Coloca aquí tu clave de API de Google Gemini (o defínela en la variable de entorno GEMINI_API_KEY)
// Obtén tu API Key gratuita en: https://aistudio.google.com/
define('GEMINI_API_KEY', getenv('GEMINI_API_KEY') ?: 'AQ.Ab8RN6IEddYEDo1M-p8zfub-frT8BnyCx41CMtX5ecjJHlt67w');

// Modelo de Gemini (gemini-3.5-flash es de última generación, veloz y preciso)
define('GEMINI_MODEL', 'gemini-3.5-flash');

// Nombre del bot y sistema
define('BOT_NAME', 'Asistente Virtual IA - VEN 911');
define('SYSTEM_NAME', 'Sistema CTTTVEN911 (Centro de Comando, Control y Telecomunicaciones VEN 911)');

// Inicializar memoria de sesión
if (!isset($_SESSION['chat_history']) || !is_array($_SESSION['chat_history'])) {
    $_SESSION['chat_history'] = [];
}

// ============================================================================
// 2. RECEPCIÓN Y VALIDACIÓN DEL PAYLOAD JSON
// ============================================================================
$rawInput = file_get_contents('php://input');
$inputData = [];
if (!empty($rawInput)) {
    $decoded = json_decode($rawInput, true);
    if (is_array($decoded)) {
        $inputData = $decoded;
    }
}

// Acción solicitada: 'chat', 'clear' o 'history'
$action = (string)($inputData['action'] ?? $_POST['action'] ?? 'chat');

// ----------------------------------------------------------------------------
// ACCIÓN: LIMPIAR HISTORIAL
// ----------------------------------------------------------------------------
if ($action === 'clear') {
    $_SESSION['chat_history'] = [];
    echo json_encode([
        'status'  => 'success',
        'message' => 'Historial de conversación reiniciado con éxito.',
        'history' => []
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// ----------------------------------------------------------------------------
// ACCIÓN: CONSULTAR HISTORIAL
// ----------------------------------------------------------------------------
if ($action === 'history') {
    echo json_encode([
        'status'  => 'success',
        'history' => $_SESSION['chat_history']
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// ----------------------------------------------------------------------------
// ACCIÓN: CHAT (PROCESAR CONSULTA)
// ----------------------------------------------------------------------------
$userMessage = trim((string)($inputData['message'] ?? $_POST['message'] ?? ''));

if ($userMessage === '') {
    echo json_encode([
        'status'  => 'error',
        'message' => 'El mensaje no puede estar vacío.'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Registrar mensaje del usuario en memoria
$_SESSION['chat_history'][] = [
    'role'      => 'user',
    'content'   => $userMessage,
    'timestamp' => date('H:i')
];

// Limitar el historial a los últimos 14 mensajes para optimizar consumo y memoria
if (count($_SESSION['chat_history']) > 14) {
    $_SESSION['chat_history'] = array_slice($_SESSION['chat_history'], -14);
}

// ============================================================================
// 3. RESPUESTA VÍA GOOGLE GEMINI O CONTINGENCIA LOCAL
// ============================================================================
$apiKey = constant('GEMINI_API_KEY');
$botReply = '';

// Si la API Key fue provista por el usuario, intentamos consultar a Gemini
if (!empty($apiKey) && $apiKey !== 'TU_API_KEY_AQUI') {
    $botReply = callGeminiApi($userMessage, $_SESSION['chat_history'], $apiKey);
}

// Si la API Key no está configurada o cURL no pudo conectar, usamos la base de conocimiento local inteligente
if (empty($botReply)) {
    $botReply = generateLocalResponse($userMessage, $apiKey);
}

// Registrar respuesta del bot en memoria
$_SESSION['chat_history'][] = [
    'role'      => 'bot',
    'content'   => $botReply,
    'timestamp' => date('H:i')
];

// Devolver respuesta JSON
echo json_encode([
    'status'   => 'success',
    'response' => $botReply,
    'time'     => date('H:i')
], JSON_UNESCAPED_UNICODE);
exit;

// ============================================================================
// 4. FUNCIONES AUXILIARES
// ============================================================================

/**
 * Consulta la API de Google Gemini mediante cURL con reintento automático entre modelos
 */
function callGeminiApi(string $userMessage, array $chatHistory, string $apiKey): string
{
    // Modelos candidatos en orden de preferencia
    $candidateModels = [
        constant('GEMINI_MODEL'),
        'gemini-3.1-flash-lite',
        'gemini-3.5-flash-lite'
    ];

    // Prompt del sistema para el contexto institucional
    $systemInstruction = "Eres el Asistente Virtual Inteligente oficial del " . constant('SYSTEM_NAME') . " (Venezuela).\n" .
        "Tu función es responder cualquier duda con empatía, máxima claridad, profesionalismo y educación.\n\n" .
        "CONOCIMIENTO CLAVE DEL SISTEMA CTTTVEN911:\n" .
        "- Módulos del Sistema: Apertura de Guardia, Cierre de Guardia, Bitácora de Novedades de Guardia, Control de Bienes (Entrada y Salida de equipos de transmisión, chalecos, radios), Registro y Gestión de Personal por Organismo (Policía, Bomberos, Protección Civil, VEN 911), Solicitudes de Emergencia Ciudadana y Estadísticas/Reportes en PDF.\n" .
        "- Roles de usuario: Administrador (gestión global, personal, bienes y organismos), Supervisor (apertura/cierre guardia y auditoría de eventos), Operador (recepción de llamadas y solicitudes 911), Despachador (asignación de recursos en campo y cierre operativo).\n\n" .
        "INSTRUCCIONES DE RESPUESTA:\n" .
        "1. Puedes responder absolutamente CUALQUIER consulta: tanto dudas operativas del sistema 911 como temas generales (redacción, protocolos, informática, salud, leyes, cultura general, etc.).\n" .
        "2. Sé conciso y utiliza formato legible (negritas, viñetas, saltos de línea).\n" .
        "3. Mantén siempre un trato cordial y respetuoso hacia los funcionarios.";

    // Construcción de la conversación con historial
    $contents = [];
    foreach ($chatHistory as $msg) {
        $role = ($msg['role'] ?? '') === 'user' ? 'user' : 'model';
        $text = (string)($msg['content'] ?? '');
        if ($text !== '') {
            $contents[] = [
                'role'  => $role,
                'parts' => [['text' => $text]]
            ];
        }
    }

    $payload = [
        'system_instruction' => [
            'parts' => [['text' => $systemInstruction]]
        ],
        'contents'           => $contents,
        'generationConfig'   => [
            'temperature'     => 0.7,
            'topP'            => 0.95,
            'maxOutputTokens' => 800
        ]
    ];
    $jsonPayload = json_encode($payload);

    foreach ($candidateModels as $model) {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key=" . urlencode($apiKey);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $url,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $jsonPayload,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json; charset=utf-8',
                'x-goog-api-key: ' . $apiKey
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 12,
            CURLOPT_CONNECTTIMEOUT => 5,
            // Compatibilidad con entornos locales XAMPP sin bundle de certificados CA
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 0
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response !== false && $httpCode === 200 && empty($curlError)) {
            $resData = json_decode((string)$response, true);
            if (isset($resData['candidates'][0]['content']['parts'][0]['text'])) {
                $textResult = trim((string)$resData['candidates'][0]['content']['parts'][0]['text']);
                if ($textResult !== '') {
                    return $textResult;
                }
            }
        }
    }

    // En caso de fallo en todos los modelos o sin conexión, se activa el fallback local
    return '';
}

/**
 * Base de conocimiento local inteligente (contingencia sin conexión o antes de configurar API Key)
 */
function generateLocalResponse(string $query, string $apiKey): string
{
    $q = mb_strtolower($query, 'UTF-8');

    $isMissingKey = empty($apiKey) || $apiKey === 'TU_API_KEY_AQUI';
    $keyNotice = $isMissingKey
        ? "\n\n💡 *Tip:* Para activar el modo IA ilimitado con Google Gemini, agrega tu `API_KEY` en `chatbot/chatbot_api.php`."
        : "";

    // Respuestas basadas en palabras clave del sistema
    if (str_contains($q, 'hola') || str_contains($q, 'buenos') || str_contains($q, 'buenas') || str_contains($q, 'saludos')) {
        return "¡Hola! Un cordial saludo. Soy el **Asistente Virtual del Sistema CTTTVEN911**. 🇻🇪\n\n¿En qué procedimiento o módulo del sistema puedo orientarte el día de hoy?" . $keyNotice;
    }

    if (str_contains($q, 'guardia') || str_contains($q, 'apertura') || str_contains($q, 'cierre')) {
        return "📋 **Gestión de Guardias en CTTTVEN911:**\n" .
               "- **Apertura de Guardia:** El Supervisor inicia la jornada registrando el personal activo, organismo y la verificación de entrada de bienes.\n" .
               "- **Novedades de Guardia:** Registra cualquier eventualidad en tiempo real por cada sección.\n" .
               "- **Cierre de Guardia:** Al finalizar el turno, se realiza el inventario de salida y entrega formal de las instalaciones y equipos." . $keyNotice;
    }

    if (str_contains($q, 'bien') || str_contains($q, 'inventario') || str_contains($q, 'material')) {
        return "📦 **Control de Bienes y Materiales:**\n" .
               "- En el menú **Bienes / Inventario**, puedes consultar la lista de equipos registrados (radios, chalecos, accesorios).\n" .
               "- Durante la guardia, el módulo de **Control Bienes Entrada/Salida** permite constatar el estado físico y operativo de cada recurso asignado a los funcionarios." . $keyNotice;
    }

    if (str_contains($q, 'personal') || str_contains($q, 'cedula') || str_contains($q, 'funcionario')) {
        return "👤 **Módulo de Personal:**\n" .
               "- Permite consultar y registrar funcionarios de cada organismo de seguridad.\n" .
               "- La búsqueda rápida se realiza por número de cédula, nombres o grupos de guardia.\n" .
               "- Los administradores pueden editar datos o generar la ficha del personal en PDF." . $keyNotice;
    }

    if (str_contains($q, 'solicitud') || str_contains($q, 'llamada') || str_contains($q, 'emergencia')) {
        return "🚨 **Solicitudes de Emergencia:**\n" .
               "- Los **Operadores** reciben las incidencias y registran los datos del solicitante, motivo y ubicación.\n" .
               "- Los **Despachadores** coordinan con los organismos competentes en campo y efectúan el cierre de la solicitud al ser atendida." . $keyNotice;
    }

    if (str_contains($q, 'estadistica') || str_contains($q, 'reporte') || str_contains($q, 'grafic') || str_contains($q, 'pdf')) {
        return "📊 **Estadísticas y Reportes:**\n" .
               "- El sistema genera gráficos de guardia por día, organismo y motivo de solicitud.\n" .
               "- Puedes imprimir constancias y reportes detallados en formato PDF mediante los botones verdes de **IMPRIMIR** en cada consulta." . $keyNotice;
    }

    if (str_contains($q, 'quien eres') || str_contains($q, 'ayuda') || str_contains($q, 'que puedes hacer')) {
        return "🤖 Soy tu **Asistente de Soporte CTTTVEN911**.\n\nPuedo orientarte en cualquier tarea dentro del sistema (registro de guardias, control de bienes, novedades, solicitudes y personal), y al configurar la clave de Google Gemini también puedo responderte sobre cualquier tema general del conocimiento." . $keyNotice;
    }

    // Respuesta general inteligente
    return "He recibido tu consulta sobre: *\"" . htmlspecialchars($query, ENT_QUOTES, 'UTF-8') . "\"*.\n\n" .
           "Para orientarte mejor dentro del **Sistema CTTTVEN911**, puedes indicarme si tu consulta es sobre **Guardias**, **Personal**, **Bienes**, **Solicitudes** o **Estadísticas**." . $keyNotice;
}
