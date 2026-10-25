# Documentacion del sistema Libro Digital de Novedades 9-1-1

## Proposito de este archivo

Este documento proporciona contexto a personas y asistentes de IA que revisen este repositorio. Resume de que trata la aplicacion, como esta organizada, que cambios ya se realizaron y que aspectos podrian mejorarse.

La lista de mejoras es informativa. No autoriza por si sola a cambiar reglas de negocio, tecnologias, datos ni flujos operativos. Antes de una modificacion, revisar el codigo relacionado y confirmar su alcance.

## Que hace el sistema

El proyecto corresponde al **Libro Digital de Novedades 9-1-1** asociado a la Coordinacion de Operaciones del VEN 911 en Merida. Su objetivo funcional es registrar y consultar novedades y solicitudes, documentar al personal asignado a las guardias y dar seguimiento a operaciones atendidas por organismos de seguridad y prevencion.

El manual de usuario disponible es de octubre de 2021. El comportamiento actual debe confirmarse con el codigo y, cuando aplique, con usuarios del sistema: el manual puede no reflejar cambios posteriores.

## Funciones identificadas

A partir de los nombres de paginas, formularios y consultas se identifican estas areas:

- Inicio de sesion, recuperacion de acceso y administracion de cuentas.
- Administracion de personal, grupos de guardia y organismos.
- Asignacion de personal, apertura y cierre de guardias.
- Registro, consulta, seguimiento y cierre de solicitudes y novedades.
- Observaciones de guardia y de personal.
- Inventario y control de bienes al recibir y entregar una guardia.
- Consultas historicas, estadisticas y reportes.
- Bitacora de operaciones.
- Calendario, contactos y manuales de usuario.

Esta lista describe funciones observadas en el repositorio; no sustituye una validacion de los flujos operativos vigentes.

## Perfiles de usuario observados

El codigo de autenticacion enruta por identificadores numericos de rol. Los nombres e IDs siguientes se deducen del codigo y deben verificarse contra la base de datos antes de modificar permisos.

| ID observado | Perfil | Areas asociadas |
| --- | --- | --- |
| 1 | Administrador | Usuarios, personal, organismos, grupos, bienes, consultas e informes |
| 2 | Supervisor | Personal de guardia, apertura/cierre, observaciones e informes |
| 3 | Despachador | Novedades, solicitudes y operaciones relacionadas con el despacho |
| 4 | Operador | Solicitudes y consultas relacionadas con su operacion |

Las restricciones del menu no son suficientes para proteger una accion. Los permisos deben comprobarse en el servidor, tanto en paginas como en endpoints.

## Tecnologias y arquitectura actual

- Backend: PHP procedural, con HTML y logica de acceso/datos a menudo mezclados en las mismas paginas.
- Base de datos principal observada: PostgreSQL, accedido mediante funciones `pg_*`.
- MySQL ya no se usa: sus datos historicos se migraron al esquema `historico` de PostgreSQL (ver revision del 25-10-2026).
- Interfaz: plantilla Gentelella y dependencias locales como Bootstrap, jQuery y Font Awesome.
- Recursos frontend propios: `src/js/` y `src/scss/`.
- No se ha identificado una arquitectura backend MVC o por paquetes; los directorios funcionales y por perfil organizan gran parte de las paginas.

No reemplazar estas tecnologias ni introducir un framework como parte de una mejora rutinaria. Cualquier cambio de plataforma requiere una solicitud y evaluacion separadas.

## Mapa del repositorio

- `index.php`: pantalla de acceso.
- `cookie/`: autenticacion, manejo de sesion, redirecciones y salida.
- `config/`: configuracion y conexiones a bases de datos.
- `administrador/`: pantallas del perfil administrador.
- `supervisor/`: pantallas de supervisores y gestion de guardias.
- `despachador/`: pantallas relacionadas con despacho y seguimiento.
- `operador/`: pantallas de operadores.
- `controlador/`: consultas auxiliares, opciones y datos para formularios.
- `insert_*.php` e `insertar_*.php`: endpoints que procesan escrituras y acciones.
- `menu/` y `plantillas/`: partes compartidas de la interfaz.
- `Manuales/`: manuales de usuario en PDF.
- `vendors/`, `build/`, `css/`, `js/`, `images/`: librerias y recursos de interfaz.
- `tests/lint_php.sh`: prueba estatica de sintaxis para archivos PHP.

## Flujo tecnico general observado

1. El usuario envia sus credenciales desde `index.php`.
2. `cookie/cookie.php` consulta la base de datos, inicia datos de sesion, registra el acceso en la bitacora y redirige segun el rol.
3. Las paginas de cada area incluyen menus y plantillas, y algunas validan rol y datos de `POST`.
4. Los formularios llaman paginas PHP que consultan o modifican PostgreSQL.
5. Algunas operaciones escriben tambien en la bitacora.

Este flujo es una descripcion general; los detalles varian entre paginas y endpoints.

## Cambios ya realizados en este espacio de trabajo

- En `controlador/grado_instruccion.php` se quitaron dos llaves de cierre sobrantes que producian un error de sintaxis PHP. No se cambio la consulta ni el resultado esperado.
- Se agrego `tests/lint_php.sh`, un script Bash que recorre los archivos `.php` y ejecuta el linter incluido en PHP.
- La prueba se ejecuto correctamente sobre 292 archivos PHP usando PHP 8.5.4 disponible localmente.
- Antes de esos cambios se creo una copia comprimida del proyecto fuera de la carpeta del repositorio: `../Sistema_CTTTVEN911-master-backup-20261012.tar.gz`.
- En esa revision no se cambio la logica de negocio ni las tecnologias.

### Revision del 25-10-2026

- `cookie/cookie.php`: la consulta de acceso y el `UPDATE` de bloqueo de usuario usan ahora `pg_query_params` en lugar de concatenar el usuario recibido por formulario o cookie (inyeccion SQL). El flujo y las redirecciones no cambiaron.
- `cookie/cookie.php`: en la verificacion del despachador la ultima condicion repetia `personal_cedula_pc1`; se corrigio a `personal_cedula_pc3` (columna existente en el respaldo `VEN911_13082026_01.sql`).
- `index.php`: boton de ojo para mostrar u ocultar la contraseña; se quitaron los `<br>` vacios bajo el banner para evitar scroll.
- Nuevo `css/compacto_inter.css`: fuente Inter (servida localmente desde `vendors/inter/`, sin depender de internet) y ajustes compactos de paneles, formularios, tablas y menu para distintos tamaños de pantalla. Se carga despues de los estilos de la plantilla en `plantillas/superior*.php`, `index.php`, `recuperar_usuario/*.php`, `despachador/manual_sup.php` y `administrador/principal_adm.php`. Para revertir el cambio visual basta con quitar ese `<link>`.
- `tests/lint_php.sh` ahora tiene permiso de ejecucion.

#### Base de datos: todo en PostgreSQL

- El sistema trabaja solo con PostgreSQL (base `ven911`). Los datos del "Sistema 171" que estaban en MySQL (`ven911_2025`: `solicitud`, `motivos_hijos`, `motivos_padre`, `171_usuarioz`, `sector`, `amigo171`, etc.) se migraron al esquema `historico` de `ven911` con `database/migrar_mysql_a_postgres.php` (verificado: mismas filas y mismo contenido; 160.028 solicitudes).
- `config/conexion2_bd.php` ya no usa MySQL: abre una conexion PostgreSQL con `search_path = historico, public`. Se conservaron `$conexion2` y `$mysql` para no cambiar el resto del codigo. Las paginas `*/consulta_solicitud.php`, `*/solicitud_consulta.php`, `formularios/form_registro_consulta_solicitud.php` y `formularios/form_registro_estadisticas_01.php` pasaron de `mysqli_*` a `pg_*`; los ids recibidos se convierten a entero y `171_usuarioz` se cita entre comillas.
- Credenciales: `config/conexion1.php` y `config/config_bd.php` usan `config/conexion_local.php` si existe (ignorado por git, plantilla en `config/conexion_local.ejemplo.php`); si no existe se mantiene la configuracion original.
- Tablas que faltaban en la base local y se agregaron con scripts versionados: `cuadrantes_de_paz` (`database/cuadrantes_de_paz.sql`), `usuario_permisos` (`database/usuario_permisos.sql`) y las columnas `cuadrante`, `organismo_cuadrante`, `telefono_cuadrante` de `solicitudes` (`database/solicitudes_cuadrante.sql`). Sin esas columnas fallaba el registro de solicitudes nuevas y el dashboard del administrador.
- Para instalar en otro equipo: solo estructura con `database/esquema_ven911.sql`; con datos, restaurar `BaseDeDatos_Plantilla2_Backup/VEN911_13082026_01.sql` en `ven911`, ejecutar los tres `.sql` de `database/` y restaurar `BaseDeDatos_Plantilla1_Backup/ven911_2025.sql` desde Administrador > Respaldo BD (se convierte automaticamente al esquema `historico`), o con `php database/migrar_mysql_a_postgres.php` si se dispone de MySQL.
- `administrador/respaldo_bd.php`: restaura solo en PostgreSQL; el convertidor de volcados MySQL ahora escribe en `historico`, interpreta los escapes de MySQL y toma las credenciales de la configuracion (antes la clave estaba escrita en el codigo). Probado: produce el mismo contenido que la migracion.
- `administrador/PDF/imprime_personal2.php` e `imprime_personal3.php` siguen usando `mysqli` con tablas (`personal_171`, `administrador_coord`, `grupos_organismos`) que no existen en ninguna base disponible y no estan enlazados desde el menu; no se modificaron.

#### Graficas

- Chart.js local actualizado de 2.1.4 a 2.9.4 (misma version mayor, misma API). Se quitaron de `plantillas/superior3.php` las copias por CDN (una sin version fija y una ruta inexistente).
- Nuevo `js/graficas_tema.js`, cargado en las plantillas inferiores: fuente Inter, rejilla tenue, barras finas, donas con separacion, tooltips con porcentaje y separador de miles, proporcion segun cantidad de categorias.
- Nuevo `config/graficas_helper.php`: cada estatus de solicitud tiene un color fijo (paleta validada para daltonismo) en la grafica y en su leyenda; antes habia colores invalidos (`aero`) y leyendas que no coincidian.
- `controlador/consulta_estadistica_personal.php` usaba la API de Chart.js 3 y colores aleatorios por barra; ahora usa un solo color, barras ordenadas de mayor a menor.

#### Errores de PHP y esquema

- `cookie/cookie.php` (incluido por todas las paginas) ya no muestra errores de PHP al usuario: se registran en el log del servidor. Para verlos en pantalla en desarrollo, definir `MOSTRAR_ERRORES` en `true` en `config/conexion_local.php` (en produccion `false` o sin definir).
- Nuevo `database/esquema_ven911.sql`: estructura completa de `ven911` (esquemas `public` e `historico`, 61 tablas, sin datos). Probado: se restaura sin errores en una base vacia y queda identico a la base local. Si la estructura cambia, regenerarlo con `pg_dump --schema-only --no-owner --no-privileges ven911`.

El resultado de sintaxis solo corresponde a la copia y al entorno revisados entonces. No garantiza que el sistema funcione contra una base real ni confirma compatibilidad con la version PHP de produccion.

#### Limpieza y prueba general (25-10-2026)

- Se eliminaron 66 archivos sin uso, comprobando antes que ningun archivo los referenciara: pruebas (`prueba01.php`, `test_novedades.php`, `supervisor/consulta123.php`), copias y versiones viejas (`insertar_guardia (copia).php`, `insertar_guardia2.php`, `*_old.php`, formularios `*_rev.php` y fechados, `estadisticas01.php`, `ver_solicitudes01.php`, `cookie/cookie01.php`, `cookie/cookie1.php`), JS/CSS/HTML que ninguna pagina carga y 20 respaldos del editor (`*~`, `.swp`). Varios eran accesibles por URL sin sesion. Siguen disponibles en el historial de git.
- Se conservaron a proposito: `controlador/Organismo.php` (parte de cuadrantes), `administrador/registro_eventos.php` (redirige una URL antigua) y la libreria `administrador/PDF/fpdf123`.
- `database/instalar_cuadrantes.php` solo se ejecuta por consola (antes cualquiera podia reiniciar la tabla desde el navegador).
- Prueba de todas las paginas con sesion simulada de cada rol (153 paginas, solo lectura, sin cambios en la base). Errores corregidos: `$_GET[msg]`/`$_GET[error]` sin comillas (fatal en PHP 8: `principal_adm.php` y el ultimo paso del registro de personal), suma de texto en `form_registro_estadisticas.php` (tumbaba `supervisor/estadisticas.php`), ruta de `controlador/grado_instruccion.php`, y `ver_estadisticas.php` / `ver_observaciones_guardia.php` que fallaban si el usuario no habia abierto la guardia.
- **Recuperacion de contraseña (`recuperar_usuario/`)**: tenia una vulnerabilidad critica sin necesidad de sesion: se podia ir directo al paso 3 y cambiar la contraseña de cualquier usuario, el formulario permitia asignarse rol de administrador (campo oculto `tipo_rol`), las respuestas de seguridad se comparaban con las de todos los usuarios con `LIKE` (una respuesta vacia pasaba) y habia inyeccion SQL. Ahora el avance se guarda en la sesion, las respuestas se comparan exactas con las del propio usuario, el `UPDATE` solo cambia la contraseña y todas las consultas son parametrizadas. Probado contra 8 ataques y con el flujo legitimo.
- Quedan avisos no bloqueantes de codigo antiguo (indices indefinidos, etc.); en produccion no se muestran al usuario.

## Oportunidades de mejora identificadas

Son observaciones de una inspeccion parcial. Deben confirmarse antes de implementar cambios.

### Seguridad

- Se encontraron credenciales de bases de datos escritas directamente en archivos de configuracion. No incluir sus valores en documentacion, logs, ejemplos ni conversaciones. Considerarlas expuestas y coordinar su rotacion con quien administre los ambientes.
- En el acceso se observa SHA-1 para contrasenas y consultas SQL concatenadas con valores recibidos. Evaluar consultas parametrizadas y migracion compatible a `password_hash`/`password_verify`.
- Revisar controles de sesion y autorizacion: regeneracion de ID, expiracion, cookies seguras bajo HTTPS y permisos comprobados en cada accion del servidor.
- Revisar proteccion CSRF en formularios y escape de datos antes de mostrarlos en HTML.
- El bloqueo de cuenta observado utiliza cookies del navegador; verificar si existe tambien un control fiable del lado del servidor.
- Evitar mostrar errores internos de base de datos al usuario; registrar detalles tecnicos sin exponer informacion sensible.

### Integridad y confiabilidad

- Revisar si las operaciones que escriben en varias tablas necesitan transacciones para evitar registros parciales.
- En flujos revisados se consulta el ID maximo despues de insertar. Comprobar concurrencia y considerar mecanismos de PostgreSQL como `RETURNING` sin cambiar el comportamiento funcional.
- Definir y probar validaciones del lado del servidor, reglas de estado, campos requeridos y manejo de errores.
- Comprobar que la bitacora identifique de forma fiable al actor y la operacion, y que sus escrituras sean consistentes con la accion auditada.

### Mantenimiento y pruebas

- Hay paginas con logica repetida y SQL mezclado con la presentacion. Se puede extraer codigo comun gradualmente, conservando rutas y resultados.
- Revisar archivos antiguos, copias y nombres parecidos antes de eliminarlos; primero confirmar referencias y uso.
- Ampliar las pruebas desde sintaxis hacia pruebas de consultas y flujos con datos de prueba anonimizados, sin conectar pruebas destructivas a produccion.
- Corregir o complementar el README principal: actualmente describe sobre todo la plantilla Gentelella, no el sistema VEN 911.

## Informacion aun no confirmada

- El esquema de la base esta en `database/esquema_ven911.sql`.
- La version local de PHP observada fue 8.5.4; no se conoce la version de produccion.
- No se identifico una suite de pruebas funcionales, un entorno local completo ni datos anonimizados para pruebas.
- Los roles, transiciones de guardia y reglas exactas deben cotejarse con los datos y usuarios actuales.

No asumir que una consulta puede probarse o que una operacion es segura sin conocer el esquema, las restricciones y el entorno de destino.

## Instrucciones para futuras IAs

- Usa este archivo como contexto inicial, pero verifica las afirmaciones en el codigo vigente antes de actuar.
- El usuario quiere comprender y mejorar este sistema gradualmente. No ejecutar una reescritura global ni implementar automaticamente toda la lista de oportunidades.
- Conserva la logica de negocio, las rutas y las tecnologias existentes salvo que el usuario autorice expresamente un cambio.
- Antes de editar, explica el comportamiento afectado, el riesgo y una validacion concreta. Haz cambios pequenos y ejecuta una prueba enfocada.
- No accedas, publiques ni reproduzcas credenciales. No uses datos reales para pruebas; no conectes acciones de escritura a produccion.
- Si falta el esquema o una regla operativa necesaria, marca la incertidumbre y pide solo el dato que bloquea la decision.
- Para comprobar sintaxis PHP desde la raiz del proyecto: `./tests/lint_php.sh`.

## Referencias

- [Manual de usuario](Manuales/Manual_Usuario_Libro_Digital_de_Novedades.pdf)
- [Pantalla de acceso](index.php)
- [Autenticacion y redireccion por perfil](cookie/cookie.php)
- [Conexion PostgreSQL](config/conexion1.php)
- [Controlador de grados de instruccion](controlador/grado_instruccion.php)
- [Prueba de sintaxis PHP](tests/lint_php.sh)
