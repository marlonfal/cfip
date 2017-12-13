@extends('layouts.app') @section('title', 'Registrar venta') @section('content')
<div class="container animatedParent animatedOnce">
	<div class="col-md-10 col-md-offset-1 col-sm-12 col-lg-8 col-lg-offset-2">
		<div class="panel panel-primary animated bounceInUp">
			<input type="text" name="iva" id="iva" value="{{ $infogeneral->iva }}" hidden/>
			<div class="panel-heading">
				<table width="100%">
					<tr>
						<td colspan="2">
							<img src="{{ asset('img/logo.png') }}" class="img-responsive pull-right" alt="" height="100" width="100" style="padding-top: 0px; margin: 0px;">
						</td>
						<td>
							<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 32px;">Registrar venta </h1>
						</td>
					</tr>
				</table>
				@include('error')
			</div>

			{!! Form::open(['route' => 'factura.store', 'name' => 'guardarventa']) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" /> {!! Form::hidden('id_pedido', 0, ['class'=>'form-control']) !!}
			<div class="panel-body" style="padding: 0;">
				<div class="table-responsive">
					<table class="table table-bordered" style="margin: 0;">
						<tbody id="productosfactura">
							<tr>
								<td colspan="2">
									{!! Form::label('comprador', 'Comprador') !!} {!! Form::text('comprador', null, ['class' => 'form-control', 'id' => 'comprador',
									'required' => 'required']) !!}
								</td>
								<td colspan="2">
									{!! Form::label('vendedor', 'Vendedor') !!} {!! Form::text('vendedor', Auth::user()->name, ['class' => 'form-control', 'id'
									=> 'fecha', 'readonly' => 'readonly']) !!}
								</td>
								<td colspan="2">
									{!! Form::label('fecha', 'Fecha') !!} {!! Form::date('fecha', \Carbon\Carbon::now()->subHours(5), ['class' => 'form-control',
									'id' => 'fecha', 'required' => 'required']) !!}
								</td>
							</tr>
							<tr>
							</tr>
							<tr class="bg-primary" align="center">
								<td width="60">
									<b> Número </b>
								</td>
								<td>
									<b> Producto </b>
								</td>
								<td>
									<b> Unidades </b>
								</td>
								<td>
									<b> Kilos </b>
								</td>
								<td>
									<b> Precio </b>
								</td>
								<td colspan="1"></td>
							</tr>
						</tbody>
						<tr>
							<td colspan="6">
								<center>
									<a class="btn btn-success" id="add_producto()" onClick="addProducto()"> Agregar producto
										<i class="fa fa-plus" aria-hidden="true"></i>
									</a>
								</center>
							</td>
						</tr>
						<tr>
							@if($infogeneral->iva != 0)
							<td colspan="2" align="center">
								<b>Subtotal: $</b>
								@else
								<td colspan="2"></td>
								<td colspan="2" align="center">
									<b>Subtotal: $</b>
									@endif
									<input type="number" readonly="readonly" id="subtotal" name="subtotal" class="form-control pull-right" placeholder="0" />
								</td>

								@if($infogeneral->iva != 0)
								<td colspan="2" align="center">
									<b>Iva: $</b>
									<input type="number" readonly="readonly" id="ivacompra" name="ivacompra" class="form-control pull-right" placeholder="0"
									/>
								</td>
								@endif
								<td colspan="4" align="center">
									<b>Total: $ </b>
									<input type="number" readonly="readonly" id="total" name="total" class="form-control pull-right" placeholder="0" />
								</td>
						</tr>
						<input type="text" name="cantidaddetalles" id="cantidaddetalles" hidden/>
						<input type="number" name="obsequio" id="obsequio" value="0" hidden/>
					</table>
				</div>
			</div>
			<div class="panel-footer">
				<input type="button" onclick="confirmarventa()" value="Guardar" class="btn btn-primary pull-right">
				<a href="{{ url()->previous() }}" class="btn btn-default pull-left">
					<b> Volver </b>
				</a>
				<span>&nbsp;</span>
				<br>
				<span>&nbsp;</span>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection