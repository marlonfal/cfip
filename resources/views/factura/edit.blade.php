@extends('layouts.app')
@section('title', 'Editar venta')
@section('content')
<div class="container animatedParent">
    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Editar venta # {{$factura->id}}</h1>
                </div>
                @include('_error')
                {!! Form::open(['route' => ['factura.update', $factura], 'method' => 'PATCH']) !!}

                <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th colspan="4">
                            <div align="center">
                                <img src="{{ asset('img/logo.png') }}" alt="" height="100" width="100">
                            </div> 
                            <p align="center">Pollo 100% campesino</p>
                            <p align="center">Nit 12312312312</p>
                        </th>
                    </thead>
                    <tbody>
                        <tr><td colspan="4"></td></tr>               
                        <tr>
                            <td colspan="2"> 
                                <b>Vendedor</b> {{ $factura->vendedor }} 
                            </td>
                            <td colspan="2">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::label('fecha', 'Fecha') !!}
                                    {!! Form::date('fecha', $factura->fecha, ['class' => 'form-control']) !!}
                                </div>
                            </td>
                        </tr>
                            <td colspan="4">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::label('comprador', 'Comprador') !!}
                                    {!! Form::text('comprador', $factura->comprador, ['class' => 'form-control']) !!}
                                </div>
                            </td>                    
                        </tr>
                        <tr>
                        </tr>
                        <tr class="bg-warning">
                            <td><b> # </b></td>
                            <td><b> Producto </b></td>
                            <td><b> Cantidad </b></td>
                            <td><b> Precio </b></td>
                        </tr>
                        @foreach($detalles as $detalle)
                        <tr>
                            <td> {{ $detalle->id_detalle}} </td>
                            <td> {{ $detalle->producto->nombre_producto }} </td>
                            <td> {{ $detalle->cantidad }} </td>
                            <td> $ {{ $detalle->precio }} </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" align="right"> <b>Total</b> </td>
                            <td> $ {{ $factura->total }} </td>
                        </tr>
                        <tr align="center">
                            <td colspan="4">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                                <a href="{{ url()->previous() }}" class="btn btn-default pull-left">Volver
                                </a>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
                {!! Form::close() !!}   
            </div>
        </div>
    </div>
</div>
@endsection