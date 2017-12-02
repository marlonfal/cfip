@extends('layouts.app')
@section('title', 'Balance')
@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"> 
        {!! Form::open(['route' => 'balance', 'method' => 'GET','role' => 'search']) !!}
            <div class="row" align="center">
                <div class="form-group col-md-2">
                    <h1>Balance</h1>
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('fechainicio', 'Fecha inicio: ') !!}
                    {!! Form::date('fechainicio', \Carbon\Carbon::now()->subHours(5), ['class' => 'form-control', 'id' => 'fecha', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('fechafinal', 'Fecha final: ') !!}
                    {!! Form::date('fechafinal', \Carbon\Carbon::now()->subHours(5), ['class' => 'form-control', 'id' => 'fecha', 'required' => 'required']) !!}
                </div>
                <div class="col-md-1">
                    {!! Form::label('', '&nbsp;') !!} <br>
                    {!! Form::submit('Buscar', ['class' => 'btn btn-default']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
        <div class="panel-body" style="padding-left: 50px; padding-right: 50px;">
        @if($ventas != 0)
            <div class="row">
                <table class="table table-bordered table-stripped">
                    <tbody>
                        <tr>
                            <td>Ventas:</td> 
                            <td>$ {{ $ventas }}</td>
                        </tr>
                        <tr>
                            <td>Compras:</td> 
                            <td>$ {{ $compras }}</td>
                        </tr>
                        <tr>
                            <td>Gastos:</td> 
                            <td>$ {{ $gastos }}</td>
                        </tr>
                        <tr>
                            <td>Ganancias:</td> 
                            <td>$ {{ $ventas - $gastos - $compras }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        </div>
        <!--
        <div class="panel-footer">
            <div class="row">
                <center class="col-md-offset-3">
                    <div class="col-md-2">
                        <a href="#" class="btn btn-primary">Balance hoy</a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="btn btn-primary">Balance última semana</a>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <a href="#" class="btn btn-primary">Balance último mes</a>
                    </div>
                </center>
            </div>
        </div>
        -->
        <div style="margin: 0; padding: 0; " class="bg-primary">
            <br>
            <h3 style="margin: 0; padding: 0; padding-top: 11;" class="bg-primary" align="center">Últimas 5 compras</h3>
        </div>
        <div class="table-responsive" style="margin: 0;">
            <table class="table table-stripped">
                <thead>
                    <tr class="bg-primary">
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lcompras as $compra)
                        <tr>
                            <td>{{ $compra->fecha }}</td>
                            <td>{{ $compra->proveedor }}</td>
                            <td>{{ $compra->total }}</td>
                            <td style="padding: 0;">
                                <a href="{{ route('compra.show', $compra->id) }}" class="btn btn-success btn-sm">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection