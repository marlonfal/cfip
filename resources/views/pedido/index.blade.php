@extends('layouts.app')
@section('title', 'Pedidos')
@section('content') 
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp">
        <div class="panel-heading">
            @include('_mensaje')
            <h1>Listado de pedidos</h1>
        </div>
        <div class="panel-body">
        
        <h3>Hay {{ $pedidos->total() }} pedidos</h3>
            <table class="table table-bordered table-hover">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Fecha y hora de entrega</th>
                    <th colspan="3">Opciones</th>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->nombre }}</td>
                            <td>{{ $pedido->direccion }}</td>
                            @if($pedido->estado == 'Pendiente')
                                <td>
                                    {{ $pedido->estado }} <i class="fa fa-clock-o"></i> 
                                </td>
                            @endif
                            @if($pedido->estado == 'En camino')
                                <td>
                                    {{ $pedido->estado }} <i class="fa fa-motorcycle"></i> 
                                </td>
                            @endif
                            @if($pedido->estado == 'Entregado')
                                <td>
                                    {{ $pedido->estado }} <i class="fa fa-check-square-o"></i> 
                                </td>
                            @endif
                            <td>{{ $pedido->fecha_entrega }} - {{ $pedido->hora_entrega }}</td>
                            <td width="50">
                                <a href="{{ route('pedido.show', $pedido->id) }}" class="btn btn-success">Ver</a>
                            </td>
                            <td width="50">
                                <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td width="50">
                                {!! Form::model($pedido, ['route' => ['pedido.update',
                                $pedido->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right'])
                                !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $pedidos->render() !!}
        </div>
    </div>
</div>
@endsection