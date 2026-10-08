
        <div class="apertura" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>PERSONAL DE GUARDIA</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grupo de Guardia</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div align="center">
              <?php

              if ($_GET['msg'] == "1") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observación registrada al personal de guardia!!!</strong></div>';
              } 
              elseif ($_GET['msg'] == "2") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observación NO registrada al personal de guardia!!!</strong></div>';

              }             
              ?>
              </div>
                  <div class="x_content">



                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Supervisor<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Auxiliar<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Operadores<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                           Despachadores</br>Policía Mérida<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-5">
                            <span class="step_no">5</span>
                            <span class="step_descr">
                                           Despachadores</br>Bomberos Mérida<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-6">
                            <span class="step_no">6</span>
                            <span class="step_descr">
                                           Despachadores</br>Protección Civil Mérida<br />
                                          </span>
                          </a>
                        </li>

                      </ul>
<!-- ********* STEP 1 ********* -->
              <div>
                <form class="form-horizontal form-label-left" action="../insert_apertura_guardia.php?ac=1" method="post" id="demo-form" data-parsley-validate>

                  <div id="step-1">
                        <h2 class="StepTitle">Supervisor</h2>

<?php
$grupo1 = $regid['grupo_guardia_id'];
$consulta_pers2 = pg_query($dbconn,"SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1 AND organismos_id = 5");
$regid2= pg_fetch_array($consulta_pers2); // Supervisor

$regid3= pg_fetch_array($consulta_pers2); // Auxiliar

?>

                    <div class="field item form-group">
                      <div class="col-md-6 col-sm-6">
                        <input type="hidden" name="personal_cedula_sup" class="form-control" required="required" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid2['cedula']; ?>" />
                      </div>
                    </div>
                  
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre">Nombre</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="p_nombre" id="p_nombre" class="form-control" placeholder="Ingrese Primer Nombre" required="required" minlength="2" maxlength="40" title="Llene este campo con el primer nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid2['p_nombre']); ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_apellido">Apellido</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="p_apellido" id="p_apellido" class="form-control" placeholder="Ingrese Primer Apellido" required="required" minlength="2" maxlength="20" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid2['p_apellido']); ?>" />
                      </div>
                    </div>

                </div>
                    
<!-- ******** STEP 2 *********-->                      
                    <div id="step-2">
                        <h2 class="StepTitle">Auxiliar</h2>
                      
                    <div class="field item form-group">
                      <div class="col-md-6 col-sm-6">
                        <input type="hidden" name="personal_cedula_aux" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid3['cedula']; ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre_aux">Nombre</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="p_nombre" id="p_nombre_aux" class="form-control" placeholder="Ingrese Primer Nombre" minlength="2" maxlength="40" title="Llene este campo con el primer nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid3['p_nombre']); ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_apellido_aux">Apellido</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="p_apellido" id="p_apellido_aux" class="form-control" placeholder="Ingrese Primer Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘]{2,40}" value="<?php echo strtoupper($regid3['p_apellido']); ?>" />
                      </div>
                    </div>

                </div>



<!-- ********* STEP 3 ********* -->
                      <div id="step-3">
                        <h2 class="StepTitle">Operadores</h2>

<?php
$grupo1 = $regid['grupo_guardia_id'];
$consulta_pers2 = pg_query($dbconn,"SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1 AND organismos_id = 4 ");



$regid4= pg_fetch_array($consulta_pers2); // Operador 1

$regid5= pg_fetch_array($consulta_pers2); // Operador 2

$regid6= pg_fetch_array($consulta_pers2); // Operador 3

$regid7= pg_fetch_array($consulta_pers2); // Operador 4

$regid8= pg_fetch_array($consulta_pers2); // Operador 5

$regid9= pg_fetch_array($consulta_pers2); // Operador 6

?>                      
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op1">Operador 1</label>
                        <input type="hidden" name="personal_cedula_op1" id="personal_cedula_op1" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid4['cedula']; ?>" />
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid4['p_nombre']); ?>" />
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid4['p_apellido']); ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op2">Operador 2</label>
 
                        <input type="hidden" name="personal_cedula_op2" id="personal_cedula_op2" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid5['cedula']; ?>" />
 
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid5['p_nombre']); ?>" />
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘]{2,40}" value="<?php echo strtoupper($regid5['p_apellido']); ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op3">Operador 3</label>
 
                         <input type="hidden" name="personal_cedula_op3" id="personal_cedula_op3" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid6['cedula']; ?>" />
             
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid6['p_nombre']); ?>" />
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid6['p_apellido']); ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op4">Operador 4</label>
                 
                        <input type="hidden" name="personal_cedula_op4" id="personal_cedula_op4" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid7['cedula']; ?>" />
                 
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid7['p_nombre']); ?>" />
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid7['p_apellido']); ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op5">Operador 5</label>
                
                        <input type="hidden" name="personal_cedula_op5" id="personal_cedula_op5" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid8['cedula']; ?>" />
                
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid8['p_nombre']); ?>" />
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid8['p_apellido']); ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op6">Operador 6</label>
            
                        <input type="hidden" name="personal_cedula_op6" id="personal_cedula_op6" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid9['cedula']; ?>" />
            
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid9['p_nombre']); ?>" />
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid9['p_apellido']); ?>" />
                      </div>
                    </div>
                 
                    </div>


<!-- ********** STEP 4 ********** -->                      
                      <div id="step-4">
                        <h2 class="StepTitle">Despachadores Policía Mérida</h2>

<?php
$grupo1 = $regid['grupo_guardia_id'];
$consulta_pers2 = pg_query($dbconn,"SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1 AND organismos_id = 3 ");

$regid10= pg_fetch_array($consulta_pers2); // Despachador Policia 1

$regid11= pg_fetch_array($consulta_pers2); // Despachador Policia 2

$regid12= pg_fetch_array($consulta_pers2); // Despachador Policia 3


?>                      
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_poli1">Despachador 1</label>
 
                        <input type="hidden" name="personal_cedula_poli1" id="personal_cedula_poli1" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid10['cedula']; ?>"/>
      
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="20" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid10['p_nombre']); ?>"/>
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid10['p_apellido']); ?>"/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_poli1">Despachador 2</label>
     
                        <input type="hidden" name="personal_cedula_poli1" id="personal_cedula_poli1" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid11['cedula']; ?>"/>
            
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid11['p_nombre']); ?>"/>
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid11['p_apellido']); ?>"/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_poli1">Despachador 3</label>
     
                        <input type="hidden" name="personal_cedula_poli1" id="personal_cedula_poli1" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid12['cedula']; ?>"/>
               
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid12['p_nombre']); ?>"/>
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid12['p_apellido']); ?>"/>
                      </div>
                    </div>

                  </div>

<!-- ********** STEP 5 ********** -->                      
                      <div id="step-5">
                        <h2 class="StepTitle">Despachadores Bomberos Mérida</h2>

<?php
$grupo1 = $regid['grupo_guardia_id'];
$consulta_pers2 = pg_query($dbconn,"SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1 AND organismos_id = 2 ");

$regid13= pg_fetch_array($consulta_pers2); // Despachador Bombero 1

$regid14= pg_fetch_array($consulta_pers2); // Despachador Bombero 2

?>                      
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_bomb1">Despachador 1</label>
          
                        <input type="hidden" name="personal_cedula_bomb1" id="personal_cedula_bomb1" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid13['cedula']; ?>"/>
                  
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid13['p_nombre']); ?>"/>
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid13['p_apellido']); ?>"/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_bomb2">Despachador 2</label>
         
                        <input type="hidden" name="personal_cedula_bomb2" id="personal_cedula_bomb2" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid14['cedula']; ?>"/>
            
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid14['p_nombre']); ?>"/>
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid14['p_apellido']); ?>"/>
                      </div>
                    </div>

                </div>

<!-- ********** STEP 6 ********** -->                      
                      <div id="step-6">
                        <h2 class="StepTitle">Despachadores Protección Civil Mérida</h2>

<?php
$grupo1 = $regid['grupo_guardia_id'];
$consulta_pers2 = pg_query($dbconn,"SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1 AND organismos_id = 1");

$regid16= pg_fetch_array($consulta_pers2); // Despachador PC 1

$regid17= pg_fetch_array($consulta_pers2); // Despachador PC 2

?>                      
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_pc1">Despachador 1</label>
   
                        <input type="hidden" name="personal_cedula_pc1" id="personal_cedula_pc1" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid16['cedula']; ?>"/>
  
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid16['p_nombre']); ?>"/>
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid16['p_apellido']); ?>"/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_pc2">Despachador 2</label>

                        <input type="hidden" name="personal_cedula_pc2" id="personal_cedula_pc2" class="form-control" minlength="7" maxlength="8" pattern="[0-9]{7,8}" value="<?php echo $regid17['cedula']; ?>"/>
      
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre" class="form-control" placeholder="Ingrese Nombre" minlength="2" maxlength="40" title="Llene este campo con el  nombre" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid17['p_nombre']); ?>"/>
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_apellido" class="form-control" placeholder="Ingrese Apellido" minlength="2" maxlength="40" title="Llene este campo con el primer apellido" pattern="[A-zÃ¡Ã©Ã­Ã³ÃºÃ¼Ã±ÃÃ‰ÃÃ“ÃœÃšÃ‘ -]{2,40}" value="<?php echo strtoupper($regid17['p_apellido']); ?>"/>
                      </div>
                    </div>

                     <input type="hidden" name="grupos_guardia_id" id="grupos_guardia_id" value="<?php echo $regid['grupo_guardia_id'];?>" required />

                     <input type="hidden" name="personal_usuario" id="personal_usuario" value="<?php echo $regid['cedula'];?>" required />

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 offset-md-5">
                    <button type='submit' class="btn btn-primary btn-lg">Guardar</button>
                        </div>
                      </div>
                    
                  </form>
                  </div>
                </div>
<br>
                   </div> 