@section('title', ' Tabla Actividades ')

@extends('layouts.layout')

@section('content')

@extends('layouts.menu4')
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
							Nueva Actividad
						</h3>
					</center>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Actividades.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="col">
 
							<div class="row">
								<div class="col-md-6  ">
                                    
                                    <div class="form-group">
                                    	<label for="tipo_actividad">
                                        Tipo De Actividad
                                    </label>
                                        
                                       <select id="tipo_actividad" class="form-control input-sm" name="id_tipo_actividad">
                                         <option value="0">Seleccione...</option>  
                                         @if($Tipos_Actividades->count())  
                                		 	@foreach($Tipos_Actividades as $tipo)           
                                         	<option value="{{$tipo->id_tipo_actividad}}">
                                         		{{$tipo->nombre_actividad}}
                                         	</option>
                                         	@endforeach 
                                         @endif
                                       </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										 <label for="dependencia">
                                        Dependencias
                                    	</label>
                                    	<select id="dependencia" class="form-control input-sm" name="id_dependencia">
                                         <option value="0">Seleccione...</option>             
                                         @if($Dependencias->count())  
                                		 	@foreach($Dependencias as $dependencia)           
                                         	<option value="{{$dependencia->id_dependencia}}">
                                         		{{$dependencia->nombre_dependencia}}
                                         	</option>
                                         	@endforeach 
                                         @endif
                                       </select>
									</div>
								</div>
							</div>

							<div class="row">
								
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<label for="descripcion">
                                        Descripcion
                                    	</label>
                                    	<textarea id="descripcion" name="descripcion_actividad" class="form-control" rows="6">
                                    		
                                    	</textarea>
									</div>
								</div>

							</div>
							
							<div class="row">
 
								<div class="col-xs-6 col-sm-6 col-md-6">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									
								</div>	
 								<div class="col-xs-6 col-sm-6 col-md-6">
 									<a href="{{ route('Actividades.index') }}" class="btn btn-info btn-block" >Atrás</a>
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