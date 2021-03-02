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
                <li class="breadcrumb-item active">Consultas</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
            <div class="col-lg">
                <!-- Column -->
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">
                                Consultar Disponibilidades 
                                </h4>

                                <?php include (call."Busqueda.php"); ?>

                                <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny color-table info-table" data-page-size="10">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                               Nombre 
                                            </th>
                                            <th data-hide="phone">
                                               Turno
                                            </th>
                                            <th data-hide="phone">
                                                Dia
                                            </th>
                                            
                                            <th colspan="2">
                                                Opciones
                                            </th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->disponilidad as $disponilidades){   ?> 
                                        <tr>
                                            <td>
                                               <?php echo $disponilidades["nombre_disponibilidad"];?> 
                                             </td>
                                            <td>
                                                <?php echo $disponilidades["turno"];?>  
                                            </td>
                                            <td>
                                                <?php echo $disponilidades["dia_disponibilidad"];?>
                                            </td>
                                            
                                            <td>   
                                                <a class="btn btn-success waves-effect waves-light" type="button" href="javascript:void(0)" aria-hidden="true" data-placement="bottom" data-target="#actualizar" data-toggle="modal">Editar </a>

                                                <a class="btn btn-danger waves-effect waves-light" type="button" href="<?php echo constant('URL')."disponibilidad/Eliminar/".$disponilidades["id_disponilidad"]; ?>">Eliminar </a>
                                            </td>
                                        </tr>
                                    <?php } ?>     
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <table width="100%">
                                                <tbody id="dynamic-consult" style="display: none">
                                                </tbody>
                                            </table>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="text-right">
                                                    <ul style="width: 100px;" class="pagination pagination-split m-t-30" w> </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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
