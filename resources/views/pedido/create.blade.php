@extends('layouts.app') @section('title', 'Hacer pedido') @section('content')
<div class="container animatedParent animatedOnce">
	<div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary animated bounceInUp">
			<div class="panel-heading">
				<table width="100%">
					<tr>
						<td colspan="2">
							<img src="{{ asset('img/logo.png') }}" class="img-responsive pull-right" alt="" height="100" width="100" style="padding-top: 0px; margin: 0px;">
						</td>
						<td>
							<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 0px;">Hacer pedido </h1>
						</td>
					</tr>
				</table>
                @include('error')
			</div>
			{!! Form::open(['route' => 'pedido.store', 'name' => 'crearfactura']) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
			<div class="panel-body" style="padding: 0px;">
				<div class="table-responsive">
					<table class="table table-bordered" style="margin: 0px;">
						<tbody id="productospedido">
							<tr>
								<td colspan="4">
									{!! Form::label('nombre', 'Nombre: ') !!} {!! Form::text('nombre',Auth::user()->name,['class' => 'form-control', 'required'
									=> 'required'] ) !!}
								</td>
							</tr>
							<tr>
								<td colspan="4">
									{!! Form::label('telefono', 'Teléfono: ') !!} {!! Form::text('telefono',null,['class' => 'form-control', 'required' => 'required',
                                    'placeholder' => 'Ej: 3186381156']
									) !!}
								</td>
							</tr>
							<tr>
								<td colspan="4">
									{!! Form::label('direccion', 'Dirección: ') !!} {!! Form::text('direccion', null, ['class' => 'form-control', 'required'
									=> 'required', 'placeholder' => 'Plan de vivienda, casa OK 12']) !!}
								</td>
							</tr>
							<tr>
								<td colspan="2">
									{!! Form::label('fecha_entrega', 'Fecha entrega: ') !!} {!! Form::date('fecha_entrega', \Carbon\Carbon::now()->subHours(5),
									['class' => 'form-control', 'required' => 'required', 'width' => '100%']) !!}
								</td>
								<td colspan="2">
									{!! Form::label('hora_entrega', 'Hora entrega: ') !!} {!! Form::time('hora_entrega', '14:03', ['class' => 'form-control', 'required'
									=> 'required', 'min' => '0', 'max' => '']) !!}
								</td>
							</tr>
							<tr>
							</tr>
							<tr class="bg-warning" align="center">
								<td width="60">
									<b> Número </b>
								</td>
								<td>
									<b> Producto </b>
								</td>
								<td width="90">
									<b> Cantidad </b>
								</td>
								<td colspan="1" width="20"></td>
							</tr>
						</tbody>
						<tr>
							<td colspan="4">
								<center>
									<a class="btn btn-success" id="add_producto()" onClick="addProductoPedido()">
										<i class="fa fa-plus"></i> Agregar producto</a>
								</center>
							</td>
						</tr>
						<input type="text" name="cantidaddetalles" id="cantidaddetalles" hidden/>
					</table>
					{!! Form::close() !!}
				</div>
			</div>
			<div class="panel-footer">
				<input type="button" onclick="confirmarpedido()" value="Hacer pedido" class="btn btn-primary pull-right">
				<a href="{{ url()->previous() }}" class="btn btn-default pull-left">
					<b> Volver </b>
				</a>
				<span>&nbsp;</span>
				<br>
				<span>&nbsp;</span>
			</div>
		</div>
	</div>
</div>

@endsection @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection