@extends('layouts.app')
@section('title', 'Registrar venta de pedido')
@section('content')
<div class="container animatedParent  animatedOnce">
    <div class="col-md-10 col-md-offset-1 col-sm-12 col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary animated bounceInUp">
            <input type="text" name="iva" id="iva" value="{{ $infogeneral->iva }}"  hidden/>
            <div class="panel-heading">
                <table width="100%">
					<tr>
						<td colspan="2">
							<img src="{{ asset('img/logo.png') }}" class="img-responsive pull-right" alt="" height="100" width="100" style="padding-top: 0px; margin: 0px;">
						</td>
						<td>
							<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 0px;">Registrar venta de pedido </h1>
						</td>
					</tr>
				</table>
            </div>
            @include('_error')
            {!! Form::open(['route' => 'factura.store', 'name' => 'guardarventa']) !!}
            {!! Form::hidden('id_pedido', $pedido->id, ['class'=>'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin: 0;">
                        <tbody id="productosfactura">
                            <tr style="text-align:center;">
                                <td colspan="6"><b>Productos del pedido</b></td>
                            </tr>   
                            <tr style="text-align:center;">
                                <td> # </td>
                                <td colspan="3"><b> Nombre del producto </b></td>
                                <td colspan="2"><b> Cantidad </b></td>
                            </tr>
                            @foreach($detalles as $detalle)
                                <tr style="text-align:center;">
                                    <td>{{ $detalle->id_detalle }}</td>
                                    <td colspan="3">{{ $detalle->producto->nombre }}</td>
                                    <td colspan="2">{{ $detalle->cantidad }}</td>
                                </tr>
                            @endforeach
                            <tr style="text-align:center;">
                                <td colspan="6" class="bg-success"><b>
                                Llena este formulario <i class="fa fa-arrow-down"></i> con los productos del listado
                                <i class="fa fa-arrow-up"></i>
                                </b></td>
                            </tr>           
                            <tr>
                                <td colspan="2">
                                    {!! Form::label('comprador', 'Comprador') !!}
                                    {!! Form::text('comprador', $pedido->nombre, ['class' => 'form-control', 'id' => 'comprador', 'required' => 'required']) !!}
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
                            <tr class="bg-primary" align="center">
                                <td width="60"><b> Número </b></td>
                                <td><b> Producto </b></td>
                                <td><b> Kilos </b></td>
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
                                <td colspan="2" align="right"><b>Subtotal: </b>
                                    <input type="number" readonly="readonly" id="subtotal" name="subtotal" class="form-control pull-left" placeholder="0" />
                                </td>
                                <td colspan="2" align="right"><b>Iva: </b>
                                    <input type="number" readonly="readonly" id="ivacompra" name="ivacompra" class="form-control pull-left" placeholder="0" />
                                </td>
                                <td colspan="4" align="right"><b>Total: </b>
                                    <input type="number" readonly="readonly" id="total" name="total" class="form-control pull-left" placeholder="0" />
                                </td>
                            </tr>
                            <input type="text" name="cantidaddetalles" id="cantidaddetalles"  hidden/>                        
                    </table>
                </div>
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