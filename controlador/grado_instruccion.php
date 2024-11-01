<?php
require_once 'config/conexion1.php';

    $html = "";

      // Consulta a la Base de Datos
      $result = pg_query($dbconn, "SELECT * FROM grado_instruccion");

      $html .= "<option>---</option>";

      if ($result) {

        if(pg_num_rows($result) > 0) {

          while($registro = pg_fetch_array($result)){

            $html .= "<option name='id' value='".$registro['0']."'>".$registro['1']."</option>";

          }

        }

      } else {

        echo "Error en la consulta: " . pg_error($dbconn);

      }

      echo $html;

    }

  }
?>