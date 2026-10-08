<?php /********* Seleccion el estatus de la Solicitud ***********/

  // Consulta a la Base de Datos
   $consulta1 = pg_query($dbconn, "SELECT personal.cedula, personal.cargos_id, bienes.id, bienes.nombre_b, bienes.codigo_b FROM personal INNER JOIN bienes ON bienes.ubicacion_bienes_id = personal.cargos_id WHERE cedula = $cedula ORDER BY id");

      $reg1 = pg_fetch_assoc($consulta1);
         if (!$reg1) {
              echo "Ocurrió un error.\n";
              exit;
            }

        $total_rows1 = pg_num_rows($consulta1);


            if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 

                            echo '<div class="field item form-group">';
                            echo '<div class="col-md-12 col-sm-12 checkbox">';
                            echo '<label class="col-form-label col-md-7 col-sm-7  label-align">'.$reg1['nombre_b'].' ('.$reg1['codigo_b'].')</label>';
                            echo '<div class="col-md-2 col-sm-2">';
                            echo '<label> <input type="checkbox" class="flat" name="materiales_recibe[]" id="materiales_recibe" value="'.$reg1['id'].'" checked="" > </label>';
                            echo '<input type="hidden" name="materiales_id[]" id="" value="'.$reg1['id'].'" required />';

                            echo '</div></div></div>';
                              } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<td colspan='5' align='center' >no se obtuvieron resultados</td>"; 
                        }

                      ?>

                   <div><!-- //     Registro de fecha tomada por en sistema      //     -->
                         
                         <input type="hidden" name="personal_usuario" id="personal_usuario" value="<?php echo $cedula;?>">

                         <input type="hidden" name="grupo_personal_id" id="grupo_personal_id" value="<?php echo $registro1;?>" required />
                   </div>

                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-success">Guardar</button>
                    <button type='reset' class="btn btn-primary">Limpiar</button>
                        </div>
                      </div>
                    </div>