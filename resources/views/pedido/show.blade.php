@extends('layouts.app')

@section('content')
<div class="container animatedParent">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary animated bounceInUp">
            <div class="panel-heading">
                @include('_mensaje')
                <h1 align="center">Detalles de la factura #{{ $pedido->id }}
                </h1>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th colspan="6"> 
                            <div align="center">
                            <img src="{{ asset('img/logo.png') }}" class="img-responsive" alt="" height="100" width="100" >
                            </div>
                            <p align="center">Pollo 100% campesino</p>
                            <p align="center">Nit 12312312312</p>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {!! Form::label('comprador', 'Comprador: ') !!}                       
                                {{$pedido->nombre}}
                            </td>
                            <td>
                                {!! Form::label('fecha', 'Fecha: ') !!}
                                {{ $pedido->fecha_pedido }} 
                            </td>
                            <td>
                                {!! Form::label('fecha', 'Dirección: ') !!}
                                {{ $pedido->direccion }} 
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="bg-warning" align="center">
                            <td><b> Número </b></td>
                            <td><b>Producto: id - nombre </b></td>
                            <td><b> Cantidad </b></td>
                        </tr>
                        @foreach($detalles as $detalle)
                            <tr align="center">
                                <td>{{ $detalle->id_detalle }}</td>
                                <td>
                                    <label>{{ $detalle->id_tipo_producto}} - {{ $detalle->producto->nombre_producto }} </label> 
                                </td>
                                <td><b> {{ $detalle->cantidad }} </b></td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="3">
                                <a href="{{ route('pedido.index') }}" class="btn btn-default pull-left"><b> Volver a la lista </b> </a>
                                <a href="{{ route('pedido.create') }}" class="btn btn-success pull-right"><b> Nueva (+) </b> </a>
                                <!--<a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-warning pull-right">Editar</a>
                                <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            
                                {!! Form::model($pedido, ['route' => ['pedido.update', $pedido->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                                {!! Form::close() !!}-->
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection