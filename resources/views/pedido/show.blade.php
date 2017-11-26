@extends('layouts.app')
@section('title', 'Detalles pedido')
@section('content')
<div class="container animatedParent">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                @include('_mensaje')
                <h1 align="center">Detalles del pedido #{{ $pedido->id }}
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
                            @if($pedido->estado == 'Pendiente')
                                <td>
                                    {!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }} <i class="fa fa-clock-o"></i> 
                                </td>
                            @endif
                            @if($pedido->estado == 'En camino')
                                <td>
                                    {!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }} <i class="fa fa-motorcycle"></i> 
                                </td>
                            @endif
                            @if($pedido->estado == 'Entregado')
                                <td>
                                    {!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }} <i class="fa fa-check-square-o"></i> 
                                </td>
                            @endif
                            @if($pedido->estado == 'Cancelado')
                                <td>
                                    {!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }} <i class="fa fa-times"></i> 
                                </td>
                            @endif
                            <td>
                                {!! Form::label('comprador', 'Comprador: ') !!}                       
                                {{$pedido->nombre}}
                            </td>
                            <td>
                                {!! Form::label('fecha', 'Dirección: ') !!}
                                {{ $pedido->direccion }} 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('fecha', 'Fecha creado: ') !!}
                                {{ $pedido->created_at }} 
                            </td>
                            <td>
                                {!! Form::label('comprador', 'Fecha entrega: ') !!}                       
                                {{$pedido->fecha_entrega}}
                            </td>
                            <td>
                                {!! Form::label('fecha', 'Hora Entrega (24h):  ') !!}
                                {{ $pedido->hora_entrega }} 
                            </td>                   
                        </tr>
                        <tr>
                        </tr>
                        <tr class="bg-primary" align="center">
                            <td><b> Número </b></td>
                            <td><b>Producto </b></td>
                            <td><b> Cantidad </b></td>
                        </tr>
                        @foreach($detalles as $detalle)
                            <tr align="center">
                                <td>{{ $detalle->id_detalle }}</td>
                                <td>
                                    <label>{{ $detalle->producto->nombre_producto }} </label> 
                                </td>
                                <td><b> {{ $detalle->cantidad }} </b></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @if($pedido->estado != 'Cancelado')
            <div class="panel-footer">
                @role('admin')
                <a href="{{ route('pedido.index') }}" class="btn btn-default pull-left">
                    <b> Volver a la lista </b> 
                </a>
                @endrole
                <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-warning pull-right">
                    Editar
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                           
                <span class="pull-right">&nbsp;</span>
                
                <span>&nbsp;</span> <br>   <span>&nbsp;</span>            
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection