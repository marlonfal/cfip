@extends('layouts.app')
@section('title', 'Editar pedido')
@section('content')
<div class="container animatedParent animatedOnce">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary animated bounceInUp">
            <div class="panel-heading">
                <h1 align="center">Editar pedido # {{ $pedido->id}}</h1>
            </div>
            @include('_error')
            {!! Form::open(['route' => ['pedido.update', $pedido], 'method' => 'PATCH']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th colspan="4"> 
                            <div align="center">
                            <img src="{{ asset('img/logo.png') }}" class="img-responsive" alt="" height="100" width="100" >
                            </div>
                            <p align="center">Pollo 100% campesino</p>
                            <p align="center">Nit 12312312312</p>
                        </th>
                    </thead>
                    <tbody id="productospedido">                
                        <tr>
                            <td colspan="4">
                                {!! Form::label('nombre', 'Nombre: ') !!}
                                {!! Form::text('nombre',Auth::user()->name,['class' => 'form-control', 'readonly' => 'readonly', 'required' => 'required'] ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="form-group">
                                    {!! Form::label('estado', 'Estado: ') !!}
                                    {!! Form::select('estado', ['' => 'Seleccione', 'Pendiente' => 'Pendiente', 'En camino' => 'En camino', 'Entregado' => 'Entregado', 'Cancelado' => 'Cancelado'], $pedido->estado, ['class' => 'form-control', 'required' => 'required'] ) !!}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                {!! Form::label('direccion', 'Dirección: ') !!}
                                {!! Form::text('direccion', $pedido->direccion, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                {!! Form::label('fecha_entrega', 'Fecha entrega: ') !!}
                                {!! Form::date('fecha_entrega', $pedido->fecha_entrega, ['class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                            <td colspan="2">
                                {!! Form::label('hora_entrega', 'Hora entrega: ') !!}
                                {!! Form::time('hora_entrega', $pedido->hora_entrega, ['class' => 'form-control', 'required' => 'required', 'min' => '0', 'max' => '']) !!}
                            </td>
                        </tr>
                        <tr>   
                        </tr>
                        <tr class="bg-warning" align="center">
                            <td width="60"><b> Número </b></td>
                            <td colspan="2"><b> Producto </b></td>
                            <td><b> Cantidad </b></td>
                        </tr>
                        @foreach($detalles as $detalle)
                        {!! Form::hidden('cantidaddetalles', $loop->count, ['class' => 'form-control', 'hidden']) !!}
                        <tr align="center">
                            <td><b> {{ $detalle->id_detalle }} {!! Form::hidden('iddetalle'.$loop->iteration, $detalle->id, ['class' => 'form-control', 'hidden']) !!}</b></td>
                            <td colspan="2"><b> {{ $detalle->producto->nombre}} </b></td>
                            <td width="60"><b>   {!! Form::text('cantidaddetalle'.$loop->iteration, $detalle->cantidad, ['class' => 'form-control']) !!}  </b></td>
                        </tr>
                        @endforeach
                    </tbody>
                        <input type="text" name="cantidaddetalles" id="cantidaddetalles"  hidden/>        
                        <tr align="center">
                            <td colspan="4">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                                <a href="{{ url()->previous() }}" class="btn btn-default pull-left"><b> Volver </b> </a>
                            </td>
                        </tr>
                </table>
            {!! Form::close() !!}   
            </div>
        </div>
    </div>
</div>

@endsection