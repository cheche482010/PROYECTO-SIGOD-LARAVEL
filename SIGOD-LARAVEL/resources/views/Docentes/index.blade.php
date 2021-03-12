@section('title', ' Tabla Docentes ')

@extends('layouts.layout')

@section('content')

@extends('layouts.menu2')
<div class="row" style="margin-top: -60px;">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="pull-left">
                    <h3>
                        Lista Docentes
                    </h3>
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-info" href="{{ route('Docentes.create') }}">
                            Añadir Docentes
                        </a>
                    </div>
                </div> 
                <br>
                    <div class="table-container">
                        <table class="table table-bordred table-striped color-table primary-table" id="mytable">
                            <thead> 
                                <th>
                                    Cedula
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Apellido
                                </th>
                                <th>
                                    Categoria
                                </th>
                                <th>
                                    Titulo
                                </th>
                                <th>
                                    Relacion Laboral
                                </th>
                                <th>
                                    Editar
                                </th>
                                <th>
                                    Eliminar
                                </th>
                            </thead>
                            <tbody>
                                @if($Docentes->count())  
                                @foreach($Docentes as $docente)
                                <tr>
                                    
                                <td>
                                    {{$docente->cedula}}
                                </td>
                                <td>
                                    {{$docente->primer_nombre}}
                                </td>
                                <td>
                                    {{$docente->primer_apellido}}
                                </td>
                                <td>
                                   @if($Categorias->count())  
                                        @foreach($Categorias as $categoria) 
                                            @if($docente->id_categoria == $categoria->id_categoria)  
                                                {{$categoria->nombre_categoria}}
                                            @endif 
                                        @endforeach 
                                    @endif
                                </td>
                                <td>
                                	{{$docente->titulo_pregrado}}
                                </td>
                              
                                <td>
                                	@if($Relaciones_Laborales->count())  
                                        @foreach($Relaciones_Laborales as $relacion) 
                                            @if($docente->id_relacion_laboral == $relacion->id_relacion_laboral)  
                                                {{$relacion->nombre_relacion}}
                                            @endif 
                                        @endforeach 
                                    @endif
                                </td>

                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{action('Docentes_Controller@edit', $docente->cedula )}}">
                                        	
                                            <i class="fa fa-edit" style="font-size: 20px;" >
                                            </i>
                                        </a>
                                    </td> 
                                    <td>
                                        <form action="{{action('Docentes_Controller@destroy', $docente->cedula)}}" method="post">
                                        	
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-xs" type="submit">
                                                    <i class="fa fa-trash-o"  style="font-size: 20px;">
                                                    </i>
                                                </button>
                                            </input>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach 
                                @else
                                <tr>
                                    <td colspan="8">
                                        No hay registro !!
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                            
                        </table>
                        {{ $Docentes->links() }}
                    </div>
                </br>
            </div>
        </div>
    </div>
</div>
@endsection 

