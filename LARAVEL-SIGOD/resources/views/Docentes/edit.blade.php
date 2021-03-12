@section('title', ' Tabla Docentes ')

@extends('layouts.layout')

@section('content')

@extends('layouts.menu2')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    @if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif 
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<center>
						<h3 class="panel-title">
							Actualizar Docente
						</h3>
					</center>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{action('Docentes_Controller@update', $Docentes->cedula)}}"  role="form">
							{{method_field('PUT')}}
							{{ csrf_field() }}
							<div class="row">
      
                                            <div class="col-12 m-t-15">
                                                <label for="cedula">
                                                    Cedula
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control input-number" id="cedula" name="cedula" placeholder="Cedula de identidad" type="text-center" value="<?php echo $Docentes->cedula ?>" />
                                                </div>
                                                <div id="validCedula" style="color:red;"></div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <label for="nombre1">
                                                    Primer Nombre
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10" id="nombre1" name="primer_nombre" placeholder="Nombre" type="text" value="<?php echo $Docentes->primer_nombre ?>"/>
                                                </div>
                                                <div id="validNombre1" style="color:red;"></div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <label for="segnombre">
                                                    Segundo Nombre
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10" id="segnombre" name="segundo_nombre" placeholder="Nombre" type="text" value="<?php echo $Docentes->segundo_nombre ?>"/>
                                                </div>
                                                <div id="validNombre2" style="color:red;"></div>
                                            </div>
                                            <div class="col-6 m-t-15 m-b-20">
                                                <label for="apellido1">
                                                    Primer Apellido
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10" id="apellido1" name="primer_apellido" placeholder="Apellido" type="text" value="<?php echo $Docentes->primer_apellido ?>"/>
                                                </div>
                                                <div id="validAp1" style="color:red;"></div>
                                            </div>
                                            <div class="col-6 m-t-15 m-b-20">
                                                <label for="apellido2">
                                                    Segundo Apellido
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10" id="apellido2" name="segundo_apellido" placeholder="Apellido" type="text" value="<?php echo $Docentes->segundo_apellido ?>"/>
                                                </div>
                                                <div id="validAp2" style="color:red;"></div>
                                            </div>
                                        </div>

                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="correo">
                                                        Correo Electronico
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="correo" name="correo" placeholder="Correo" type="text" value="<?php echo $Docentes->correo ?>">
                                                           
                                                        </input>
                                                    </div>
                                                     <div id="validCorreo" style="color:red"></div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="telefono">
                                                        Número de Teléfono
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control espacios input-number" id="telefono" name="telefono" placeholder="Telefono" type="text" value="<?php echo $Docentes->telefono ?>">
                                                        </input>
                                                    </div>
                                                    <div id="validTlf" style="color:red"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="direccion">
                                                        Direccion
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control " id="direccion" name="direccion" placeholder="direccion" type="text" value="<?php echo $Docentes->direccion ?>">
                                                        </input>
                                                    </div>
                                                    <div id="validDireccion" style="color:red"></div>
                                                </div>

                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="municipio">
                                                        Municipio
                                                    </label>
                                                    <div class="input-group">
                                                        <select class="custom-select" id="municipio" name="id_municipio" style="width: 100%;">
                                                        <option value="0">
                                                            Seleccione...
                                                        </option> 
                                        @if($Municipios->count())  
                                		 	@foreach($Municipios as $municipio)           
                                         	<option value="{{$municipio->id_municipio}}" @if($Docentes->id_municipio == $municipio->id_municipio)selected  @endif>
                                         		{{$municipio->nombre}}
                                         	</option>
                                         	@endforeach  
                                         @endif
                                                        </select>
                                                    </div>
                                                    <div id="validMunicipio" style="color:red"></div>
                                                </div>

                                            </div>
                                        </div>
                            <div class="row">
                                            
                                            
                                            <div class="col-12" >
                                                <div class="form-group">
                                                    <label for="categoria">
                                                        Categoria
                                                    </label>
                                                    <select class="custom-select form-control" id="categoria" name="id_categoria">
                                                        <option selected="" value="0">
                                                            Seleccione....
                                                        </option>
                                                       @if($Categorias->count())  
                                		 	@foreach($Categorias as $categoria)           
                                         	<option value="{{$categoria->id_categoria}}" @if($Docentes->id_categoria == $categoria->id_categoria)selected  @endif>
                                         		{{$categoria->nombre_categoria}}
                                         	</option>
                                         	@endforeach 
                                         @endif
                                                    </select>
                                                    <div style="color:blue" id="validCategoria"></div>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="dedicacion">
                                                        Dedicacion
                                                    </label>
                                                    <select class="custom-select form-control" id="dedicacion" name="id_dedicacion">
                                                        <option selected="" value="0">
                                                            Seleccione....
                                                        </option>
                                                         @if($Dedicaciones->count())  
                                		 	@foreach($Dedicaciones as $dedicacion)           
<option value="{{$dedicacion->id_dedicacion}}" @if($Docentes->id_dedicacion == $dedicacion->id_dedicacion)selected  @endif>
                                         		{{$dedicacion->nombre_dedicacion}}
                                         	</option>
                                         	@endforeach 
                                         @endif  
                                                    </select>
                                                    <div style="color:red" id="validDedicacion"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="relacion">
                                                        Relacion Laboral
                                                    </label>
                                                    <select class="custom-select form-control" id="relacion" name="id_relacion_laboral">
                                                        <option selected="" value="0">
                                                            Seleccione....
                                                        </option>
                                                 @if($Relaciones_Laborales->count())  
                                		 	@foreach($Relaciones_Laborales as $relacion)           
<option value="{{$relacion->id_relacion_laboral}}" @if($Docentes->id_relacion_laboral == $relacion->id_relacion_laboral)selected  @endif>
                                         		{{$relacion->nombre_relacion}}
                                         	</option>
                                         	@endforeach 
                                         @endif  
                                                    </select>
                                                    <div style="color:red" id="validRelacion"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="concurso">
                                                       Concurso
                                                    </label>
                                                    <select class="custom-select form-control" id="concurso" name="id_concurso">
                                                        <option selected="" value="0">
                                                            Seleccione....
                                                        </option>
                 @if($Concursos->count())  
                                		 	@foreach($Concursos as $concurso)           
<option value="{{$concurso->id_concurso}}" @if($Docentes->id_concurso == $concurso->id_concurso)selected  @endif>
                                         		{{$concurso->tipo_concurso}}
                                         	</option>
                                         	@endforeach 
                                         @endif  
                                                    </select>
                                                    <div style="color:red" id="validConcurso"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="areas">
                                                       Areas
                                                    </label>
                                                    <select class="custom-select form-control" id="areas" name="id_area">
                                                        <option selected="" value="0">
                                                            Seleccione....
                                                        </option>
                                                  @if($Areas->count())  
                                		 	@foreach($Areas as $area)           
 <option value="{{$area->id_area}}" @if($Docentes->id_area == $area->id_area)selected  @endif>
                                         		{{$area->nombre_area}}
                                         	</option>
                                         	@endforeach 
                                         @endif  
                                                    </select>
                                                    <div style="color:red" id="validAreas"></div>
                                                </div>
                                            </div> 

                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Ingresos">
                                                       Ingresos
                                                    </label>
                                                    <select class="custom-select form-control" id="Ingresos" name="id_ingreso">
                                                        <option selected="" value="0">
                                                            Seleccione....
                                                        </option>
                                                  @if($Ingresos->count())  
                                		 	@foreach($Ingresos as $ingreso)           
 <option value="{{$ingreso->id_ingreso}}" @if($Docentes->id_ingreso == $ingreso->id_ingreso)selected  @endif>
                                         		{{$ingreso->anio_ingreso}}
                                         	</option>
                                         	@endforeach 
                                         @endif  
                                                    </select>
                                                    <div style="color:red" id="validAreas"></div>
                                                </div>
                                            </div> 
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tituloPregrado">
                                                        Título de pregrado
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control " id="pregrado" name="titulo_pregrado" placeholder="Título de pregrado" type="text" value="<?php echo $Docentes->titulo_pregrado ?>">
                                                      
                                            </div>
                                                    <div style="color:red" id="validTraslado"></div>
                                                </div>
                                            </div>
                                            
                                            
                                    </div>
							<div class="row m-t-20">
 
								<div class="col-xs-6 col-sm-6 col-6">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									
								</div>	
 								<div class="col-xs-6 col-sm-6 col-6">
 									<a href="{{ route('Docentes.index') }}" class="btn btn-info btn-block" >Atrás</a>
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
    </div>
@endsection

