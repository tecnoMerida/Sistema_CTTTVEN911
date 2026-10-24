<?php
/**
 * ============================================================================
 * WIDGET POPUP FLOTANTE - ASISTENTE VIRTUAL IA (SISTEMA CTTTVEN911)
 * ============================================================================
 * Interfaz 100% responsive, estilos CSS encapsulados (.ai-bot-*)
 * Compatible con Bootstrap y plantilla Gentelella sin conflictos.
 */
?>
<!-- CONTENEDOR DEL WIDGET DE ASISTENTE IA -->
<div id="ai-bot-root" class="ai-bot-container">

  <!-- Botón Flotante Circular (FAB) -->
  <button id="ai-bot-fab-btn" class="ai-bot-fab" title="Asistente Virtual IA - VEN 911" aria-label="Abrir asistente de ayuda">
    <span class="ai-bot-fab-pulse"></span>
    <span id="ai-bot-fab-icon-chat" class="ai-bot-fab-icon">
      <i class="fa fa-comments"></i>
    </span>
    <span id="ai-bot-fab-icon-close" class="ai-bot-fab-icon" style="display: none;">
      <i class="fa fa-times"></i>
    </span>
    <span class="ai-bot-badge-online" title="En línea"></span>
  </button>

  <!-- Ventana Emergente / Popup del Chat -->
  <div id="ai-bot-popup" class="ai-bot-window" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="ai-bot-title">
    
    <!-- Cabecera del Popup -->
    <div class="ai-bot-header">
      <div class="ai-bot-header-left">
        <div class="ai-bot-avatar-wrap">
          <div class="ai-bot-avatar-icon">
            <i class="fa fa-android"></i>
          </div>
          <span class="ai-bot-status-indicator"></span>
        </div>
        <div class="ai-bot-title-group">
          <h4 id="ai-bot-title" class="ai-bot-title-text">Asistente IA • VEN 911</h4>
          <span class="ai-bot-subtitle-text">En línea • Soporte Operativo & General</span>
        </div>
      </div>
      
      <div class="ai-bot-header-right">
        <!-- Botón Limpiar Historial -->
        <button id="ai-bot-clear-chat" class="ai-bot-btn-icon" title="Limpiar conversación" aria-label="Limpiar conversación">
          <i class="fa fa-trash-o"></i>
        </button>
        <!-- Botón Minimizar -->
        <button id="ai-bot-close-window" class="ai-bot-btn-icon" title="Minimizar ventana" aria-label="Minimizar">
          <i class="fa fa-chevron-down"></i>
        </button>
      </div>
    </div>

    <!-- Área de Mensajes -->
    <div id="ai-bot-messages-box" class="ai-bot-messages-body">
      <!-- Mensaje Inicial de Bienvenida -->
      <div class="ai-bot-message ai-bot-message-bot">
        <div class="ai-bot-msg-avatar">
          <i class="fa fa-android"></i>
        </div>
        <div class="ai-bot-msg-content">
          <div class="ai-bot-msg-bubble">
            ¡Hola! Soy tu <strong>Asistente Virtual con IA</strong> del Sistema VEN 911. 🇻🇪<br><br>
            Puedo orientarte con las operaciones del sistema (apertura y cierre de guardia, novedades, control de bienes, solicitudes y personal) y responderte cualquier duda o consulta general.<br><br>
            <em>¿En qué puedo asistirte en este momento?</em>
          </div>
          <span class="ai-bot-msg-time"><?php echo date('H:i'); ?></span>
        </div>
      </div>
    </div>

    <!-- Indicador de "Escribiendo..." -->
    <div id="ai-bot-typing-indicator" class="ai-bot-typing" style="display: none;">
      <div class="ai-bot-msg-avatar">
        <i class="fa fa-android"></i>
      </div>
      <div class="ai-bot-typing-bubble">
        <span class="ai-bot-dot"></span>
        <span class="ai-bot-dot"></span>
        <span class="ai-bot-dot"></span>
      </div>
    </div>

    <!-- Formulario / Área de Entrada -->
    <div class="ai-bot-footer">
      <form id="ai-bot-form" class="ai-bot-input-form" onsubmit="return false;">
        <textarea
          id="ai-bot-input-text"
          class="ai-bot-textarea"
          placeholder="Escribe tu pregunta aquí..."
          rows="1"
          maxlength="1000"
          aria-label="Mensaje para el asistente"
        ></textarea>
        <button id="ai-bot-send-btn" class="ai-bot-send-btn" type="submit" title="Enviar consulta" aria-label="Enviar">
          <i class="fa fa-paper-plane"></i>
        </button>
      </form>
      <div class="ai-bot-footnote">
        <small>Presiona <strong>Enter</strong> para enviar • Sistema CTTTVEN911</small>
      </div>
    </div>

  </div>
</div>

<!-- ============================================================== -->
<!-- ESTILOS ENCAPSULADOS PARA EL WIDGET (.ai-bot-*)               -->
<!-- ============================================================== -->
<style type="text/css">
  /* Contenedor Raíz */
  .ai-bot-container {
    position: fixed;
    right: 25px;
    bottom: 25px;
    z-index: 999999 !important;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  }

  /* Botón Flotante Circular (FAB) */
  .ai-bot-fab {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1b3a57 0%, #1f649a 50%, #2980b9 100%);
    border: 2px solid rgba(255, 255, 255, 0.4);
    color: #ffffff;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.28);
    cursor: pointer;
    outline: none !important;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.25s ease;
  }

  .ai-bot-fab:hover {
    transform: scale(1.08) translateY(-2px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.35);
    background: linear-gradient(135deg, #163048 0%, #1a5685 50%, #2471a3 100%);
  }

  .ai-bot-fab:active {
    transform: scale(0.96);
  }

  /* Anillo de pulso sutil */
  .ai-bot-fab-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgba(31, 100, 154, 0.4);
    z-index: -1;
    animation: aiBotPulse 2.8s infinite;
  }

  @keyframes aiBotPulse {
    0% { transform: scale(1); opacity: 0.8; }
    70% { transform: scale(1.4); opacity: 0; }
    100% { transform: scale(1.4); opacity: 0; }
  }

  .ai-bot-badge-online {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 14px;
    height: 14px;
    background: #2ecc71;
    border: 2px solid #ffffff;
    border-radius: 50%;
    box-shadow: 0 0 6px rgba(46, 204, 113, 0.8);
  }

  /* Ventana Popup */
  .ai-bot-window {
    position: fixed;
    right: 25px;
    bottom: 95px;
    width: 375px;
    max-width: calc(100vw - 30px);
    height: 540px;
    max-height: calc(100vh - 120px);
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.28), 0 0 0 1px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    z-index: 999999 !important;
    animation: aiBotSlideUp 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
  }

  @keyframes aiBotSlideUp {
    from {
      opacity: 0;
      transform: translateY(25px) scale(0.94);
    }
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }

  /* Cabecera */
  .ai-bot-header {
    background: linear-gradient(135deg, #1b3a57 0%, #1f649a 100%);
    color: #ffffff;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  }

  .ai-bot-header-left {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .ai-bot-avatar-wrap {
    position: relative;
    width: 38px;
    height: 38px;
  }

  .ai-bot-avatar-icon {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.18);
    border: 1px solid rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #ffffff;
  }

  .ai-bot-status-indicator {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 10px;
    height: 10px;
    background: #2ecc71;
    border: 2px solid #1b3a57;
    border-radius: 50%;
  }

  .ai-bot-title-group {
    display: flex;
    flex-direction: column;
  }

  .ai-bot-title-text {
    margin: 0;
    font-size: 15px;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.2;
    letter-spacing: 0.3px;
  }

  .ai-bot-subtitle-text {
    font-size: 11px;
    color: #d1e5f8;
    margin-top: 2px;
  }

  .ai-bot-header-right {
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .ai-bot-btn-icon {
    background: transparent;
    border: none;
    color: #ffffff;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.2s;
    outline: none !important;
  }

  .ai-bot-btn-icon:hover {
    background: rgba(255, 255, 255, 0.2);
  }

  /* Cuerpo de Mensajes */
  .ai-bot-messages-body {
    flex: 1;
    padding: 14px;
    overflow-y: auto;
    background: #f7f9fb;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  /* Scrollbar estético */
  .ai-bot-messages-body::-webkit-scrollbar {
    width: 6px;
  }
  .ai-bot-messages-body::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
  }

  /* Mensajes individuales */
  .ai-bot-message {
    display: flex;
    gap: 8px;
    max-width: 88%;
    animation: aiBotFadeIn 0.25s ease;
  }

  @keyframes aiBotFadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .ai-bot-message-bot {
    align-self: flex-start;
  }

  .ai-bot-message-user {
    align-self: flex-end;
    flex-direction: row-reverse;
  }

  .ai-bot-msg-avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: #1f649a;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
    margin-top: 4px;
  }

  .ai-bot-msg-content {
    display: flex;
    flex-direction: column;
  }

  .ai-bot-msg-bubble {
    padding: 10px 14px;
    font-size: 13.5px;
    line-height: 1.48;
    word-break: break-word;
  }

  .ai-bot-message-bot .ai-bot-msg-bubble {
    background: #ffffff;
    color: #24292e;
    border: 1px solid #e1e4e8;
    border-radius: 14px 14px 14px 2px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  }

  .ai-bot-message-user .ai-bot-msg-bubble {
    background: linear-gradient(135deg, #1f649a 0%, #2980b9 100%);
    color: #ffffff;
    border-radius: 14px 14px 2px 14px;
    box-shadow: 0 2px 6px rgba(31, 100, 154, 0.25);
  }

  .ai-bot-msg-time {
    font-size: 10px;
    color: #8c9ba5;
    margin-top: 3px;
    padding: 0 4px;
  }
  .ai-bot-message-user .ai-bot-msg-time {
    text-align: right;
  }

  /* Formato dentro de la burbuja */
  .ai-bot-msg-bubble strong {
    font-weight: 700;
  }
  .ai-bot-msg-bubble ul {
    margin: 6px 0 6px 18px;
    padding: 0;
  }
  .ai-bot-msg-bubble li {
    margin-bottom: 4px;
  }
  .ai-bot-msg-bubble code {
    background: rgba(0, 0, 0, 0.06);
    padding: 2px 5px;
    border-radius: 4px;
    font-size: 12px;
    color: #d63384;
  }
  .ai-bot-message-user .ai-bot-msg-bubble code {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
  }

  /* Indicador de "Escribiendo..." */
  .ai-bot-typing {
    display: flex;
    gap: 8px;
    align-self: flex-start;
    padding: 0 14px 8px 14px;
    background: #f7f9fb;
  }

  .ai-bot-typing-bubble {
    background: #ffffff;
    border: 1px solid #e1e4e8;
    border-radius: 14px 14px 14px 2px;
    padding: 10px 14px;
    display: flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  }

  .ai-bot-dot {
    width: 6px;
    height: 6px;
    background: #8c9ba5;
    border-radius: 50%;
    animation: aiBotDotBounce 1.4s infinite ease-in-out both;
  }

  .ai-bot-dot:nth-child(1) { animation-delay: -0.32s; }
  .ai-bot-dot:nth-child(2) { animation-delay: -0.16s; }

  @keyframes aiBotDotBounce {
    0%, 80%, 100% { transform: scale(0); opacity: 0.5; }
    40% { transform: scale(1); opacity: 1; }
  }

  /* Pie / Formulario de Entrada */
  .ai-bot-footer {
    background: #ffffff;
    border-top: 1px solid #e9ecef;
    padding: 10px 12px 6px 12px;
  }

  .ai-bot-input-form {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #f1f3f5;
    border: 1px solid #ced4da;
    border-radius: 24px;
    padding: 4px 6px 4px 14px;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .ai-bot-input-form:focus-within {
    border-color: #1f649a;
    box-shadow: 0 0 0 3px rgba(31, 100, 154, 0.15);
    background: #ffffff;
  }

  .ai-bot-textarea {
    flex: 1;
    border: none !important;
    background: transparent !important;
    outline: none !important;
    font-size: 13.5px;
    color: #212529;
    resize: none;
    max-height: 80px;
    line-height: 1.4;
    padding: 6px 0;
    box-shadow: none !important;
  }

  .ai-bot-send-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1b3a57 0%, #1f649a 100%);
    border: none;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 14px;
    outline: none !important;
    transition: transform 0.2s, opacity 0.2s;
    flex-shrink: 0;
  }

  .ai-bot-send-btn:hover {
    transform: scale(1.06);
    background: #163048;
  }

  .ai-bot-send-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
  }

  .ai-bot-footnote {
    text-align: center;
    margin-top: 4px;
    font-size: 10px;
    color: #adb5bd;
  }

  /* ============================================================== */
  /* RESPONSIVE DESIGN (MÓVILES Y PANTALLAS PEQUEÑAS)              */
  /* ============================================================== */
  @media (max-width: 480px) {
    .ai-bot-container {
      right: 15px;
      bottom: 15px;
    }
    .ai-bot-fab {
      width: 52px;
      height: 52px;
      font-size: 20px;
    }
    .ai-bot-window {
      right: 0 !important;
      bottom: 0 !important;
      left: 0 !important;
      top: 0 !important;
      width: 100% !important;
      max-width: 100% !important;
      height: 100% !important;
      max-height: 100% !important;
      border-radius: 0 !important;
    }
    .ai-bot-header {
      padding: 12px 14px;
    }
  }
</style>

<!-- ============================================================== -->
<!-- SCRIPT JS DEL ASISTENTE VIRTUAL IA                           -->
<!-- ============================================================== -->
<script type="text/javascript">
(function() {
  // Evitar doble inicialización si el archivo se incluye más de una vez
  if (window.__AI_BOT_INITIALIZED__) return;
  window.__AI_BOT_INITIALIZED__ = true;

  document.addEventListener('DOMContentLoaded', function() {
    var fabBtn = document.getElementById('ai-bot-fab-btn');
    var popupWindow = document.getElementById('ai-bot-popup');
    var closeBtn = document.getElementById('ai-bot-close-window');
    var clearBtn = document.getElementById('ai-bot-clear-chat');
    var sendBtn = document.getElementById('ai-bot-send-btn');
    var inputText = document.getElementById('ai-bot-input-text');
    var messagesBox = document.getElementById('ai-bot-messages-box');
    var typingIndicator = document.getElementById('ai-bot-typing-indicator');
    var iconChat = document.getElementById('ai-bot-fab-icon-chat');
    var iconClose = document.getElementById('ai-bot-fab-icon-close');

    if (!fabBtn || !popupWindow) return;

    // Determinar la URL del endpoint API
    function getApiUrl() {
      var pathname = window.location.pathname;
      if (pathname.indexOf('/Sistema_CTTTVEN911-master/') !== -1) {
        return '/Sistema_CTTTVEN911-master/chatbot/chatbot_api.php';
      }
      return '../chatbot/chatbot_api.php';
    }

    // Alternar visibilidad del popup
    function toggleChat(forceOpen) {
      var isOpen = popupWindow.style.display !== 'none';
      var shouldOpen = typeof forceOpen === 'boolean' ? forceOpen : !isOpen;

      if (shouldOpen) {
        popupWindow.style.display = 'flex';
        iconChat.style.display = 'none';
        iconClose.style.display = 'inline-block';
        setTimeout(function() {
          scrollToBottom();
          inputText.focus();
        }, 100);
      } else {
        popupWindow.style.display = 'none';
        iconChat.style.display = 'inline-block';
        iconClose.style.display = 'none';
      }
    }

    fabBtn.addEventListener('click', function(e) {
      e.preventDefault();
      toggleChat();
    });

    closeBtn.addEventListener('click', function(e) {
      e.preventDefault();
      toggleChat(false);
    });

    // Auto-scroll al final
    function scrollToBottom() {
      messagesBox.scrollTop = messagesBox.scrollHeight;
    }

    // Parser sencillo y seguro de Markdown a HTML
    function formatMarkdown(text) {
      if (!text) return '';
      // 1. Escapar HTML para evitar XSS
      var div = document.createElement('div');
      div.textContent = text;
      var safe = div.innerHTML;

      // 2. Formato **negrita**
      safe = safe.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
      // 3. Formato *cursiva*
      safe = safe.replace(/\*(.*?)\*/g, '<em>$1</em>');
      // 4. Formato `código`
      safe = safe.replace(/`([^`]+)`/g, '<code>$1</code>');
      // 5. Viñetas (- item o * item)
      safe = safe.replace(/(?:^|\n)[-*]\s+(.+)/g, '<br>• $1');
      // 6. Saltos de línea
      safe = safe.replace(/\n/g, '<br>');

      return safe;
    }

    // Agregar mensaje a la interfaz
    function appendMessage(role, text, time) {
      var now = time || new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      var msgDiv = document.createElement('div');
      msgDiv.className = 'ai-bot-message ' + (role === 'user' ? 'ai-bot-message-user' : 'ai-bot-message-bot');

      var avatarHtml = role === 'bot' 
        ? '<div class="ai-bot-msg-avatar"><i class="fa fa-android"></i></div>' 
        : '';

      msgDiv.innerHTML = avatarHtml +
        '<div class="ai-bot-msg-content">' +
          '<div class="ai-bot-msg-bubble">' + formatMarkdown(text) + '</div>' +
          '<span class="ai-bot-msg-time">' + now + '</span>' +
        '</div>';

      messagesBox.appendChild(msgDiv);
      scrollToBottom();
    }

    // Enviar mensaje a la API
    function sendMessage() {
      var message = inputText.value.trim();
      if (!message) return;

      appendMessage('user', message);
      inputText.value = '';
      inputText.style.height = 'auto';
      sendBtn.disabled = true;
      typingIndicator.style.display = 'flex';
      scrollToBottom();

      fetch(getApiUrl(), {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          action: 'chat',
          message: message
        })
      })
      .then(function(res) {
        return res.json();
      })
      .then(function(data) {
        typingIndicator.style.display = 'none';
        sendBtn.disabled = false;
        if (data && data.status === 'success' && data.response) {
          appendMessage('bot', data.response, data.time);
        } else {
          appendMessage('bot', '⚠️ ' + (data.message || 'No pude procesar tu solicitud en este momento. Inténtalo nuevamente.'));
        }
      })
      .catch(function(err) {
        typingIndicator.style.display = 'none';
        sendBtn.disabled = false;
        appendMessage('bot', '⚠️ Error de comunicación con el servidor. Revisa tu conexión.');
        console.error('Chatbot Error:', err);
      });
    }

    // Eventos de envío
    sendBtn.addEventListener('click', function(e) {
      e.preventDefault();
      sendMessage();
    });

    inputText.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
      }
    });

    // Auto-ajuste de altura del textarea
    inputText.addEventListener('input', function() {
      this.style.height = 'auto';
      this.style.height = Math.min(this.scrollHeight, 80) + 'px';
    });

    // Limpiar conversación
    clearBtn.addEventListener('click', function(e) {
      e.preventDefault();
      if (!confirm('¿Deseas reiniciar la conversación con el asistente?')) return;

      fetch(getApiUrl(), {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'clear' })
      })
      .then(function(res) { return res.json(); })
      .then(function() {
        messagesBox.innerHTML = '';
        appendMessage('bot', '¡Conversación reiniciada! 🔄\n\n¿En qué puedo ayudarte hoy sobre el Sistema VEN 911 o cualquier otra duda?');
      })
      .catch(function(err) {
        console.error('Error al limpiar chat:', err);
      });
    });

  });
})();
</script>
