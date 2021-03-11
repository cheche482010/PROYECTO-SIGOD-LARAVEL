@section('title', ' Tabla Aulas ')

@extends('layouts.layout')

@section('content')

@extends('layouts.menu1')
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
							Actualizar Aula
						</h3>
					</center>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Aulas.update', ['id' => $Aulas->id]) }}"  role="form">
							{{method_field('patch')}}
							{{ csrf_field() }}
						
							<div class="col">
								<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="numero">
                                        Número del Aula
                                    	</label>
                                    <input class="form-control input-sm mb-10" id="numero" name="numero" placeholder="Número" type="number"  value="<?php echo $Aulas->numero; ?>" />

									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="nombre">
                                        Nombre del Aula
                                    	</label>
                                    	<input class="form-control input-sm mb-10" id="nombre" name="nombre_aula" placeholder="Nombre" type="text" value="<?php echo $Aulas->nombre_aula; ?>"  />
									</div>
								</div>
							</div>
 
							<div class="row">
								<div class="col-md-6  m-t-10">
                                    
                                    <div class="form-group">
                                    	<label for="ubicacion">
                                        Ubicación
                                    </label>
                                        
                                       <select id="ubicacion" class="form-control input-sm" name="ubicacion">
                                         <option value="<?php echo $Aulas->ubicacion; ?>"><?php echo $Aulas->ubicacion; ?></option>
                                         <option value="Giraluna">Giraluna</option>
                                         <option value="Hilandera">Hilandera</option>
                                         <option value="Río de las 7 estrellas">Río de las 7 estrellas</option>
                                         <option value="Orinoco">Orinoco</option>

                                       </select>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										 <label for="asignacion">
                                        Asignación
                                    	</label>
                                    	<select id="asignacion" class="form-control input-sm" name="asignacion">
                                         <option value="<?php echo $Aulas->asignacion; ?>"><?php echo $Aulas->asignacion; ?></option>
                                         <option value="Completa" title="Todos los días, en todos los turnos">Completa</option>
                                         <option value="Compartida" title="Todos los días, turno tarde y noche">Compartida</option>
                                       </select>
									</div>
								</div>
							</div>

							<div class="row">
								
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<label for="capacidad">
                                        Capacidad
                                    	</label>
                                    	<input class="form-control input-sm mb-10 input-number" id="capacidad" name="capacidad" placeholder="Capacidad" type="number"  value="<?php echo $Aulas->capacidad; ?>" />
									</div>
								</div>

							</div>

							<div class="row">
 
								<div class="col-xs-6 col-sm-6 col-md-6">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									
								</div>	
 								<div class="col-xs-6 col-sm-6 col-md-6">
 									<a href="{{ route('Aulas.index') }}" class="btn btn-info btn-block" >Atrás</a>
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