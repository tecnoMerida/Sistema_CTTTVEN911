<?php
// ============================================================================
// Colores de las gráficas - Libro Digital de Novedades 9-1-1
//
// Cada estatus de solicitud tiene SIEMPRE el mismo color (en la gráfica, en
// su leyenda y en todas las páginas). Paleta categórica validada para
// daltonismo, en orden fijo; el mismo orden está en js/graficas_tema.js.
// ============================================================================

if (!function_exists('color_estatus')) {
    // id de public.estatus_solicitud => color
    function color_estatus($id)
    {
        $colores = [
            1 => '#2a78d6', // Efectivo
            2 => '#eb6834', // No Efectivo
            3 => '#1baf7a', // Sin Despacho
            4 => '#eda100', // Repetida
            5 => '#e87ba4', // Pendiente
            6 => '#008300', // Sabotaje
            7 => '#6250d6', // Información
            8 => '#e34948', // Abandonada
        ];
        return $colores[(int)$id] ?? '#898781';
    }
}

if (!function_exists('icono_estatus')) {
    // Cuadro de color para leyendas y tablas
    function icono_estatus($id)
    {
        return '<i class="fa fa-square" style="color: ' . color_estatus($id) . '"></i>';
    }
}
