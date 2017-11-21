@extends('layouts.app')
@section('title', 'Editar venta')
@section('content')
<div class="container animatedParent">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Editar Factura # {{$factura->id}}</h1>
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
                            <td>
                                <b> Factura número:  {{ $factura->id }} </b> 
                            </td>
                            <td> 
                                <b>Vendedor</b> {{ $factura->vendedor }} 
                            </td>
                            <td>
                                {!! Form::label('fecha', 'Fecha') !!}
                            </td>
                            <td>
                                {!! Form::date('fecha', $factura->fecha, ['class' => 'form-control']) !!}
                            </td>
                        </tr>
                            <td>
                                {!! Form::label('comprador', 'Comprador') !!}
                            </td>
                            <td> 
                                {!! Form::text('comprador', $factura->comprador, ['class' => 'form-control']) !!}
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
                        <tr>
                            <td><b> 1 </b></td>
                            <td><b> Precio </b></td>
                        </tr>
                        <!-- AQUÍ VA EL FOREACH PARA LOS DETALLES -->
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