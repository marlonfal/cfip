@extends('layouts.app')
@section('title', 'Hacer pedido')
@section('content')
<div class="container animatedParent">
    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 col-md-offset-3">
        <div class="panel panel-primary animated bounceInUp">
            <div class="panel-heading">
                <h1 align="center">Hacer pedido</h1>
            </div>
            @include('_error')
            {!! Form::open(['route' => 'pedido.store', 'name' => 'crearfactura']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body">
                <table class="table table-bordered table-responsive">
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
                                {!! Form::text('nombre',Auth::user()->name,['class' => 'form-control', 'required' => 'required'] ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                {!! Form::label('direccion', 'Dirección: ') !!}
                                {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                {!! Form::label('fecha_entrega', 'Fecha entrega: ') !!}
                                {!! Form::date('fecha_entrega', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                            <td colspan="2">
                                {!! Form::label('hora_entrega', 'Hora entrega: ') !!}
                                {!! Form::time('hora_entrega', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0', 'max' => '']) !!}
                            </td>
                        </tr>
                        <tr>   
                        </tr>
                        <tr class="bg-warning" align="center">
                            <td width="60"><b> Número </b></td>
                            <td><b> Producto </b></td>
                            <td width="90"><b> Cantidad </b></td>
                            <td colspan="1" width="20"></td>
                        </tr>
                    </tbody>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <a class="btn btn-success" id="add_producto()" onClick="addProductoPedido()"><i class="fa fa-plus"></i> Agregar producto</a>
                                </center>
                            </td>
                        </tr>
                        <input type="text" name="cantidaddetalles" id="cantidaddetalles"  hidden/>        
                </table>
            {!! Form::close() !!}   
            </div>
            <div class="panel-footer">
                <input type="button" onclick="confirmarpedido()" value="Hacer pedido" class="btn btn-primary pull-right">
                <a href="{{ url()->previous() }}" class="btn btn-default pull-left"><b> Volver </b> </a>
                <span>&nbsp;</span><br><span>&nbsp;</span>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection