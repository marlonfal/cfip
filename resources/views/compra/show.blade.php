@extends('layouts.app')
@section('title', 'Detalles compra #'. $compra->id)
@section('content')
<div class="container animatedParent">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                @include('_mensaje')
                <h1 align="center">Detalles de la compra #{{ $compra->id }}
                </h1>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin: 0;">
                        <tbody>
                            <tr>
                                <td colspan="2" width="100">
                                    {!! Form::label('proveedor', 'Proveedor: ') !!}                       
                                    {{$compra->proveedor}}
                                </td>
                                <td colspan="2" width="100">
                                    {!! Form::label('usuario', 'Registrada por: ') !!}                       
                                    {{$compra->usuario}}
                                </td>
                                <td colspan="2">
                                    {!! Form::label('fecha', 'Fecha: ') !!}
                                    {{ $compra->fecha }}
                                </td>
                            </tr>
                            <tr class="bg-warning" align="center">
                                <td width="60"><b> Número </b></td>
                                <td colspan="2"><b>Producto </b></td>
                                <td width="60"><b> Peso </b></td>
                                <td width="60"><b> Cantidad </b></td>
                                <td><b> Precio </b></td>
                            </tr>
                            
                            @foreach($detalles as $detalle)
                                <tr align="center">
                                    <td width="60">{{ $detalle->id_detalle }}</td>
                                    <td colspan="2">
                                        <label>{{ $detalle->producto->nombre_producto }} </label> 
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
                                    <p align="center">$ <b> {{ $compra->total }} </b></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('compra.index') }}" class="btn btn-default pull-left"><b> Volver a la lista </b></a>
                <a href="{{ route('compra.create') }}" class="btn btn-success btn-md pull-right"> 
                    Nueva 
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </a> 
                <span class="pull-right"> &nbsp; </span>    
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
@endsection
