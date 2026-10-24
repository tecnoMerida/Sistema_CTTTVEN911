/*******************************	Inicio Funcion Estado 		************************************/
$(document).ready(function(){

	$("#cboEstado").change(function(){

		if($('#cboEstado option:selected').val() == "-1"){

			$('#cboMunicipio').find('option').remove().end().append('<option value="">Seleccione Municipio</option>').val('-1');

		} else {

			$.ajax({

			url:'../controlador/combo.php',

			type:'POST',

			cache: false,

			data: {action:'consultar', id:$('#cboEstado option:selected').val()}

			}).done(function(response){

				$("#cboMunicipio").html(response);

			});

		}

	});

});

/*******************************	Fin Funcion Estado 		************************************/
/***************************	Inicio Funcion Municipio 		************************************/
$(document).ready(function(){

	$("#cboMunicipio").change(function(){
<<<<<<< HEAD
		if (typeof window.alCambiarMunicipio === 'function') {
			return;
		}
=======
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885

		if($('#cboMunicipio option:selected').val() == "-1"){

			$('#cboParroquia').find('option').remove().end().append('<option value="">Seleccione Parroquia</option>').val('-1');

		} else {

			$.ajax({

			url:'../controlador/combo.php',

			type:'POST',

			cache: false,

			data: {action:'consultar', id:$('#cboMunicipio option:selected').val()}

			}).done(function(response){

				$("#cboParroquia").html(response);

			});

		}

	});

});
/*****************************	Fin Funcion Municipio 		************************************/

/***************************	Inicio Funcion Parroquia		************************************/
                /*$(document).ready(function(){
                $("#cboParroquia").change(function () {
                                $("#cboParroquia option:selected").each(function () {
                                        elegido=$(this).val();
                                        $.post("../controlador/Sectores.php", { elegido: elegido }, function(data){
                                                $("#cboSectores").html(data);

                                              });
                                      });
                              })
              });*/
/*****************************	Fin Funcion Parroquia 		************************************/
/***************************	Inicio Funcion Parroquias - Sectores - Cuadrantes		************************************/

$(document).ready(function(){
<<<<<<< HEAD
	var isUpdatingCuadrante = false;

	// Función para normalizar y seleccionar con precisión el organismo
	function setOrganismoCuadrante(org) {
		if (!org || org === '0') return;

		var clean = function(s) {
			return (s || '').toString().toUpperCase()
				.normalize("NFD").replace(/[\u0300-\u036f]/g, "")
				.replace(/[^A-Z0-9]/g, "");
		};
		var target = clean(org);

		var sel = document.getElementById("cboOrganismo");
		var found = false;

		if (sel) {
			// 1. Intento exacto o normalizado sin acentos
			for (var i = 0; i < sel.options.length; i++) {
				var optVal = clean(sel.options[i].value);
				var optText = clean(sel.options[i].text);
				if (optVal === target || optText === target) {
					sel.selectedIndex = i;
					found = true;
					break;
				}
			}

			// 2. Intento de coincidencia parcial (ej: CPNB, GNB, POLICIA DEL ESTADO)
			if (!found) {
				for (var j = 0; j < sel.options.length; j++) {
					var optVal2 = clean(sel.options[j].value);
					if (optVal2 && (target.indexOf(optVal2) !== -1 || optVal2.indexOf(target) !== -1)) {
						sel.selectedIndex = j;
						found = true;
						break;
					}
				}
			}

			// 3. Si no existe la opción exacta, crearla y seleccionarla
			if (!found && org !== '0') {
				var newOption = document.createElement("option");
				newOption.value = org;
				newOption.text = org;
				newOption.selected = true;
				sel.appendChild(newOption);
				sel.value = org;
			}

			// 4. Disparar evento nativo
			try {
				var evt = new Event('change', { bubbles: true });
				sel.dispatchEvent(evt);
			} catch(e) {}
		}

		// 5. Soporte jQuery y Select2
		if (window.jQuery) {
			var $cbo = window.jQuery("#cboOrganismo");
			if ($cbo.length && sel) {
				$cbo.val(sel.value);
				if (window.jQuery.fn.select2 && $cbo.data('select2')) {
					$cbo.trigger('change.select2');
				}
			}
		}
	}

	window.setOrganismoCuadrante = setOrganismoCuadrante;
	window.renderCuadranteData = renderCuadranteData;

	// Función central para renderizar la información de Cuadrante
	function renderCuadranteData(resp) {
		if (resp && resp.success) {
			var tel = resp.telefono || '';
			var telRaw = resp.telefono_raw || tel.replace(/[^0-9]/g, '');

			// 1. Ficha dentro del Formulario
			if ($("#box-cuadrante-info").length) {
				$("#info-cuadrante-cod").text(resp.cuadrante || '22C-XXX');
				$("#info-cuadrante-tel").text(tel);
				$("#info-cuadrante-tel-link").attr("href", "tel:" + telRaw);
				
				var ubiText = "<i class='fa fa-map-marker text-danger'></i> <strong>Municipio:</strong> " + (resp.municipio || '') + " | <strong>Parroquia:</strong> " + (resp.parroquia || '');
				$("#info-cuadrante-ubicacion").html(ubiText);
				$("#info-cuadrante-comuna").html("<strong>Comuna:</strong> " + (resp.comuna || 'No registrada'));
				
				var secText = resp.sectores ? ("<strong>Sectores y Límites:</strong> " + resp.sectores) : "";
				$("#info-cuadrante-sectores").html(secText);

				// Badge con color según organismo
				var org = resp.organismo || '';
				var orgBadgeClass = 'badge-primary';
				if (org.indexOf('GNB') !== -1) {
					orgBadgeClass = 'badge-success';
				} else if (org.indexOf('POLICÍA DEL ESTADO') !== -1 || org.indexOf('POLICIA DEL ESTADO') !== -1) {
					orgBadgeClass = 'badge-warning text-dark';
				} else if (org.indexOf('CICPC') !== -1) {
					orgBadgeClass = 'badge-dark';
				} else if (org.indexOf('MUNICIPAL') !== -1) {
					orgBadgeClass = 'badge-info';
				}
				$("#info-cuadrante-org-badge").html("<span class='badge " + orgBadgeClass + " px-2 py-1'>" + org + "</span>");

				$("#box-cuadrante-info").slideDown();
			}

			// 2. Panel Lateral en Columna Derecha (Sticky)
			if ($("#panel-cuadrante-lateral").length) {
				$("#lat-cuadrante-cod").text(resp.cuadrante || '22C-XXX');
				$("#lat-cuadrante-org").text(resp.organismo || 'N/A');
				$("#lat-cuadrante-tel").text(tel);
				$("#lat-cuadrante-tel-link").attr("href", "tel:" + telRaw);
				$("#lat-cuadrante-parr-mun").text((resp.municipio || '') + " - " + (resp.parroquia || ''));
				$("#lat-cuadrante-comuna").text(resp.comuna || 'No registrada');
				$("#lat-cuadrante-sectores").text(resp.sectores || 'No definidos');
				$("#panel-cuadrante-lateral").slideDown();
			}

			// 3. Rellenar campos del formulario
			if (telRaw) {
				$("#telefono_cuadrante").val(telRaw);
			}
			if (resp.parroquia_id && parseInt(resp.parroquia_id) > 0) {
				$("#parroquias_id").val(resp.parroquia_id);
			}
			if (resp.organismo) {
				setOrganismoCuadrante(resp.organismo);
			}
		} else {
			if ($("#box-cuadrante-info").length) {
				$("#box-cuadrante-info").slideUp();
			}
			if ($("#panel-cuadrante-lateral").length) {
				$("#panel-cuadrante-lateral").slideUp();
			}
		}
	}

	// Función global para actualizar cuadrante y organismo
	window.actualizarCuadranteUI = function(cod) {
		if (!cod || cod === "0") {
			$("#box-cuadrante-info").slideUp();
			$("#panel-cuadrante-lateral").slideUp();
			return;
		}

		var $sel = $("#cboCuadrantes");
		var $opt = $sel.find("option[value='" + cod + "']");
		if (!$opt.length) {
			$opt = $sel.find("option:selected");
		}

		var org = $opt.attr("data-organismo") || $opt.data("organismo");
		var tel = $opt.attr("data-telefono") || $opt.data("telefono");
		var telRaw = $opt.attr("data-telefono-raw") || $opt.data("telefono-raw");
		var mun = $opt.attr("data-municipio") || $opt.data("municipio");
		var parr = $opt.attr("data-parroquia") || $opt.data("parroquia");
		var parrId = $opt.attr("data-parroquia-id") || $opt.data("parroquia-id");
		var com = $opt.attr("data-comuna") || $opt.data("comuna");
		var sec = $opt.attr("data-sectores") || $opt.data("sectores");

		if (org) {
			setOrganismoCuadrante(org);
			renderCuadranteData({
				success: true,
				cuadrante: cod,
				organismo: org,
				telefono: tel,
				telefono_raw: telRaw || tel,
				municipio: mun,
				parroquia: parr,
				parroquia_id: parrId,
				comuna: com,
				sectores: sec
			});
		} else {
			$.post("../controlador/get_cuadrante_info.php", { codigo: cod }, function(resp){
				if (resp && resp.success) {
					if (resp.organismo) {
						setOrganismoCuadrante(resp.organismo);
					}
					renderCuadranteData(resp);
				}
			}, "json");
		}
	};

	// 1. Cambio en Municipio: Filtrar Parroquias
	$(document).on("change select2:select", "#cboMunicipio", function () {
		if (typeof window.alCambiarMunicipio === 'function') {
			window.alCambiarMunicipio($(this).val());
		}
	});

	// 2. Cambio en Parroquia: Cargar Sectores y Cuadrante
	$(document).on("change select2:select", "#cboParroquia", function () {
		if (typeof window.alCambiarParroquia === 'function') {
			window.alCambiarParroquia($(this).val());
			return;
		}
		var elegido = $(this).val();
		if (elegido && elegido != "0") {
			$.get("../controlador/get_sectores.php", { parroquia_id: elegido }, function(resp){
				if (resp && resp.html_options) {
					$("#cboSectores").html(resp.html_options);
					if ($.fn.select2 && $("#cboSectores").data('select2')) {
						$("#cboSectores").trigger('change.select2');
					}
				}
			}, "json");
		}
	});

	// 3. Cambio en Sectores: Sincronizar Cuadrante, Organismo y Datos
	$(document).on("change select2:select", "#cboSectores", function () {
		if (typeof window.alCambiarSector === 'function') {
			return;
		}
		if (isUpdatingCuadrante) return;
		var cboSectores = $(this).val();
		if (cboSectores && cboSectores != "0" && cboSectores != "00") {
			var optSelected = $(this).find("option:selected");
			var optParroquiaId = optSelected.attr("data-parroquia-id") || optSelected.data("parroquia-id");
			if (optParroquiaId) {
				$("#parroquias_id").val(optParroquiaId);
			}

			$.post("../controlador/get_cuadrante_info.php", { elegido: cboSectores }, function(resp){
				if (resp && resp.success) {
					isUpdatingCuadrante = true;
					if ($("#cboCuadrantes").length && resp.cuadrante) {
						$("#cboCuadrantes").val(resp.cuadrante);
						if ($.fn.select2 && $("#cboCuadrantes").data('select2')) {
							$("#cboCuadrantes").trigger('change.select2');
						}
					}
					if (resp.organismo) {
						setOrganismoCuadrante(resp.organismo);
					}
					renderCuadranteData(resp);
					isUpdatingCuadrante = false;
				}
			}, "json");
		}
	});

	// 3. Cambio directo en Cuadrantes (240 Cuadrantes de Mérida)
	$(document).on("change select2:select", "#cboCuadrantes", function () {
		if (isUpdatingCuadrante) return;
		var cod = $(this).val();
		if (typeof window.sincronizarCuadranteYOrganismo === 'function') {
			window.sincronizarCuadranteYOrganismo(cod);
		} else if (typeof window.actualizarCuadranteUI === 'function') {
			window.actualizarCuadranteUI(cod);
		}
	});

	// Conectar evento nativo de respaldo
	var domCuad = document.getElementById("cboCuadrantes");
	if (domCuad) {
		domCuad.addEventListener("change", function() {
			if (isUpdatingCuadrante) return;
			if (typeof window.sincronizarCuadranteYOrganismo === 'function') {
				window.sincronizarCuadranteYOrganismo(this.value);
			} else if (typeof window.actualizarCuadranteUI === 'function') {
				window.actualizarCuadranteUI(this.value);
			}
		});
	}

	// 4. Copiar Teléfono del Cuadrante al Portapapeles (1 Clic)
	$(document).on("click", "#btnCopiarTelCuadrante, #latBtnCopiarTel", function(e){
		e.preventDefault();
		var tel = $("#telefono_cuadrante").val() || $("#info-cuadrante-tel").text() || $("#lat-cuadrante-tel").text();
		if (tel) {
			if (navigator.clipboard && navigator.clipboard.writeText) {
				navigator.clipboard.writeText(tel).then(function(){
					var btn = $(e.currentTarget);
					var oldHtml = btn.html();
					btn.html("<i class='fa fa-check text-success'></i> ¡Copiado!");
					setTimeout(function(){ btn.html(oldHtml); }, 2000);
				});
			} else {
				var temp = $("<input>");
				$("body").append(temp);
				temp.val(tel).select();
				document.execCommand("copy");
				temp.remove();
				var btn = $(e.currentTarget);
				var oldHtml = btn.html();
				btn.html("<i class='fa fa-check text-success'></i> ¡Copiado!");
				setTimeout(function(){ btn.html(oldHtml); }, 2000);
			}
		}
	});
});
/*****************************	Fin Funcion Parroquias - Sectores - Cuadrantes 		************************************/
=======
	$("#cboParroquia").change(function () {
	 $("#cboParroquia option:selected").each(function () {
	 elegido=$(this).val();
	 $.post("../controlador/Sectores.php", { elegido: elegido }, function(data){
	   $("#cboSectores").html(data);

	   $("#cboSectores").change(function () {
		 $("#cboSectores option:selected").each(function () {
			cboSectores = $(this).val();
		   $.post("../controlador/Cuadrantes.php", { elegido: cboSectores }, function(data){
			 $("#cboCuadrantes").html(data);
			 
		   });     
		 });
		})
	 });     
	   });
  })
});
/*****************************	Fin Funcion Parroquias - Sectores - Cuadrantes 		************************************/

/**********************	Inicio Funcion Parroquias - Sectores - Cuadrantes	"Cierre Guardia"	************************/

$(document).ready(function(){
/*	$("#cboParroquia").change(function () {
	 $("#cboParroquia option:selected").each(function () {
	 elegido=$(this).val();
	 $.post("../controlador/Sectores.php", { elegido: elegido }, function(data){
	   $("#cboSectores").html(data);*/

	   $("#cboSectores").change(function () {
		 $("#cboSectores option:selected").each(function () {
			cboSectores = $(this).val();
		   $.post("../controlador/Cuadrantes.php", { elegido: cboSectores }, function(data){
			 $("#cboCuadrantes").html(data);

			 $("#cboSectores option:selected").each(function () {
				cboSectores = $(this).val();
			   $.post("../controlador/Organismo.php", { elegido: cboSectores }, function(data){
				 $("#cboOrganismo").html(data);
				 
			   });     
			 });

		   });     
		 });
		})
	 });     
/*	   });
  })
});*/
/**********************	Fin Funcion Parroquias - Sectores - Cuadrantes 	"Cierre Guardia"	************************/
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
