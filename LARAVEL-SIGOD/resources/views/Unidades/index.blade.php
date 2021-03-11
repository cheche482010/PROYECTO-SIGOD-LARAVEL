@section('title', ' Tabla Unidades Curriculares ')

@extends('layouts.layout')

@section('content')

@extends('layouts.menu3') 
<div class="row" style="margin-top: -60px;">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="pull-left">
                    <h3>
                        Lista Unidades Curriculares
                    </h3>
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-info" href="{{ route('Unidades_Curriculares.create') }}">
                            Añadir Unidad
                        </a>
                    </div>
                </div> 
                <br>
                    <div class="table-container">
                        <table class="table table-bordred table-striped color-table success-table" id="mytable">
                            <thead> 
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Trayecto
                                </th>
                                <th>
                                    Fase
                                </th>
                                <th>
                                    Eje de Formacion
                                </th>
                                <th>
                                    Editar
                                </th>
                                <th>
                                    Eliminar
                                </th>
                            </thead>
                            <tbody>
                                @if($Unidades_Curriculares->count())  
                                @foreach($Unidades_Curriculares as $unidad)
                                <tr>
                                    <td>
                                        {{$unidad->nombre_unidad}}
                                    </td>
                                    <td>
                                        {{$unidad->trayecto}}
                                    </td>
                                    <td>
                                        {{$unidad->fase}}
                                    </td>
                                    <td>
                                    @if($Ejes_Formacion->count())  
                                        @foreach($Ejes_Formacion as $ejes) 
                                            @if($unidad->id_eje_formacion == $ejes->id_eje_formacion)  
                                                {{$ejes->nombre_eje}}
                                            @endif 
                                        @endforeach 
                                    @endif
                                    </td>
                                    
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{action('Unidades_Curriculares_Controller@edit', $unidad->id_unidad_curricular)}}">
                                            <i class="fa fa-edit" style="font-size: 20px;" >
                                            </i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{action('Unidades_Curriculares_Controller@destroy', $unidad->id_unidad_curricular)}}" method="POST">
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
                        {{ $Unidades_Curriculares->links() }}
                    </div>
                </br>
            </div>
        </div>
    </div>
    
</div>
@endsection