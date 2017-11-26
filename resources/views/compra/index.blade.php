@extends('layouts.app')
@section('title', 'Ventas')
@section ('content')
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp">
        <div class="panel-heading">
            @include('_mensaje')
            <h1>Listado de compras
                <a href="{{ route('compra.create') }}" class="btn btn-success btn-lg pull-right"><b>Nueva (+)</b></a>
            </h1>
        </div>
        <div class="panel-body">
        {!! Form::open(['route' => 'compra.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                <div class="form-group">
                    {!! Form::label('buscar', 'Buscar: ') !!}
                    {!! Form::text('comprador', null, ['class' => 'form-control', 'title' => 'Escriba el nombre del comprador', 'placeholder' => 'Nombre de comprador'] ) !!}
                    {!! Form::text('id', null, ['class' => 'form-control', 'title' => 'Escriba el número de factura', 'placeholder' => 'Número de factura'] ) !!}
                </div>
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        <h3>Hay {{ $compras->total() }} compras</h3>
            <table class="table table-bordered table-hover">
                <thead>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Registrada por:</th>
                    <th>Total</th>
                    <th colspan="2">Opciones</th>
                </thead>
                <tbody>
                    @foreach($compras as $compra)
                        <tr>
                            <td>{{ $compra->id }}</td>
                            <td>{{ $compra->fecha }}</td>
                            <td>{{ $compra->proveedor }}</td>
                            <td>{{ $compra->usuario }}</td>
                            <td>{{ $compra->total }}</td>
                            <td width="50" colspan="2" align="center">
                                <a href="{{ route('compra.show', $compra->id) }}" class="btn btn-success">Ver</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $compras->render() !!}
        </div>
    </div>
</div>

@endsection