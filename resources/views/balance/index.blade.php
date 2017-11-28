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
        <div class="panel-footer">
            
        </div>
    </div>
</div>
@endsection