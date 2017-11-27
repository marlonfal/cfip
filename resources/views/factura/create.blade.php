@extends('layouts.app')
@section('title', 'Registrar venta')
@section('content')
<div class="container animatedParent">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary animated bounceInUp">
            <div class="panel-heading">
                <h1 align="center">Registrar venta</h1>
            </div>
            @include('_error')
            {!! Form::open(['route' => 'factura.store', 'name' => 'guardarventa']) !!}
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
                    <tbody id="productosfactura">                
                        <tr>
                            <td colspan="2">
                                {!! Form::label('comprador', 'Comprador') !!}
                                {!! Form::text('comprador', null, ['class' => 'form-control', 'id' => 'comprador', 'required' => 'required']) !!}
                            </td>
                            <td colspan="2">
                                {!! Form::label('vendedor', 'Vendedor') !!}
                                {!! Form::text('vendedor', Auth::user()->name, ['class' => 'form-control', 'id' => 'fecha', 'readonly' => 'readonly']) !!}
                            </td>
                            <td colspan="2">
                                {!! Form::label('fecha', 'Fecha') !!}
                                {!! Form::date('fecha', \Carbon\Carbon::now()->subHours(5), ['class' => 'form-control', 'id' => 'fecha', 'required' => 'required']) !!}
                            </td>
                        </tr>
                        <tr>   
                        </tr>
                        <tr class="bg-warning" align="center">
                            <td width="60"><b> Número </b></td>
                            <td><b> Producto </b></td>
                            <td><b> Peso </b></td>
                            <td><b> Cantidad </b></td>
                            <td><b> Precio </b></td>
                            <td colspan="1"></td>
                        </tr>
                    </tbody>
                        <tr>
                            <td colspan="6">
                                <center>
                                    <a class="btn btn-success" id="add_producto()" onClick="addProducto()"> Agregar producto <i class="fa fa-plus" aria-hidden="true"></i></a>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right"><b>Total: </b></td>
                            <td colspan="2">
                                <input type="number" readonly="readonly" id="total" name="total" class="form-control pull-left" placeholder="0" />
                            </td>
                        </tr>
                        <input type="text" name="cantidaddetalles" id="cantidaddetalles"  hidden/>                        
                </table>
               
            </div>
            <div class="panel-footer">
                <input type="button" onclick="confirmarventa()" value="Guardar" class="btn btn-primary pull-right">
                <a href="{{ url()->previous() }}" class="btn btn-default pull-left"><b> Volver </b> </a>
                <span>&nbsp;</span><br><span>&nbsp;</span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection