<!-- Modal -->  
<div aria-hidden="true" aria-labelledby="exampleModalCenterTitle" class="modal fade" id="actualizar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="contenido">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                     Actualizar Usuario
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data" id="registro" method="POST" name="registro">
                    <div class="form-group">
                        
                        <div class="col-md-12 ">
                            <div class="form-group">
                                

                                <label for="cedula">
                                    Cedula
                                </label>
                                <div class="input-group">
                                    <input class="form-control input-number" id="cedula-editar" name="cedula" placeholder="Cedula de identidad" type="text-center" value="<?php echo $usuarios["cedula"];?> " />
                                </div>   
                                <br>
                                
                                <label for="nombre1">
                                    Nombre
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="nombre1-editar" name="prinombre" placeholder="Primer Nombre" type="text" value="<?php echo $usuarios["nombre"];?> " />
                                </div>
                                <br>

                                <label for="apellido1">
                                    Apellido
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="apellido1-editar" name="priapellido" placeholder="Primer Apellido" type="text" value="<?php echo $usuarios["apellido"];?> " />
                                </div> 
                                
                                <br>
                                <label for="correo">
                                    Correo Electronico
                                </label>
                                <div class="input-group">
                                    <input class="form-control espacios" id="correo-editar" name="correo" placeholder="Correo electrónico " type="email" value="<?php echo $usuarios["correo"];?> " >
                                    </input>
                                </div>
                                <br>
                                    <label for="fecha">
                                  Fecha de nacimiento
                                </label>
                                <div class="input-group">
                                    <input class="form-control espacios" id="fecha-editar" name="fecha" placeholder="fecha electrónico " type="text" value="<?php echo $usuarios["fecha_n"];?> " >
                                    </input>
                                </div>
                                             <br>
                                 <div style="display:none">   <label for="contrasenia">
                                  Contraseña
                                </label>
                                <div class="input-group">
                                    <input class="form-control espacios" id="contrasenia" name="contrasenia" placeholder="Contraseña del usuario " type="password" value="<?php echo $usuarios["contrasenia"];?> " >
                                    </input>
                                </div>

                                                                             <br>
                                    <label for="rol">
                                  Rol de usuario
                                </label>
                                <div class="input-group">
                                   <select class='form-control'>
                                       <option value='0'>Seleccione...</option>
                                       <option value='Super Usuario' >Super Usuario</option>
                                       <option value='Usuario' >Usuario</option>
                                       <option value='Administrador' >Administrador</option>

                                   </select>
                                    </input>
                                </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <input class="btn btn-primary" type="button" value="Guardar" id="guardar-editar" onclick="guardarUsuarioEditado()" >

                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cancelar
                </button>
                
                
            </div>
        </div>
        
    </div>
</div>

