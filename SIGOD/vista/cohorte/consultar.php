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
            <h3 class="text-themecolor m-b-0 m-t-0">Consultas</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo constant('URL'); ?>inicio/">Inicio</a></li>
                <li class="breadcrumb-item">Cohorte</li>
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
                                Consultar Cohorte
                                </h4>

                              <input type="hidden" id="modulo" value="consultas-cohorte">
                                <div class="">
    <div class="d-flex">
        <div class="mr-auto">
            <label class="form-inline">
                Monstrar
                <select class="form-control input-sm" id="demo-show-entries">
                    <option value="10">
                        10
                    </option>
                    <option value="15">
                        15
                    </option>
                    <option value="20">
                        20
                    </option>
                </select>
                Filas
            </label>
        </div>
        <div class="ml-auto">
            <div class="form-group">
                <input autocomplete="off" class="form-control" id="search-cohorte" placeholder="Buscar..." type="text">
                </input>
            </div>
        </div>
    </div>
</div>
                                
                                <table  class="table m-b-0 toggle-arrow-tiny color-table info-table" data-page-size="10" id="demo-foo-pagination">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                                Número del Cohorte
                                            </th>
                                            <th data-hide="phone">
                                                Fecha
                                            </th>
                                            <th data-hide="phone">
                                                Descripcion
                                            </th>
                                            <th colspan="2" style="text-align: center">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="normal-consult">  
                                    
                                    <?php foreach ($this->cohorte as $cohorte) { ?>
                                            <tr onmouseover="this.style.background='#BDD8ED'" onmouseout="this.style.background='white'">
                                            <td>
                                                <?php echo $cohorte['numero_cohorte'] ?>
                                            </td>
                                            <td>
                                                <?php echo $cohorte['fecha_cohorte'] ?>
                                            </td>
                                            <td>
                                                <?php echo $cohorte['descripcion_cohorte'] ?>
                                            </td>
                                                                                            
                             <td style="text-align: center">  
                     <a title="Editar cohorte" class="mdi mdi-pencil-box" type="button" href="javascript:void(0)" aria-hidden="true" style="font-size: 30px; " data-placement="bottom" data-target="#actualizar" data-toggle="modal"></a>
                                           
                          
                          <?php if($cohorte['activo']==0){ ?>
                                                <a onmouseover="this.style.color='#0E5214'" onmouseout="this.style.color='green'" class="mdi mdi-minus-circle" style="font-size: 30px; color: green; cursor: pointer;"  title="Desactivar cohorte" onclick="deleteElement('cohorte','<?php echo $cohorte['id_cohorte'] ;?>','<?php echo $cohorte['numero_cohorte']; ?>')" type="button"  ></a>
                            <?php } else { ?>

                                <a onmouseover="this.style.color='#A60303'" onmouseout="this.style.color='red'" class="mdi mdi-plus-circle" style="font-size: 30px; color:red; cursor: pointer;"  title="Activar cohorte"  type="button" onclick="ActivarCohorte('<?php echo $cohorte['id_cohorte'] ;?>')" ></a>
                            <?php } ?>

                                            </td> 
                                        </tr>  
                                 <?php   } ?>
                                       
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
 <?php include modal."editar-cohorte.php"; ?>