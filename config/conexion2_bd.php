<?php
//$servidor= "localhost";
$conexion2 = mysqli_connect("192.168.2.252", "sistema1", "sistema12021") or trigger_error(mysqli_error(), E_USER_ERROR);
//buscar como setear conexion para utf-8
mysqli_select_db($conexion2, "911a2021");


$mysql = mysqli_connect(HOSTMYSQL, USERMYSQL, PASSWORDMYSQL, DATABASEMYSQL) or die ("Error de conexion");
if (mysqli_connect_errno($mysql) <> 0) {
	echo "Existe un error ";
	echo "Nro.: " . mysqli_connect_errno() . " ";
	echo "Mensaje: " . mysqli_connect_error() . " ";
	//exit();
} else {
	//		echo "conexion exitosa";	
}
?>
