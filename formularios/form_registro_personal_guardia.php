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
            } elseif ($_GET['msg'] == "2") {
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
                    /************** */
                    //
                    // Supervisor
                    //
                    /************* */
$grupo1 = $regid['grupo_guardia_id'];
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1 AND organismos_id = 5");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>

                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_sup">Supervisor</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_sup" id="personal_cedula_sup" class="form-control" title="Seleccione supervisor">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid2 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid2['cedula'] ?> "><?php echo strtoupper($regid2['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid2['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                  </div>

                  <!-- ******** STEP 2 *********-->
                  <div id="step-2">
                    <h2 class="StepTitle">Auxiliar</h2>

                    <?php
                    /************************* */
                    //
                    // Auxiliar de Supervisor
                    //
                    /************************* */
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1 AND organismos_id = 5");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>

                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_aux">Auxiliar</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_aux" id="personal_cedula_aux" class="form-control" title="Seleccione auxiliar de supervisor">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid3 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid3['cedula'] ?> "><?php echo strtoupper($regid3['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid3['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>


                  </div>



                  <!-- ********* STEP 3 ********* -->
                  <div id="step-3">
                    <h2 class="StepTitle">Operadores</h2>

                    <?php
                    /*********************************** */
                    //
                    // Operadores
                    //
                    /************************************ */


                    //$grupo1 = $regid['grupo_guardia_id'];
                    // Operador 1

                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 4 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op1">Operador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_op1" id="personal_cedula_op1" class="form-control" title="Seleccione personal operador de llamadas">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid4 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid4['cedula'] ?> "><?php echo strtoupper($regid4['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid4['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <?php
                    // Operador 2
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 4 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op2">Operador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_op2" id="personal_cedula_op2" class="form-control" title="Seleccione personal operador de llamadas">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid5 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid5['cedula'] ?> "><?php echo strtoupper($regid5['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid5['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <?php
                    // Operador 3
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 4 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op3">Operador 3</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_op3" id="personal_cedula_op3" class="form-control" title="Seleccione personal operador de llamadas">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid6 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid6['cedula'] ?> "><?php echo strtoupper($regid6['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid6['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <?php
                    // Operador 4
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 4 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op4">Operador 4</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_op4" id="personal_cedula_op4" class="form-control" title="Seleccione personal operador de llamadas">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid7 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid7['cedula'] ?> "><?php echo strtoupper($regid7['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid7['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <?php
                    // Operador 5
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 4 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op5">Operador 5</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_op5" id="personal_cedula_op5" class="form-control" title="Seleccione personal operador de llamadas">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid8 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid8['cedula'] ?> "><?php echo strtoupper($regid8['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid8['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <?php
                    // Operador 6
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 4 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_op6">Operador 6</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_op6" id="personal_cedula_op6" class="form-control" title="Seleccione personal operador de llamadas">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid9 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid9['cedula'] ?> "><?php echo strtoupper($regid9['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid9['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>



                  </div>


                  <!-- ********** STEP 4 ********** -->
                  <div id="step-4">
                    <h2 class="StepTitle">Despachadores Policía Mérida</h2>

                    <?php
                    /*************************** */
                    //
                    // Despachadores
                    //
                    /*************************** */

                    
                    //$grupo1 = $regid['grupo_guardia_id'];
                    // Despachador Policía 1
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 3 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_poli1">Despachador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_poli1" id="personal_cedula_poli1" class="form-control" title="Seleccione personal despachadores policía">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid10 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid10['cedula'] ?> "><?php echo strtoupper($regid10['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid10['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <?php
                    // Despachador Policía 2
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 3 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_poli2">Despachador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_poli2" id="personal_cedula_poli2" class="form-control" title="Seleccione personal despachadores policía">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid11 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid11['cedula'] ?> "><?php echo strtoupper($regid11['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid11['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <?php
                    // Despachador Policía 3
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 3 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_poli3">Despachador 3</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_poli3" id="personal_cedula_poli3" class="form-control" title="Seleccione personal despachadores policía">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid12 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid12['cedula'] ?> "><?php echo strtoupper($regid12['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid12['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>


                  </div>

                  <!-- ********** STEP 5 ********** -->
                  <div id="step-5">
                    <h2 class="StepTitle">Despachadores Bomberos Mérida</h2>

                    <?php
                    //$grupo1 = $regid['grupo_guardia_id'];
                    // Despachador Bomberos 1
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 2 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_bomb1">Despachador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_bomb1" id="personal_cedula_bomb1" class="form-control" title="Seleccione personal despachadores bomberos">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid13 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid13['cedula'] ?> "><?php echo strtoupper($regid13['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid13['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <?php
                    // Despachador Bomberos 1
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 2 ");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_bomb2">Despachador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_bomb2" id="personal_cedula_bomb2" class="form-control" title="Seleccione personal despachadores bomberos">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid14 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid14['cedula'] ?> "><?php echo strtoupper($regid14['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid14['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>


                  </div>

                  <!-- ********** STEP 6 ********** -->
                  <div id="step-6">
                    <h2 class="StepTitle">Despachadores Protección Civil Mérida</h2>

                    <?php
                    //$grupo1 = $regid['grupo_guardia_id'];
                    // Despachador Protección Civíl 1
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 1");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_pc1">Despachador 1</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_pc1" id="personal_cedula_pc1" class="form-control" title="Seleccione personal despachadores protección civíl">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid16 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid16['cedula'] ?> "><?php echo strtoupper($regid16['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid16['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <?php
                    // Despachador Protección Civíl 2
                    $consulta_pers2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE estatus_personal_id = 1 AND organismos_id = 1");
                    if (!$consulta_pers2) {
                      echo "Ocurrió un error.\n";
                      exit;
                    }
                    ?>
                    <div class="field item form-group">
                      <!-- // Seleccion del Personal de Guardia //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula_pc2">Despachador 2</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula_pc2" id="personal_cedula_pc2" class="form-control" title="Seleccione personal despachadores protección civíl">
                          <option value="">-Seleccione la persona-</option>
                          <?php
                          while ($regid17 = pg_fetch_array($consulta_pers2)) {
                          ?>
                            <option name="id" value="<?php echo $regid17['cedula'] ?> "><?php echo strtoupper($regid17['p_nombre']);
                                                                                        echo " ";
                                                                                        echo strtoupper($regid17['p_apellido']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <input type="hidden" name="grupos_guardia_id" id="grupos_guardia_id" value="<?php echo $regid['grupo_guardia_id']; ?>" required />

                    <input type="hidden" name="personal_usuario" id="personal_usuario" value="<?php echo $regid['cedula']; ?>" required />

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