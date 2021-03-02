<!-- Modal -->  
<div aria-hidden="true" aria-labelledby="exampleModalCenterTitle" class="modal fade" id="actualizar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="contenido">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                     Actualizar Unidad
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
                        
                        <input type="hidden" name="" id="idOcultoUnidad">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="unidad">
                                        Nombre de la Unidad
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-view-dashboard">
                                            </i>
                                        </div>
                                        <input id="nombreUnidadEditar" class="form-control mb-10" placeholder="Nombre" type="text" value="" />
                                    </div>
                                
                                    <label for="Trayecto">
                                            Trayecto
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-image-filter-none">
                                            </i>
                                        </div>
                                    <select id="trayectoUnidadEditar" class="form-control custom-select"  >
                        <?php foreach($this->trayecto as $trayectos){   ?>
                            <option value="<?php echo $trayectos['id_trayecto']?>">
                            <?php echo $trayectos["nombre_trayecto"];?>
                             </option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                                            <label for="fase">
                                        Fase
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-arrange-bring-forward">
                                            </i>
                                        </div>
                                    <select class="custom-select form-control" id="faseUnidadEditar" name="fase">
                            
                                        <option  value="1">
                                            Fase I
                                        </option>
                                        <option  value="2">
                                            Fase II
                                        </option>
                                        <option  value="3">
                                            Anual
                                        </option>
                                    </select> 
                                  
                                    </div>

                                                                        <label for="eje">
                                       Eje de Formacion
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="mdi mdi-format-list-bulleted">
                                            </i>
                                        </div>
                                    <select class="custom-select form-control" id="ejeEditarUnidad" name="id_eje_formacion">
                                        
                                        <?php foreach($this->eje as $ejes){   ?>
                                            <option value="<?php echo $ejes['id_eje_formacion'] ?>">
                                                <?php echo $ejes["nombre_eje"];?> 
                                            </option> 
                                        <?php } ?> 
                                    </select> 
                                    </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <input class="btn btn-primary" type="button" value="Guardar" onclick="guardarUnidadEditada();" >

                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cancelar
                </button>
                
                
            </div>
        </div>
        
    </div>
</div>

