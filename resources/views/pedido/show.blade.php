@extends('layouts.app') @section('title', 'Detalles pedido') @section('content')
<div class="container animatedParent animatedOnce">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				@include('_mensaje')
				<table width="100%">
					<tr>
						<td colspan="2">
							<img src="{{ asset('img/logo.png') }}" class="img-responsive pull-right" alt="" height="100" width="100" style="padding-top: 0px; margin: 0px;">
						</td>
						<td>
							<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 32px;">Detalles del pedido #{{ $pedido->id }} </h1>
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
			<div class="panel-body" style="padding: 0px;">
				<table class="table table-bordered" style="margin: 0px;">
					<tbody>
						<tr>
							@if($pedido->estado == 'Pendiente')
							<td>
								{!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }}
								<i class="fa fa-clock-o"></i>
							</td>
							@endif @if($pedido->estado == 'En camino')
							<td>
								{!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }}
								<i class="fa fa-motorcycle"></i>
							</td>
							@endif @if($pedido->estado == 'Entregado')
							<td>
								{!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }}
								<i class="fa fa-check-square-o"></i>
							</td>
							@endif @if($pedido->estado == 'Cancelado')
							<td>
								{!! Form::label('fecha', 'Estado: ') !!} {{ $pedido->estado }}
								<i class="fa fa-times"></i>
							</td>
							@endif
							<td>
								{!! Form::label('comprador', 'Comprador: ') !!} {{$pedido->nombre}}
							</td>
							<td>
								{!! Form::label('fecha', 'Dirección: ') !!} {{ $pedido->direccion }}
							</td>
						</tr>
						<tr>
							<td>
								{!! Form::label('fecha', 'Fecha creado: ') !!} {{ $pedido->created_at }}
							</td>
							<td>
								{!! Form::label('comprador', 'Fecha entrega: ') !!} {{$pedido->fecha_entrega}}
							</td>
							<td>
								{!! Form::label('fecha', 'Hora Entrega (24h): ') !!} {{ $pedido->hora_entrega }}
							</td>
						</tr>
						<tr>
						</tr>
						<tr class="bg-primary" align="center">
							<td>
								<b> Número </b>
							</td>
							<td>
								<b>Producto </b>
							</td>
							<td>
								<b> Cantidad </b>
							</td>
						</tr>
						@foreach($detalles as $detalle)
						<tr align="center">
							<td>{{ $detalle->id_detalle }}</td>
							<td>
								<label>{{ $detalle->producto->nombre }} </label>
							</td>
							<td>
								<b> {{ $detalle->cantidad }} </b>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
			@if($pedido->estado != 'Cancelado')
			<div class="panel-footer">
				@role('cliente')
				<a href="{{ route('inicio') }}" class="btn btn-default pull-left">
					<b> Ir a inicio </b>
				</a>
				@endrole
				@role(['admin', 'vendedor'])
				<a href="{{ route('pedido.index') }}" class="btn btn-default pull-left">
					<b> Volver a la lista </b>
				</a>
				@endrole @if($pedido->id_factura == 0)
					@if(Auth::user()->name == $pedido->nombre)
						<a href="{{ route('cancelarpedido', $pedido->id) }}" class="btn btn-danger pull-right">
							Cancelar pedido
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>
					@endif
				@else


				<span class="pull-right">
					<b> Pedido facturado </b>
					<a href="{{ route('descargarfactura', $pedido->id_factura )}}" class="btn btn-success">Ver factura</a>
				</span>
                @endif
				<span>&nbsp;</span>
				<br>
				<span>&nbsp;</span>
			</div>
			@endif
		</div>
	</div>
</div>

@endsection @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection