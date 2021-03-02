@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="pull-left">
                    <h3>
                        Lista Aulas
                    </h3>
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-info" href="{{ route('Aulas.create') }}">
                            Añadir Aula
                        </a>
                    </div>
                </div>
                <br>
                    <div class="table-container">
                        <table class="table table-bordred table-striped color-table info-table" id="mytable">
                            <thead>
                                <th>
                                    Numero
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Ubicacion
                                </th>
                                <th>
                                    Asignacion
                                </th>
                                <th>
                                    Capacidad
                                </th>
                                <th>
                                    Editar
                                </th>
                                <th>
                                    Eliminar
                                </th>
                            </thead>
                            <tbody>
                                @if($Aulas->count())  
                                @foreach($Aulas as $aula)
                                <tr>
                                    <td>
                                        {{$aula->numero}}
                                    </td>
                                    <td>
                                        {{$aula->nombre_aula}}
                                    </td>
                                    <td>
                                        {{$aula->ubicacion}}
                                    </td>
                                    <td>
                                        {{$aula->asignacion}}
                                    </td>
                                    <td>
                                        {{$aula->capacidad}}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{action('AulasController@edit', $aula->id)}}">
                                            <i class="fas fa-edit">
                                            </i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{action('AulasController@destroy', $aula->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-xs" type="submit">
                                                    <i class="fas fa-trash-alt">
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
                        {{ $Aulas->links() }}
                    </div>
                </br>
            </div>
        </div>
    </div>
    @endsection
</div>