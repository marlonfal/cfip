@extends('layouts.app') @section('title', 'Pedidos') @section('content')
@role('cliente')
<div class="container animatedParent">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary animated bounceInUp">
				<div class="panel-heading">
					@include('_mensaje')
					<h1 align="center">
						<b>No estás autorizado!</b>
					</h1>
				</div>

				<div class="panel-body" align="center">
                    <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i>
				</div>
			
			<div class="panel-footer">
				<a href="{{ url('inicio') }}" class="btn btn-default">Ir a inicio</a>
			</div></div>
		</div>


	</div>
</div>
@endrole
@role(['admin', 'vendedor'])
<div class="container animatedParent animatedOnce">
	<div class="panel panel-primary animated bounceInUp">
		<div class="panel-heading">
			@include('_mensaje')
			<h1>Listado de pedidos</h1>
		</div>
		{!! Form::open(['route' => 'pedido.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right',
		'role' => 'search']) !!}
		<div class="form-group">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'title' => 'Escriba el nombre del comprador', 'placeholder' => 'Buscar por nombre'] ) !!}
            {!! Form::select('estado', ['' => 'Ver todos', 'Pendiente' =>
			'Pendiente', 'En camino' => 'En camino', 'Entregado' => 'Entregado', 'Cancelado' => 'Cancelado'], null, ['class' => 'form-control'] ) !!}
		</div>
		{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
		<div class="panel-body">
			<h3>Hay {{ $pedidos->total() }} pedidos</h3>
			<table class="table table-bordered" style="margin: 0px;">
				<tbody>
					@foreach($pedidos as $pedido)
					<tr>
						<td colspan="5" style="margin: 0; padding: 0;">
							<div class="accordion-container">
								<b class="accordion-titulo">
									<table class="table table-bordered" style="margin: 0; padding: 0;">
										<tr style="margin: 0; padding: 0;">
											<td style="width: 30%;">
												<i class="fa fa-user-o"></i> {{ $pedido->nombre }}</td>
											<td style="width: 20%;">
												<i class="fa fa-calendar"></i> {{ $pedido->fecha_entrega }}</td>
											<td style="width: 20%;">
												<i class="fa fa-clock-o"></i> {{ $pedido->hora_entrega }}</td>
											<td style="width: 20%;">
												</i> {{ $pedido->estado }} @if($pedido->estado == 'Pendiente')
												<i class="fa fa-clock-o"></i>
												@elseif($pedido->estado == 'En camino')
												<i class="fa fa-motorcycle"></i>
												@elseif($pedido->estado == 'Entregado')
												<i class="fa fa-check-square-o"></i>
												@elseif($pedido->estado == 'Cancelado')
												<i class="fa fa-times"></i>
												@endif
											</td>
											<td align="center" style="width: 10%;">
												<span class="toggle-icon"></span>
											</td>
										</tr>
									</table>

								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<table class="table table-bordered" style="margin: 0px;">
											<thead>
												<tr>
													<th>Producto</th>
													<th>Cantidad</th>
													<th>Cantidad disponible</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pedido->detalles as $pd)
												<tr>
													<td>{{ $pd->id_tipo_producto }}</td>
													<td>{{ $pd->cantidad }}</td>
													<td>{{ $pd->cantidaddisponible }}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
									<span></span>

                                    @if($pedido->estado == 'Pendiente')
                                    <a href="{{ route('pedidoentregado', $pedido->id) }}" class="btn btn-primary pull-right">
										En camino
										<i class="fa fa-motorcycle" aria-hidden="true"></i>
										</i>
									</a>
                                    @elseif($pedido->estado == 'En camino')
									<a href="{{ route('pedidoentregado', $pedido->id) }}" class="btn btn-primary pull-right">
										Entregado
										<i class="fa fa-check-square-o" aria-hidden="true"></i>
										</i>
									</a>
                                    @endif
									<span class="pull-right">&nbsp;</span>
									@if($pedido->id_factura == 0)
									<a href="{{ route('pedido/factura/', $pedido->id) }}" class="btn btn-success pull-right">
										Facturar
										<i class="fa fa-pencil"></i>
									</a>
									@else
									<a target="_blank" href="{{ route('imprimirfactura', $pedido->id_factura) }}" class="btn btn-success pull-right">
										Ver factura
										<i class="fa fa-eye"></i>
									</a>
									@endif
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{!! $pedidos->appends(Request::only(['estado', 'nombre']))->render() !!}
		</div>
	</div>
</div>
@endrole
@endsection('content') @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection