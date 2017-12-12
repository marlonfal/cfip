@extends('layouts.app')
@section('title', 'Gastos')
@section('content') 
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp animatedOnce">
        <div class="panel-heading">
            @include('_mensaje')
            <h1>Listado de gastos</h1>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'gasto.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                <div class="form-group">
                    {!! Form::label('busquedaportipo', 'Filtrar por tipo: ') !!}
                    {!! Form::select('tipo',$tiposdegasto, null, ['class' => 'form-control'] ) !!}
                </div>
                {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            <h3>Hay {{ $gastos->total() }} gastos</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary">
                        <th>#</th>
                        <th>Tipo de gasto</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th colspan="2">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($gastos as $gasto)
                            <tr>
                                <td>{{ $gasto->id }}</td>
                                <td>{{ $gasto->tipodegasto->nombre_tipo_gasto }}</td>
                                <td>{{ $gasto->descripcion }}</td>
                                <td>{{ $gasto->fecha }}</td>
                                <td>$ {{ $gasto->total }}</td>
                                <td width="50" colspan="2" align="center">
                                    <a href="{{ route('gasto.show', $gasto->id) }}" class="btn btn-success">Ver</a>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $gastos->appends(Request::only(['tipo']))->render() !!}
        </div>
    </div>
</div>
@endsection