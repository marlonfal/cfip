@extends('layouts.app')
@section('title', 'Tipos de gasto')
@section('content')
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp">
        <div class="panel-heading">
            @include('_mensaje')
            <h2>
                <b>Listado de gastos</b>
                <a href="{{route('tipodegasto.create')}}" class="btn btn-success pull-right"><b>Nuevo </b> (+)</a>
            <h2>
        </div>
        <div class="panel-body"> 
            <h4><b> Hay {{ $tipodegastos->total() }} tipos de gasto</b> </h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo de gasto</th>
                            <th>Descripción</th>
                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tipodegastos as $tipodegasto)
                            <tr>
                                <td>{{ $tipodegasto->id }}</td>
                                <td>{{ $tipodegasto->nombre_tipo_gasto }}</td>
                                <td>{{ $tipodegasto->descripcion}}</td>
                                <td width="50">
                                    <a href="{{route('tipodegasto.show', $tipodegasto->id)}}" class="btn btn-success pull-right">Ver</a>
                                </td>
                                <td width="50">
                                    <a href="{{route('tipodegasto.edit', $tipodegasto->id)}}" class="btn btn-warning pull-right">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>             
                {!! $tipodegastos->render() !!}
        </div>
    </div>
</div>

@endsection