<?php
$options="";
//Parroquia 893 Municipio 178
if ($_POST["elegido"]=='893') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="AV. BOLIVAR">AV. BOLIVAR </option>
    <option value="BARRIO 1RO DE MAYO">BARRIO 1RO DE MAYO </option>
    <option value="BARRIO ALVARADO P&EACUTEREZ">BARRIO ALVARADO P&EACUTEREZ </option>
    <option value="BARRIO CAMPO ALEGRE">BARRIO CAMPO ALEGRE </option>
    <option value="BARRIO CARABOBO">BARRIO CARABOBO </option>
    <option value="BARRIO EL CARMEN">BARRIO EL CARMEN </option>
    <option value="BARRIO EL PARA&IACUTESO">BARRIO EL PARA&IACUTESO</option>
    <option value="BARRIO INMACULADA">BARRIO INMACULADA </option>
    <option value="BARRIO LA CONQUISTA">BARRIO LA CONQUISTA </option>
    <option value="BARRIO LA PEDECA">BARRIO LA PEDECA </option>
    <option value="BARRIO LA PLAYA">BARRIO LA PLAYA  </option>
    <option value="BARRIO LA PLAYITA">BARRIO LA PLAYITA </option>
    <option value="BARRIO LA VEGA L">BARRIO LA VEGA L  </option>
    <option value="BARRIO LA VEGA LL">BARRIO LA VEGA LL  </option>
    <option value="BARRIO LA VICTORIA">BARRIO LA VICTORIA </option>
    <option value="BARRIO LAS ACACIAS">BARRIO LAS ACACIAS </option>
    <option value="BARRIO LAS FLORES">BARRIO LAS FLORES </option>
    <option value="BARRIO LOS A&NTILDEITOS">BARRIO LOS A&NTILDEITOS </option>
    <option value="BARRIO R&OACUTEMULO GALLEGOS">BARRIO R&OACUTEMULO GALLEGOS </option>
    <option value="BARRIO SAN ISIDRO">BARRIO SAN ISIDRO </option>
    <option value="CALLE 1">CALLE 1 </option>
    <option value="LA PEDECA">LA PEDECA </option>
    <option value="LOS CANITOS">LOS CANITOS </option>
    <option value="LOS POZONES">LOS POZONES </option>
    <option value="PARQUE CHAMA">PARQUE CHAMA </option>
    <option value="SECTOR BACHAQUERO">SECTOR BACHAQUERO </option>
    <option value="SECTOR BANCADA DE LIMONES">SECTOR BANCADA DE LIMONES </option>
    <option value="SECTOR BOL&IACUTEVAR">SECTOR BOL&IACUTEVAR </option>
    <option value="SECTOR BUENA ESPERANZA">SECTOR BUENA ESPERANZA </option>
    <option value="SECTOR CA&NTILDEO BLANCO">SECTOR CA&NTILDEO BLANCO </option>
    <option value="SECTOR CA&NTILDEO DEL BURRO">SECTOR CA&NTILDEO DEL BURRO </option>
    <option value="SECTOR CA&NTILDEO MUERTO">SECTOR CA&NTILDEO MUERTO </option>
    <option value="SECTOR CA&NTILDEO NEGRO">SECTOR CA&NTILDEO NEGRO </option>
    <option value="SECTOR CAPIT&AACUTEN">SECTOR CAPIT&AACUTEN </option>
    <option value="SECTOR CASA DE TEJA">SECTOR CASA DE TEJA </option>
    <option value="SECTOR CERRO PELADO">SECTOR CERRO PELADO </option>
    <option value="SECTOR CONCHA">SECTOR CONCHA </option>
    <option value="SECTOR CONQUISTA">SECTOR CONQUISTA </option>
    <option value="SECTOR EL ABANICO">SECTOR EL ABANICO </option>
    <option value="SECTOR EL BOSQUE">SECTOR EL BOSQUE </option>
    <option value="SECTOR EL CARMEN">SECTOR EL CARMEN </option>
    <option value="SECTOR EL CASTILLO">SECTOR EL CASTILLO </option>
    <option value="SECTOR EL GU&AACUTEIMARO">SECTOR EL GU&AACUTEIMARO </option>
    <option value="SECTOR EL LABERINTO">SECTOR EL LABERINTO </option>
    <option value="SECTOR EL MANGUITO">SECTOR EL MANGUITO </option>
    <option value="SECTOR EL MILAGRO">SECTOR EL MILAGRO </option>
    <option value="SECTOR EL MORALITO">SECTOR EL MORALITO </option>
    <option value="SECTOR EL NARANJAL">SECTOR EL NARANJAL </option>
    <option value="SECTOR EL MANGUITO">SECTOR EL MANGUITO </option>
    <option value="SECTOR EL TAPARO">SECTOR EL TAPARO </option>
    <option value="SECTOR EL TIGRE">SECTOR EL TIGRE </option>
    <option value="SECTOR EL TREINTA Y CINCO">SECTOR EL TREINTA Y CINCO </option>
    <option value="SECTOR EL VIG&IACUTEA">SECTOR EL VIG&IACUTEA </option>
    <option value="SECTOR GUAIMARAL">SECTOR GUAIMARAL </option>
    <option value="SECTOR JANEIRO">SECTOR JANEIRO </option>
    <option value="SECTOR KIL&OACUTEMETRO 6">SECTOR KIL&OACUTEMETRO 6 </option>
    <option value="SECTOR KIL&OACUTEMETRO 7">SECTOR KIL&OACUTEMETRO 7 </option>
    <option value="SECTOR KIL&OACUTEMETRO 13">SECTOR KIL&OACUTEMETRO 13 </option>
    <option value="SECTOR KIL&OACUTEMETRO 15">SECTOR KIL&OACUTEMETRO 15 </option>
    <option value="SECTOR KIL&OACUTEMETRO 16">SECTOR KIL&OACUTEMETRO 16 </option>
    <option value="SECTOR KIL&OACUTEMETRO 17">SECTOR KIL&OACUTEMETRO 17 </option>
    <option value="SECTOR KIL&OACUTEMETRO 18">SECTOR KIL&OACUTEMETRO 18 </option>
    <option value="SECTOR KIL&OACUTEMETRO 22">SECTOR KIL&OACUTEMETRO 22 </option>
    <option value="SECTOR KIL&OACUTEMETRO 24">SECTOR KIL&OACUTEMETRO 24 </option>
    <option value="SECTOR KIL&OACUTEMETRO 26">SECTOR KIL&OACUTEMETRO 26 </option>
    <option value="SECTOR KIL&OACUTEMETRO 27">SECTOR KIL&OACUTEMETRO 27 </option>
    <option value="SECTOR KIL&OACUTEMETRO 28">SECTOR KIL&OACUTEMETRO 28 </option>
    <option value="SECTOR KIL&OACUTEMETRO 35">SECTOR KIL&OACUTEMETRO 35 </option>
    <option value="SECTOR KIL&OACUTEMETRO 41">SECTOR KIL&OACUTEMETRO 41 </option>
    <option value="SECTOR KIL&OACUTEMETRO 49">SECTOR KIL&OACUTEMETRO 49 </option>
    <option value="SECTOR LA CA&NTILDEA BRAVA">SECTOR LA CA&NTILDEA BRAVA </option>
    <option value="SECTOR LA CORDILLERA">SECTOR LA CORDILLERA </option>
    <option value="SECTOR LA FORTUNA">SECTOR LA FORTUNA </option>
    <option value="SECTOR LA MENSURA">SECTOR LA MENSURA </option>
    <option value="SECTOR LA PLAYA">SECTOR LA PLAYA </option>
    <option value="SECTOR LA RAYA">SECTOR LA RAYA </option>
    <option value="SECTOR LA SOLITA">SECTOR LA SOLITA </option>
    <option value="SECTOR LAS BRISAS">SECTOR LAS BRISAS </option>
    <option value="SECTOR LAS CASAS">SECTOR LAS CASAS </option>
    <option value="SECTOR LAS DELICIAS">SECTOR LAS DELICIAS </option>
    <option value="SECTOR LAS TALAS">SECTOR LAS TALAS </option>
    <option value="SECTOR LOS CA&NTILDEITOS">SECTOR LOS CA&NTILDEITOS </option>
    <option value="SECTOR LOS MERCADOS">SECTOR LOS MERCADOS </option>
    <option value="SECTOR LOS POZONES">SECTOR LOS POZONES </option>
    <option value="SECTOR MEDIO CUARTO">SECTOR MEDIO CUARTO </option>
    <option value="SECTOR MOZIOCO">SECTOR MOZIOCO </option>
    <option value="SECTOR ON&IACUTEA">SECTOR ON&IACUTEA </option>
    <option value="SECTOR PALMIRA">SECTOR PALMIRA </option>
    <option value="SECTOR PUERTO CHAMA">SECTOR PUERTO CHAMA </option>
    <option value="SECTOR PUERTO REAL">SECTOR PUERTO REAL </option>
    <option value="SECTOR SAN ANTONIO">SECTOR SAN ANTONIO </option>
    <option value="SECTOR SAN JOS&EACUTE">SECTOR SAN JOS&EACUTE </option>
    <option value="SECTOR SANTA MAR&IACUTEA">SECTOR SANTA MAR&IACUTEA </option>
    <option value="SECTOR TAPARONES">SECTOR TAPARONES </option>
    <option value="SECTOR TEOTISTE DE GALLEGOS">SECTOR TEOTISTE DE GALLEGOS </option>
    <option value="SECTOR VERA DE AGUA">SECTOR VERA DE AGUA </option>
    <option value="URBANIZACI&OACUTEN BUBUQUI IV">URBANIZACI&OACUTEN BUBUQUI IV </option>
    <option value="URBANIZACI&OACUTEN BUBUQUI V">URBANIZACI&OACUTEN BUBUQUI V </option>
    <option value="URBANIZACI&OACUTEN BUBUQUI VI">URBANIZACI&OACUTEN BUBUQUI VI </option>
    <option value="URBANIZACI&OACUTEN BUENOS A&IACUTERES">URBANIZACI&OACUTEN BUENOS A&IACUTERES </option>
    <option value="URBANIZACI&OACUTEN CARABOBO">URBANIZACI&OACUTEN CARABOBO </option>
    <option value="URBANIZACI&OACUTEN DOMINGO ROJAS P&EACUTEREZ">URBANIZACI&OACUTEN DOMINGO ROJAS P&EACUTEREz </option>    
    <option value="URBANIZACI&OACUTEN LA MOTOZA">URBANIZACI&OACUTEN LA MOTOZA </option>
    <option value="URBANIZACI&OACUTEN LAGO AZUL">URBANIZACI&OACUTEN LAGO AZUL </option>
    <option value="URBANIZACI&OACUTEN LOS PARQUES">URBANIZACI&OACUTEN LOS PARQUES </option>
    <option value="URBANIZACI&OACUTEN PARQUE CHAMA">URBANIZACI&OACUTEN PARQUE CHAMA </option>
    <option value="URBANIZACI&OACUTEN SANTA B&AACUTERBARA">URBANIZACI&OACUTEN SANTA B&AACUTERBARA </option>
    ';    
}
   // Parroquia 2 Municipio 1
if ($_POST["elegido"]=='894') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="AV. BOL&IACUTEVAR">AV. BOL&IACUTEVAR </option>
    <option value="BARRIO 19 DE FEBRERO">BARRIO 19 DE FEBRERO </option>
    <option value="BARRIO BICENTENARIO">BARRIO BICENTENARIO </option>
    <option value="BARRIO BOL&IACUTEVAR">BARRIO BOL&IACUTEVAR </option>
    <option value="BARRIO EL BOSQUE">BARRIO EL BOSQUE </option>
    <option value="BARRIO EL CARMEN">BARRIO EL CARMEN </option>
    <option value="BARRIO LA ESPERANZA">BARRIO LA ESPERANZA </option>
    <option value="BARRIO LA INMACULADA">BARRIO LA INMACULADA </option>
    <option value="BARRIO LA P&AACUTEEZ">BARRIO LA P&AACUTEEZ </option>
    <option value="BARRIO LA PEDREGOZA">BARRIO LA PEDREGOZA </option>
    <option value="BARRIO LA VICTORIA">BARRIO LA VICTORIA </option>
    <option value="BARRIO LAS FLORES">BARRIO LAS FLORES </option>
    <option value="BARRIO LOS PINOS">BARRIO LOS PINOS </option>
    <option value="BARRIO SAN MARCOS">BARRIO SAN MARCOS </option>
    <option value="BARRIO SUR AM&EACUTERICA">BARRIO SUR AM&EACUTERICA </option>
    <option value="BARRIO VISTA ALEGRE">BARRIO VISTA ALEGRE </option>
    <option value="SECTOR BACHAQUERO">SECTOR BACHAQUERO </option>
    <option value="SECTOR BANCADA DE LIMONES">SECTOR BANCADA DE LIMONES </option>
    <option value="SECTOR CA&NTILDEO DEL BURRO">SECTOR CA&NTILDEO DEL BURRO </option>
    <option value="SECTOR CA&NTILDEO NEGRO">SECTOR CA&NTILDEO NEGRO </option>
    <option value="SECTOR CARACOL&IACUTE">SECTOR CARACOL&IACUTE </option>
    <option value="SECTOR CHIRIMOYO">SECTOR CHIRIMOYO </option>
    <option value="SECTOR COSTA DE ON&IACUTEA">SECTOR COSTA DE ON&IACUTEA </option>
    <option value="SECTOR EL ABANICO">SECTOR EL ABANICO </option>
    <option value="SECTOR EL CAIM&AACUTEN">SECTOR EL CAIM&AACUTEN </option>
    <option value="SECTOR EL CASTILLO">SECTOR EL CASTILLO </option>
    <option value="SECTOR EL GU&AACUTEIMARO">SECTOR EL GU&AACUTEIMARO </option>
    <option value="SECTOR EL LABERINTO">SECTOR EL LABERINTO </option>
    <option value="SECTOR EL MANGUITO">SECTOR EL MANGUITO </option>
    <option value="SECTOR EL MILAGRO">SECTOR EL MILAGRO </option>
    <option value="SECTOR EL MORALITO">SECTOR EL MORALITO </option>
    <option value="SECTOR EL TIGRE">SECTOR EL TIGRE </option>
    <option value="SECTOR EL TREINTA Y CINCO">SECTOR EL TREINTA Y CINCO </option>
    <option value="SECTOR EL UVITO">SECTOR EL UVITO </option>
    <option value="SECTOR KIL&OACUTEMETRO 13">SECTOR KIL&OACUTEMETRO 13 </option>
    <option value="SECTOR KIL&OACUTEMETRO 15">SECTOR KIL&OACUTEMETRO 15 </option>
    <option value="SECTOR KIL&OACUTEMETRO 16">SECTOR KIL&OACUTEMETRO 16 </option>
    <option value="SECTOR KIL&OACUTEMETRO 17">SECTOR KIL&OACUTEMETRO 17 </option>
    <option value="SECTOR KIL&OACUTEMETRO 18">SECTOR KIL&OACUTEMETRO 18 </option>
    <option value="SECTOR KIL&OACUTEMETRO 22">SECTOR KIL&OACUTEMETRO 22 </option>
    <option value="SECTOR KIL&OACUTEMETRO 24">SECTOR KIL&OACUTEMETRO 24 </option>
    <option value="SECTOR KIL&OACUTEMETRO 26">SECTOR KIL&OACUTEMETRO 26 </option>
    <option value="SECTOR KIL&OACUTEMETRO 27">SECTOR KIL&OACUTEMETRO 27 </option>
    <option value="SECTOR KIL&OACUTEMETRO 28">SECTOR KIL&OACUTEMETRO 28 </option>
    <option value="SECTOR KIL&OACUTEMETRO 35">SECTOR KIL&OACUTEMETRO 35 </option>
    <option value="SECTOR KIL&OACUTEMETRO 41">SECTOR KIL&OACUTEMETRO 41 </option>
    <option value="SECTOR LA CA&NTILDEA BRAVA">SECTOR LA CA&NTILDEA BRAVA </option>
    <option value="SECTOR LA MENSURA">SECTOR LA MENSURA </option>
    <option value="SECTOR LA P&AACUTEEZ">SECTOR LA P&AACUTEEZ </option>
    <option value="SECTOR LA PEDREGOSA (LOS BLOQUES)">SECTOR LA PEDREGOSA (LOS BLOQUES) </option>
    <option value="SECTOR LA RAYA">SECTOR LA RAYA </option>
    <option value="SECTOR LA TRINIDAD">SECTOR LA TRINIDAD </option>
    <option value="SECTOR LAS INVACIONES">SECTOR LAS INVACIONES </option>
    <option value="SECTOR LAS TALAS">SECTOR LAS TALAS </option>
    <option value="SECTOR LOS ALBARICOS">SECTOR LOS ALBARICOS </option>
    <option value="SECTOR LOS CA&NTILDEITOS">SECTOR LOS CA&NTILDEITOS </option>
    <option value="SECTOR LOS HATICOS">SECTOR LOS HATICOS </option>
    <option value="SECTOR LOS MERCADOS">SECTOR LOS MERCADOS </option>
    <option value="SECTOR LOS POZONES">SECTOR LOS POZONES </option>
    <option value="SECTOR ON&IACUTEA ABAJO">SECTOR ON&IACUTEA ABAJO </option>
    <option value="SECTOR OSAMA ROJAS">SECTOR OSAMA ROJAS </option>
    <option value="SECTOR PALMIRA">SECTOR PALMIRA </option>
    <option value="SECTOR TUNANA">SECTOR TUNANA </option>
    <option value="SECTOR TUNANITA">SECTOR TUNANITA </option>
    <option value="SECTOR VERA DE AGUA">SECTOR VERA DE AGUA </option>
    <option value="URBANIZACI&OACUTEN BUBUQUI I ">URBANIZACI&OACUTEN BUBUQUI I </option>
    <option value="URBANIZACI&OACUTEN BUBUQUI II">URBANIZACI&OACUTEN BUBUQUI II </option>
    <option value="URBANIZACI&OACUTEN BUBUQUI III">URBANIZACI&OACUTEN BUBUQUI III </option>
    <option value="URBANIZACI&OACUTEN COUNTRY CLUB">URBANIZACI&OACUTEN COUNTRY CLUB </option>
    <option value="URBANIZACI&OACUTEN LA TRINIDAD">URBANIZACI&OACUTEN LA TRINIDAD </option>
    <option value="URBANIZACI&OACUTEN LOS BLOQUES">URBANIZACI&OACUTEN LOS BLOQUES </option>
    <option value="URBANIZACI&OACUTEN LOS CANEYES">URBANIZACI&OACUTEN LOS CANEYES </option>
    <option value="URBANIZACI&OACUTEN P&AACUTEEZ">URBANIZACI&OACUTEN P&AACUTEEZ </option>
    <option value="URBANIZACI&OACUTEN SANTA EDUVIGIS">URBANIZACI&OACUTEN SANTA EDUVIGIS </option>
    <option value="URBANIZACI&OACUTEN VISTA HERMOSA">URBANIZACI&OACUTEN VISTA HERMOSA </option>
    <option value="ZONA INDUSTRIAL">ZONA INDUSTRIAL </option>
    ';    
}
	// Parroquia 3 Municipio 1
if ($_POST["elegido"]=='895') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO 1RO DE MAYO">BARRIO 1RO DE MAYO </option>
    <option value="BARRIO 23 DE ENERO">BARRIO 23 DE ENERO </option>
    <option value="BARRIO 5 DE JULIO">BARRIO 5 DE JULIO </option>
    <option value="BARRIO AJURO BARRIO">BARRIO AJURO BARRIO </option>
    <option value="BARRIO ALBERTO PERN&IACUTEA">BARRIO ALBERTO PERN&IACUTEA </option>
    <option value="BARRIO BUENOS AIRES">BARRIO BUENOS AIRES </option>
    <option value="BARRIO CAMPI ALEGRE">BARRIO CAMPI ALEGRE </option>
    <option value="BARRIO LA FLORIDA">BARRIO LA FLORIDA </option>
    <option value="BARRIO LA VEGA I">BARRIO LA VEGA I </option>
    <option value="BARRIO LA VEGA II">BARRIO LA VEGA II </option>
    <option value="BARRIO LA VEGA III">BARRIO LA VEGA III </option>
    <option value="BARRIO LAS FLORES">BARRIO LAS FLORES </option>
    <option value="BARRIO PANAMERICANO">BARRIO PANAMERICANO </option>
    <option value="BARRIO SAN JOS&EACUTE">BARRIO SAN JOS&EACUTE </option>
    <option value="BARRIO SUR AM&EACUTERICA">BARRIO SUR AM&EACUTERICA </option>
    <option value="BARRIO VEGA DE CHAMA">BARRIO VEGA DE CHAMA </option>
    <option value="SECTOR CULEGRIA">SECTOR CULEGRIA </option>
    <option value="SECTOR EL QUINCE">SECTOR EL QUINCE </option>
    <option value="SECTOR INDUSTRIAL EL VIG&IACUTEA">SECTOR INDUSTRIAL EL VIG&IACUTEA </option>
    <option value="SECTOR KIL&OACUTEMETRO 9">SECTOR KIL&OACUTEMETRO 9 </option>
    <option value="SECTOR KIL&OACUTEMETRO 15">SECTOR KIL&OACUTEMETRO 15 </option>
    <option value="SECTOR LA CONQUISTA">SECTOR LA CONQUISTA </option>
    <option value="SECTOR LA CULEBRA">SECTOR LA CULEBRA </option>
    <option value="SECTOR LOS CORRALES">SECTOR LOS CORRALES </option>
    <option value="SECTOR LOS GUAYABONES">SECTOR LOS GUAYABONES </option>
    <option value="SECTOR MOCACAY">SECTOR MOCACAY </option>
    <option value="SECTOR ON&IACUTEA">SECTOR ON&IACUTEA </option>
    <option value="SECTOR SAN MARCOS">SECTOR SAN MARCOS </option>
    <option value="URBANIZACI&OACUTEN DOMINGO ROA P&EACUTEREZ">URBANIZACI&OACUTEN DOMINGO ROA P&EACUTEREZ </option>
    <option value="URBANIZACI&OACUTEN LA TRINIDAD">URBANIZACI&OACUTEN LA TRINIDAD </option>
    <option value="URBANIZACI&OACUTEN LAS CUMBRES">URBANIZACI&OACUTEN LAS CUMBRES </option>
    <option value="URBANIZACI&OACUTEN LOGO SUR">URBANIZACI&OACUTEN LOGO SUR </option>
    ';    
}
	// Parroquia 4 Municipio 1
if ($_POST["elegido"]=='896') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO LA PALMITA">CENTRO LA PALMITA </option>
    <option value="SECTOR EL VIG&IACUTEA">SECTOR EL VIG&IACUTEA </option>
    <option value="SECTOR LA HONDA">SECTOR LA HONDA </option>
    <option value="SECTOR LA LAGUNITA">SECTOR LA LAGUNITA </option>
    <option value="SECTOR PATO QUEMADO">SECTOR PATO QUEMADO </option>
    ';    
}
	// Parroquia 5 Municipio 1
if ($_POST["elegido"]=='897') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO CA&NTILDEO SECO III">BARRIO CA&NTILDEO SECO III </option>
    <option value="BARRIO LAS CASITAS">BARRIO LAS CASITAS </option>
    <option value="CASER&IACUTEO MUCUJEPE">CASER&IACUTEO MUCUJEPE </option>
    <option value="SECTOR CA&NTILDEO AMARILLO">SECTOR CA&NTILDEO AMARILLO </option>
    <option value="SECTOR CA&NTILDEO ARENAS">SECTOR CA&NTILDEO ARENAS </option>
    <option value="SECTOR CA&NTILDEO BALSA">SECTOR CA&NTILDEO BALSA </option>
    <option value="SECTOR CA&NTILDEO BLANCO">SECTOR CA&NTILDEO BLANCO </option>
    <option value="SECTOR CA&NTILDEO CAIM&AACUTEN">SECTOR CA&NTILDEO CAIM&AACUTEN </option>
    <option value="SECTOR CA&NTILDEO SAN RAFAEL">SECTOR CA&NTILDEO SAN RAFAEL </option>
    <option value="SECTOR LAS ADJUNTAS">SECTOR LAS ADJUNTAS </option>
    <option value="SECTOR MESA ALTA">SECTOR MESA ALTA </option>
    ';    
}
	// Parroquia 6 Municipio 1
if ($_POST["elegido"]=='898') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO 17 DE JULIO">BARRIO 17 DE JULIO </option>
    <option value="BARRIO BOL&IACUTEVAR">BARRIO BOL&IACUTEVAR </option>
    <option value="BARRIO EL TRINAL">BARRIO EL TRINAL </option>
    <option value="BARRIO LA FAMILIA">BARRIO LA FAMILIA </option>
    <option value="BARRIO PROVIDENCIA">BARRIO PROVIDENCIA </option>
    <option value="BARRIO SINAMAICA">BARRIO SINAMAICA </option>
    <option value="CENTRO LOS NARANJOS">CENTRO LOS NARANJOS </option>
    <option value="SECTOR CANTARANA L">SECTOR CANTARANA L </option>
    <option value="SECTOR CANTARANA LL">SECTOR CANTARANA LL </option>
    <option value="SECTOR LAS PARCELAS">SECTOR LAS PARCELAS </option>
    <option value="SECTOR PARA&IACUTESO L">SECTOR PARA&IACUTESO L </option>
    <option value="SECTOR PARA&IACUTESO LL">SECTOR PARA&IACUTESO LL </option>
    ';    
}
	// Parroquia 7 Municipio 1
	if ($_POST["elegido"]=='899') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO 12 DE OCTUBRE">BARRIO 12 DE OCTUBRE </option>
    <option value="BARRIO ALTA VISTA">BARRIO ALTA VISTA </option>
    <option value="BARRIO ALTAMIRA">BARRIO ALTAMIRA </option>
    <option value="BARRIO LA BLANCA">BARRIO LA BLANCA </option>
    <option value="SECTOR BRISA CHAMA">SECTOR BRISA CHAMA </option>
    <option value="SECTOR CA&NTILDEO SECO L">SECTOR CA&NTILDEO SECO L </option>
    <option value="SECTOR CA&NTILDEO SECO LL">SECTOR CA&NTILDEO SECO LL </option>
    <option value="SECTOR CA&NTILDEO SECO LLL">SECTOR CA&NTILDEO SECO LLL </option>
    <option value="SECTOR CA&NTILDEO SECO LV">SECTOR CA&NTILDEO SECO LV </option>
    <option value="SECTOR CA&NTILDEO SECO V">SECTOR CA&NTILDEO SECO V </option>
    <option value="SECTOR LA PORCELANA">SECTOR LA PORCELANA </option>
    <option value="SECTOR V&IACUTEA PANAMERICANA">SECTOR V&IACUTEA PANAMERICANA </option>
    <option value="URBANIZACI&OACUTEN PRADO HERMOSO">URBANIZACI&OACUTEN PRADO HERMOSO </option>
	';    
}
	// Parroquia 8 municipio 2 LA AZULITA
if ($_POST["elegido"]=='900') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="LA AZULITA">LA AZULITA</option>
    ';     
}

    // Parroquia 9  Municipio 3 SANTA CRUZ DE MORA
if ($_POST["elegido"]=='901') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="ALDEA QUEBRADA DEL ZORRO">ALDEA QUEBRADA DEL ZORRO </option>
    <option value="BARRIO ALBERTO RAVEL">BARRIO ALBERTO RAVEL </option>
    <option value="BARRIO HOSPITAL">BARRIO HOSPITAL </option>
    <option value="BARRIO LUCHA BOLIVARIANA">BARRIO LUCHA BOLIVARIANA </option>
    <option value="BARRIO MAR&IACUTEA ROSSI">BARRIO MAR&IACUTEA ROSSI </option>
    <option value="BARRIO PADRE NOGUERA">BARRIO PADRE NOGUERA </option>
    <option value="BARRIO PUEBLO NUEVO">BARRIO PUEBLO NUEVO </option>
    <option value="BARRIO PUERTO RICO">BARRIO PUERTO RICO </option>
    <option value="BARRIO ROMERO">BARRIO ROMERO </option>
    <option value="CASER&IACUTEO LOS PEPOS">CASER&IACUTEO LOS PEPOS </option>
    <option value="CASER&IACUTEO MESA BOLIVARIANA">CASER&IACUTEO MESA BOLIVARIANA </option>
    <option value="CASER&IACUTEO MESA DE LAS PALMAS">CASER&IACUTEO MESA DE LAS PALMAS </option>
    <option value="CENTRO SANTA CRUZ DE MORA">CENTRO SANTA CRUZ DE MORA </option>
    <option value="MESA DE LAS PALMAS">MESA DE LAS PALMAS </option>
    <option value="SECTOR ALDEA">SECTOR ALDEA </option>
    <option value="SECTOR BUENAVENTURA">SECTOR BUENAVENTURA </option>
    <option value="SECTOR CA&NTILDEO GRANDE">SECTOR CA&NTILDEO GRANDE </option>
    <option value="SECTOR EL BORDO">SECTOR EL BORDO </option>
    <option value="SECTOR EL GUAMO">SECTOR EL GUAMO </option>
    <option value="SECTOR EL PORT&OACUTEN">SECTOR EL PORT&OACUTEN </option>
    <option value="SECTOR EL QUEBRAD&OACUTEN">SECTOR EL QUEBRAD&OACUTEN </option>
    <option value="SECTOR EL TEMBLOR">SECTOR EL TEMBLOR </option>
    <option value="SECTOR GUAYABAL">SECTOR GUAYABAL </option>
    <option value="SECTOR LA ALDEA">SECTOR LA ALDEA </option>
    <option value="SECTOR LA CASCADA">SECTOR LA CASCADA </option>
    <option value="SECTOR LA LIBERTAD">SECTOR LA LIBERTAD </option>
    <option value="SECTOR LA MACANA">SECTOR LA MACANA </option>
    <option value="SECTOR LA MESA DE SAN ISIDRO">SECTOR LA MESA DE SAN ISIDRO </option>
    <option value="SECTOR LA MONTA&NTILDEUELA">SECTOR LA MONTA&NTILDEUELA </option>
    <option value="SECTOR LA PALMITA">SECTOR LA PALMITA </option>
    <option value="SECTOR LA PARADA">SECTOR LA PARADA </option>
    <option value="SECTOR LA VEGA">SECTOR LA VEGA </option>
    <option value="SECTOR LAS PALMAS">SECTOR LAS PALMAS </option>
    <option value="SECTOR LOS LLANITOS DE LA MACANA">SECTOR LOS LLANITOS DE LA MACANA </option>
    <option value="SECTOR MATA DE LIM&OACUTEN">SECTOR MATA DE LIM&OACUTEN </option>
    <option value="SECTOR MESA DEL GUAMO">SECTOR MESA DEL GUAMO </option>
    <option value="SECTOR PAIVA">SECTOR PAIVA </option>
    <option value="SECTOR QUEBRADA NEGRA">SECTOR QUEBRADA NEGRA </option>
    <option value="SECTOR SAN FELIPE">SECTOR SAN FELIPE </option>
    <option value="SECTOR SAN ISIDRO ALTO">SECTOR SAN ISIDRO ALTO </option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL </option>
    <option value="SECTOR SANTA MARTA">SECTOR SANTA MARTA </option>
    <option value="SECTOR SILB&EACUTE">SECTOR SILB&EACUTE </option>
    <option value="SECTOR VILLA SOCORRO">SECTOR VILLA SOCORRO </option>
    ';   
}

    // Parroquia 10 Municipio 3 MESA BOLÍVAR
if ($_POST["elegido"]=='902') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO LUCHA BOLIVARIANA">BARRIO LUCHA BOLIVARIANA</option>
	<option value="CASERÍO MESA BOLIVARIANA">CASERÍO MESA BOLIVARIANA</option>
	<option value="SECTOR LA PALMITA">SECTOR LA PALMITA</option>
    <option value="SECTOR BUENAVENTURA">SECTOR BUENAVENTURA</option>
    ';   
}
    // Parroquia 11 Municipio 3 MESA DE LAS PALMAS
if ($_POST["elegido"]=='903') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="ALDEA QUEBRADA DEL ZORRO">ALDEA QUEBRADA DEL ZORRO</option>
	<option value="CASERÍO LOS PEPOS">CASERÍO LOS PEPOS</option>
	<option value="CASERÍO MESA DE LAS PALMAS">CASERÍO MESA DE LAS PALMAS</option>
    <option value="MESA DE LAS PALMAS">MESA DE LAS PALMAS</option>
    <option value="SECTOR LAS PALMAS">SECTOR LAS PALMAS</option>
    <option value="SECTOR SAN FELIPE">SECTOR SAN FELIPE</option>
    ';   
}
    // Parroquia 12 Municipio 4 ARICAGUIA
if ($_POST["elegido"]=='904') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO ARICAGUA">CENTRO ARICAGUA</option>
    <option value="SECTOR BOCOMBOQUITO">SECTOR BOCOMBOQUITO</option>
    <option value="SECTOR EL CAÑADÓN">SECTOR EL CAÑADÓN</option>
    <option value="SECTOR EL CERRAJÓN">SECTOR EL CERRAJÓN</option>
    <option value="SECTOR EL MAPORAL">SECTOR EL MAPORAL</option>
    <option value="SECTOR LA BECERRA">SECTOR LA BECERRA</option>
    <option value="SECTOR LOS AZULES">SECTOR LOS AZULES</option>
    <option value="SECTOR SANTA CRUZ DEL QUEMADO">SECTOR SANTA CRUZ DEL QUEMADO</option>
    ';    
}
    // Parroquia 14 Municipio 4 SAN ANTONIO
if ($_POST["elegido"]=='905') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CAPITAL DE PARROQUIA CAMPO ELÍAS">CAPITAL DE PARROQUIA CAMPO ELÍAS</option>
    <option value="SECTOR CAMPO ELÍAS">SECTOR CAMPO ELÍAS</option>
    <option value="SECTOR EL ALTILLO">SECTOR EL ALTILLO</option>
    <option value="SECTOR EL AMPARO">SECTOR EL AMPARO</option>
    <option value="SECTOR EL RINCÓN">SECTOR EL RINCÓN</option>
    <option value="SECTOR LA LOMITA">SECTOR LA LOMITA</option>
    <option value="SECTOR SAN ANTONIO">SECTOR SAN ANTONIO</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    ';    
}
    // Parroquia 15 Municipio 5 CANAGUA
if ($_POST["elegido"]=='906') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CAPITAL DE PARROQUIA CANAGUÁ">CAPITAL DE PARROQUIA CANAGUÁ</option>
    <option value="SECTOR CANAGUÁ">SECTOR CANAGUÁ</option>
    <option value="SECTOR CANAGUÁ (LIBERTAD)">SECTOR CANAGUÁ (LIBERTAD)</option>
    <option value="SECTOR EL BAO">SECTOR EL BAO</option>
    <option value="SECTOR EL RINCÓN">SECTOR EL RINCÓN</option>
    <option value="SECTOR EL VALLE DE LA VIRGEN">SECTOR EL VALLE DE LA VIRGEN</option>
    <option value="SECTOR LA LAGUNA">SECTOR LA LAGUNA</option>
    <option value="SECTOR LA PREFECTURA">SECTOR LA PREFECTURA</option>
    <option value="SECTOR LA VILLA">SECTOR LA VILLA</option>
    <option value="SECTOR LOS NARANJOS">SECTOR LOS NARANJOS</option>
    <option value="SECTOR RÍO ARRIBA">SECTOR RÍO ARRIBA</option>
    <option value="SECTOR VALLE DE LA CRUZ">SECTOR VALLE DE LA CRUZ</option>
    ';    
}
    // Parroquia 16 Municipio 5 CAPURÍ
if ($_POST["elegido"]=='907') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO CAPURÍ">CENTRO CAPURÍ</option>
    <option value="SECTOR LA MONTAÑA">SECTOR LA MONTAÑA</option>
    <option value="SECTOR QUEBRADA VIVAS">SECTOR QUEBRADA VIVAS</option>
    ';    
}
    // Parroquia 17 Municipio 5 CHACANTÁ
if ($_POST["elegido"]=='908') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO CHACANTÁ">CENTRO CHACANTÁ</option>
    <option value="SECTOR EL COTUDO">SECTOR EL COTUDO</option>
    <option value="SECTOR EL PALMAR">SECTOR EL PALMAR</option>
    <option value="SECTOR MUCURANDÁ">SECTOR MUCURANDÁ</option>
    <option value="SECTOR PICO DE PIEDRA">SECTOR PICO DE PIEDRA</option>
    <option value="SECTOR PUEBLOS DEL SUR">SECTOR PUEBLOS DEL SUR</option>
    ';    
}
    // Parroquia 18 Municipio 5 EL MOLINO
if ($_POST["elegido"]=='909') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO EL MOLINO">CENTRO EL MOLINO</option>
    <option value="SECTOR EL MORTIÑO">SECTOR EL MORTIÑO</option>
    <option value="SECTOR EL PLAYÓN">SECTOR EL PLAYÓN</option>
    <option value="SECTOR EL QUEBRADÓN">SECTOR EL QUEBRADÓN</option>
    <option value="SECTOR EL RÍO">SECTOR EL RÍO</option>
    <option value="SECTOR EL URAO">SECTOR EL URAO</option>
    <option value="SECTOR LA MONTAÑITAS">SECTOR LA Montañitas</option>
    <option value="SECTOR LAS ADJUNTAS">SECTOR LAS ADJUNTAS</option>
    <option value="SECTOR LAS MESITAS">SECTOR LAS MESITAS</option>
    <option value="SECTOR SAISAYAL">SECTOR SAISAYAL</option>
    ';    
}
    // Parroquia 19 Municipio 5 GUAIMARAL
if ($_POST["elegido"]=='910') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="GUAIMARAL">GUAIMARAL</option>
    <option value="SECTOR EL RINCÓN">SECTOR EL RINCÓN</option>
    <option value="SECTOR EL VIENTO">SECTOR EL VIENTO</option>
    ';    
}
    // Parroquia 20 Municipio 5 MUCUCHACHÍ
if ($_POST["elegido"]=='911') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR AGUA BLANCA">SECTOR AGUA BLANCA</option>
    <option value="SECTOR EL CARRIZAL">SECTOR EL CARRIZAL</option>
    <option value="SECTOR EL ENCOMENDADERO">SECTOR EL ENCOMENDADERO</option>
    <option value="SECTOR EL GUALÍ">SECTOR EL GUALÍ</option>
    <option value="SECTOR LA ENSILLADA">SECTOR LA ENSILLADA</option>
    <option value="SECTOR LAS BRUJAS">SECTOR LAS BRUJAS</option>
    <option value="SECTOR LAS LAGUNITAS">SECTOR LAS LAGUNITAS</option>
    <option value="SECTOR MOTOCONE">SECTOR MOTOCONE</option>
    <option value="SECTOR OTOPÚN">SECTOR OTOPÚN</option>
    <option value="SECTOR PALO QUEMADO">SECTOR PALO QUEMADO</option>
    <option value="SECTOR PORTACHUELO">SECTOR PORTACHUELO</option>
    <option value="SECTOR SABANETA">SECTOR SABANETA</option>
    <option value="SECTOR SANTA LUCÍA">SECTOR SANTA LUCÍA</option>
    <option value="SECTOR SANTA ROSA">SECTOR SANTA ROSA</option>
    ';    
}
    // Parroquia 21 Municipio 5 MUCUTUY
if ($_POST["elegido"]=='912') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR CAMPO ALEGRE">SECTOR CAMPO ALEGRE</option>
    <option value="SECTOR EL ACHOTE">SECTOR EL ACHOTE</option>
    <option value="SECTOR EL ZULIA">SECTOR EL ZULIA</option>
    <option value="SECTOR LA PIEDROTA">SECTOR LA PIEDROTA</option>
    <option value="SECTOR LA PROVIDENCIA">SECTOR LA PROVIDENCIA</option>
    <option value="SECTOR LA VEGUILLA">SECTOR LA VEGUILLA</option>
    <option value="SECTOR MIJARÁ I">SECTOR MIJARÁ I</option>
    <option value="SECTOR MUCURISA">SECTOR MUCURISA</option>
    <option value="SECTOR MUCUTUICITO">SECTOR MUCUTUICITO</option>
    <option value="SECTOR SAN MIGUEL">SECTOR SAN MIGUEL</option>
    ';    
}
    // Parroquia 22 Municipio 6 ACEQUIAS
if ($_POST["elegido"]=='913') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CASERÍO MUCUSÁS">CASERÍO MUCUSÁS</option>
    <option value="CASERÍO SAN PEDRO">CASERÍO SAN PEDRO</option>
    <option value="CENTRO ACEQUIAS">CENTRO ACEQUIAS</option>
    ';    
}
    // Parroquia 23 Municipio 6 FERNANDEZ PEÑA
if ($_POST["elegido"]=='914') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO EL BUCARAL">BARRIO EL BUCARAL</option>
    <option value="BARRIO EL MOLINO">BARRIO EL MOLINO</option>
    <option value="BARRIO EL POTRERITO">BARRIO EL POTRERITO</option>
    <option value="BARRIO LA VEGA">BARRIO LA VEGA</option>
    <option value="BARRIO LOS ROSALES">BARRIO LOS ROSALES</option>
    <option value="BARRIO MESA SECA">BARRIO MESA SECA</option>
    <option value="CONJUNTO RESIDENCIAL CENTENARIO">CONJUNTO RESIDENCIAL CENTENARIO</option>
    <option value="CONJUNTO RESIDENCIAL MANUEL ELOY CALDERÓN">CONJUNTO RESIDENCIAL MANUEL ELOY Calderón</option>
    <option value="CONJUNTO RESIDENCIAL MOLINOS">CONJUNTO RESIDENCIAL MOLINOS</option>
    <option value="CONJUNTO RESIDENCIAL SAN BENITO">CONJUNTO RESIDENCIAL SAN BENITO</option>
    <option value="SECTOR EL MAQUEO">SECTOR EL MAQUEO</option>
    <option value="SECTOR EL PORVENIR">SECTOR EL PORVENIR</option>
    <option value="SECTOR EL VEGÓN">SECTOR EL VEGÓN</option>
    <option value="SECTOR EL VERDE">SECTOR EL VERDE</option>
    <option value="SECTOR ESCUQUE">SECTOR ESCUQUE</option>
    <option value="SECTOR GUAYABAL">SECTOR GUAYABAL</option>
    <option value="SECTOR HATO DE LOS PÉREZ">SECTOR HATO DE LOS PÉREZ</option>
    <option value="SECTOR LA PICADORA">SECTOR LA PICADORA</option>
    <option value="SECTOR LA REYNOSA">SECTOR LA REYNOSA</option>
    <option value="SECTOR LA VEGA">SECTOR LA VEGA</option>
    <option value="SECTOR LAS MESITAS">SECTOR LAS MESITAS</option>
    <option value="SECTOR LLANO GRANDE">SECTOR LLANO GRANDE</option>
    <option value="SECTOR LOMA INDÍGENA">SECTOR LOMA INDÍGENA</option>
    <option value="SECTOR LOS ÁRBOLES">SECTOR LOS ÁRBOLES</option>
    <option value="SECTOR LOS HIGUERONES">SECTOR LOS HIGUERONES</option>
    <option value="SECTOR MESA GRANDE">SECTOR MESA GRANDE</option>
    <option value="SECTOR PANTANILLO">SECTOR PANTANILLO</option>
    <option value="SECTOR RÍO NEGRO">SECTOR RÍO NEGRO</option>
    <option value="SECTOR SAN ONOFRE">SECTOR SAN ONOFRE</option>
    <option value="URBANIZACIÓN CENTENARIO">URBANIZACIÓN CENTENARIO</option>
    <option value="URBANIZACIÓN DON LUIS">URBANIZACIÓN DON LUIS</option>
    <option value="URBANIZACIÓN LA MONTAÑITA">URBANIZACIÓN LA MONTAÑITA</option>
    <option value="URBANIZACIÓN LA VEGA">URBANIZACIÓN LA VEGA</option>
    <option value="URBANIZACIÓN LOS JARDINES">URBANIZACIÓN LOS JARDINES</option>
    <option value="URBANIZACIÓN OMAR SULBARÁN">URBANIZACIÓN OMAR SULBARÁN</option>
    <option value="URBANIZACIÓN POZO AZUL">URBANIZACIÓN POZO AZUL</option>
    <option value="URBANIZACIÓN POZO HONDO">URBANIZACIÓN POZO HONDO</option>
    <option value="URBANIZACIÓN RIVERA DE LA MILAGROSA">URBANIZACIÓN RIVERA DE LA MILAGROSA</option>
    <option value="URBANIZACIÓN SULBARÁN">URBANIZACIÓN SULBARÁN</option>
    <option value="URBANIZACIÓN VALMAR">URBANIZACIÓN VALMAR</option>
    <option value="URBANIZACIÓN VIRGEN DE LAS NIEVES">URBANIZACIÓN VIRGEN DE LAS NIEVES</option>
    ';    
}
    // Parroquia 24 Municipio 6 JAJI
if ($_POST["elegido"]=='915') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CASERÍO EL CAMPANARIO">CASERÍO EL CAMPANARIO</option>
    <option value="CASERÍO EL CHAMIZAL">CASERÍO EL CHAMIZAL</option>
    <option value="CASERÍO EL COROZO">CASERÍO EL COROZO</option>
    <option value="CASERÍO EL MACHO">CASERÍO EL MACHO</option>
    <option value="CASERÍO EL SAMBO">CASERÍO EL SAMBO</option>
    <option value="CASERÍO EL SUÁREZ">CASERÍO EL SUÁREZ</option>
    <option value="CASERÍO LA CARBONERA">CASERÍO LA CARBONERA</option>
    <option value="CASERÍO LA CEIBA">CASERÍO LA CEIBA</option>
    <option value="CASERÍO LA CHORRERA">CASERÍO LA CHORRERA</option>
    <option value="CASERÍO LA CUCHILLA">CASERÍO LA CUCHILLA</option>
    <option value="CASERÍO LA ISLA">CASERÍO LA ISLA</option>
    <option value="CASERÍO LA MARA">CASERÍO LA MARA</option>
    <option value="CASERÍO LA MUCUBANGA">CASERÍO LA MUCUBANGA</option>
    <option value="CASERÍO LA PLAYA">CASERÍO LA PLAYA</option>
    <option value="CASERÍO LA QUEBRADITA">CASERÍO LA QUEBRADITA</option>
    <option value="CASERÍO LAS BARRANCAS">CASERÍO LAS BARRANCAS</option>
    <option value="CASERÍO LAS CRUCES">CASERÍO LAS CRUCES</option>
    <option value="CASERÍO LOMA DEL PEDREGAL">CASERÍO LOMA DEL PEDREGAL</option>
    <option value="CASERÍO LOMAS DE LOS GAMOS">CASERÍO LOMAS DE LOS GAMOS</option>
    <option value="CASERÍO LOMAS DEL CARMEN">CASERÍO LOMAS DEL CARMEN</option>
    <option value="CASERÍO LOMAS DEL ROSARIO">CASERÍO LOMAS DEL ROSARIO</option>
    <option value="CASERÍO MIRAFLORES">CASERÍO MIRAFLORES</option>
    <option value="CASERÍO MIRAFLORES BAJO">CASERÍO MIRAFLORES BAJO</option>
    <option value="CASERÍO MISTAJA BAJO">CASERÍO MISTAJA BAJO</option>
    <option value="CASERÍO MUCUNDU BAJO">CASERÍO MUCUNDU BAJO</option>
    <option value="CASERÍO PARAMITO">CASERÍO PARAMITO</option>
    <option value="CASERÍO PIEDRAS BLANCAS">CASERÍO PIEDRAS BLANCAS</option>
    <option value="CASERÍO RANCHO ISABELA">CASERÍO RANCHO ISABELA</option>
    <option value="CASERÍO SAN RAFAEL DEL MACHO">CASERÍO SAN RAFAEL DEL MACHO</option>
    <option value="CASERÍO SAN USEBIO">CASERÍO SAN USEBIO</option>
    <option value="CASERÍO SIMÓN RODRÍGUEZ DE MACHO">CASERÍO SIMÓN RODRÍGUEZ DE MACHO</option>
    <option value="CASERÍO TUCUHE">CASERÍO TUCUHE</option>
    <option value="CASERÍOS LAS FLORES">CASERÍOS LAS FLORES</option>
    <option value="PUEBLO DE JAJÍ">PUEBLO DE JAJÍ</option>
    <option value="SECTOR CINARAOS">SECTOR CINARAOS</option>
    <option value="SECTOR PALO NEGRO">SECTOR PALO NEGRO</option>
    ';    
}
    // Parroquia 25 Municipio 6 LA MESA
if ($_POST["elegido"]=='916') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO LA MESA">CENTRO LA MESA</option>
    <option value="SECTOR AGUA DULCE">SECTOR AGUA DULCE</option>
    <option value="SECTOR EL POZO">SECTOR EL POZO</option>
    <option value="SECTOR LA ENFADOSA">SECTOR LA ENFADOSA</option>
    <option value="SECTOR LA MESA">SECTOR LA MESA</option>
    <option value="SECTOR LA QUEBRADA">SECTOR LA QUEBRADA</option>
    <option value="SECTOR LA VEGA">SECTOR LA VEGA</option>
    <option value="SECTOR LAS GONZÁLES">SECTOR LAS GONZÁLES</option>
    <option value="SECTOR SULBARÁN">SECTOR SULBARÁN</option>
    <option value="URBANIZACIÓN ALDEA VALLE ENCANTADO">URBANIZACIÓN ALDEA VALLE ENCANTADO</option>
    ';    
}
    // Parroquia 26 Municipio 6 MATRIZ
if ($_POST["elegido"]=='917') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO AGUAS CALIENTES">BARRIO AGUAS CALIENTES</option>
    <option value="BARRIO BELLA VISTA">BARRIO BELLA VISTA</option>
    <option value="BARRIO EL PALMO">BARRIO EL PALMO</option>
    <option value="BARRIO ESCONDIDO">BARRIO ESCONDIDO</option>
    <option value="BARRIO JOSÉ ADELMO GUTIÉRREZ">BARRIO JOSÉ ADELMO GUTIÉRREZ</option>
    <option value="BARRIO LA FLORIDA">BARRIO LA FLORIDA</option>
    <option value="BARRIO LA LAGUNA">BARRIO LA LAGUNA</option>
    <option value="BARRIO LA RANCHERÍA">BARRIO LA RANCHERÍA</option>
    <option value="BARRIO LOS WARAOS">BARRIO LOS WARAOS</option>
    <option value="BARRIO MAZANITO">BARRIO MAZANITO</option>
    <option value="BARRIO MESA TANQUE">BARRIO MESA TANQUE</option>
    <option value="BARRIO SALADO MEDIO">BARRIO SALADO MEDIO</option>
    <option value="BARRIO SAN BUENAVENTURA">BARRIO SAN BUENAVENTURA</option>
    <option value="BARRIO SAN MARTÍN">BARRIO SAN MARTÍN</option>
    <option value="BARRIO SAN RAFAEL">BARRIO SAN RAFAEL</option>
    <option value="BARRIO SANTA EDUVIGIS">BARRIO SANTA EDUVIGIS</option>
    <option value="CASERÍO LAS VEGAS DE LAS GONZÁLEZ">CASERÍO LAS VEGAS DE LAS GONZÁLEZ</option>
    <option value="CONJUNTO RESIDENCIAL AGUA CLARA">CONJUNTO RESIDENCIAL AGUA CLARA</option>
    <option value="CONJUNTO RESIDENCIAL EL TIGRE">CONJUNTO RESIDENCIAL EL TIGRE</option>
    <option value="CONJUNTO RESIDENCIAL LA CAMPIÑA">CONJUNTO RESIDENCIAL LA CAMPIÑA</option>
    <option value="CONJUNTO RESIDENCIAL LA CAMPIÑA A">CONJUNTO RESIDENCIAL LA CAMPIÑA A</option>
    <option value="CONJUNTO RESIDENCIAL LA CAMPIÑA B">CONJUNTO RESIDENCIAL LA CAMPIÑA B</option>
    <option value="CONJUNTO RESIDENCIAL MARTINICA">CONJUNTO RESIDENCIAL MARTINICA</option>
    <option value="CONJUNTO RESIDENCIAL PARQUE EL SALADO">CONJUNTO RESIDENCIAL PARQUE EL SALADO</option>
    <option value="CONJUNTO RESIDENCIAL PIEDRAS BLANCAS">CONJUNTO RESIDENCIAL PIEDRAS BLANCAS</option>
    <option value="SECTOR AGUA DULCE">SECTOR AGUA DULCE</option>
    <option value="SECTOR AGUAS CALIENTES">SECTOR AGUAS CALIENTES</option>
    <option value="SECTOR ALTO GUAYABOS">SECTOR ALTO GUAYABOS</option>
    <option value="SECTOR CAÑA MURA">SECTOR CAÑA MURA</option>
    <option value="SECTOR CARLOS SÁNCHEZ">SECTOR CARLOS SÁNCHEZ</option>
    <option value="SECTOR CHAMICERO">SECTOR CHAMICERO</option>
    <option value="SECTOR EJIDO">SECTOR EJIDO</option>
    <option value="SECTOR EL CRUCETAL">SECTOR EL CRUCETAL</option>
    <option value="SECTOR EL MANZANO">SECTOR EL MANZANO</option>
    <option value="SECTOR EL MORAL">SECTOR EL MORAL</option>
    <option value="SECTOR HACIENDA LA MILAGROSA">SECTOR HACIENDA LA MILAGROSA</option>
    <option value="SECTOR HACIENDA ZUMBA">SECTOR HACIENDA ZUMBA</option>
    <option value="SECTOR JOSÉ DELMO GUTIÉRREZ">SECTOR JOSÉ DELMO GUTIÉRREZ</option>
    <option value="SECTOR LA CALERA">SECTOR LA CALERA</option>
    <option value="SECTOR LA CAMPIÑA">SECTOR LA CAMPIÑA</option>
    <option value="SECTOR LA CAPILLA">SECTOR LA CAPILLA</option>
    <option value="SECTOR LA CUEVA">SECTOR LA CUEVA</option>
    <option value="SECTOR LA MONTAÑA">SECTOR LA MONTAÑA</option>
    <option value="SECTOR LA PORTUGUESA">SECTOR LA PORTUGUESA</option>
    <option value="SECTOR LOMA DE LA CALERA">SECTOR LOMA DE LA CALERA</option>
    <option value="SECTOR LOMA DEL CASADERO">SECTOR LOMA DEL CASADERO</option>
    <option value="SECTOR LOS GUAIMAROS">SECTOR LOS GUAIMAROS</option>
    <option value="SECTOR LOS GUTIÉRREZ">SECTOR LOS GUTIÉRREZ</option>
    <option value="SECTOR LOS OLIVOS">SECTOR LOS OLIVOS</option>
    <option value="SECTOR MANZANO ALTO">SECTOR MANZANO ALTO</option>
    <option value="SECTOR MESA DE TANQUE">SECTOR MESA DE TANQUE</option>
    <option value="SECTOR POZO HONDO">SECTOR POZO HONDO</option>
    <option value="SECTOR SAN ISIDRO">SECTOR SAN ISIDRO</option>
    <option value="SECTOR SAN MIGUEL">SECTOR SAN MIGUEL</option>
    <option value="SECTOR SAN ONOFRE">SECTOR SAN ONOFRE</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    <option value="SECTOR ZUMBA">SECTOR ZUMBA</option>
    <option value="URBANIZACIÓN ASOPRIETO">URBANIZACIÓN ASOPRIETO</option>
    <option value="URBANIZACIÓN BUENA VENTURA">URBANIZACIÓN BUENA VENTURA</option>
    <option value="URBANIZACIÓN CAMPO ELÍAS">URBANIZACIÓN CAMPO ELÍAS</option>
    <option value="URBANIZACIÓN CARLOS SÁNCHEZ">URBANIZACIÓN CARLOS SÁNCHEZ</option>
    <option value="URBANIZACIÓN DON VALENTÍN">URBANIZACIÓN DON VALENTÍN</option>
    <option value="URBANIZACIÓN EL CAÑAMELAR">URBANIZACIÓN EL CAÑAMELAR</option>
    <option value="URBANIZACIÓN EL PALMO">URBANIZACIÓN EL PALMO</option>
    <option value="URBANIZACIÓN HACIENDA SAN RAFAEL">URBANIZACIÓN HACIENDA SAN RAFAEL</option>
    <option value="URBANIZACIÓN LA CAMPIÑA">URBANIZACIÓN LA CAMPIÑA</option>
    <option value="URBANIZACIÓN LA LAGUNA">URBANIZACIÓN LA LAGUNA</option>
    <option value="URBANIZACIÓN LA MONTAÑITA">URBANIZACIÓN LA MONTAÑITA</option>
    <option value="URBANIZACIÓN LAS VILLAS">URBANIZACIÓN LAS VILLAS</option>
    <option value="URBANIZACIÓN LOS OLIVOS">URBANIZACIÓN LOS OLIVOS</option>
    <option value="URBANIZACIÓN LOS PINOS">URBANIZACIÓN LOS PINOS</option>
    <option value="URBANIZACIÓN LOS VALENTINOS">URBANIZACIÓN LOS VALENTINOS</option>
    <option value="URBANIZACIÓN SANTA EDUVIGIS">URBANIZACIÓN SANTA EDUVIGIS</option>
    <option value="URBANIZACIÓN VILLA EL BRACHO">URBANIZACIÓN VILLA EL BRACHO</option>
    ';    
}
    // Parroquia 27 Municipio 6 MONTALBAN
if ($_POST["elegido"]=='918') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO EL CARMEN">BARRIO EL CARMEN</option>
    <option value="BARRIO EL CHISPERO">BARRIO EL CHISPERO</option>
    <option value="BARRIO EL COBRE">BARRIO EL COBRE</option>
    <option value="BARRIO EL PORVENIR">BARRIO EL PORVENIR</option>
    <option value="BARRIO LA MANSIÓN DE CRISTO">BARRIO LA MANSIÓN DE CRISTO</option>
    <option value="BARRIO LAS CRUCES">BARRIO LAS CRUCES</option>
    <option value="BARRIO PAN DE AZÚCAR">BARRIO PAN DE AZÚCAR</option>
    <option value="CASERÍO BOCONOQUE">CASERÍO BOCONOQUE</option>
    <option value="CASERÍO EL ÁTICO">CASERÍO EL ÁTICO</option>
    <option value="CASERÍO EL POTRERO">CASERÍO EL POTRERO</option>
    <option value="CASERÍO LA CAPELLANIA">CASERÍO LA CAPELLANIA</option>
    <option value="CASERÍO LA HIGUERA">CASERÍO LA HIGUERA</option>
    <option value="CASERÍO LA JOYA">CASERÍO LA JOYA</option>
    <option value="CASERÍO LA MESA">CASERÍO LA MESA</option>
    <option value="CASERÍO LA VEGA DEL MOLINO">CASERÍO LA VEGA DEL MOLINO</option>
    <option value="CASERÍO MOCHERÉ">CASERÍO MOCHERÉ</option>
    <option value="CASERÍO MOCOTONÉ">CASERÍO MOCOTONÉ</option>
    <option value="CASERÍO MUCUATORO">CASERÍO MUCUATORO</option>
    <option value="CASERÍO MUCUMBÚ">CASERÍO MUCUMBÚ</option>
    <option value="CASERÍO MUCUSURÚ">CASERÍO MUCUSURÚ</option>
    <option value="CASERÍO MUCUTAN">CASERÍO MUCUTAN</option>
    <option value="CASERÍO MUCUTEO">CASERÍO MUCUTEO</option>
    <option value="CASERÍO SAN AGUSTÍN">CASERÍO SAN AGUSTÍN</option>
    <option value="CASERÍO SANTA JUANA">CASERÍO SANTA JUANA</option>
    <option value="CENTRO MONTALBÁN">CENTRO MONTALBÁN</option>
    <option value="CONJUNTO RESIDENCIAL ALTO EJIDO">CONJUNTO RESIDENCIAL ALTO EJIDO</option>
    <option value="CONJUNTO RESIDENCIAL EL BAJO">CONJUNTO RESIDENCIAL EL BAJO</option>
    <option value="CONJUNTO RESIDENCIAL EL TEPUY">CONJUNTO RESIDENCIAL EL TEPUY</option>
    <option value="CONJUNTO RESIDENCIAL EL TINAJERO">CONJUNTO RESIDENCIAL EL TINAJERO</option>
    <option value="CONJUNTO RESIDENCIAL LA MAZANERA">CONJUNTO RESIDENCIAL LA MAZANERA</option>
    <option value="CONJUNTO RESIDENCIAL LOS CEDROS">CONJUNTO RESIDENCIAL LOS CEDROS</option>
    <option value="CONJUNTO RESIDENCIAL LOS LIMONES">CONJUNTO RESIDENCIAL LOS LIMONES</option>
    <option value="CONJUNTO RESIDENCIAL VILLA LIBERTAD">CONJUNTO RESIDENCIAL VILLA LIBERTAD</option>
    <option value="PARQUE RESIDENCIAL EL SALADO">PARQUE RESIDENCIAL EL SALADO</option>
    <option value="SECTOR ALFREDO LARA">SECTOR ALFREDO LARA</option>
    <option value="SECTOR CAÑA LOS GONZÁLEZ">SECTOR CAÑA LOS GONZÁLEZ</option>
    <option value="SECTOR CUCUTE">SECTOR CUCUTE</option>
    <option value="SECTOR EL BOTICARIO">SECTOR EL BOTICARIO</option>
    <option value="SECTOR EL CARRIZAL">SECTOR EL CARRIZAL</option>
    <option value="SECTOR EL GUAYACÁN">SECTOR EL GUAYACÁN</option>
    <option value="SECTOR EL SALADO">SECTOR EL SALADO</option>
    <option value="SECTOR LA LUGAREÑA">SECTOR LA LUGAREÑA</option>
    <option value="SECTOR LAS CARMELITAS">SECTOR LAS CARMELITAS</option>
    <option value="SECTOR LOMA DE LOS GARCÍA">SECTOR LOMA DE LOS GARCÍA</option>
    <option value="SECTOR LOMAS DE LOS ÁNGELES">SECTOR LOMAS DE LOS ÁNGELES</option>
    <option value="SECTOR LOS ÁNGELES">SECTOR LOS ÁNGELES</option>
    <option value="SECTOR LOS CONEJOS">SECTOR LOS CONEJOS</option>
    <option value="SECTOR LOS MANTECOS">SECTOR LOS MANTECOS</option>
    <option value="SECTOR LOS VILCHEZ">SECTOR LOS VILCHEZ</option>
    <option value="SECTOR MANZANO ABAJO">SECTOR MANZANO ABAJO</option>
    <option value="SECTOR PANAMERICANA">SECTOR PANAMERICANA</option>
    <option value="SECTOR PLAZUELA">SECTOR PLAZUELA</option>
    <option value="SECTOR SALADO ALTO">SECTOR SALADO ALTO</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    <option value="SECTOR VILLA PARAÍSO">SECTOR VILLA PARAÍSO</option>
    <option value="URBANIZACIÓN ALDEA VALLE ENCANTADO">URBANIZACIÓN ALDEA VALLE ENCANTADO</option>
    <option value="URBANIZACIÓN ALFREDO LARA">URBANIZACIÓN ALFREDO LARA</option>
    <option value="URBANIZACIÓN DON GONZÁLO">URBANIZACIÓN DON GONZÁLO</option>
    <option value="URBANIZACIÓN EL CARMEN">URBANIZACIÓN EL CARMEN</option>
    <option value="URBANIZACIÓN EL PILAR">URBANIZACIÓN EL PILAR</option>
    <option value="URBANIZACIÓN EL SALADO">URBANIZACIÓN EL SALADO</option>
    <option value="URBANIZACIÓN EL TRAPICHE">URBANIZACIÓN EL TRAPICHE</option>
    <option value="URBANIZACIÓN PADRE DUQUE">URBANIZACIÓN PADRE DUQUE</option>
    <option value="URBANIZACIÓN VILLA ESPERANZA">URBANIZACIÓN VILLA ESPERANZA</option>
    <option value="URBANIZACIÓN VILLA MANZANO">URBANIZACIÓN VILLA MANZANO</option>
    <option value="URBANIZACIÓN VILLA MARÍA EUGENIA">URBANIZACIÓN VILLA MARÍA EUGENIA</option>
    <option value="VEREDA LOS PACHECOS">VEREDA LOS PACHECOS</option>
    ';
}
    // Parroquia 28 municipio 6 SAN JOSÉ DEL SUR
if ($_POST["elegido"]=='919') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CASERÍO BARBECHITO">CASERÍO BARBECHITO</option>
    <option value="CASERÍO CUATRO ESQUINAS">CASERÍO CUATRO ESQUINAS</option>
    <option value="CASERÍO EL LLANO">CASERÍO EL LLANO</option>
    <option value="CASERÍO EL MORAL">CASERÍO EL MORAL</option>
    <option value="CASERÍO EL RINCÓN DEL TROMPILLO">CASERÍO EL RINCÓN DEL TROMPILLO</option>
    <option value="CASERÍO LA MESA">CASERÍO LA MESA</option>
    <option value="CASERÍO LAS CANITAS">CASERÍO LAS CANITAS</option>
    <option value="CASERÍO LAS PANAS">CASERÍO LAS PANAS</option>
    <option value="CASERÍO LAS TAPIAS">CASERÍO LAS TAPIAS</option>
    <option value="CASERÍO LOS CEDROS">CASERÍO LOS CEDROS</option>
    <option value="CASERÍO MUCUAMBÍ">CASERÍO MUCUAMBÍ</option>
    <option value="CASERÍO MUCUMPIZ">CASERÍO MUCUMPIZ</option>
    <option value="CASERÍO MUCUMPIZ BAJO">CASERÍO MUCUMPIZ BAJO</option>
    <option value="CASERÍO MUCUSAN">CASERÍO MUCUSAN</option>
    <option value="CASERÍO MUCUSÚN">CASERÍO MUCUSÚN</option>
    <option value="CASERÍO MUCUTIRIS">CASERÍO MUCUTIRIS</option>
    <option value="CASERÍO LAS CANITAS">CASERÍO LAS CANITAS</option>
    <option value="CASERÍO SAN PABLO">CASERÍO SAN PABLO</option>
    <option value="CASERÍO TOSTÓS">CASERÍO TOSTÓS</option>
    <option value="CASERÍO VOLADERO">CASERÍO VOLADERO</option>
    <option value="CENTRO SAN JOSÉ">CENTRO SAN JOSÉ</option>
    <option value="SECTOR EL VOLCÁN">SECTOR EL VOLCÁN</option>
    ';    
}
    // Parroquia 29 Municipio 7 FLORENCIO RAMIREZ
if ($_POST["elegido"]=='921') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO CARMEN">BARRIO CARMEN</option>
    <option value="BARRIO EDECIO LA RIVAS">BARRIO EDECIO LA RIVAS</option>
    <option value="BARRIO PRIETO FIGUEROA">BARRIO PRIETO FIGUEROA</option>
    <option value="BARRIO UNIÓN">BARRIO UNIÓN</option>
    <option value="BARRIO ZONA NUEVA">BARRIO ZONA NUEVA</option>
    <option value="CASERÍO LA ROKOLINA">CASERÍO LA ROKOLINA</option>
    <option value="CASERÍO MESA JULIA">CASERÍO MESA JULIA</option>
    <option value="CASERÍO SANTA MARÍA">CASERÍO SANTA MARÍA</option>
    <option value="CASERÍO TUCANITO">CASERÍO TUCANITO</option>
    <option value="CENTRO EL PINAR">CENTRO EL PINAR</option>
    <option value="SECTOR EL CHARAL">SECTOR EL CHARAL</option>
    <option value="SECTOR EL PINAR DE TUCANÍ">SECTOR EL PINAR DE TUCANÍ</option>
    <option value="SECTOR RÍO FRÍO">SECTOR RÍO FRÍO</option>
    <option value="URBANIZACIÓN LA INMACULADA">URBANIZACIÓN LA INMACULADA</option>
    ';    
}
    // Parroquia 30 Municipio 7 TUCANÍ
if ($_POST["elegido"]=='920') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO TUCANÍ">CENTRO TUCANÍ</option>
    <option value="SECTOR ARAPUEY">SECTOR ARAPUEY</option>
    <option value="SECTOR AVE MARÍA">SECTOR AVE MARÍA</option>
    <option value="SECTOR CARMELITAS">SECTOR CARMELITAS</option>
    <option value="SECTOR COGOLLAL">SECTOR COGOLLAL</option>
    <option value="SECTOR CUATRO">SECTOR CUATRO</option>
    <option value="SECTOR EL CHARAL">SECTOR EL CHARAL</option>
    <option value="SECTOR EL PEDREGAL">SECTOR EL PEDREGAL</option>
    <option value="SECTOR LA GRAN PARADA">SECTOR LA GRAN PARADA</option>
    <option value="SECTOR LA PUEBLITA">SECTOR LA PUEBLITA</option>
    <option value="SECTOR LA VEGA">SECTOR LA VEGA</option>
    <option value="SECTOR LAS HEROÍNAS">SECTOR LAS HEROÍNAS</option>
    <option value="SECTOR LAS MESITAS">SECTOR LAS MESITAS</option>
    <option value="SECTOR LAS RINCÓN">SECTOR LAS RINCÓN</option>
    ';    
}
    // Parroquia 31 municipio 8 LAS PIEDRAS 
if ($_POST["elegido"]=='923') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>   
    <option value="CENTRO LAS PIEDRAS">CENTRO LAS Piedras</option>
    <option value="SECTOR EL CANEY">SECTOR EL CANEY</option>
    <option value="SECTOR EL GUAMO">SECTOR EL GUAMO</option>
    <option value="SECTOR LA CAMPANA">SECTOR LA CAMPANA</option>
    <option value="SECTOR LA CUCHILLA">SECTOR LA CUCHILLA</option>
    <option value="SECTOR LA ENSILLADA">SECTOR LA ENSILLADA</option>
    <option value="SECTOR LA MESA">SECTOR LA MESA</option>
    <option value="SECTOR LA PRIMAVERA">SECTOR LA PRIMAVERA</option>
    <option value="SECTOR LA QUINTA">SECTOR LA QUINTA</option>
    <option value="SECTOR LA RAYA">SECTOR LA RAYA</option>
    <option value="SECTOR LAS CUADRAS">SECTOR LAS CUADRAS</option>
    <option value="SECTOR LAS MESAS">SECTOR LAS MESAS</option>
    <option value="SECTOR LAS PIEDRAS DE SANTO DOMINGO">SECTOR LAS PIEDRAS DE SANTO DOMINGO</option>
    <option value="SECTOR LAS TAPIAS">SECTOR LAS TAPIAS</option>
    <option value="SECTOR LOS FRAILES">SECTOR LOS FRAILES</option>
    <option value="SECTOR LOS HÁTICOS">SECTOR LOS HÁTICOS</option>
    ';    
}
    // Parroquia 32 Municipio 8 SANTO DOMINGO
if ($_POST["elegido"]=='922') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>   
    <option value="ALDEA LAERA">ALDEA LAERA</option>
    <option value="ALDEA LIMONCITO CANEY">ALDEA LIMONCITO CANEY</option>
    <option value="ALDEA MITISUS">ALDEA MITISUS</option>
    <option value="BARRIO BIZUM">BARRIO BIZUM</option>
    <option value="BARRIO LA LAGUNA">BARRIO LA LAGUNA</option>
    <option value="BARRIO MORUCO BAJO">BARRIO MORUCO BAJO</option>
    <option value="BARRIO MORUCO NORTE ALTO">BARRIO MORUCO NORTE ALTO</option>
    <option value="SECTOR ARACAY">SECTOR ARACAY</option>
    <option value="SECTOR CAMPO">SECTOR CAMPO</option>
    <option value="SECTOR EL BAHO">SECTOR EL BAHO</option>
    ';    
}
    // Parroquia 33 Municipio 9 GUARAQUE
if ($_POST["elegido"]=='924') {
    $options= '
    <option value="0">-SELECCIONE UNA SECTOR-</option>
    <option value="GUARAQUE">GUARAQUE</option>
    ';    
}
    // Parroquia 34 Municipio 9 MESA QUINTERO
if ($_POST["elegido"]=='925') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO MESA DE QUINTERO">CENTRO MESA DE QUINTERO</option>
    <option value="SECTOR EL MUNSAL">SECTOR EL MUNSAL</option>
    <option value="SECTOR EL RINCÓN">SECTOR EL RINCÓN</option>
    <option value="SECTOR MONTES DE OCA">SECTOR MONTES DE OCA</option>
    ';    
}
    // Parroquia 34 Municipio 9 RÍO NEGRO
if ($_POST["elegido"]=='926') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO RÍO NEGRO">CENTRO RÍO NEGRO</option>
    <option value="SECTOR AGUA CALIENTE">SECTOR AGUA CALIENTE</option>
    <option value="SECTOR CAMPO SOLO">SECTOR CAMPO SOLO</option>
    <option value="SECTOR CANUTALES">SECTOR CANUTALES</option>
    <option value="SECTOR EL AMPARO">SECTOR EL AMPARO</option>
    <option value="SECTOR EL DIVIDIVE">SECTOR EL DIVIDIVE</option>
    <option value="SECTOR EL HATO">SECTOR EL HATO</option>
    <option value="SECTOR EL MORAL">SECTOR EL MORAL</option>
    <option value="SECTOR EL SAI SAI">SECTOR EL SAI SAI</option>
    <option value="SECTOR HUESCA">SECTOR HUESCA</option>
    <option value="SECTOR LAS ADJUNTAS">SECTOR LAS ADJUNTAS</option>
    <option value="SECTOR LAS VEGAS">SECTOR LAS VEGAS</option>
    <option value="SECTOR PIE DE CUESTA">SECTOR PIE DE CUESTA</option>
    <option value="SECTOR QUEBRADA ARRIBA">SECTOR QUEBRADA ARRIBA</option>
    <option value="SECTOR QUEBRADA SECA">SECTOR QUEBRADA SECA</option>
    ';    
}
    // Parroquia 35 municipio 10 ARAPUEY
if ($_POST["elegido"]=='927') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO ARAPUEY">CENTRO ARAPUEY</option>
    <option value="SECTOR AGUACIL">SECTOR AGUACIL</option>
    <option value="SECTOR CASA DE TABLAS">SECTOR CASA DE TABLAS</option>
    <option value="SECTOR DE 28 ENERO">SECTOR DE 28 ENERO</option>
    <option value="SECTOR EL ANTEOJO">SECTOR EL ANTEOJO</option>
    <option value="SECTOR EL CATORCE">SECTOR EL CATORCE</option>
    <option value="SECTOR EL QUINCE">SECTOR EL QUINCE</option>
    <option value="SECTOR LA DIFICULTAD">SECTOR LA DIFICULTAD</option>
    <option value="SECTOR LA MORA DE POCÓ">SECTOR LA MORA DE POCÓ</option>
    <option value="SECTOR LAS VERITAS">SECTOR LAS VERITAS</option>
    <option value="SECTOR POCÓ">SECTOR POCÓ</option>
    <option value="SECTOR SAN MIGUEL">SECTOR SAN MIGUEL</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    ';    
}
    // Parroquia 36 Municipio 10 PALMIRA
if ($_POST["elegido"]=='928') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CAPITAL DE PARROQUIA SAN JOSÉ DE PALMIRA">CAPITAL DE PARROQUIA SAN JOSÉ DE PALMIRA</option>
    ';    
}
    // Parroquia 37 Municipio 11 SAN CRISTOBAL DE TORONDOY
if ($_POST["elegido"]=='930') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="CAPITAL DE PARROQUIA SAN CRISTÓBAL DE TORONDOY">CAPITAL DE PARROQUIA SAN CRISTÓBAL DE TORONDOY</option>
    ';    
}
    // Parroquia 38 Municipio 11 TORONDOY
if ($_POST["elegido"]=='929') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="CAPITAL DE PARROQUIA TORONDOY">CAPITAL DE PARROQUIA TORONDOY</option>
    <option value="SECTOR LA CUESTA">SECTOR LA CUESTA</option>
    <option value="SECTOR MUCUMPÍS">SECTOR MUCUMPÍS</option>
    <option value="SECTOR MUCURÓ">SECTOR MUCURÓ</option>
    <option value="SECTOR MUCUTUBÁN">SECTOR MUCUTUBÁN</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    <option value="SECTOR TORONDOY">SECTOR TORONDOY</option>
    ';    
}
	// Parroquia 39 Municipio 12 ANTONIO SPINETTI DINI
if ($_POST["elegido"]=='931') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>	
    <option value="BARRIO 1RO DE MAYO">BARRIO 1RO DE MAYO</option>
    <option value="BARRIO BELLA VISTA">BARRIO BELLA VISTA</option>
    <option value="BARRIO EL LLANITO">BARRIO EL LLANITO</option>
    <option value="BARRIO LA CALORA">BARRIO LA CALORA</option>
    <option value="BARRIO LA PROVIDENCIA">BARRIO LA PROVIDENCIA</option>
    <option value="BARRIO PRIMERA">BARRIO PRIMERA</option>
    <option value="BARRIO SAN JOSÉ DE LAS FLORES">BARRIO SAN JOSÉ DE LAS Flores</option>
    <option value="BARRIO SAN JOSÉ FLORES ALTO">BARRIO SAN JOSÉ FLORES ALTO</option>
    <option value="BARRIO SAN JOSÉ FLORES BAJO">BARRIO SAN JOSÉ FLORES BAJO</option>
    <option value="BARRIO SAN JUAN BAUTISTA">BARRIO SAN JUAN BAUTISTA</option>
    <option value="BARRIO SAN PEDRO">BARRIO SAN PEDRO</option>
    <option value="BARRIO SANTA ANA NORTE">BARRIO SANTA ANA NORTE</option>
    <option value="BARRIO SANTA ANITA">BARRIO SANTA ANITA</option>
    <option value="BARRIO SANTA ROSA">BARRIO SANTA ROSA</option>
    <option value="BARRIO SANTO DOMINGO">BARRIO SANTO DOMINGO</option>
    <option value="BARRIO SIMÓN BOLÍVAR">BARRIO SIMÓN BOLÍVAR</option>
    <option value="BARRIO SUCRE">BARRIO SUCRE</option>
    <option value="BARRIO VISTA HERMOSA">BARRIO VISTA HERMOSA</option>
    <option value="CONJUNTO RESIDENCIAL ALBARREGAS">CONJUNTO RESIDENCIAL ALBARREGAS</option>
    <option value="CONJUNTO RESIDENCIAL CAMPO NEBLINA">CONJUNTO RESIDENCIAL CAMPO NEBLINA</option>
    <option value="CONJUNTO RESIDENCIAL DOMINGO SALAZAR">CONJUNTO RESIDENCIAL DOMINGO SALAZAR</option>
    <option value="CONJUNTO RESIDENCIAL EL GARZÓN">CONJUNTO RESIDENCIAL EL GARZÓN</option>
    <option value="CONJUNTO RESIDENCIAL LA RIVERA">CONJUNTO RESIDENCIAL LA RIVERA</option>
    <option value="CONJUNTO RESIDENCIAL LAS HECHICERAS">CONJUNTO RESIDENCIAL LAS HECHICERAS</option>
    <option value="CONJUNTO RESIDENCIAL LAS MARÍAS">CONJUNTO RESIDENCIAL LAS MARÍAS</option>
    <option value="CONJUNTO RESIDENCIAL LOS FRAILES">CONJUNTO RESIDENCIAL LOS FRAILES</option>
    <option value="CONJUNTO RESIDENCIAL MARÍA">CONJUNTO RESIDENCIAL MARÍA</option>
    <option value="CONJUNTO RESIDENCIAL MARÍA GRACIELA">CONJUNTO RESIDENCIAL MARÍA GRACIELA</option>
    <option value="CONJUNTO RESIDENCIAL SIMÓN BOLÍVAR LOS FRAILEJONES">CONJUNTO RESIDENCIAL SIMÓN BOLÍVAR LOS FRAILEJONES</option>
    <option value="CONJUNTO RESIDENCIAL TATUY">CONJUNTO RESIDENCIAL TATUY</option>
    <option value="SECTOR DESARROLLO HABITACIONAL SANTA ANA">SECTOR DESARROLLO HABITACIONAL SANTA ANA</option>
    <option value="SECTOR DESARROLLO HABITACIONAL SANTA ANA II">SECTOR DESARROLLO HABITACIONAL SANTA ANA II</option>
    <option value="SECTOR LA CRUZ VERDE">SECTOR LA CRUZ VERDE</option>
    <option value="SECTOR LA HECHICERA">SECTOR LA HECHICERA</option>
    <option value="SECTOR LA LIRA">SECTOR LA LIRA</option>
    <option value="SECTOR LAS QUEBRADITAS">SECTOR LAS QUEBRADITAS</option>
    <option value="SECTOR LOMAS DE BELLA VISTA">SECTOR LOMAS DE BELLA VISTA</option>
    <option value="SECTOR LOS PRÓCERES">SECTOR LOS PRÓCERES</option>
    <option value="SECTOR PUEBLO NUEVO">SECTOR PUEBLO NUEVO</option>
    <option value="SECTOR SANTA ANA">SECTOR SANTA ANA</option>
    <option value="URBANIZACIÓN ALTO PRADO">URBANIZACIÓN ALTO PRADO</option>
    <option value="URBANIZACIÓN CARDENAL QUINTERO">URBANIZACIÓN CARDENAL QUINTERO</option>
    <option value="URBANIZACIÓN DOECA">URBANIZACIÓN DOECA</option>
    <option value="URBANIZACIÓN EL CAMPITO">URBANIZACIÓN EL CAMPITO</option>
    <option value="URBANIZACIÓN LAS TERRAZAS">URBANIZACIÓN LAS TERRAZAS</option>
    <option value="URBANIZACIÓN MUCUCHÍES">URBANIZACIÓN MUCUCHÍES</option>
    <option value="URBANIZACIÓN PARQUE MONTAÑA">URBANIZACIÓN PARQUE MONTAÑA</option>
    <option value="URBANIZACIÓN POMPEYA">URBANIZACIÓN POMPEYA</option>
    <option value="URBANIZACIÓN PUEBLO NUEVO">URBANIZACIÓN PUEBLO NUEVO</option>
    <option value="URBANIZACIÓN SANTA ANA">URBANIZACIÓN SANTA ANA</option>
    ';    
}
    	// Parroquia 40 Municipio 12 ARIAS
if ($_POST["elegido"]=='932') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>	
	<option value="CENTRO ARIAS">CENTRO ARIAS</option>
	<option value="CONJUNTO RESIDENCIAL DON JESÚS">CONJUNTO RESIDENCIAL DON JESÚS</option>
	<option value="CONJUNTO RESIDENCIAL VILLA SANTA">CONJUNTO RESIDENCIAL VILLA SANTA</option>
	<option value="PICO BOLÍVAR">PICO BOLÍVAR</option>
	<option value="SECTOR BELÉN">SECTOR BELÉN</option>
	<option value="SECTOR EL PARAMITO">SECTOR EL PARAMITO</option>
	<option value="SECTOR EL ZAMURO">SECTOR EL ZAMURO</option>
	<option value="SECTOR LA JOYA">SECTOR LA JOYA</option>
	<option value="SECTOR LOURDES">SECTOR LOURDES</option>
	<option value="URBANIZACIÓN CARLOS GAINZA">URBANIZACIÓN CARLOS GAINZA</option>
	<option value="URBANIZACIÓN LOS PERIODISTAS">URBANIZACIÓN LOS PERIODISTAS</option>
	<option value="URBANIZACIÓN MARÍA ANITA MENDOZA">URBANIZACIÓN MARÍA ANITA MENDOZA</option>
    ';    
}
    // Parroquia 41 Municipio 12 CARACCIOLO PARRA PÉREZ
if ($_POST["elegido"]=='933') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>	
    <option value="BARRIO BELLA VISTA">BARRIO BELLA VISTA</option>
    <option value="CONJUNTO RESIDENCIAL EL ROSARIO">CONJUNTO RESIDENCIAL EL ROSARIO</option>
    <option value="CONJUNTO RESIDENCIAL LUIS FARGIER">CONJUNTO RESIDENCIAL LUIS FARGIER</option>
    <option value="CONJUNTO RESIDENCIAL VILLA SANTA BÁRBARA">CONJUNTO RESIDENCIAL VILLA SANTA BÁRBARA</option>
    <option value="SECTOR BELENZATE">SECTOR BELENZATE</option>
    <option value="SECTOR EL TEJAR">SECTOR EL TEJAR</option>
    <option value="SECTOR LA HACIENDA">SECTOR LA HACIENDA</option>
    <option value="SECTOR LA JOYA">SECTOR LA JOYA</option>
    <option value="SECTOR LOS PINOS">SECTOR LOS PINOS</option>
    <option value="SECTOR SAN ISIDRO">SECTOR SAN ISIDRO</option>
    <option value="SECTOR SANTA BÁRBARA ESTE">SECTOR SANTA BÁRBARA ESTE</option>
    <option value="SECTOR SANTA BÁRBARA OESTE">SECTOR SANTA BÁRBARA OESTE</option>
    <option value="URBANIZACIÓN HUMBOLDT">URBANIZACIÓN HUMBOLDT</option>
    <option value="URBANIZACIÓN LOS MOCOTÍES">URBANIZACIÓN LOS MOCOTÍES</option>
    <option value="URBANIZACIÓN PIE DE MONTE">URBANIZACIÓN PIE DE MONTE</option>
    ';    
}
    	// Parroquia 42 Municipio 12 DOMINGO PEÑA
if ($_POST["elegido"]=='934') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>	
	<option value="SECTOR 16 DE SEPTIEMBRE">SECTOR 16 DE SEPTIEMBRE</option>
	<option value="SECTOR ANDRÉS BELLO">SECTOR ANDRÉS BELLO</option>
	<option value="SECTOR GLORIAS DE PATRIA">SECTOR GLORIAS DE PATRIA</option>
	<option value="SECTOR PASEO DE LAS FERIA">SECTOR PASEO DE LAS FERIA</option>
	<option value="SECTOR SAN JUAN">SECTOR SAN JUAN</option>
	<option value="SECTOR SANTA ELENA">SECTOR SANTA ELENA</option>
	<option value="SECTOR URDANETA">SECTOR URDANETA</option>
	<option value="URBANIZACIÓN BUENA VISTA">URBANIZACIÓN BUENA VISTA</option>
	<option value="URBANIZACIÓN CAMPO DE ORO">URBANIZACIÓN CAMPO DE ORO</option>
	<option value="URBANIZACIÓN KENNEDY">URBANIZACIÓN KENNEDY</option>
	<option value="URBANIZACIÓN LAS DELICIAS">URBANIZACIÓN LAS DELICIAS</option>
	<option value="URBANIZACIÓN LOS CORRALES">URBANIZACIÓN LOS CORRALES</option>
	<option value="URBANIZACIÓN LOS CORRALES L">URBANIZACIÓN LOS CORRALES l</option>
	<option value="URBANIZACIÓN SAN ANTONIO">URBANIZACIÓN SAN ANTONIO</option>
	<option value="URBANIZACIÓN SAN CRISTÓBAL">URBANIZACIÓN SAN CRISTÓBAL</option>
	<option value="URBANIZACIÓN SAN JUAN XLL">URBANIZACIÓN SAN JUAN XLL</option>
	<option value="URBANIZACIÓN SANTA ELENA">URBANIZACIÓN SANTA ELENA</option>
	<option value="URBANIZACIÓN SANTA JUANA">URBANIZACIÓN SANTA JUANA</option>
	<option value="URBANIZACIÓN SANTA MÓNICA">URBANIZACIÓN SANTA MÓNICA</option>
    ';    
}
	// Parroquia 43 Municipio 12 EL LLANO
    if ($_POST["elegido"]=='935') {
        $options= '
        <option value="0">-SELECCIONE UN SECTOR-</option>	
        <option value="SECTOR CENTRO EL LLANO">SECTOR CENTRO EL LLANO</option>
        <option value="URBANIZACIÓN EL ENCANTO">URBANIZACIÓN EL ENCANTO</option>
        ';    
    }
    	// Parroquia 44 Municipio 12 GONZALO PICÓN FEBRES
if ($_POST["elegido"]=='936') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>	
	<option value="CENTRO GONZALO PICÓN FEBRES">CENTRO GONZALO PICÓN FEBRES</option>
	<option value="CONJUNTO RESIDENCIA VILLA SANTA">CONJUNTO RESIDENCIA VILLA SANTA</option>
	<option value="CONJUNTO RESIDENCIAL EL ARENAL">CONJUNTO RESIDENCIAL EL ARENAL</option>
	<option value="CONJUNTO RESIDENCIAL MARIANITA MENDOZA">CONJUNTO RESIDENCIAL MARIANITA MENDOZA</option>
	<option value="CONJUNTO RESIDENCIAL MUCUJUN">CONJUNTO RESIDENCIAL MUCUJUN</option>
	<option value="CONJUNTO RESIDENCIAL VELLECITO">CONJUNTO RESIDENCIAL VELLECITO</option>
	<option value="CONJUNTO RESIDENCIAL VILLA SUIT">CONJUNTO RESIDENCIAL VILLA SUIT</option>
	<option value="SECTOR EL ARADO">SECTOR EL ARADO</option>
	<option value="SECTOR EL PLAYÓN">SECTOR EL PLAYÓN</option>
	<option value="SECTOR EL VALLE">SECTOR EL VALLE</option>
	<option value="SECTOR LA CAÑA">SECTOR LA CAÑA</option>
	<option value="SECTOR LA CARBONERA">SECTOR LA CARBONERA</option>
	<option value="SECTOR LA CUCHILLA">SECTOR LA CUCHILLA</option>
	<option value="SECTOR LA CUESTA">SECTOR LA CUESTA</option>
    <option value="SECTOR LA VERGARA">SECTOR LA VERGARA</option>
    <option value="SECTOR LAS CUADRAS">SECTOR LAS CUADRAS</option>
    <option value="SECTOR LAS MERCEDES">SECTOR LAS MERCEDES</option>
    <option value="SECTOR MONTERREY">SECTOR MONTERREY</option>
    <option value="SECTOR PLAYÓN ABAJO">SECTOR PLAYÓN ABAJO</option>
    <option value="SECTOR PRADO VERDE">SECTOR PRADO VERDE</option>
    <option value="SECTOR SAN BENITO">SECTOR SAN BENITO</option>
    <option value="SECTOR SAN JAVIER">SECTOR SAN JAVIER</option>
    <option value="SECTOR VALLE ALTO">SECTOR VALLE ALTO</option>
    <option value="SECTOR VALLE GRANDE">SECTOR VALLE GRANDE</option>
    <option value="SECTOR ZONA MILITAR">SECTOR ZONA MILITAR</option>
    <option value="URBANIZACIÓN DON PERUCHO">URBANIZACIÓN DON PERUCHO</option>
    <option value="URBANIZACIÓN LOS PINOS">URBANIZACIÓN LOS PINOS</option>
   ';    
}
	// Parroquia 45 Municipio 12 JACINTO PLAZA
if ($_POST["elegido"]=='937') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>	
    <option value="BARRIO EL CAMBIO">BARRIO EL CAMBIO</option>
    <option value="BARRIO LA COLINA">BARRIO LA COLINA</option>
    <option value="BARRIO LOS NARANJOS">BARRIO LOS NARANJOS</option>
    <option value="BARRIO NEGRO PRIMERO">BARRIO NEGRO PRIMERO</option>
    <option value="BARRIO NIÑO JESÚS">BARRIO NIÑO JESÚS</option>
    <option value="BARRIO PUMA ROSA">BARRIO PUMA ROSA</option>
    <option value="BARRIO RAÚL LEONI">BARRIO RAÚL LEONI</option>
    <option value="BARRIO SAN ANTONIO">BARRIO SAN ANTONIO</option>
    <option value="PROLONGACIÓN EL MORRO">PROLONGACIÓN EL MORRO</option>
    <option value="PROLONGACIÓN SAN JACINTO">PROLONGACIÓN SAN JACINTO</option>
    <option value="SECTOR EL PORTACHUELO">SECTOR EL PORTACHUELO</option>
    <option value="SECTOR LA ASTILLERIA">SECTOR LA ASTILLERIA</option>
    <option value="SECTOR LA CHAMA">SECTOR LA CHAMA</option>
    <option value="SECTOR LA CHAMITA">SECTOR LA CHAMITA</option>
    <option value="SECTOR LOS BUCARES">SECTOR LOS BUCARES</option>
    <option value="SECTOR SAN JACINTO">SECTOR SAN JACINTO</option>
    <option value="SECTOR SANTA CATALINA">SECTOR SANTA CATALINA</option>
    <option value="URBANIZACIÓN CARABOBO">URBANIZACIÓN CARABOBO</option>
    <option value="URBANIZACIÓN CINCO ÁGUILAS">URBANIZACIÓN CINCO ÁGUILAS</option> 
    ';    
}
    	// Parroquia 45 Municipio 12 JUAN RODRÍGUEZ SUÁREZ
if ($_POST["elegido"]=='938') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>	
	<option value="BARRIO LA VEGA">BARRIO LA VEGA</option>
	<option value="CONJUNTO RESIDENCIAL ANDRÉS BELLO">CONJUNTO RESIDENCIAL ANDRÉS BELLO</option>
	<option value="CONJUNTO RESIDENCIAL CALICANTA">CONJUNTO RESIDENCIAL CALICANTA</option>
	<option value="CONJUNTO RESIDENCIAL CANDELARIA">CONJUNTO RESIDENCIAL CANDELARIA</option>
	<option value="CONJUNTO RESIDENCIAL DOÑA CARMEN">CONJUNTO RESIDENCIAL DOÑA CARMEN</option>
	<option value="CONJUNTO RESIDENCIAL ESTANCIAS">CONJUNTO RESIDENCIAL ESTANCIAS</option>
	<option value="CONJUNTO RESIDENCIAL HABIZUN">CONJUNTO RESIDENCIAL HABIZUN</option>
	<option value="CONJUNTO RESIDENCIAL LA ALAMEDA">CONJUNTO RESIDENCIAL LA ALAMEDA</option>
	<option value="CONJUNTO RESIDENCIAL LAS CAROLINAS">CONJUNTO RESIDENCIAL LAS CAROLINAS</option>
	<option value="CONJUNTO RESIDENCIAL LOS FRENOS">CONJUNTO RESIDENCIAL LOS FRENOS</option>
	<option value="CONJUNTO RESIDENCIAL MONTE ALTO">CONJUNTO RESIDENCIAL MONTE ALTO</option>
	<option value="CONJUNTO RESIDENCIAL PRADERAS">CONJUNTO RESIDENCIAL PRADERAS</option>
	<option value="CONJUNTO RESIDENCIAL RINCÓN">CONJUNTO RESIDENCIAL RINCÓN</option>
	<option value="CONJUNTO RESIDENCIAL VALLE ABAJO">CONJUNTO RESIDENCIAL VALLE ABAJO</option>
    <option value="CONJUNTO RESIDENCIAL VILLA DEL CAMPO">CONJUNTO RESIDENCIAL VILLA DEL CAMPO</option>	
	<option value="CONJUNTO RESIDENCIAL VILLA DEL CHAMA">CONJUNTO RESIDENCIAL VILLA DEL CHAMA</option>	
	<option value="CONJUNTO RESIDENCIAL VILLA DEL RÍO">CONJUNTO RESIDENCIAL VILLA DEL RÍO</option>	
	<option value="CONJUNTO RESIDENCIAL YOCANEY">CONJUNTO RESIDENCIAL YOCANEY</option>	
	<option value="URBANIZACIÓN ALTA CHAMA">URBANIZACIÓN ALTA CHAMA</option>	
	<option value="URBANIZACIÓN ALTAMIRA">URBANIZACIÓN ALTAMIRA</option>	
	<option value="URBANIZACIÓN BARCELONA">URBANIZACIÓN BARCELONA</option>	
	<option value="URBANIZACIÓN CARRIZAL">URBANIZACIÓN CARRIZAL</option>	
	<option value="URBANIZACIÓN CARRIZAL A">URBANIZACIÓN CARRIZAL A</option>	
	<option value="URBANIZACIÓN CARRIZAL B">URBANIZACIÓN CARRIZAL B</option>	
	<option value="URBANIZACIÓN DELICANTO">URBANIZACIÓN DELICANTO</option>	
	<option value="URBANIZACIÓN EL CENTRAL">URBANIZACIÓN EL CENTRAL</option>	
	<option value="URBANIZACIÓN EL MIRADOR">URBANIZACIÓN EL MIRADOR</option>	
	<option value="URBANIZACIÓN LA MARA">URBANIZACIÓN LA MARA</option>	
	<option value="URBANIZACIÓN LA MARA ALTO CHAMA">URBANIZACIÓN LA MARA ALTO CHAMA</option>	
	<option value="URBANIZACIÓN LA MONTAÑA A">URBANIZACIÓN LA MONTAÑA A</option>	
	<option value="URBANIZACIÓN LA MONTAÑA B">URBANIZACIÓN LA MONTAÑA B</option>	
	<option value="URBANIZACIÓN LA SABANA">URBANIZACIÓN LA SABANA</option>	
	<option value="URBANIZACIÓN LAS ACACIAS">URBANIZACIÓN LAS ACACIAS</option>	
	<option value="URBANIZACIÓN LAS DELIAS">URBANIZACIÓN LAS DELIAS</option>	
	<option value="URBANIZACIÓN LAS TAPIAS">URBANIZACIÓN LAS TAPIAS</option>	
	<option value="URBANIZACIÓN PEDRERA">URBANIZACIÓN PEDRERA</option>	
	<option value="URBANIZACIÓN VALPARAÍSO">URBANIZACIÓN VALPARAÍSO</option>	
	<option value="URBANIZACIÓN VILLA DEL RÍO">URBANIZACIÓN VILLA DEL RÍO</option> 
    ';    
}
	// Parroquia 46 Municipio 12 LASSO DE LA VEGA
if ($_POST["elegido"]=='939') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>	
    <option value="BARRIO LA TRINIDAD">BARRIO LA TRINIDAD</option>
    <option value="BARRIO NUEVA BOLIVIA">BARRIO NUEVA BOLIVIA</option>
    <option value="BARRIO SAN ISIDRO">BARRIO SAN ISIDRO</option>
    <option value="CONJUNTO RESIDENCIAL ÁNGELES LV">CONJUNTO RESIDENCIAL ÁNGELES LV</option>
    <option value="CONJUNTO RESIDENCIAL LA HORQUETA">CONJUNTO RESIDENCIAL LA HORQUETA</option>
    <option value="CONJUNTO RESIDENCIAL LAGUNILLA">CONJUNTO RESIDENCIAL LAGUNILLA</option>
    <option value="CONJUNTO RESIDENCIAL LOS COCOS">CONJUNTO RESIDENCIAL LOS COCOS</option>
    <option value="CONJUNTO RESIDENCIAL LOS NARANJOS">CONJUNTO RESIDENCIAL LOS NARANJOS</option>
    <option value="CONJUNTO RESIDENCIAL PIE DE MONTE">CONJUNTO RESIDENCIAL PIE DE MONTE</option>
    <option value="CONJUNTO RESIDENCIAL QUEBRADITA LINDA">CONJUNTO RESIDENCIAL QUEBRADITA LINDA</option>
    <option value="CONJUNTO RESIDENCIAL ROCAYOSA">CONJUNTO RESIDENCIAL ROCAYOSA</option>
    <option value="CONJUNTO RESIDENCIAL SAN ISIDRO">CONJUNTO RESIDENCIAL SAN ISIDRO</option>
    <option value="CONJUNTO RESIDENCIAL SAY SAY">CONJUNTO RESIDENCIAL SAY SAY</option>
    <option value="SECTOR EL ENCANTO">SECTOR EL ENCANTO</option>
    <option value="SECTOR LA PEDREGOSA ALTA">SECTOR LA PEDREGOSA ALTA</option>
    <option value="SECTOR LA PEDREGOSA BAJA">SECTOR LA PEDREGOSA BAJA</option>
    <option value="SECTOR LOMA DE MAITINES">SECTOR LOMA DE MAITINES</option>
    <option value="SECTOR LOS PRÓCERES">SECTOR LOS PRÓCERES</option>
    <option value="SECTOR PEDREGOSA SUR">SECTOR PEDREGOSA SUR</option>
    <option value="URBANIZACIÓN BELESANTE">URBANIZACIÓN BELESANTE</option>
    <option value="URBANIZACIÓN DON PEPE">URBANIZACIÓN DON PEPE</option>
    <option value="URBANIZACIÓN EL CASTOR">URBANIZACIÓN EL CASTOR</option>
    <option value="URBANIZACIÓN LA FLORESTA">URBANIZACIÓN LA FLORESTA</option>
    <option value="URBANIZACIÓN LA HACIENDA">URBANIZACIÓN LA HACIENDA</option>
    <option value="URBANIZACIÓN LA LINDA">URBANIZACIÓN LA LINDA</option>
    <option value="URBANIZACIÓN LA PEDREGOSA">URBANIZACIÓN LA PEDREGOSA</option>
    <option value="URBANIZACIÓN LA TRINIDAD">URBANIZACIÓN LA TRINIDAD</option>
    <option value="URBANIZACIÓN LAS ARDILLAS">URBANIZACIÓN LAS ARDILLAS</option>
    <option value="URBANIZACIÓN LOS CORTIJOS">URBANIZACIÓN LOS CORTIJOS</option>
    <option value="URBANIZACIÓN PIEDRAS GRANDES">URBANIZACIÓN PIEDRAS GRANDES</option>
    <option value="URBANIZACIÓN QUEBRADA LINDA">URBANIZACIÓN QUEBRADA LINDA</option>
    <option value="URBANIZACIÓN RÍO ALTO">URBANIZACIÓN RÍO ALTO</option>
    <option value="URBANIZACIÓN VILLA DE SANTA ROSA">URBANIZACIÓN VILLA DE SANTA ROSA</option>
    <option value="ZONA INDUSTRIAL LOS ANDES">ZONA INDUSTRIAL LOS ANDES</option> 
    ';    
}
    	// Parroquia 47 Municipio 12 MARIANO PICÓN SALAS
if ($_POST["elegido"]=='940') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>	
	<option value="BARRIO SANTA BÁRBARA">BARRIO SANTA BÁRBARA</option>
	<option value="BARRIO SANTA TERESA">BARRIO SANTA TERESA</option>
	<option value="BARRIO SUCRE">BARRIO SUCRE</option>
	<option value="CONJUNTO RESIDENCIAL BUCARES">CONJUNTO RESIDENCIAL BUCARES</option>
	<option value="CONJUNTO RESIDENCIAL CORDILLERA">CONJUNTO RESIDENCIAL CORDILLERA</option>
	<option value="CONJUNTO RESIDENCIAL DON JOSÉ">CONJUNTO RESIDENCIAL DON JOSÉ</option>
	<option value="CONJUNTO RESIDENCIAL HACIA SIERRA">CONJUNTO RESIDENCIAL HACIA SIERRA</option>
	<option value="CONJUNTO RESIDENCIAL LA ARBOLEDA">CONJUNTO RESIDENCIAL LA ARBOLEDA</option>
	<option value="CONJUNTO RESIDENCIAL LOGIMAR">CONJUNTO RESIDENCIAL LOGIMAR</option>
	<option value="CONJUNTO RESIDENCIAL LUIS FARGIER">CONJUNTO RESIDENCIAL LUIS FARGIER</option>
	<option value="CONJUNTO RESIDENCIAL MONSEÑOR CHACÓN">CONJUNTO RESIDENCIAL MONSEÑOR CHACÓN</option>
	<option value="CONJUNTO RESIDENCIAL PEDRO RINCÓN GUTIÉRREZ">CONJUNTO RESIDENCIAL PEDRO RINCÓN GUTIÉRREZ</option>
	<option value="CONJUNTO RESIDENCIAL PUENTE DE HIERRO">CONJUNTO RESIDENCIAL PUENTE DE HIERRO</option>
	<option value="CONJUNTO RESIDENCIAL RÍO ARRIBA">CONJUNTO RESIDENCIAL RÍO ARRIBA</option>
    <option value="CONJUNTO RESIDENCIAL SANTA BÁRBARA">CONJUNTO RESIDENCIAL SANTA BÁRBARA</option>
    <option value="CONJUNTO RESIDENCIAL VILLA JARDÍN">CONJUNTO RESIDENCIAL VILLA JARDÍN</option>
    <option value="SECTOR EL LLANITO">SECTOR EL LLANITO</option>
    <option value="SECTOR EL RODEO">SECTOR EL RODEO</option>
    <option value="SECTOR EL TRAPICHE">SECTOR EL TRAPICHE</option>
    <option value="SECTOR HACIA SIERRA">SECTOR HACIA SIERRA</option>
    <option value="SECTOR INDEPENDENCIA">SECTOR INDEPENDENCIA</option>
    <option value="SECTOR LA CAÑA">SECTOR LA CAÑA</option>
    <option value="SECTOR LA CRUZ VERDE">SECTOR LA CRUZ VERDE</option>
    <option value="SECTOR LOS SAUSALES">SECTOR LOS SAUSALES</option>
    <option value="SECTOR PIE DE TIRO">SECTOR PIE DE TIRO</option>
    <option value="SECTOR POMPEYA">SECTOR POMPEYA</option>
    <option value="SECTOR SANTA BÁRBARA DEL ESTE">SECTOR SANTA BÁRBARA DEL ESTE</option>
    <option value="SECTOR SANTA BÁRBARA OESTE">SECTOR SANTA BÁRBARA OESTE</option>
    <option value="URBANIZACIÓN LAS FLORES">URBANIZACIÓN LAS FLORES</option>
    <option value="URBANIZACIÓN LOS PINOS">URBANIZACIÓN LOS PINOS</option>
    <option value="URBANIZACIÓN LUMONTOY">URBANIZACIÓN LUMONTOY</option>
    <option value="URBANIZACIÓN MARIANO PICÓN SALAS">URBANIZACIÓN MARIANO PICÓN SALAS</option>
    <option value="URBANIZACIÓN SAN JOSÉ">URBANIZACIÓN SAN JOSÉ</option>
    <option value="URBANIZACIÓN VILLA VERÓNICA">URBANIZACIÓN VILLA VERÓNICA</option>
    <option value="BARRIO EL RINCÓN">BARRIO EL RINCÓN</option>
    <option value="BARRIO MONTE BELLO">BARRIO MONTE BELLO</option>
    <option value="BARRIO PIE DE TIRO">BARRIO PIE DE TIRO</option>
    ';    
}
	// Parroquia 48 Municipio 12 MILLA
if ($_POST["elegido"]=='941') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>	
    <option value="BARRIO 05 DE JULIO">BARRIO 05 DE JULIO</option>
    <option value="BARRIO ANDRÉS ELOY BLANCO">BARRIO ANDRÉS ELOY BLANCO</option>
    <option value="BARRIO LA CALERA">BARRIO LA CALERA</option>
    <option value="BARRIO LA CAMPIÑA">BARRIO LA CAMPIÑA</option>
    <option value="BARRIO LA DEMOCRACIA">BARRIO LA DEMOCRACIA</option>
    <option value="BARRIO LA UNIÓN">BARRIO LA UNIÓN</option>
    <option value="BARRIO SAN PEDRO">BARRIO SAN PEDRO</option>
    <option value="CENTRO DE MILLA">CENTRO DE MILLA</option>
    <option value="CONJUNTO RESIDENCIAL EL ROCÍO">CONJUNTO RESIDENCIAL EL ROCÍO</option>
    <option value="SECTOR AGUAS DE MÉRIDA">SECTOR AGUAS DE MÉRIDA</option>
    <option value="SECTOR EL AMPARO">SECTOR EL AMPARO</option>
    <option value="SECTOR LA CRUZ VERDE">SECTOR LA CRUZ VERDE</option>
    <option value="SECTOR LA HECHICERA">SECTOR LA HECHICERA</option>
    <option value="SECTOR LA MILAGROSA L">SECTOR LA MILAGROSA L</option>
    <option value="SECTOR LA MILAGROSA LL">SECTOR LA MILAGROSA ll</option>
    <option value="SECTOR LA PROVIDENCIA">SECTOR LA PROVIDENCIA</option>
    <option value="SECTOR LA QUEBRADITA">SECTOR LA QUEBRADITA</option>
    <option value="SECTOR LOS CHORROS DE MILLA">SECTOR LOS CHORROS DE MILLA</option>
    <option value="SECTOR LOS LLANITOS DE MONTERREY">SECTOR LOS LLANITOS DE MONTERREY</option>
    <option value="SECTOR LOS PINOS">SECTOR LOS PINOS</option>
    <option value="SECTOR MESA DE LA VIRGEN">SECTOR MESA DE LA VIRGEN</option>
    <option value="SECTOR MUCUJUN">SECTOR MUCUJUN</option>
    <option value="SECTOR PIE DE TIRO">SECTOR PIE DE TIRO</option>
    <option value="SECTOR POMPEYA">SECTOR POMPEYA</option>
    <option value="SECTOR SAN BENITO">SECTOR SAN BENITO</option>
    <option value="SECTOR SANTA BÁRBARA DEL ESTE">SECTOR SANTA BÁRBARA DEL ESTE</option>
    <option value="SECTOR SANTA BÁRBARA OESTE">SECTOR SANTA BÁRBARA OESTE</option>
    <option value="SECTOR SANTA ROSA">SECTOR SANTA ROSA</option>
    <option value="SECTOR VUELTA DE LOLA">SECTOR VUELTA DE LOLA</option>
    <option value="URBANIZACIÓN LA ARBOLEDA">URBANIZACIÓN LA ARBOLEDA</option>
    <option value="URBANIZACIÓN LA COMPAÑIA">URBANIZACIÓN LA COMPAÑIA</option>
    <option value="URBANIZACIÓN LAS FLORES">URBANIZACIÓN LAS FLORES</option>
    <option value="URBANIZACIÓN LOS PINOS">URBANIZACIÓN LOS PINOS</option>
    <option value="URBANIZACIÓN LOS PINOS II">URBANIZACIÓN LOS PINOS II</option>
    <option value="URBANIZACIÓN LOS SAUZALES">URBANIZACIÓN LOS SAUZALES</option>
    <option value="URBANIZACIÓN LUMONTOY">URBANIZACIÓN LUMONTOY</option>
    <option value="URBANIZACIÓN MARIANO PICÓN SALAS">URBANIZACIÓN MARIANO PICÓN SALAS</option>
    <option value="URBANIZACIÓN SAN FRANCISCO">URBANIZACIÓN SAN FRANCISCO</option>
    <option value="URBANIZACIÓN SAN JOSÉ">URBANIZACIÓN SAN JOSÉ</option>
    <option value="URBANIZACIÓN SANTA MARÍA NORTE">URBANIZACIÓN SANTA MARÍA NORTE</option>
    <option value="URBANIZACIÓN SANTA MARÍA SUR">URBANIZACIÓN SANTA MARÍA SUR</option>
    <option value="URBANIZACIÓN TATUI">URBANIZACIÓN TATUI</option>
    <option value="URBANIZACIÓN VILLA VERÓNICA">URBANIZACIÓN VILLA VERÓNICA</option> 
    ';    
}
    	// Parroquia 49 Municipio 12 OZUNA RODRIGUEZ
if ($_POST["elegido"]=='942') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>	
	<option value="BARRIO SAN JOSÉ">BARRIO SAN JOSÉ</option>
	<option value="SECTOR AGUAS DE MÉRIDA">SECTOR AGUAS DE MÉRIDA</option>
	<option value="SECTOR COSOBO">SECTOR COSOBO</option>
	<option value="SECTOR EL PARAÍSO">SECTOR EL PARAÍSO</option>
	<option value="SECTOR EL SALADO">SECTOR EL SALADO</option>
	<option value="SECTOR ENTABLITO L">SECTOR ENTABLITO l</option>
	<option value="SECTOR ENTABLITO LL">SECTOR ENTABLITO LL</option>
	<option value="SECTOR ENTABLITO LLL">SECTOR ENTABLITO LLL</option>
	<option value="SECTOR LA PARROQUIA">SECTOR LA PARROQUIA</option>
	<option value="SECTOR LOMAS DE LOS ÁNGELES">SECTOR LOMAS DE LOS ÁNGELES</option>
	<option value="SECTOR LOS CUROS">SECTOR LOS CUROS</option>
	<option value="SECTOR POLICIAL">SECTOR POLICIAL</option>
	<option value="URBANIZACIÓN ALDEA VALLE ENCANTADO">URBANIZACIÓN ALDEA VALLE ENCANTADO</option>
	<option value="URBANIZACIÓN ALMA MATER">URBANIZACIÓN ALMA MATER</option>
    <option value="URBANIZACIÓN ÁNGELES">URBANIZACIÓN ÁNGELES</option>
    <option value="URBANIZACIÓN AZUL">URBANIZACIÓN AZUL</option>
    <option value="URBANIZACIÓN BELLA VISTA">URBANIZACIÓN BELLA VISTA</option>
    <option value="URBANIZACIÓN BICENTENARIO">URBANIZACIÓN BICENTENARIO</option>
    <option value="URBANIZACIÓN CAMPO CLARO">URBANIZACIÓN CAMPO CLARO</option>
    <option value="URBANIZACIÓN CAMPO SOL">URBANIZACIÓN CAMPO SOL</option>
    <option value="URBANIZACIÓN LA MATA">URBANIZACIÓN LA MATA</option>
    <option value="URBANIZACIÓN MIRADOR">URBANIZACIÓN MIRADOR</option>
    <option value="URBANIZACIÓN MONTAÑERA">URBANIZACIÓN MONTAÑERA</option>
    <option value="URBANIZACIÓN OZUNA">URBANIZACIÓN OZUNA</option>
    <option value="URBANIZACIÓN PEDREGAL">URBANIZACIÓN PEDREGAL</option>
    <option value="URBANIZACIÓN SAN VICENTE">URBANIZACIÓN SAN VICENTE</option>
    <option value="URBANIZACIÓN SERRANÍA CASA CLUB">URBANIZACIÓN SERRANÍA CASA CLUB</option>
    <option value="URBANIZACIÓN TERRAZAS EL SOL">URBANIZACIÓN TERRAZAS EL SOL</option>
    <option value="URBANIZACIÓN TRINITARIAS">URBANIZACIÓN TRINITARIAS</option>
    <option value="ZONA INDUSTRIAL LOS CUROS">ZONA INDUSTRIAL LOS CUROS</option> 
    ';    
}
	// Parroquia 50 Municipio 12 SAGRARIO
if ($_POST["elegido"]=='943') {
    $options= '
    <option value="0">-SELECCIONE UNA PARROQUIA-</option>	
    <option value="CENTRO DE MÉRIDA">CENTRO DE MÉRIDA</option>
    <option value="CONJUNTO RESIDENCIAL LA PRADERA">CONJUNTO RESIDENCIAL LA PRADERA</option>
    <option value="SECTOR EL CAMPITO">SECTOR EL CAMPITO</option>
    <option value="SECTOR LA PUEBLITA">SECTOR LA PUEBLITA</option>
    <option value="SECTOR LLANO GRANDE">SECTOR LLANO GRANDE</option>
    <option value="SECTOR LOMA DE PUEBLO">SECTOR LOMA DE PUEBLO</option>
    <option value="SECTOR LOMAS DE LOS VIENTOS">SECTOR LOMAS DE LOS VIENTOS</option>
    <option value="SECTOR MONTE BELLO">SECTOR MONTE BELLO</option>
    <option value="SECTOR PLAZA LAS HEROÍNAS">SECTOR PLAZA LAS HEROÍNAS</option>
    <option value="SECTOR VENGAS">SECTOR VENGAS</option>
    <option value="SECTOR VILLA LOS ÁNGELES">SECTOR VILLA LOS ÁNGELES</option>
    <option value="URBANIZACIÓN ALTOS DE SANTA MARÍA">URBANIZACIÓN ALTOS DE SANTA MARÍA</option>
    <option value="URBANIZACIÓN BUGANVILLA">URBANIZACIÓN BUGANVILLA</option>
    <option value="URBANIZACIÓN DON PANCHO">URBANIZACIÓN DON PANCHO</option>
    <option value="URBANIZACIÓN DOÑA IMITO">URBANIZACIÓN DOÑA IMITO</option>
    <option value="URBANIZACIÓN JUAN XXIII">URBANIZACIÓN JUAN XXIII</option>
    <option value="URBANIZACIÓN LA LAGUNA">URBANIZACIÓN LA LAGUNA</option>
    <option value="URBANIZACIÓN LA RIBEREÑA">URBANIZACIÓN LA RIBEREÑA</option>
    <option value="URBANIZACIÓN POZO AZUL">URBANIZACIÓN POZO AZUL</option>
    <option value="ZONA RENTAL LOS PRÓCERES">ZONA RENTAL LOS PRÓCERES</option>
    ';    
}
	// Parroquia 51 Municipio 12 EL MORRO
if ($_POST["elegido"]=='944') {
    $options= '
	<option value="0">-SELECCIONE UNA PARROQUIA-</option>	
	<option value="ALDEA EL CUCUY">ALDEA EL CUCUY</option>
	<option value="ALDEA EL HATICO">ALDEA EL HATICO</option>
	<option value="ALDEA EL HATO LOS PÉREZ">ALDEA EL HATO LOS PÉREZ</option>
	<option value="ALDEA EL MONTE">ALDEA EL MONTE</option>
	<option value="ALDEA EL QUINÓ">ALDEA EL QUINÓ</option>
	<option value="ALDEA MIQUIRURÁ">ALDEA MIQUIRURÁ</option>
	<option value="ALDEA MOCAS">ALDEA MOCAS</option>
	<option value="ALDEA MOCOSOS">ALDEA MOCOSOS</option>
	<option value="ALDEA MOCOTONÉ">ALDEA MOCOTONÉ</option>
	<option value="ALDEA MOSELANDE">ALDEA MOSELANDE</option>
	<option value="ALDEA MOSNANDÁ">ALDEA MOSNANDÁ</option>
	<option value="ALDEA MUCHACHAY">ALDEA MUCHACHAY</option>
	<option value="ALDEA MUCURUTÁN">ALDEA MUCURUTÁN</option>
	<option value="ALDEA MUCUSÓS">ALDEA MUCUSÓS</option>
    <option value="ALDEA MUCUTARAY">ALDEA MUCUTARAY</option>
    <option value="ALDEA MUCUYBUCHE">ALDEA MUCUYBUCHE</option>
    <option value="ALDEA TAPIECITA">ALDEA TAPIECITA</option>
    <option value="CENTRO EL MORRO">CENTRO EL MORRO</option>
    ';    
}
	// Parroquia 52 Municipio 12 LOS NEVADOS
if ($_POST["elegido"]=='945') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>	
    <option value="LOS NEVADOS">LOS NEVADOS</option>
    <option value="SECTOR EL HATO">SECTOR EL HATO</option>
    <option value="SECTOR LAS PLUMAS">SECTOR LAS PLUMAS</option>
    <option value="SECTOR LOS RESTROJOS">SECTOR LOS RESTROJOS</option>
    <option value="SECTOR MUCUTÁN">SECTOR MUCUTÁN</option>
    ';    
}
 // Parroquia 53 Municipio 13 ANDRES ELOY BLANCO
if ($_POST["elegido"]=='947') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR BUENA VISTA">SECTOR BUENA VISTA</option>
    <option value="SECTOR EL CACHO">SECTOR EL CACHO</option>
    <option value="SECTOR EL CEMENTERIO ARRIBA">SECTOR EL CEMENTERIO ARRIBA</option>
    <option value="SECTOR EL RESBALÓN">SECTOR EL RESBALÓN</option>
    <option value="SECTOR HIERBA BUENA">SECTOR HIERBA BUENA</option>
    <option value="SECTOR LA ENSILLADA">SECTOR LA ENSILLADA</option>
    <option value="SECTOR MICHIRAQUE">SECTOR MICHIRAQUE</option>
    <option value="SECTOR MIRANDA">SECTOR MIRANDA</option>
    <option value="SECTOR MUCUTUJOTE">SECTOR MUCUTUJOTE</option>
    <option value="SECTOR MUFIQUE">SECTOR MUFIQUE</option>
    <option value="SECTOR TIFAFA">SECTOR TIFAFA</option>
    <option value="SECTOR TUYUY ALTO">SECTOR TUYUY ALTO</option>
    <option value="SECTOR TUYUY BAJO">SECTOR TUYUY BAJO</option>
    ';    
}
// Parroquia 54 Municipio 13 LA VENTANA
if ($_POST["elegido"]=='948') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO LA VENTA">CENTRO LA VENTA</option>
    <option value="SECTOR AGUA LARGA">SECTOR AGUA LARGA</option>
    <option value="SECTOR ALISAL">SECTOR ALISAL</option>
    <option value="SECTOR ALMORZADERO">SECTOR ALMORZADERO</option>
    <option value="SECTOR CAÑA CERRADA">SECTOR CAÑA CERRADA</option>
    <option value="SECTOR CHUMUPU">SECTOR CHUMUPU</option>
    <option value="SECTOR CRUZ CHIQUITA">SECTOR CRUZ CHIQUITA</option>
    <option value="SECTOR EL CANEY">SECTOR EL CANEY</option>
    <option value="SECTOR EL GAVILÁN">SECTOR EL GAVILÁN</option>
    <option value="SECTOR EL HATICO">SECTOR EL HATICO</option>
    <option value="SECTOR EL MORRO">SECTOR EL MORRO</option>
    <option value="SECTOR EL RINCÓN">SECTOR EL RINCÓN</option>
    <option value="SECTOR LA CAVA">SECTOR LA CAVA</option>
    <option value="SECTOR LAS CAÑADITAS">SECTOR LAS CAÑADITAS</option>
    <option value="SECTOR LOS BISCUYES">SECTOR LOS BISCUYES</option>
    <option value="SECTOR MITEQUE">SECTOR MITEQUE</option>
    <option value="SECTOR TURMERO">SECTOR TURMERO</option>
    ';    
}
// Parroquia 55 Municipio 13 PIÑANGO
if ($_POST["elegido"]=='949') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO PIÑANGO">CENTRO PIÑANGO</option>
    <option value="SECTOR ARICAGUA">SECTOR ARICAGUA</option>
    <option value="SECTOR BUENOS AIRES">SECTOR BUENOS AIRES</option>
    <option value="SECTOR CANANDO">SECTOR CANANDO</option>
    <option value="SECTOR EL ALMORZADERO">SECTOR EL ALMORZADERO</option>
    <option value="SECTOR EL ARBOLITO">SECTOR EL ARBOLITO</option>
    <option value="SECTOR EL BAÑO">SECTOR EL BAÑO</option>
    <option value="SECTOR EL CUPIZ">SECTOR EL CUPIZ</option>
    <option value="SECTOR EL FILO">SECTOR EL FILO</option>
    <option value="SECTOR EL FRAILE">SECTOR EL FRAILE</option>
    <option value="SECTOR EL GRITO">SECTOR EL GRITO</option>
    <option value="SECTOR EL RECREO">SECTOR EL RECREO</option>
    <option value="SECTOR LA CABRERA">SECTOR LA CABRERA</option>
    <option value="SECTOR LA CALAVERA">SECTOR LA CALAVERA</option>
    <option value="SECTOR LA TIENDITA">SECTOR LA TIENDITA</option>
    <option value="SECTOR LA VEGA">SECTOR LA VEGA</option>
    <option value="SECTOR LAS PAILITAS">SECTOR LAS PAILITAS</option>
    <option value="SECTOR LAS PALMAS">SECTOR LAS PALMAS</option>
    <option value="SECTOR LAS TAPIAS">SECTOR LAS TAPIAS</option>
    <option value="SECTOR LOS APOSENTOS">SECTOR LOS APOSENTOS</option>
    <option value="SECTOR LOS CORRALES">SECTOR LOS CORRALES</option>
    <option value="SECTOR LOS CORUBALES">SECTOR LOS CORUBALES</option>
    <option value="SECTOR LOS HOYOS">SECTOR LOS HOYOS</option>
    <option value="SECTOR LOS MANZANOS">SECTOR LOS MANZANOS</option>
    <option value="SECTOR MISTEQUE">SECTOR MISTEQUE</option>
    <option value="SECTOR SAN ANTONIO">SECTOR SAN ANTONIO</option>
    <option value="SECTOR SANTA BÁRBARA">SECTOR SANTA BÁRBARA</option>
    <option value="SECTOR SANTA CRUZ DEL QUEMADO">SECTOR SANTA CRUZ DEL QUEMADO</option>
    ';    
}
// Parroquia 56 Municipio 13 - CAPITAL DE MIRANDA - TIMOTES
if ($_POST["elegido"]=='946') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO PIÑANGO">BARRIO PIÑANGO</option>
    <option value="BARRIO SAN RAFAEL">BARRIO SAN RAFAEL</option>
    <option value="CASERÍO AGUA BLANCA">CASERÍO AGUA Blanca</option>
    <option value="CASERÍO CASA DE TEJAS">CASERÍO CASA DE TEJAS</option>
    <option value="CASERÍO EL SALADO">CASERÍO EL SALADO</option>
    <option value="CASERÍO LA LAJITA">CASERÍO LA LAJITA</option>
    <option value="CASERÍO MESA CERRADA">CASERÍO MESA CERRADA</option>
    <option value="CASERÍO MESA DE MIJARÁ">CASERÍO MESA DE MIJARÁ</option>
    <option value="CASERÍO MUCUMBÁS">CASERÍO MUCUMBÁS</option>
    <option value="CASERÍO PIEDRA GORDA">CASERÍO PIEDRA GORDA</option>
    <option value="CASERÍO POTRERITO">CASERÍO POTRERITO</option>
    <option value="CASERÍO PUENTE REAL">CASERÍO PUENTE REAL</option>
    <option value="CASERÍO PUERTO ESCONDIDO">CASERÍO PUERTO ESCONDIDO</option>
    <option value="CASERÍO SANTA CRUZ DE MEJARÁ">CASERÍO SANTA CRUZ DE MEJARÁ</option>
    <option value="CENTRO TIMOTES">CENTRO TIMOTES</option>
    <option value="SECTOR ALTO DE MUCUYUPU">SECTOR ALTO DE MUCUYUPU</option>
    <option value="SECTOR BAILÓN">SECTOR BAILÓN</option>
    <option value="SECTOR CHAMARÚ">SECTOR CHAMARÚ</option>
    <option value="SECTOR EL GARABATO">SECTOR EL GARABATO</option>
    <option value="SECTOR EL HATICO">SECTOR EL HATICO</option>
    <option value="SECTOR EL HATO">SECTOR EL HATO</option>
    <option value="SECTOR EL PARAMITO">SECTOR EL PARAMITO</option>
    <option value="SECTOR EL RINCÓN">SECTOR EL RINCÓN</option>
    <option value="SECTOR LA CAÑADA">SECTOR LA CAÑADA</option>
    <option value="SECTOR LA CUICA">SECTOR LA CUICA</option>
    <option value="SECTOR LA JOYA">SECTOR LA JOYA</option>
    <option value="SECTOR LAS MESAS DE SAN JOSÉ">SECTOR LAS MESAS DE SAN JOSÉ</option>
    <option value="SECTOR LAS PORQUERAS">SECTOR LAS PORQUERAS</option>
    <option value="SECTOR LAS TARAYESITAS">SECTOR LAS TARAYESITAS</option>
    <option value="SECTOR LLANO ALTO">SECTOR LLANO ALTO</option>
    <option value="SECTOR LLANO GRANDE">SECTOR LLANO GRANDE</option>
    <option value="SECTOR MESA CERRADA">SECTOR MESA CERRADA</option>
    <option value="SECTOR MUCUSE">SECTOR MUCUSE</option>
    <option value="SECTOR PIEDRA GORDA">SECTOR PIEDRA GORDA</option>
    <option value="SECTOR SAN ANTONIO">SECTOR SAN ANTONIO</option>
    <option value="SECTOR SANTA CRUZ DE TAFALLEZ">SECTOR SANTA CRUZ DE TAFALLEZ</option>
    <option value="SECTOR TAFALLES">SECTOR TAFALLES</option>
    <option value="URBANIZACIÓN CHIJÓS">URBANIZACIÓN CHIJÓS</option>
    <option value="URBANIZACIÓN KENNEDY">URBANIZACIÓN KENNEDY</option>
    <option value="URBANIZACIÓN LOCA LUZ CARABALLO">URBANIZACIÓN LOCA LUZ CARABALLO</option>
    <option value="URBANIZACIÓN LOS LLANITOS">URBANIZACIÓN LOS LLANITOS</option>
    <option value="URBANIZACIÓN TIMOTES">URBANIZACIÓN TIMOTES</option>
    ';    
}
// Parroquia 57 Municipio 14 - ELOY PAREDES
if ($_POST["elegido"]=='951') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO CRISTO REY">BARRIO CRISTO REY</option>
    <option value="BARRIO INAVIS">BARRIO INAVIS</option>
    <option value="BARRIO LOS LAURELES">BARRIO LOS LAURELES</option>
    <option value="BARRIO SAN JOSÉ">BARRIO SAN JOSÉ</option>
    <option value="CENTRO LOS GUAYABONES">CENTRO LOS GUAYABONES</option>
    <option value="SECTOR AVISPERO">SECTOR AVISPERO</option>
    <option value="SECTOR CAMPO RICO">SECTOR CAMPO RICO</option>
    <option value="SECTOR CAÑO ARAUCO">SECTOR CAÑO ARAUCO</option>
    <option value="SECTOR CAÑO ARENOSO">SECTOR CAÑO ARENOSO</option>
    <option value="SECTOR CAÑO AVISPERO">SECTOR CAÑO AVISPERO</option>
    <option value="SECTOR CAÑO OBISPO">SECTOR CAÑO OBISPO</option>
    <option value="SECTOR CAÑO SAPO">SECTOR CAÑO SAPO</option>
    <option value="SECTOR CAÑO TIGRE">SECTOR CAÑO TIGRE</option>
    <option value="SECTOR CAÑO ZANCUDO">SECTOR CAÑO ZANCUDO</option>
    <option value="SECTOR CAPAZÓN">SECTOR CAPAZÓN</option>
    <option value="SECTOR GUAYABONES">SECTOR GUAYABONES</option>
    <option value="SECTOR SANTA MARÍA">SECTOR SANTA MARÍA</option>
    <option value="SECTOR ZUMBADOR">SECTOR ZUMBADOR</option>
    ';    
}
    // Parroquia 58 Municipio 14 - SAN RAFAEL DE ALCÁZAR
if ($_POST["elegido"]=='952') {
$options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO DE SAN RAFAEL DE ALCÁZAR">CENTRO DE SAN RAFAEL DE ALCÁZAR</option>
    <option value="SECTOR CAÑO AZUL">SECTOR CAÑO AZUL</option>
    <option value="SECTOR GUACHIZÓN">SECTOR GUACHIZÓN</option>
    <option value="SECTOR MATA DE COCO">SECTOR MATA DE COCO</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    ';    
}
    // Parroquia 59 Municipio 14 CAPITAL OBISMO RAMOS DE LORA - SANTA ELENA DE ARENALES
if ($_POST["elegido"]=='950') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO SANTA ELENA DE ARENALES">CENTRO SANTA ELENA DE ARENALES</option>
    <option value="SECTOR CAÑO MORO">SECTOR CAÑO MORO</option>
    <option value="SECTOR CAPAZÓN ABAJO">SECTOR CAPAZÓN ABAJO</option>
    <option value="SECTOR CAPAZÓN ARRIBA">SECTOR CAPAZÓN ARRIBA</option>
    <option value="SECTOR COLINAS DEL ESTE">SECTOR COLINAS DEL ESTE</option>
    <option value="SECTOR LA PUEBLITA">SECTOR LA PUEBLITA</option>
    <option value="SECTOR RÍO PERDIDO">SECTOR RÍO PERDIDO</option>
    ';    
}
    // Parroquia 60 Municipio 15 - SANTA MARÍA DE CAPARO
if ($_POST["elegido"]=='953') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO DE SANTA MARÍA DE CAPARO">CENTRO DE SANTA MARÍA DE CAPARO</option>
    <option value="SECTOR EL VEGÓN">SECTOR EL VEGÓN</option>
    <option value="Sector LA FLORIDA">SECTOR LA FLORIDA</option>
    ';    
}
	// Parroquia 61 Municipio 16 - PUEBLO LLANO
if ($_POST["elegido"]=='954') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CASERÍO AGUA REGADA">CASERÍO AGUA REGADA</option>
    <option value="CASERÍO ALTOS EL ARENAL">CASERÍO ALTOS EL ARENAL</option>
    <option value="CASERÍO CAJA DE AGUA">CASERÍO CAJA DE AGUA</option>
    <option value="CASERÍO CERRO SECO">CASERÍO CERRO SECO</option>
    <option value="CASERÍO CHINO">CASERÍO CHINO</option>
    <option value="CASERÍO CHINO ABAJO">CASERÍO CHINO ABAJO</option>
    <option value="CASERÍO CHINO ALTO">CASERÍO CHINO ALTO</option>
    <option value="CASERÍO EL ARBOLITO">CASERÍO EL ARBOLITO</option>
    <option value="CASERÍO EL BAÑO">CASERÍO EL BAÑO</option>
    <option value="CASERÍO EL CEDRO">CASERÍO EL CEDRO</option>
    <option value="CASERÍO EL CONEJO">CASERÍO EL CONEJO</option>
    <option value="CASERÍO EL DIABLO">CASERÍO EL DIABLO</option>
    <option value="CASERÍO EL POTRERITO">CASERÍO EL POTRERITO</option>
    <option value="CASERÍO EL POZO">CASERÍO EL POZO</option>
    <option value="CASERÍO EL VOLCÁN">CASERÍO EL VOLCÁN</option>
    <option value="CASERÍO GUZMÁN">CASERÍO GUZMÁN</option>
    <option value="CASERÍO LA BECERRA">CASERÍO LA BECERRA</option>
    <option value="CASERÍO LA CAPELLANÍA">CASERÍO LA CAPELLANÍA</option>
    <option value="CASERÍO LA CRUZ">CASERÍO LA CRUZ</option>
    <option value="CASERÍO LA CULATA">CASERÍO LA CULATA</option>
    <option value="CASERÍO LA HIGUERA">CASERÍO LA HIGUERA</option>
    <option value="CASERÍO LA LAGUNA">CASERÍO LA LAGUNA</option>
    <option value="CASERÍO LA RANCHERA">CASERÍO LA RANCHERA</option>
    <option value="CASERÍO LA VEGA">CASERÍO LA VEGA</option>
    <option value="CASERÍO LAS AGUJAS">CASERÍO LAS AGUJAS</option>
    <option value="CASERÍO LAS AGUJITAS">CASERÍO LAS AGUJITAS</option>
    <option value="CASERÍO LAS CUEVAS">CASERÍO LAS CUEVAS</option>
    <option value="CASERÍO LAS CUEVAS DE LACA">CASERÍO LAS CUEVAS DE LACA</option>
    <option value="CASERÍO LAS MALVINAS">CASERÍO LAS MALVINAS</option>
    <option value="CASERÍO LAYMATOS">CASERÍO LAYMATOS</option>
    <option value="CASERÍO LLANO ALTO">CASERÍO LLANO ALTO</option>
    <option value="CASERÍO LLANO DE AMPARO">CASERÍO LLANO DE AMPARO</option>
    <option value="CASERÍO LLANO GRANDE">CASERÍO LLANO GRANDE</option>
    <option value="CASERÍO LOS ENCERRADOS">CASERÍO LOS ENCERRADOS</option>
    <option value="CASERÍO LOS PINOS">CASERÍO LOS PINOS</option>
    <option value="CASERÍO MESA DE CHINO">CASERÍO MESA DE CHINO</option>
    <option value="CASERÍO MUPATE">CASERÍO MUPATE</option>
    <option value="CASERÍO SOBRE CHINO">CASERÍO SOBRE CHINO</option>
    <option value="CENTRO PUEBLO LLANO">CENTRO PUEBLO LLANO</option>
    <option value="SECTOR AGUAS DE LAS FLORES">SECTOR AGUAS DE LAS FLORES</option>
    <option value="SECTOR EL ARBOLITO">SECTOR EL ARBOLITO</option>
    <option value="SECTOR EL CANUTAL">SECTOR EL CANUTAL</option>
    <option value="SECTOR LA CULATA">SECTOR LA CULATA</option>
    <option value="SECTOR LA PADILLA">SECTOR LA PADILLA</option>
    <option value="SECTOR MIYOY">SECTOR MIYOY</option>
    <option value="SECTOR MUTUS">SECTOR MUTUS</option>
    <option value="URBANIZACIÓN ALTO MIYOI">URBANIZACIÓN ALTO MIYOI</option>
    <option value="URBANIZACIÓN LA TRINIDAD">URBANIZACIÓN LA TRINIDAD</option>
    <option value="URBANIZACIÓN LOURDES">URBANIZACIÓN LOURDES</option>
    <option value="URBANIZACIÓN PRADOS DE MARÍA">URBANIZACIÓN PRADOS DE MARÍA</option>
    ';    
}
// Parroquia 62 Municipio 17 - CACUTE
if ($_POST["elegido"]=='956') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR LOS ALEROS">SECTOR LOS ALEROS</option>
    ';    
}
// Parroquia 63 Municipio 17 - LA TOMA
if ($_POST["elegido"]=='957') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR LA TOMA">SECTOR LA TOMA</option>
    ';    
}
// Parroquia 64 Municipio 17 - CAPITAL RANGEL - MUCUCHIES
if ($_POST["elegido"]=='955') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR EL ROYAL">SECTOR EL ROYAL</option>
    <option value="SECTOR EL VERGEL">SECTOR EL VERGEL</option>
    <option value="SECTOR GAVIDIA">SECTOR GAVIDIA</option>
    <option value="SECTOR MI CARACHE">SECTOR MI CARACHE</option>
    <option value="SECTOR MIFAFTI">SECTOR MIFAFTI</option>
    <option value="SECTOR MOCAO">SECTOR MOCAO</option>
    <option value="SECTOR SAN JUDAS TADEO">SECTOR SAN JUDAS TADEO</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    <option value="URBANIZACIÓN CORPOANDES">URBANIZACIÓN CORPOANDES</option>
    <option value="URBANIZACIÓN DOÑA LULA">URBANIZACIÓN DOÑA LULA</option>
    <option value="URBANIZACIÓN LA VEGA">URBANIZACIÓN LA VEGA</option>
    <option value="URBANIZACIÓN LAS COLINA">URBANIZACIÓN LAS COLINA</option>
    <option value="URBANIZACIÓN SAN FRANCISCO">URBANIZACIÓN SAN FRANCISCO</option>
    <option value="URBANIZACIÓN SANTA EDUVIGIS">URBANIZACIÓN SANTA EDUVIGIS</option>
    <option value="CENTRO MUCUCHÍES">CENTRO MUCUCHÍES</option>
    <option value="SECTOR EL PICADERO">SECTOR EL PICADERO</option> 
    ';    
}
// Parroquia 65 Municipio 17 - MUCURUBÁ
if ($_POST["elegido"]=='958') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="CENTRO MUCURUBÁ">CENTRO MUCURUBÁ</option>
	<option value="SECTOR ESCAGÜEY">SECTOR ESCAGÜEy</option>
	<option value="SECTOR INDEPENDENCIA">SECTOR INDEPENDENCIA</option>
	<option value="SECTOR LA RANCHERÍA">SECTOR LA RANCHERÍA</option>
    <option value="SECTOR LA VARIANTE">SECTOR LA VARIANTE</option> 
    ';    
}
// Parroquia 66 Municipio 17 - SAN RAFAEL DE MUCUCHÍES
if ($_POST["elegido"]=='959') {
    $options= '
	<option value="0">-SELECCIONE UN SECTORA-</option>
	<option value="SECTOR APARTADEROS">SECTOR APARTADEROS</option>
	<option value="SECTOR CASA DE GOBIERNO">SECTOR CASA DE GOBIERNO</option>
	<option value="SECTOR EL PEDREGAL">SECTOR EL PEDREGAL</option>
	<option value="SECTOR LA ASONADA">SECTOR LA ASONADA</option>
    <option value="SECTOR LLANO DEL HATO">SECTOR LLANO DEL HATO</option>
    <option value="SECTOR PUERTO NUEVO">SECTOR PUERTO NUEVO</option>
    <option value="SECTOR SAN ISIDRO">SECTOR SAN ISIDRO</option> 
    ';    
}
// Parroquia 67 Municipio 18 - CAPITAL DE RIVAS DÁVILA - BAILADORES
if ($_POST["elegido"]=='960') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="ALDEA MARIÑO">ALDEA MARIÑO</option>
    <option value="ALDEA SAN PABLO">ALDEA SAN PABLO</option>
    <option value="BARRIO LAS DELICIAS">BARRIO LAS DELICIAS</option>
    <option value="BARRIO MATADERO">BARRIO MATADERO</option>
    <option value="BARRIO QUEBRADA ARRIBA">BARRIO QUEBRADA ARRIBA</option>
    <option value="CENTRO BAILADORES">CENTRO BAILADORES</option>
    <option value="SECTOR AGUA AZUL">SECTOR AGUA AZUL</option>
    <option value="SECTOR AGUA CALIENTE">SECTOR AGUA CALIENTE</option>
    <option value="SECTOR BARROTES">SECTOR BARROTES</option>
    <option value="SECTOR BELLO CAMPO">SECTOR BELLO CAMPO</option>
    <option value="SECTOR BODOQUE">SECTOR BODOQUE</option>
    <option value="SECTOR BORDE SECO">SECTOR BORDE SECO</option>
    <option value="SECTOR BUENA VISTA">SECTOR BUENA VISTA</option>
    <option value="SECTOR CAPACHO">SECTOR CAPACHO</option>
    <option value="SECTOR CAPADOR">SECTOR CAPADOR</option>
    <option value="SECTOR COLINAS DE BODOQUE">SECTOR COLINAS DE BODOQUE</option>
    <option value="SECTOR DE LOS ÁLVAREZ">SECTOR DE LOS ÁLVAREZ</option>
    <option value="SECTOR DON LUIS BARÓN">SECTOR DON LUIS BARÓN</option>
    <option value="SECTOR EL CAMACURO">SECTOR EL CAMACURO</option>
    <option value="SECTOR EL CHARCO">SECTOR EL CHARCO</option>
    <option value="SECTOR EL DIQUE">SECTOR EL DIQUE</option>
    <option value="SECTOR EL HATO">SECTOR EL HATO</option>
    <option value="SECTOR EL PRIMOR">SECTOR EL PRIMOR</option>
    <option value="SECTOR EL PUENTE">SECTOR EL PUENTE</option>
    <option value="SECTOR EL RINCÓN">SECTOR EL RINCÓN</option>
    <option value="SECTOR EL RINCÓN DE LAS COLINAS">SECTOR EL RINCÓN DE LAS COLINAS</option>
    <option value="SECTOR EL RINCÓN DE LOS ÁLVAREZ">SECTOR EL RINCÓN DE LOS ÁLVAREZ</option>
    <option value="SECTOR EL RINCONCITO">SECTOR EL RINCONCITO</option>
    <option value="SECTOR EL TEJAR">SECTOR EL TEJAR</option>
    <option value="SECTOR GUARAPAO">SECTOR GUARAPAO</option>
    <option value="SECTOR LA CAPELLANÍA">SECTOR LA CAPELLANÍA</option>
    <option value="SECTOR LA CEBADA">SECTOR LA CEBADA</option>
    <option value="SECTOR LA MARINA">SECTOR LA MARINA</option>
    <option value="SECTOR LA MESA">SECTOR LA MESA</option>
    <option value="SECTOR LA MESA DE GUERRERO">SECTOR LA MESA DE GUERRERO</option>
    <option value="SECTOR LA ROSA">SECTOR LA ROSA</option>
    <option value="SECTOR LA VEGA">SECTOR LA VEGA</option>
    <option value="SECTOR LA VEGA DE BODOQUE">SECTOR LA VEGA DE BODOQUE</option>
    <option value="SECTOR LA VEGA DE SAN PABLO">SECTOR LA VEGA DE SAN PABLO</option>
    <option value="SECTOR LLANO GRANDE">SECTOR LLANO GRANDE</option>
    <option value="SECTOR LOMA DE SAN PABLO">SECTOR LOMA DE SAN PABLO</option>
    <option value="SECTOR LOS BARBECHOS">SECTOR LOS BARBECHOS</option>
    <option value="SECTOR LOS ESPINOS">SECTOR LOS ESPINOS</option>
    <option value="SECTOR LOS RASTROJOS">SECTOR LOS RASTROJOS</option>
    <option value="SECTOR MESA DE ADRIÁN">SECTOR MESA DE ADRIÁn</option>
    <option value="SECTOR MESA DE GUERRERO">SECTOR MESA DE GUERRERO</option>
    <option value="SECTOR MESA LA LAGUNA">SECTOR MESA LA LAGUNA</option>
    <option value="SECTOR MONTE ARRIBA">SECTOR MONTE ARRIBA</option>
    <option value="SECTOR NIETO">SECTOR NIETO</option>
    <option value="SECTOR OTRA BANDA">SECTOR OTRA BANDA</option>
    <option value="SECTOR PÁRAMO DE MARIÑO">SECTOR PÁRAMO DE MARIÑO</option>
    <option value="SECTOR QUEBRADA CHINITA">SECTOR QUEBRADA CHINITA</option>
    <option value="SECTOR QUEBRADA SECA">SECTOR QUEBRADA SECA</option>
    <option value="SECTOR RINCÓN DE SAN PABLO">SECTOR RINCÓN DE SAN PABLO</option>
    <option value="SECTOR RINCONCITO">SECTOR RINCONCITO</option>
    <option value="SECTOR RÍO ARRIBA">SECTOR RÍO ARRIBA</option>
    <option value="SECTOR SANTA ANA">SECTOR SANTA ANA</option>
    <option value="URBANIZACIÓN BAILADORES">URBANIZACIÓN BAILADORES</option>
    <option value="URBANIZACIÓN EFRAÍN MARET">URBANIZACIÓN EFRAÍN MARET</option> 
    ';    
}
// Parroquia 68 Municipio 18 - GERÓNIMO MALDONADO
if ($_POST["elegido"]=='961') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="ALDEA LAS PLAYITAS">ALDEA LAS PLAYITAS</option>
    <option value="BARRIO 23 DE ENERO">BARRIO 23 DE ENERO</option>
    <option value="CENTRO LA PLAYA">CENTRO LA PLAYA</option>
    <option value="SECTOR EL POTRERO">SECTOR EL POTRERO</option>
    <option value="SECTOR LA BARRANCA">SECTOR LA BARRANCA</option>
    <option value="SECTOR LA LAGUNITA">SECTOR LA LAGUNITA</option>
    <option value="SECTOR LAS TAPIAS">SECTOR LAS TAPIAS</option>
    <option value="SECTOR LOS BARBADOS">SECTOR LOS BARBADOS</option>
    <option value="SECTOR MI PEQUEÑA VILLA">SECTOR MI PEQUEÑA VILLA</option>
    <option value="SECTOR NARANJAL">SECTOR NARANJAL</option>
    <option value="SECTOR RINCÓN DE LA LAGUNA">SECTOR RINCÓN DE LA LAGUNA</option>
    <option value="SECTOR TAPÓN">SECTOR TAPÓN</option>
    <option value="URBANIZACIÓN LAS DELICIAS">URBANIZACIÓN LAS DELICIAS</option>
    ';    
}
// Parroquia 69 Municipio 19 - TABAY
if ($_POST["elegido"]=='962') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CASERÍO AYACUCHO">CASERÍO AYACUCHO</option>
    <option value="CASERÍO LOMAS DEL PUEBLO">CASERÍO LOMAS DEL PUEBLO</option>
    <option value="CASERÍO MUCUNUTAN">CASERÍO MUCUNUTAN</option>
    <option value="CASERÍO MUCUY BAJA">CASERÍO MUCUY BAJA</option>
    <option value="CENTRO TABAY">CENTRO TABAY</option>
    <option value="SECTOR AGUA CALIENTE">SECTOR AGUA CALIENTE</option>
    <option value="SECTOR CABAÑAS LUGAREÑA">SECTOR CABAÑAS LUGAREÑA</option>
    <option value="SECTOR CABAÑAS MUCURATAY">SECTOR CABAÑAS MUCURATAY</option>
    <option value="SECTOR CAPILLA LAS MERCEDES">SECTOR CAPILLA LAS MERCEDES</option>
    <option value="SECTOR EL MESÓN">SECTOR EL MESÓN</option>
    <option value="SECTOR EL ROSAL">SECTOR EL ROSAL</option>
    <option value="SECTOR EL ZAMURO">SECTOR EL ZAMURO</option>
    <option value="SECTOR LA CEIBITA">SECTOR LA CEIBITA</option>
    <option value="SECTOR LA PERICA">SECTOR LA PERICA</option>
    <option value="SECTOR LA PLAYA">SECTOR LA PLAYA</option>
    <option value="SECTOR LA PODEROSA">SECTOR LA PODEROSA</option>
    <option value="SECTOR LA QUEBRADITA">SECTOR LA QUEBRADITA</option>
    <option value="SECTOR LAS MARÍAS">SECTOR LAS MARÍAS</option>
    <option value="SECTOR LOS LLANOS DE TABAY">SECTOR LOS LLANOS DE TABAY</option>
    <option value="SECTOR MUCUTAN">SECTOR MUCUTAN</option>
    <option value="SECTOR MUCUY BAJA">SECTOR MUCUY BAJA</option>
    <option value="SECTOR SAN JERÓNIMO">SECTOR SAN JERÓNIMO</option>
    <option value="SECTOR SAN RAFAEL DE TABAY">SECTOR SAN RAFAEL DE TABAY</option>
    <option value="SECTOR VISTA ALEGRE">SECTOR VISTA ALEGRE</option>
    <option value="URBANIZACIÓN DON PEDRO">URBANIZACIÓN DON PEDRO</option>
    ';    
}
// Parroquia 70 Municipio 20 - CHIGUARÁ
if ($_POST["elegido"]=='964') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CASERÍO EL ANÍS">CASERÍO EL ANÍS</option>
    <option value="CASERÍO EL TEJAR">CASERÍO EL TEJAR</option>
    <option value="CASERÍO LA PLAYITA">CASERÍO LA PLAYITA</option>
    <option value="CASERÍO LOS RURALES">CASERÍO LOS RURALES</option>
    <option value="CASERÍO PUEBLO NUEVO">CASERÍO PUEBLO NUEVO</option>
    <option value="CASERÍO RICAUTE">CASERÍO RICAUTE</option>
    <option value="CASERÍO SAN ANTONIO">CASERÍO SAN ANTONIO</option>
    <option value="CENTRO CHIGUARÁ">CENTRO CHIGUARÁ</option>
    <option value="SECTOR EL CACIQUE">SECTOR EL CACIQUE</option>
    <option value="SECTOR EL FILO">SECTOR EL FILO</option>
    <option value="SECTOR EL VERDE">SECTOR EL VERDE</option>
    <option value="SECTOR MONTOYA">SECTOR MONTOYA</option>
    <option value="SECTOR SAN JUANITO">SECTOR SAN JUANITO</option>
    ';    
}	
// Parroquia 71 Municipio 20 - ESTÁNQUES
if ($_POST["elegido"]=='965') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO ESTÁNQUEZ">CENTRO ESTÁNQUEZ</option>
    <option value="SECTOR EL HATO">SECTOR EL HATO</option>
    <option value="SECTOR EL JOQUE">SECTOR EL JOQUE</option>
    <option value="SECTOR LAS LABRANZAS">SECTOR LAS LABRANZAS</option>
    <option value="SECTOR MOCOCHOPO">SECTOR MOCOCHOPO</option>
    <option value="SECTOR QUIRORÁ">SECTOR QUIRORÁ</option>
    <option value="SECTOR SAN ANTONIO">SECTOR SAN ANTONIO</option>
    <option value="SECTOR SAN PABLO">SECTOR SAN PABLO</option>
    <option value="SECTOR SAN PABLO ARRIBA">SECTOR SAN PABLO ARRIBA</option>
    ';    
}	
// Parroquia 72 Municipio 20 - CAPITAL SUCRE - LAGUNILLAS
if ($_POST["elegido"]=='963') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR PUEBLO VIEJO">SECTOR PUEBLO VIEJO</option>
    <option value="SECTOR PUNTA DE MOLINO">SECTOR PUNTA DE MOLINO</option>
    <option value="SECTOR QUINANOQUE">SECTOR QUINANOQUE</option>
    <option value="SECTOR SAN BENITO">SECTOR SAN BENITO</option>
    <option value="SECTOR SAN JUAN">SECTOR SAN JUAN</option>
    <option value="SECTOR SAN MARTÍN">SECTOR SAN MARTÍN</option>
    <option value="SECTOR TRAPICHE RANCHO GRANDE">SECTOR TRAPICHE RANCHO GRANDE</option>
    <option value="BARRIO SAN MIGUEL">BARRIO SAN MIGUEL</option>
    <option value="CASERÍO LOS UVITOS">CASERÍO LOS UVITOS</option>
    <option value="CENTRO LAGUNILLA">CENTRO LAGUNILLA</option>
    <option value="CONJUNTO RESIDENCIAL URAO">CONJUNTO RESIDENCIAL URAO</option>
    <option value="SECTOR AGUA DE URAO">SECTOR AGUA DE URAO</option>
    <option value="SECTOR BELÉN">SECTOR BELÉN</option>
    <option value="SECTOR CALLEJÓN DE LA VIEJAS">SECTOR CALLEJÓN DE LA VIEJAS</option>
    <option value="SECTOR CASA BONITA">SECTOR CASA BONITA</option>
    <option value="SECTOR CASAS">SECTOR CASAS</option>
    <option value="SECTOR EL COROZO SEGUNDA ENTRADA">SECTOR EL COROZO SEGUNDA Entrada</option>
    <option value="SECTOR EL MOLINO">SECTOR EL MOLINO</option>
    <option value="SECTOR LA ALEGRÍA">SECTOR LA ALEGRÍA</option>
    <option value="SECTOR LA CALERA">SECTOR LA CALERA</option>
    <option value="SECTOR LA CORDILLERA">SECTOR LA CORDILLERA</option>
    <option value="SECTOR LA HOYADA">SECTOR LA HOYADA</option>
    <option value="SECTOR LA HOYADA DE LOS CARACOLES">SECTOR LA HOYADA DE LOS CARACOLES</option>
    <option value="SECTOR LA HUERTA">SECTOR LA HUERTA</option>
    <option value="SECTOR LA JOYA">SECTOR LA JOYA</option>
    <option value="SECTOR LA PUNTA">SECTOR LA PUNTA</option>
    <option value="SECTOR LA TRINCHERAS">SECTOR LA TRINCHERAS</option>
    <option value="SECTOR LA VUELTA">SECTOR LA VUELTA</option>
    <option value="SECTOR LLANO SECO">SECTOR LLANO SECO</option>
    <option value="SECTOR LOMA DE COROZO">SECTOR LOMA DE COROZO</option>
    <option value="SECTOR LOMA DE PIEDRA">SECTOR LOMA DE PIEDRA</option>
    <option value="SECTOR LOS ARAQUES">SECTOR LOS ARAQUES</option>
    <option value="SECTOR LOS AZULES">SECTOR LOS AZULES</option>
    <option value="SECTOR LOS AZULITOS">SECTOR LOS AZULITOS</option>
    <option value="SECTOR LOS CUROS">SECTOR LOS CUROS</option>
    <option value="SECTOR LOS LLANITOS">SECTOR LOS LLANITOS</option>
    <option value="SECTOR MOCOYÓN">SECTOR MOCOYÓN</option>
    <option value="SECTOR MUCUMBO">SECTOR MUCUMBO</option>
    <option value="SECTOR MUCUMI">SECTOR MUCUMI</option>
    <option value="SECTOR MUCUMI BAJO">SECTOR MUCUMI BAJO</option>
    <option value="SECTOR PUEBLO NUEVO">SECTOR PUEBLO NUEVO</option> 
    ';    
}
	// Parroquia 73 Municipio 20 - LA TRAMPA
if ($_POST["elegido"]=='966') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO LA TRAMPA">CENTRO LA TRAMPA</option>
    <option value="SECTOR EL CACIQUE">SECTOR EL CACIQUE</option>
    <option value="SECTOR EL CAMBUR">SECTOR EL CAMBUR</option>
    <option value="SECTOR LA SABANA">SECTOR LA SABANA</option>
    ';    
}	
    // Parroquia 74 Municipio 20 - PUEBLO NUEVO DEL SUR
if ($_POST["elegido"]=='967') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO PUEBLO NUEVO DEL SUR">CENTRO PUEBLO NUEVO DEL SUR</option>
    <option value="SECTOR EL CAMBUR">SECTOR EL CAMBUR</option>
    <option value="SECTOR EL HATICO">SECTOR EL HATICO</option>
    <option value="SECTOR LA AGUADA">SECTOR LA AGUADA</option>
    <option value="SECTOR LA HORCAZ">SECTOR LA HORCAZ</option>
    <option value="SECTOR LA LAGUNA">SECTOR LA LAGUNA</option>
    <option value="SECTOR LA MAGDALENA">SECTOR LA MAGDALENA</option>
    <option value="SECTOR LA QUEBRADA">SECTOR LA QUEBRADA</option>
    <option value="SECTOR MACIGUAL">SECTOR MACIGUAL</option>
    <option value="SECTOR MUCUNDÓ">SECTOR MUCUNDÓ</option>
    <option value="SECTOR MUCUQUÍ">SECTOR MUCUQUÍ</option>
    <option value="SECTOR PUEBLO NUEVO">SECTOR PUEBLO NUEVO</option>
    <option value="SECTOR PUENTE REAL">SECTOR PUENTE REAL</option>
    ';    
}	
    // Parroquia 75 Municipio 20 - SAN JUAN
if ($_POST["elegido"]=='968') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO EL COROZO">BARRIO EL COROZO</option>
    <option value="BARRIO MUCUMI">BARRIO MUCUMI</option>
    <option value="CENTRO SAN JUAN">CENTRO SAN JUAN</option>
    <option value="CONJUNTO RESIDENCIAL VILLA LIBERTAD">CONJUNTO RESIDENCIAL VILLA LIBERTAD</option>
    <option value="SECTOR EL ESTANQUILLO">SECTOR EL ESTANQUILLO</option>
    <option value="SECTOR LOS CARACOLES">SECTOR LOS CARACOLES</option>
    <option value="URBANIZACIÓN EL CEMENTERIO">URBANIZACIÓN EL CEMENTERIO</option>
    <option value="URBANIZACIÓN ESTANQUILLO ALTO">URBANIZACIÓN ESTANQUILLO ALTO</option>
    <option value="URBANIZACIÓN ESTANQUILLO BAJO">URBANIZACIÓN ESTANQUILLO BAJO</option>
    <option value="URBANIZACIÓN ESTANQUILLO MEDIO">URBANIZACIÓN ESTANQUILLO MEDIO</option>
    <option value="URBANIZACIÓN INRREVI">URBANIZACIÓN INRREVI</option>
    <option value="URBANIZACIÓN LA PUERTA">URBANIZACIÓN LA PUERTA</option>
    <option value="URBANIZACIÓN LA VARIANTE">URBANIZACIÓN LA VARIANTE</option>
    <option value="URBANIZACIÓN PIEDRAS NEGRAS">URBANIZACIÓN PIEDRAS NEGRAS</option>
    <option value="URBANIZACIÓN PUENTE CARABOBO">URBANIZACIÓN PUENTE CARABOBO</option>
    ';    
}
    // Parroquia 76 Municipio 21 - EL AMPARO
if ($_POST["elegido"]=='969') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO AMPARO ">CENTRO AMPARO </option>
    ';    
}
    // Parroquia 77 Municipio 21 - EL LLANO
if ($_POST["elegido"]=='970') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO EL ROSAL">BARRIO EL ROSAL</option>
    <option value="BARRIO LOS LIMONES">BARRIO LOS LIMONES</option>
    <option value="BARRIO LOS NARANJOS">BARRIO LOS NARANJOS</option>
    <option value="BARRIO SAN JOSÉ">BARRIO SAN JOSÉ</option>
    <option value="CASERÍO LA QUINTA">CASERÍO LA QUINTA</option>
    <option value="CENTRO EL LLANO">CENTRO EL LLANO</option>
    <option value="SECTOR BUSCATERA">SECTOR BUSCATERA</option>
    <option value="SECTOR CARRERA CUATRO">SECTOR CARRERA CUATRO</option>
    <option value="SECTOR CHIMBORAZO">SECTOR CHIMBORAZO</option>
    <option value="SECTOR COLISEO">SECTOR COLISEO</option>
    <option value="SECTOR CRISTO REY">SECTOR CRISTO REY</option>
    <option value="SECTOR EL PEÑÓN">SECTOR EL PEÑÓN</option>
    <option value="SECTOR EL VERDE">SECTOR EL VERDE</option>
    <option value="SECTOR EL VOLCÁN">SECTOR EL VOLCÁN</option>
    <option value="SECTOR GRANJA TACARICA">SECTOR GRANJA TACARICA</option>
    <option value="SECTOR JESÚS OBRERO">SECTOR JESÚS OBRERO</option>
    <option value="SECTOR LA COLINA">SECTOR LA COLINA</option>
    <option value="SECTOR LA GALERA">SECTOR LA GALERA</option>
    <option value="SECTOR LAS DELICIAS">SECTOR LAS DELICIAS</option>
    <option value="SECTOR LLANO ARRIBA">SECTOR LLANO ARRIBA</option>
    <option value="SECTOR LOS BAMBÚES">SECTOR LOS BAMBÚES</option>
    <option value="SECTOR MEDIA LAGUNA">SECTOR MEDIA LAGUNA</option>
    <option value="SECTOR NARANJAL">SECTOR NARANJAL</option>
    <option value="SECTOR PLAYA ARRIBA">SECTOR PLAYA ARRIBA</option>
    <option value="SECTOR PLAYA CENTRO">SECTOR PLAYA CENTRO</option>
    <option value="SECTOR QUEBRADA ARRIBA">SECTOR QUEBRADA ARRIBA</option>
    <option value="SECTOR REENCUENTRO">SECTOR REENCUENTRO</option>
    <option value="SECTOR SANTA INÉS">SECTOR SANTA INÉS</option>
    <option value="SECTOR TACARICA">SECTOR TACARICA</option>
    <option value="URBANIZACIÓN COLINAS DE DON TEO">URBANIZACIÓN COLINAS DE DON TEO</option>
    <option value="URBANIZACIÓN LOS EDUCADORES">URBANIZACIÓN LOS EDUCADORES</option>
    <option value="URBANIZACIÓN MOCUTÍES">URBANIZACIÓN MOCUTÍES</option>
    <option value="URBANIZACIÓN SIMÓN RODRÍGUEZ">URBANIZACIÓN SIMÓN RODRÍGUEZ</option>
    <option value="URBANIZACIÓN VISTA ALEGRE">URBANIZACIÓN VISTA ALEGRE</option>
    ';    
}	
    // Parroquia 78 Municipio 21 - SAN FRANCISCO
if ($_POST["elegido"]=='971') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="CENTRO SAN FRANCISCO">CENTRO SAN FRANCISCO</option>
    <option value="SECTOR CARICUEVA">SECTOR CARICUEVA</option>
    ';    
}	
    // Parroquia 79 Municipio 21 - TOVAR
if ($_POST["elegido"]=='972') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="BARRIO BICENTENARIO">BARRIO BICENTENARIO</option>
    <option value="BARRIO BRISAS DE MOCOTIES">BARRIO BRISAS DE MOCOTIEs</option>
    <option value="BARRIO BUENOS AIRES">BARRIO BUENOS AIRES</option>
    <option value="BARRIO EL AÑIL">BARRIO EL AÑIL</option>
    <option value="BARRIO GUMERSINDO ROJAS">BARRIO GUMERSINDO ROJAS</option>
    <option value="BARRIO LA VICTORIA">BARRIO LA VICTORIA</option>
    <option value="BARRIO LAS ACACIAS">BARRIO LAS ACACIAS</option>
    <option value="BARRIO SAN MARTÍN">BARRIO SAN MARTÍN</option>
    <option value="CASERÍO EL MAPOCAL">CASERÍO EL MAPOCAL</option>
    <option value="CASERÍO LA GRUTA">CASERÍO LA GRUTA</option>
    <option value="CENTRO TOVAR">CENTRO TOVAR</option>
    <option value="SECTOR BUENA VISTA">SECTOR BUENA VISTA</option>
    <option value="SECTOR BUSCATERA">SECTOR BUSCATERA</option>
    <option value="SECTOR CUCUCHICA">SECTOR CUCUCHICA</option>
    <option value="SECTOR EL CACIQUE">SECTOR EL CACIQUE</option>
    <option value="SECTOR EL COROZO">SECTOR EL COROZO</option>
    <option value="SECTOR EL PÁRAMITO">SECTOR EL PÁRAMITO</option>
    <option value="SECTOR EL PÁRAMO">SECTOR EL PÁRAMO</option>
    <option value="SECTOR EL PEÑÓN">SECTOR EL PEÑÓN</option>
    <option value="SECTOR LA CASCADA">SECTOR LA CASCADA</option>
    <option value="SECTOR LOMAS DE LA VIRGEN">SECTOR LOMAS DE LA VIRGEN</option>
    <option value="SECTOR MOCOTIES">SECTOR MOCOTIES</option>
    <option value="SECTOR MONSEÑOR MORENO">SECTOR MONSEÑOR MORENO</option>
    <option value="SECTOR PRIMERA">SECTOR PRIMERA</option>
    <option value="SECTOR QUEBRADA BLANCO">SECTOR QUEBRADA BLANCO</option>
    <option value="SECTOR SABANETA">SECTOR SABANETA</option>
    <option value="SECTOR SANTA BÁRBARA">SECTOR SANTA BÁRBARA</option>
    <option value="SECTOR SANTA ELENA">SECTOR SANTA ELENA</option>
    <option value="SECTOR VILLA DIGNIDAD">SECTOR VILLA DIGNIDAD</option>
    <option value="SECTOR WILFREDO OMAÑA">SECTOR WILFREDO OMAÑA</option>
    <option value="URBANIZACIÓN ALBERTO CARNAVALLI">URBANIZACIÓN ALBERTO CARNAVALLI</option>
    <option value="URBANIZACIÓN JOSÉ MARÍA VARGAS">URBANIZACIÓN JOSÉ MARÍA VARGAS</option>
    <option value="URBANIZACIÓN LA ARBOLEDA">URBANIZACIÓN LA ARBOLEDA</option>
    <option value="URBANIZACIÓN LA VEGA">URBANIZACIÓN LA VEGA</option>
    <option value="URBANIZACIÓN RÓMULO GALLEGOS">URBANIZACIÓN RÓMULO GALLEGOS</option>
    <option value="URBANIZACIÓN SANTA EDUVIGIS">URBANIZACIÓN SANTA EDUVIGIS</option>
    <option value="URBANIZACIÓN VARGAS">URBANIZACIÓN VARGAS</option>
    ';    
}
// Parroquia 80 Municipio 22 - INDEPENDECIA
if ($_POST["elegido"]=='974') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR AGUA AZUL">SECTOR AGUA AZUL</option>
    <option value="SECTOR AGUA BLANCA">SECTOR AGUA BLANCA</option>
    <option value="SECTOR CAMPO ALEGRE">SECTOR CAMPO ALEGRE</option>
    <option value="SECTOR CAÑO JESÚS">SECTOR CAÑO JESÚS</option>
    <option value="SECTOR EL PIONÍO">SECTOR EL PIONÍO</option>
    <option value="SECTOR EL QUEBRADÓN">SECTOR EL QUEBRADÓN</option>
    <option value="SECTOR LA CULEBRA">SECTOR LA CULEBRA</option>
    <option value="SECTOR MUYAPÁ">SECTOR MUYAPÁ</option>
    <option value="SECTOR PALMARITO">SECTOR PALMARITO</option>
    <option value="SECTOR SAN BENITO">SECTOR SAN BENITO</option>
    <option value="SECTOR SAN MATEO">SECTOR SAN MATEO</option>
    <option value="SECTOR SAN PEDRO">SECTOR SAN PEDRO</option>
    ';    
}
   	//  Parroquia 81 Municipio 22 - MARÍA DE LA CONCEPCIÓN PALACIOS BLANCO
if ($_POST["elegido"]=='975') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="CENTRO LAS VIRTUDES">CENTRO LAS VIRTUDES</option>
	<option value="SECTOR BRISAS DEL VALLE">SECTOR BRISAS DEL VALLE</option>
	<option value="SECTOR COLÓN">SECTOR COLÓN</option>
    ';    
}
	// Parroquia 82 Municipio 22 - CAPITAL TULIO FEBRES CORDERO - NUEVA BOLÍVIA
if ($_POST["elegido"]=='973') {
    $options= '
    <option value="0">-SELECCIONE UN SECTOR-</option>
    <option value="SECTOR BOBURES">SECTOR BOBURES</option>
    <option value="SECTOR CAJA SECA">SECTOR CAJA SECA</option>
    <option value="SECTOR CAÑO DE AGUA">SECTOR CAÑO DE AGUA</option>
    <option value="SECTOR CANTALOTODO">SECTOR CANTALOTODO</option>
    <option value="SECTOR CAPIÚ">SECTOR CAPIÚ</option>
    <option value="SECTOR CAPIÚ ABAJO">SECTOR CAPIÚ ABAJO</option>
    <option value="SECTOR CAPIÚ ARRIBA">SECTOR CAPIÚ ARRIBA</option>
    <option value="SECTOR EL BANCO">SECTOR EL BANCO</option>
    <option value="SECTOR EL BATEY">SECTOR EL BATEY</option>
    <option value="SECTOR EL PALMICHOSO">SECTOR EL PALMICHOSO</option>
    <option value="SECTOR GIBRALTAR">SECTOR GIBRALTAR</option>
    <option value="SECTOR GUARAMACO">SECTOR GUARAMACO</option>
    <option value="SECTOR JUAN DE LOS RÍOS">SECTOR JUAN DE LOS RÍOS</option>
    <option value="SECTOR LA ENCARNACIÓN">SECTOR LA ENCARNACIÓN</option>
    <option value="SECTOR LA GUAIRA">SECTOR LA GUAIRA</option>
    <option value="SECTOR LA TRINIDAD">SECTOR LA TRINIDAD</option>
    <option value="SECTOR LAS CARMELITAS">SECTOR LAS CARMELITAS</option>
    <option value="SECTOR LAS DOLORES">SECTOR LAS DOLORES</option>
    <option value="SECTOR MONTE ADENTRO">SECTOR MONTE ADENTRO</option>
    <option value="SECTOR NUEVA BOLIVIA">SECTOR NUEVA BOLIVIA</option>
    <option value="SECTOR PALO DE FLORES">SECTOR PALO DE FLORES</option>
    <option value="SECTOR PUERTO LAS MARÍAS">SECTOR PUERTO LAS MARÍAS</option>
    <option value="SECTOR QUEBRADA DE PIEDRA">SECTOR QUEBRADA DE PIEDRA</option>
    <option value="SECTOR SAN MIGUEL">SECTOR SAN MIGUEL</option>
    <option value="SECTOR SAN RAFAEL">SECTOR SAN RAFAEL</option>
    <option value="SECTOR SANTA ANA">SECTOR SANTA ANA</option>
    <option value="SECTOR SANTA CLARA">SECTOR SANTA CLARA</option>
    <option value="SECTOR SANTA CRUZ">SECTOR SANTA CRUZ</option>
    ';    
}
    // Parroquia 83 Municipio 22 - SANTA APOLONIA
if ($_POST["elegido"]=='976') {
    $options= '
	<option value="0">-SELECCIONE UN SECTOR-</option>
	<option value="CENTRO SANTA APOLONIA">CENTRO SANTA APOLONIA</option>
	';    
}
	// Parroquia 84 Municipio 23 - CAÑO EL TIGRE
if ($_POST["elegido"]=='978') {
    $options= '
    <option value="0">-SELECCIONE UNA PARROQUIA-</option>
    <option value="CENTRO CAÑO TIGRE">CENTRO CAÑO TIGRE</option>
    <option value="SECTOR ANTONIO MORENO">SECTOR ANTONIO MORENO</option>
    <option value="SECTOR CAMINO VIEJO EL IUTE KM. 1">SECTOR CAMINO VIEJO EL IUTE KM. 1</option>
    <option value="SECTOR CAÑO EL TIGRE PARTE BAJA">SECTOR CAÑO EL TIGRE PARTE BAJA</option>
    <option value="SECTOR CASA BLANCA">SECTOR CASA BLANCA</option>
    <option value="SECTOR EL BEJUQUERO">SECTOR EL BEJUQUERO</option>
    <option value="SECTOR EL BOSQUE">SECTOR EL BOSQUE</option>
    <option value="SECTOR LA LAPA">SECTOR LA LAPA</option>
    <option value="SECTOR LA YEE">SECTOR LA YEE</option>
    <option value="SECTOR LAS MALVINAS">SECTOR LAS MALVINAS</option>
    <option value="SECTOR MESA DEL ESCALANTE">SECTOR MESA DEL ESCALANTE</option>
    <option value="URBANISMO I Y II (KM. 6)">URBANISMO I Y II (KM. 6)</option>
    <option value="URBANIZACIÓN 12 DE OCTUBRE KM. 7">URBANIZACIÓN 12 DE OCTUBRE KM. 7</option>
    <option value="URBANIZACIÓN ALBERTO ADRIÁN KM. 6">URBANIZACIÓN ALBERTO ADRIÁN KM. 6</option>
    ';
}
    	// Parroquia 85 Municipio 23 - CATIPAL DE ZEA - ZEA
if ($_POST["elegido"]=='977') {
    $options= '
	<option value="0">-SELECCIONE UNA PARROQUIA-</option>
	<option value="BARRIO CUBA">BARRIO CUBA</option>
    <option value="CENTRO ZEA">CENTRO ZEA</option>
    <option value="SECTOR CANTARANA">SECTOR CANTARANA</option>
    <option value="SECTOR EL CALVARIO">SECTOR EL CALVARIO</option>
    <option value="SECTOR EL CALVO">SECTOR EL CALVO</option>
    <option value="SECTOR EL CEMENTERIO">SECTOR EL CEMENTERIO</option>
    <option value="SECTOR EL CHUCO">SECTOR EL CHUCO</option>
    <option value="SECTOR EL PLAYÓN">SECTOR EL PLAYÓN</option>
    <option value="SECTOR EL PUENTE">SECTOR EL PUENTE</option>
    <option value="SECTOR LA BOMBA">SECTOR LA BOMBA</option>
    <option value="SECTOR LA PASARELA">SECTOR LA PASARELA</option>
    <option value="SECTOR LA QUEBRADA">SECTOR LA QUEBRADA</option>
    <option value="SECTOR PADRE ANGULO">SECTOR PADRE ANGULO</option>
    <option value="SECTOR PALMIRA">SECTOR PALMIRA</option>
    <option value="SECTOR SAN JOSÉ">SECTOR SAN JOSÉ</option>
    <option value="SECTOR SAN LUIS">SECTOR SAN LUIS</option>
    <option value="SECTOR SAN MIGUEL">SECTOR SAN MIGUEL</option>
    <option value="SECTOR SAN PEDRO">SECTOR SAN PEDRO</option>
    <option value="SECTOR SANTA ANA">SECTOR SANTA ANA</option>
    <option value="SECTOR SANTA ANA ALTA">SECTOR SANTA ANA ALTA</option>
    <option value="SECTOR SANTA BÁRBARA">SECTOR SANTA BÁRBARA</option>
	';
}
echo $options;    
?>
