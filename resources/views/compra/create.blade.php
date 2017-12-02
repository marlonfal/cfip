@extends('layouts.app')
@section('title', 'Registrar compra')
@section('content')
<div class="container animatedParent">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary animated bounceInUp">
            <div class="panel-heading">
                <h1 align="center">Registrar compra a proveedor</h1>
            </div>
            @include('_error')
            {!! Form::open(['route' => 'compra.store', 'name' => 'guardarcompra']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin: 0;">
                        <tbody id="productoscompra">                
                            <tr>
                                <td colspan="2">
                                    {!! Form::label('proveedor', 'Proveedor') !!}
                                    {!! Form::text('proveedor', null, ['class' => 'form-control', 'id' => 'proveedor', 'required' => 'required']) !!}
                                </td>
                                <td colspan="2">
                                    {!! Form::label('usuario', 'Registra') !!}
                                    {!! Form::text('usuario', Auth::user()->name, ['class' => 'form-control', 'id' => 'usuario', 'readonly' => 'readonly', 'required' => 'required']) !!}
                                </td>
                                <td colspan="2">
                                    {!! Form::label('fecha', 'Fecha') !!}
                                    {!! Form::date('fecha', \Carbon\Carbon::now()->subHours(5), ['class' => 'form-control', 'id' => 'fecha', 'required' => 'required']) !!}
                                </td>
                            </tr>
                            <tr>   
                            </tr>
                            <tr class="bg-primary" align="center">
                                <td width="60"><b> Número </b></td>
                                <td><b> Producto </b></td>
                                <td><b> Peso (Gr) </b></td>
                                <td><b> Cantidad </b></td>
                                <td><b> Precio </b></td>
                                <td colspan="1"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <td colspan="6">
                                    <center>
                                        <a class="btn btn-success" id="add_producto()" onClick="addProductoCompra()"> Agregar producto <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><b>Total: </b></td>
                                <td colspan="2">
                                    <input type="number" id="total" name="total" class="form-control pull-left" placeholder="0" />
                                </td>
                            </tr>
                            <input type="text" name="cantidaddetalles" id="cantidaddetalles"  hidden/>                        
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <input type="button" onclick="confirmarcompra()" value="Guardar" class="btn btn-primary pull-right">
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