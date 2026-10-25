/* ==============================================================
   TEMA DE GRAFICAS - Libro Digital de Novedades 9-1-1
   Estilo comun para Chart.js 2.x: fuente Inter, rejilla discreta,
   barras finas, donas con separacion y tooltips con porcentaje.
   Se carga justo despues de vendors/Chart.js/dist/Chart.min.js.
   La paleta es la misma de config/graficas_helper.php (mismo orden).
   ============================================================== */
(function () {
    if (typeof Chart === 'undefined' || !Chart.defaults || !Chart.defaults.global) {
        return;
    }

    var LDN = window.LDN_GRAFICAS = {
        // Paleta categorica validada para daltonismo, en orden fijo
        paleta: ['#2a78d6', '#eb6834', '#1baf7a', '#eda100', '#e87ba4', '#008300', '#6250d6', '#e34948'],
        tinta: '#3c4858',
        tenue: '#6b7280',
        rejilla: '#e9e8e3',
        eje: '#c3c2b7',
        superficie: '#ffffff',
        formato: function (n) {
            var v = Number(n);
            return isNaN(v) ? n : v.toLocaleString('es-VE');
        }
    };

    var g = Chart.defaults.global;

    // Tipografia y color de texto
    g.defaultFontFamily = "'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif";
    g.defaultFontColor = LDN.tenue;
    g.defaultFontSize = 12;
    g.maintainAspectRatio = true;
    g.animation.duration = 600;
    g.layout = { padding: { top: 8, right: 8, bottom: 0, left: 0 } };

    // Leyenda: puntos pequeños abajo, texto en tinta (no en el color de la serie)
    g.legend.position = 'bottom';
    g.legend.labels.usePointStyle = true;
    g.legend.labels.boxWidth = 8;
    g.legend.labels.padding = 14;
    g.legend.labels.fontColor = LDN.tinta;

    // build/js/custom.min.js (Gentelella) hace Chart.defaults.global.legend = {enabled: false}.
    // Con Chart.js 2.9 reemplazar el objeto completo rompe las graficas; se combina en su
    // lugar y "enabled: false" oculta la leyenda como antes (las tablas hacen de leyenda).
    var leyenda = g.legend;
    Object.defineProperty(g, 'legend', {
        configurable: true,
        enumerable: true,
        get: function () { return leyenda; },
        set: function (valor) {
            if (valor && typeof valor === 'object') {
                if (valor.enabled === false) {
                    leyenda.display = false;
                }
                Chart.helpers.merge(leyenda, valor);
            }
        }
    });

    // Tooltip oscuro y legible
    var t = g.tooltips;
    t.backgroundColor = 'rgba(17, 24, 39, 0.92)';
    t.titleFontFamily = g.defaultFontFamily;
    t.titleFontStyle = '600';
    t.titleMarginBottom = 6;
    t.bodyFontFamily = g.defaultFontFamily;
    t.bodySpacing = 4;
    t.xPadding = 12;
    t.yPadding = 10;
    t.cornerRadius = 6;
    t.caretSize = 6;
    t.displayColors = true;
    t.callbacks.label = function (item, data) {
        var ds = data.datasets[item.datasetIndex];
        var etiqueta = ds.label ? ds.label.replace(/^#\s*/, '') + ': ' : '';
        return ' ' + etiqueta + LDN.formato(item.value !== undefined ? item.value : ds.data[item.index]);
    };

    // Marcas finas
    g.elements.rectangle.borderWidth = 0;
    g.elements.rectangle.backgroundColor = LDN.paleta[0];
    g.elements.arc.borderWidth = 2;
    g.elements.arc.borderColor = LDN.superficie;
    g.elements.line.borderWidth = 2;
    g.elements.line.tension = 0.3;
    g.elements.line.fill = false;
    g.elements.point.radius = 3;
    g.elements.point.hoverRadius = 5;

    // Ejes: rejilla tenue, sin bordes ni marcas, numeros con separador de miles
    var s = Chart.defaults.scale;
    s.gridLines.color = LDN.rejilla;
    s.gridLines.zeroLineColor = LDN.eje;
    s.gridLines.drawBorder = false;
    s.gridLines.drawTicks = false;
    s.ticks.padding = 8;
    s.ticks.fontColor = LDN.tenue;

    Chart.scaleService.updateScaleDefaults('linear', {
        ticks: { beginAtZero: true, precision: 0, callback: LDN.formato }
    });

    // Barras: sin rejilla en el eje de categorias y grosor maximo
    Chart.defaults.bar.scales.xAxes[0].gridLines = { display: false, drawBorder: false };
    if (Chart.defaults.horizontalBar) {
        Chart.defaults.horizontalBar.scales.yAxes[0].gridLines = { display: false, drawBorder: false };
    }
    if (g.datasets && g.datasets.bar) {
        g.datasets.bar.maxBarThickness = 38;
        g.datasets.bar.categoryPercentage = 0.75;
        g.datasets.bar.barPercentage = 0.9;
    }
    if (g.datasets && g.datasets.horizontalBar) {
        g.datasets.horizontalBar.maxBarThickness = 22;
        g.datasets.horizontalBar.categoryPercentage = 0.8;
        g.datasets.horizontalBar.barPercentage = 0.9;
    }

    // Donas y tortas: anillo fino y porcentaje en el tooltip
    function etiquetaConPorcentaje(item, data) {
        var ds = data.datasets[item.datasetIndex];
        var valor = Number(ds.data[item.index]) || 0;
        var total = 0;
        for (var i = 0; i < ds.data.length; i++) {
            total += Number(ds.data[i]) || 0;
        }
        var pct = total ? Math.round(valor * 1000 / total) / 10 : 0;
        return ' ' + data.labels[item.index] + ': ' + LDN.formato(valor) + ' (' + pct.toLocaleString('es-VE') + '%)';
    }
    ['doughnut', 'pie'].forEach(function (tipo) {
        if (!Chart.defaults[tipo]) return;
        Chart.defaults[tipo].tooltips.callbacks.label = etiquetaConPorcentaje;
        Chart.defaults[tipo].tooltips.callbacks.title = function () { return ''; };
    });
    Chart.defaults.doughnut.cutoutPercentage = 64;

    // Proporcion segun el tipo: barras mas bajas en pantallas anchas y barras
    // horizontales con altura acorde a la cantidad de categorias.
    // Se respeta si la pagina define options.aspectRatio.
    Chart.plugins.register({
        beforeInit: function (chart) {
            var opciones = chart.options || {};
            if (opciones.aspectRatio || opciones.maintainAspectRatio === false || opciones.responsive === false) {
                return;
            }
            var tipo = chart.config.type;
            var categorias = (chart.data.labels || []).length || 1;
            if (tipo === 'horizontalBar') {
                chart.aspectRatio = Math.max(1.1, Math.min(5, 14 / (categorias + 1.5)));
            } else if (tipo === 'bar' || tipo === 'line') {
                chart.aspectRatio = 2.8;
            }
        }
    });

    // Las etiquetas se miden al dibujar: si Inter termina de cargar despues,
    // se recalculan las graficas para que ningun texto quede cortado.
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(function () {
            Chart.helpers.each(Chart.instances, function (grafica) {
                grafica.update(0);
            });
        });
    }
})();
