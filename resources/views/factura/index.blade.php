@extends('layouts.app')
@section('title', 'Ventas')
@section ('content')
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp animatedOnce">
        <div class="panel-heading">
            @include('_mensaje')
            <h1>Listado de ventas
                <a href="{{ route('factura.create') }}" class="btn btn-success pull-right"><b>Nueva
                    <i class="fa fa-plus-square-o"></i>
                </b></a>
            </h1>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'factura.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                    <div class="form-group">
                        {!! Form::text('comprador', null, ['class' => 'form-control', 'title' => 'Escriba el nombre del comprador', 'placeholder' => 'Nombre de comprador'] ) !!}
                        {!! Form::text('id', null, ['class' => 'form-control', 'title' => 'Escriba el número de factura', 'placeholder' => 'Número de venta'] ) !!}
                    </div>
                {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            <h3>Hay {{ $facturas->total() }} ventas</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary">
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
                                <td width="50" align="center" colspan="2">
                                    <a href="{{ route('factura.show', $factura->id) }}" class="btn btn-success">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $facturas->appends(Request::only(['comprador', 'id']))->render() !!}
        </div>
    </div>
</div>

@endsection