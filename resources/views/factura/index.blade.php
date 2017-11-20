@extends('layouts.app')

@section ('content')
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp">
        <div class="panel-heading">
            @include('_mensaje')
            <h1>Listado de facturas
                <a href="{{ route('factura.create') }}" class="btn btn-success btn-lg pull-right"><b>Nueva (+)</b></a>
            </h1>
        </div>
        <div class="panel-body">
        
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
            {!! $facturas->render() !!}
        </div>
    </div>
</div>

@endsection