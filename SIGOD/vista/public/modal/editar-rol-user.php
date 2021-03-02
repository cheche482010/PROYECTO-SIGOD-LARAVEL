<!-- Modal -->  
<div aria-hidden="true" aria-labelledby="exampleModalCenterTitle" class="modal fade" id="change-rolUser" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="contenido">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Rol y contraseña del usuario
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data" id="change-rol" method="POST" name="registro">
                    <input type="hidden" name="" id="cedulaOculta">
                    <input type="hidden" name="" id="rolOculto">
                    <div class="form-group">
                        
                        <div class="col-md-12 ">
                            <div class="form-group">
                                
                               <label for="ro">Rol del usuario</label>
                                <div class="input-group">
                                   <select class='form-control' id="rol_user">
                                       <option value='0'>Seleccione...</option>
                                       <option value='Super Usuario' >Super Usuario</option>
                                       <option value='Usuario' >Usuario</option>
                                       <option value='Administrador' >Administrador</option>

                                   </select>
                                    </input>
                                </div>

                               <br>
                                    <label for="contrasenia">
                                        Contraseña del usuario
                                    </label>
                                    <div class="input-group">
                                   <input id="contrasenia-editar" class="form-control" placeholder="Contraseña" type="password"><div style="cursor: pointer"  class="input-group-addon" onclick="mostrarClaveEditar();">
                                            <i id="botonVer" style="font-size:22px" class="mdi mdi-eye" >
                                            </i>
                                        </div>
                                    </div>
                            

                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <input class="btn btn-primary" onclick="guardarRolUSer();" type="button" value="Guardar" id="guardarRolUSer" data-dismiss="modal">

                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cancelar
                </button>
                
                
            </div>
        </div>
        
    </div>
</div>

