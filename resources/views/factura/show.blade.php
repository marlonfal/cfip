@extends('layouts.app')
@section('title', 'Detalles venta')
@section('content')
<div class="container animatedParent">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                @include('_mensaje')
                <h1 align="center">Detalles de la venta #{{ $factura->id }}
                    <a href="{{ route('imprimirfactura', $factura->id) }}" target="_blank" class="btn btn-default pull-right">
                        <i class="fa fa-print fa-2x" aria-hidden="true"></i>
                    </a>
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
                            <td colspan="2" width="100">
                                {!! Form::label('comprador', 'Comprador: ') !!}                       
                                {{$factura->comprador}}
                            </td>
                            <td colspan="2" width="100">
                                {!! Form::label('vendedor', 'Vendedor: ') !!}                       
                                {{$factura->vendedor}}
                            </td>
                            <td colspan="2">
                                {!! Form::label('fecha', 'Fecha: ') !!}
                                {{ $factura->fecha }}
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="bg-warning" align="center">
                            <td width="60"><b> Número </b></td>
                            <td colspan="2"><b>Producto: id - nombre </b></td>
                            <td width="60"><b> Peso </b></td>
                            <td width="60"><b> Cantidad </b></td>
                            <td><b> Precio </b></td>
                        </tr>
                        @foreach($detalles as $detalle)
                            <tr align="center">
                                <td width="60">{{ $detalle->id_detalle }}</td>
                                <td colspan="2">
                                    <label>{{ $detalle->id_tipo_producto}} - {{ $detalle->producto->nombre_producto }} </label> 
                                </td>
                                <td width="60"><b> {{ $detalle->peso_gramo }} </b></td>
                                <td width="60"><b> {{ $detalle->cantidad }} </b></td>
                                <td><b>$ {{ $detalle->precio }} </b></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">
                                <p align="right"><b> Total </b></p>
                            </td>
                            <td colspan="1">
                                <p align="center">$ <b> {{ $factura->total }} </b></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <a href="{{ route('factura.index') }}" class="btn btn-default pull-left"><b> Volver a la lista </b></a>
                <a href="{{ route('factura.create') }}" class="btn btn-success btn-md pull-right"> 
                    Nueva 
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </a> 
                <span class="pull-right"> &nbsp; </span>    
                <!-- <a href="{{ route('factura.edit', $factura->id) }}" class="btn btn-warning pull-right">
                    Editar
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                </a> -->
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
@endsection
