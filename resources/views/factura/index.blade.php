@extends('layouts.app')
@section('title', 'Ventas')
@section ('content')
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp">
        <div class="panel-heading">
            @include('_mensaje')
            <h1>Listado de factura
                <a href="{{ route('factura.create') }}" class="btn btn-success btn-lg pull-right"><b>Nueva (+)</b></a>
            </h1>
        </div>
        <div class="panel-body">
        {!! Form::open(['route' => 'factura.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                <div class="form-group">
                    {!! Form::label('buscar', 'Buscar: ') !!}
                    {!! Form::text('comprador', null, ['class' => 'form-control', 'title' => 'Escriba el nombre del comprador', 'placeholder' => 'Nombre de comprador'] ) !!}
                    {!! Form::text('id', null, ['class' => 'form-control', 'title' => 'Escriba el número de factura', 'placeholder' => 'Número de factura'] ) !!}
                </div>
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        <h3>Hay {{ $facturas->total() }} facturas</h3>
            <table class="table table-bordered table-hover">
                <thead>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Comprador</th>
                    <th>Total</th>
                    <th colspan="3">Opciones</th>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->fecha }}</td>
                            <td>{{ $factura->comprador }}</td>
                            <td>{{ $factura->total }}</td>
                            <td width="50">
                                <a href="{{ route('factura.show', $factura->id) }}" class="btn btn-success">Ver</a>
                            </td>
                            <td width="50">
                                <a href="{{ route('factura.edit', $factura->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td width="50">
                                {!! Form::model($factura, ['route' => ['factura.update',
                                $factura->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right'])
                                !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $facturas->appends(Request::only(['comprador', 'id']))->render() !!}
        </div>
    </div>
</div>

@endsection