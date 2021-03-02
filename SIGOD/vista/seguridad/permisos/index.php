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
                        <h3 class="text-themecolor m-b-0 m-t-0">
                            Permisos
                        </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)">
                                    Inicio
                                </a>
                            </li>
                            <li class="breadcrumb-item ">
                                Seguridad
                            </li>
                            <li class="breadcrumb-item active">
                                Permisos
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">
                                    Permisos de Usuarios
                                </h4>

<input type="hidden" id="modulo" value="permisosUser" name="">
                                                            <div class="">
    <div class="d-flex">

        <div class="ml-auto">
            <div class="form-group">
                <input autocomplete="off" class="form-control" id="search-permisos" placeholder="Buscar..." type="text">
                </input>
            </div>
        </div>
    </div>
</div>

                                <table class="table m-b-0 toggle-arrow-tiny color-table info-table" data-page-size="10" >
                                    <thead>
                                        <tr>
                                            <th >
                                                Usuario
                                            </th>
                                            <th >
                                                Rol 
                                            </th>
                                            <th style="text-align: center;">
                                                Permisos
                                            </th>
               
                                        </tr>
                                    </thead>
                                    <tbody id="normal-consult">
                                        <?php foreach ($this->permisosUser as $PU) { ?>
                                        <tr onmouseover="this.style.background='#BDD8ED'" onmouseout="this.style.background='white'">
                                    
                  <td ><?php echo $PU['nombre'].' '.$PU['apellido'].' ('.$PU['cedula'].')' ?></td>
                  <td ><?php echo $PU['rol_inicio'] ?></td>

                    <td  style="text-align: center">

                        <a data-toggle="modal" data-target="#change-rolUser" href="javascript:void(0)"  style="font-size: 25px" class="mdi mdi-pencil" onclick="rolUserSelected('<?php echo $PU['rol_inicio']; ?>','<?php echo $PU['cedula'];?>','<?php echo $PU['contrasenia'];?>')"></a>
                        &nbsp;&nbsp;
                      <a data-toggle="modal" data-target="#permisos-ver" href="javascript:void(0)"  style="font-size: 25px" class="mdi mdi-eye" onclick="chargePermisos('<?php echo $PU['cedula'] ?>','<?php echo $PU['rol_inicio'] ?>')"></a>

                    </td>
                                           
                                        </tr>
                                         <?php  } ?>
                                    </tbody>
                                    <tbody id="dynamic-consult" style="display: none"></tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <div class="text-right">
                                                    <ul class="pagination pagination-split m-t-30">
                                                    </ul>
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
     <?php include modal."ver-permisos.php"; ?>
     <?php include modal."editar-rol-user.php"; ?>


</html>
