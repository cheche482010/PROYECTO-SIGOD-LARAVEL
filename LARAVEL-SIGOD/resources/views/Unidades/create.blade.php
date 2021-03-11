@section('title', ' Tabla Unidades Curriculares ')

@extends('layouts.layout')

@section('content')

@extends('layouts.menu3')
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
							Nueva Unidad Curricular
						</h3>
					</center>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Unidades_Curriculares.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="col">
 
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="nombre">
                                        Nombre de la Unidad
                                    	</label>
                                    <input class="form-control input-sm mb-10" id="nombre" name="nombre_unidad" placeholder="Nombre" type="text"/>

									</div>
								</div>
								<div class="col-md-6  ">
                                    
                                    <div class="form-group">
                                    	<label for="tipo_actividad">
                                        Trayecto
                                    </label>
                                        
                                       <select id="tipo_actividad" class="form-control input-sm" name="trayecto">
                                         <option value="0">Seleccione...</option>  
                                         <option value="Trayecto I">
                                         	Trayecto I
                                         </option>
                                         <option value="Trayecto II">
                                         	Trayecto II
                                         </option>
                                         <option value="Trayecto III">
                                         	Trayecto III
                                         </option>
                                         <option value="Trayecto I">
                                         	Trayecto IV
                                         </option>
                                       </select>
                                    </div>
                                    
                                </div>
                                
							</div>

							<div class="row">
								<div class="col-md-6  ">
                                    
                                    <div class="form-group">
                                    	<label for="fase">
                                        Fase
                                    </label>
                                        
                                       <select id="fase" class="form-control input-sm" name="fase">
                                         <option value="0">Seleccione...</option>
                                         <option value="Fase I">Fase I</option>
                                         <option value="Fase II">Fase II</option>
                                       </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										 <label for="eje">
                                        Eje de Formacion
                                    	</label>
                                    	<select id="eje" class="form-control input-sm" name="id_eje_formacion">
                                         <option value="0">Seleccione...</option>
                                         @if($Ejes_Formacion->count())  
                                		 	@foreach($Ejes_Formacion as $ejes)           
                                         	<option value="{{$ejes->id_eje_formacion}}">
                                         		{{$ejes->nombre_eje}}
                                         	</option>
                                         	@endforeach 
                                         @endif
                                       </select>
									</div>
								</div>
							</div>
							
							<div class="row">
 
								<div class="col-xs-6 col-sm-6 col-md-6">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									
								</div>	
 								<div class="col-xs-6 col-sm-6 col-md-6">
 									<a href="{{ route('Unidades_Curriculares.index') }}" class="btn btn-info btn-block" >Atrás</a>
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