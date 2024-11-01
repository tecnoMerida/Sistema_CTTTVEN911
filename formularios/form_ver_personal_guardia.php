            <?php
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////


                          $result = pg_query($dbconn, "SELECT * FROM public.personal_datos WHERE personal_grupos_guardia_id = $id");
                          if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          
                              while($reg=pg_fetch_array($result))
                              { 

            ?>

                  <div class="field item form-group">
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"  type="hidden" value="<?php echo $id; ?>" name="id" />
                      </div>
                    </div>
            <?php
                  $supervisor = $reg['personal_cedula_sup'];
                  $result_personal = pg_query("SELECT * FROM public.personal WHERE cedula = $supervisor"); 
                  $reg_personal = pg_fetch_array($result_personal);                               
            ?>
                    <h2 class="StepTitle col-6 col-6">Supervisores</h2>
                    <div class="ln_solid"></div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Supervisor</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_personal['p_nombre']); echo ' '; echo strtoupper($reg_personal['p_apellido']);  ?>" name="" placeholder="Grupo de Guardia" readonly />
                      </div>
                    </div>
            <?php
                  $auxiliar = $reg['personal_cedula_aux'];
                  $aux = pg_query("SELECT * FROM public.personal WHERE cedula = $auxiliar"); 
                  $reg_aux = pg_fetch_array($aux);                               
            ?>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Auxiliar</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_aux['p_nombre']); echo ' '; echo strtoupper($reg_aux['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                    <h2 class="StepTitle">Operadores</h2>
                    <div class="ln_solid"></div>
            <?php
                  $op1 = $reg['personal_cedula_op1'];
                  $result_op1 = pg_query("SELECT * FROM public.personal WHERE cedula = $op1"); 
                  $reg_op1 = pg_fetch_array($result_op1);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Operador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_op1['p_nombre']); echo ' '; echo strtoupper($reg_op1['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $op2 = $reg['personal_cedula_op2'];
                  $result_op2 = pg_query("SELECT * FROM public.personal WHERE cedula = $op2"); 
                  $reg_op2 = pg_fetch_array($result_op2);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Operador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_op2['p_nombre']); echo ' '; echo strtoupper($reg_op2['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $op3 = $reg['personal_cedula_op3'];
                  $result_op3 = pg_query("SELECT * FROM public.personal WHERE cedula = $op3"); 
                  $reg_op3 = pg_fetch_array($result_op3);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Operador 3</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_op3['p_nombre']); echo ' '; echo strtoupper($reg_op3['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $op4 = $reg['personal_cedula_op4'];
                  $result_op4 = pg_query("SELECT * FROM public.personal WHERE cedula = $op4"); 
                  $reg_op4 = pg_fetch_array($result_op4);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Operador 4</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_op4['p_nombre']); echo ' '; echo strtoupper($reg_op4['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $op5 = $reg['personal_cedula_op5'];
                  $result_op5 = pg_query("SELECT * FROM public.personal WHERE cedula = $op5"); 
                  $reg_op5 = pg_fetch_array($result_op5);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Operador 5</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_op5['p_nombre']); echo ' '; echo strtoupper($reg_op5['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $op6 = $reg['personal_cedula_op6'];
                  $result_op6 = pg_query("SELECT * FROM public.personal WHERE cedula = $op6"); 
                  $reg_op6 = pg_fetch_array($result_op6);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Operador 6</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_op6['p_nombre']); echo ' '; echo strtoupper($reg_op6['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                    <br/>
                    <h2 class="StepTitle">Despachadores Policía Mérida</h2>
                    <div class="ln_solid"></div>
            <?php
                  $pm1 = $reg['personal_cedula_poli1'];
                  $result_pm1 = pg_query("SELECT * FROM public.personal WHERE cedula = $pm1"); 
                  $reg_pm1 = pg_fetch_array($result_pm1);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_pm1['p_nombre']); echo ' '; echo strtoupper($reg_pm1['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $pm2 = $reg['personal_cedula_poli2'];
                  $result_pm2 = pg_query("SELECT * FROM public.personal WHERE cedula = $pm2"); 
                  $reg_pm2 = pg_fetch_array($result_pm2);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_pm2['p_nombre']); echo ' '; echo strtoupper($reg_pm2['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $pm3 = $reg['personal_cedula_poli3'];
                  $result_pm3 = pg_query("SELECT * FROM public.personal WHERE cedula = $pm3"); 
                  $reg_pm3 = pg_fetch_array($result_pm3);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador 3</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_pm3['p_nombre']); echo ' '; echo strtoupper($reg_pm3['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                    <br/>
                    <h2 class="StepTitle">Despachadores Bomberos Mérida</h2>
                    <div class="ln_solid"></div>
            <?php
                  $bm1 = $reg['personal_cedula_bomb1'];
                  $result_bm1 = pg_query("SELECT * FROM public.personal WHERE cedula = $bm1"); 
                  $reg_bm1 = pg_fetch_array($result_bm1);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_bm1['p_nombre']); echo ' '; echo strtoupper($reg_bm1['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $bm2 = $reg['personal_cedula_bomb2'];
                  $result_bm2 = pg_query("SELECT * FROM public.personal WHERE cedula = $bm2"); 
                  $reg_bm2 = pg_fetch_array($result_bm2);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_bm2['p_nombre']); echo ' '; echo strtoupper($reg_bm2['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>


                    <br/>
                    <h2 class="StepTitle">Despachadores Protección Civil Mérida</h2>
                    <div class="ln_solid"></div>
            <?php
                  $pc1 = $reg['personal_cedula_pc1'];
                  $result_pc1 = pg_query("SELECT * FROM public.personal WHERE cedula = $pc1"); 
                  $reg_pc1 = pg_fetch_array($result_pc1);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_pc1['p_nombre']); echo ' '; echo strtoupper($reg_pc1['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>
            <?php
                  $pc2 = $reg['personal_cedula_pc2'];
                  $result_pc2 = pg_query("SELECT * FROM public.personal WHERE cedula = $pc2"); 
                  $reg_pc2 = pg_fetch_array($result_pc2);                               
            ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg_pc2['p_nombre']); echo ' '; echo strtoupper($reg_pc2['p_apellido']);  ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>


                    <?php 
                      }
                    ?>
                    <div class="ln_solid"></div>
