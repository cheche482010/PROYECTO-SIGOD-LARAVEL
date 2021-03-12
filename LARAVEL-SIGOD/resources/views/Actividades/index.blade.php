@section('title', ' Tabla Actividades ')

@extends('layouts.layout')

@section('content')

@extends('layouts.menu4') 
<div class="row" style="margin-top: -60px;">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="pull-left">
                    <h3>
                        Lista Actividades
                    </h3>
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-info" href="{{ route('Actividades.create') }}">
                            Añadir Actividad
                        </a>
                    </div>
                </div> 
                <br>
                    <div class="table-container">
                        <table class="table table-bordred table-striped color-table danger-table" id="mytable">
                            <thead> 
                                <th>
                                    Tipo De Actividad
                                </th>
                                <th>
                                    Descripcion
                                </th>
                                <th>
                                    Dependencia
                                </th>
                                <th>
                                    Editar
                                </th>
                                <th>
                                    Eliminar
                                </th>
                            </thead>
                            <tbody>
                                @if($Actividades->count())  
                                @foreach($Actividades as $actividad)
                                <tr>
                                    <td>
                                    @if($Tipos_Actividades->count())  
                                        @foreach($Tipos_Actividades as $tipos) 
                                            @if($actividad->id_tipo_actividad == $tipos->id_tipo_actividad)  
                                                {{$tipos->nombre_actividad}}
                                            @endif 
                                        @endforeach 
                                    @endif
                                    </td>
                                    <td>
                                        {{$actividad->descripcion_actividad}}
                                    </td>
                                    <td>
                                    @if($Dependencias->count())  
                                        @foreach($Dependencias as $dependencia) 
                                            @if($actividad->id_dependencia == $dependencia->id_dependencia)
                                                {{$dependencia->nombre_dependencia}}
                                            @endif                         
                                        @endforeach 
                                    @endif
                                    </td>
                                    
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{action('Actividades_Controller@edit', $actividad->id_actividad)}}">
                                            <i class="fa fa-edit" style="font-size: 20px;" >
                                            </i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{action('Actividades_Controller@destroy', $actividad->id_actividad)}}" method="post">
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
                        {{ $Actividades->links() }}
                    </div>
                </br>
            </div>
        </div>
    </div>
    @endsection
</div>