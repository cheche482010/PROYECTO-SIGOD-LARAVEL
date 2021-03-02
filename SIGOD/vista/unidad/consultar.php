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
                <li class="breadcrumb-item">Unidad Curricular</li>
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
                                Consultar Unidad Curricular 
                                </h4>
                                <input type="hidden" id="modulo" value="consulta-unidad">

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
                <input autocomplete="off" class="form-control" id="search-unidad" placeholder="Buscar..." type="text">

            </div>
        </div>
    </div>
</div>
                                
                                <table  class="table m-b-0 toggle-arrow-tiny color-table info-table" data-page-size="10" id="demo-foo-pagination">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                                Nombre de la Unidad
                                            </th>
                                            <th data-hide="phone">
                                                Trayecto
                                            </th>
                                            <th colspan="2" style="text-align: center;">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="normal-consult">  
                                    <?php foreach($this->unidad as $unidades){ 
                                    $trayect="" ; 
                                       switch($unidades['trayecto']){
                                        case 1:
                                        $trayect="Trayecto I";
                                        break;
                                         case 2:
                                        $trayect="Trayecto II";
                                        break;
                                         case 3:
                                        $trayect="Trayecto III";
                                        break;
                                         case 4:
                                        $trayect="Trayecto IV";
                                        break;
                                        default:
                                        $trayect="Trayecto Inicial";
                                        break;
                                       }
                                        ?> 
                                        <tr onmouseover="this.style.background='#BDD8ED'" onmouseout="this.style.background='white'">
                                            <td>
                                               <?php echo $unidades["nombre_unidad"];?> 
                                             </td>
                                            <td>
                                           <?php echo $trayect; ?>
                                            </td>
                                            
                                            <td style="text-align: center;">  
                                             <a title="Editar unidad curricular" class="mdi mdi-pencil-box" type="button" href="javascript:void(0)" aria-hidden="true" style="font-size: 30px; " data-placement="bottom" data-target="#actualizar" data-toggle="modal" onclick="editarUC('<?php echo $unidades['nombre_unidad'] ?>','<?php echo $unidades['trayecto'] ?>','<?php echo $unidades['fase']?>','<?php echo $unidades['id_eje_formacion']?>','<?php echo $unidades['id_unidad_curricular']?>')"></a>
                                           
                                         
                                                <a title="Eliminar unidad curricular" onmouseover="this.style.color='#A60303'" onmouseout="this.style.color='red'" class="mdi mdi-delete" style="font-size: 30px; color: red; " type="button" onclick="deleteElement('unidad','<?php echo $unidades['id_unidad_curricular'] ;?>','<?php echo $unidades['nombre_unidad']; ?>')"></a>
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
 <?php include modal."editar-unidad.php"; ?>