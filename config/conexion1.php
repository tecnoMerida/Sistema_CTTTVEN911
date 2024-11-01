<?php
// detalles de la conexion
$conn_string = "host=localhost port=5432 dbname=ven911 user=postgres password=123456789+ options='--client_encoding=UTF8'";

// establecemos una conexion con el servidor postgresSQL
$dbconn = pg_connect($conn_string) or die ("Errror al conectar con la base de datos! pg 1");

// Revisamos el estado de la conexion en caso de errores. 
if (!$dbconn) {
    echo "Error: No se ha podido conectar a la base de datos\n";
} else {
   // echo "Conexión exitosa\n";
}






/*
class gbd
{
    private $_host = HOST;
    private $_puerto = PORT;
    private $_usuario = USER;
    private $_clave = PASSWORD;
    private $_bd = DATABASE;
    private $_con;
    private $_consulta;

    public function __construct()
    {
        $this->conectar();
    }

    public function conectar()
    {
        try {
            $conn_string = "host=" . $this->_host . " port=" . $this->_puerto . " dbname="
                . $this->_bd . " user=" . $this->_usuario . " password=" . $this->_clave
                . " options='--client_encoding=UTF8'";
            $this->_con = pg_connect($conn_string) or die ("Error al conectar con la base de datos Obj");
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function consultar($sql)
    {
        $this->_consulta = pg_query($this->_con, "$sql");
        //var_dump(pg_fetch_array($this->_consulta));
    }

    public function num_filas()
    {
        return pg_num_rows($this->_consulta);
    }

    public function resultados()
    {        
        return pg_fetch_array($this->_consulta);
    }
}
*/
