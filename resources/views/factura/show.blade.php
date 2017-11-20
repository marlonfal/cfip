@extends('layouts.app')

@section('content')
<div class="container animatedParent">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary animated bounceInUp">
            <div class="panel-heading">
                @include('_mensaje')
                <h1 align="center">Detalles de la factura #{{ $factura->id }}
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
                        <tr>
                            <td colspan="6">
                                <a href="{{ route('factura.index') }}" class="btn btn-default pull-left"><b> Volver a la lista </b> </a>
                                <a href="{{ route('factura.create') }}" class="btn btn-success pull-right"><b> Nueva (+) </b> </a>
                                <!--<a href="{{ route('factura.edit', $factura->id) }}" class="btn btn-warning pull-right">Editar</a>
                                <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            
                                {!! Form::model($factura, ['route' => ['factura.update', $factura->id], 'method' => 'DELETE']) !!}
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
