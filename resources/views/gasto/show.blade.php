@extends('layouts.app')
@section('title', 'Detalles gasto #'. $gasto->id)
@section('content')
<div class="container animatedParent">
    <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                @include('_mensaje')
                <h1 align="center">Detalles del gasto #{{ $gasto->id }}
                </h1>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    {!! Form::label('tipodegasto', 'Tipodegasto: ') !!}                       
                                    {{ $gasto->tipodegasto->nombre_tipo_gasto }}
                                </td>
                                <td colspan="3">
                                    {!! Form::label('descripcion', 'Descripción: ') !!}                       
                                    {{ $gasto->descripcion }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" width="100">
                                    {!! Form::label('registradopor', 'Registrado por: ') !!}                       
                                    {{$gasto->usuario}}
                                </td>
                                <td colspan="3">
                                    {!! Form::label('fecha', 'Fecha: ') !!}
                                    {{ $gasto->fecha }}
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr class="bg-warning" align="center">
                                <td width="60"><b> Número </b></td>
                                <td colspan="3"><b>Producto </b></td>
                                <td><b> Cantidad </b></td>
                                <td><b> Precio </b></td>
                            </tr>
                            @foreach($detalles as $detalle)
                                <tr align="center">
                                    <td width="60">{{ $detalle->id_detalle }}</td>
                                    <td colspan="3">
                                        <label>{{ $detalle->producto}} </label> 
                                    </td>
                                    <td width="60"><b> {{ $detalle->cantidad }} </b></td>
                                    <td width="60"><b> {{ $detalle->precio }} </b></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <p align="right"><b> Total </b></p>
                                </td>
                                <td colspan="1">
                                    <p align="center">$ <b> {{ $gasto->total }} </b></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('gasto.index') }}" class="btn btn-default pull-left"><b> Volver a la lista </b></a>
                <a href="{{ route('gasto.create') }}" class="btn btn-success btn-md pull-right"> 
                    Nuevo 
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </a> 
                <span class="pull-right"> &nbsp; </span>    
                
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
@endsection
