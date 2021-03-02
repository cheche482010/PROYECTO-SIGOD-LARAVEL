<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include (call."Meta.php"); ?>
        <?php include (call."Link.php"); ?>
        <?php include (call."Title.php"); ?>
        <?php include (call."Header.php"); ?>
    </head>
    <body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Inicio contenido de pagina -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="container-fluid">
               
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center"> 
            <h3 class="text-themecolor m-b-0 m-t-0">Registros</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo constant('URL'); ?>inicio/">Inicio</a></li>
                <li class="breadcrumb-item">Disponibilidad</li>
                <li class="breadcrumb-item active">Registros</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                   <form action="<?php echo constant('URL'); ?>disponibilidad/Nuevo" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                    <input type="hidden" id="modulo" value="aulas">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="card">
                                    <h1 class="text-themecolor">
                                        Registros de Disponibilidades
                                    </h1>
                                </div>
                                <div class="col-12"></div>
                                
                                <div class="col-md-6 ">
                                    <label for="nombre_disponibilidad">
                                        Numero de la Disponibilidad
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-format-list-bulleted-type">
                                            </i>
                                        </div>
                                        <input class="form-control mb-10" id="nombre_disponibilidad" name="nombre_disponibilidad" placeholder="Nombre" type="text"/>
                                    </div>
                                    <div id="" style="color:red;"></div>
                                </div>
                                
                                <div class="col-md-6 ">
                                    <label for="turno">
                                        Turno
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-timetable">
                                            </i>
                                        </div>
                                        <input class="form-control mb-10" id="turno" name="turno" placeholder="Turno" type="text"/>
                                    </div>
                                    <div id="" style="color:red;"></div>
                                </div>

                                <div class="col-md-12  m-t-10">
                                    <div class="form-group">
                                        <label for="dia_disponibilidad">
                                            Dia De Disponibilidad
                                        </label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-calendar-today">
                                            </i>
                                        </div>
                                        <input class="form-control input-number" id="dia_disponibilidad" name="dia_disponibilidad" type="text" placeholder="Dia">
                                    </div>
                                        
                                    </div>
                                    <div>
                                    <h5 style="color:white;" id="mensajeFecha">El campo fecha de nacimiento se encuentra vacío</h5>
                                    
                                        </input>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-12"></div>
                  
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">

                                <input type="submit" class="btn  btn-success m-r-10" name="guardar" id="guardar" value="Guardar">

                                <input type="button" class="btn btn-danger" id="limpiar" name="limpiar" value="Limpiar">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
<!-- ============================================================== -->
<!-- Final contenido de pagina -->
<!-- ============================================================== -->
       <?php include (call."Footer.php"); ?> 
       <?php include (call."Script.php"); ?>
    </body>
</html>
