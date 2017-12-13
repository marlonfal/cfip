@extends ('Layouts.app') @section ('title', 'Inicio') @section ('content')

<div class="container animatedParent animateOnce" style="background-color: rgba(f,f,f,0.5);">
	<div class="row">
		@role(['admin', 'vendedor'])
		<div class="col-md-6" style="padding: 5px;">
			<div class="panel panel-primary animated bounceInDown">
				<div class="panel-heading" style="margin: 0;;">
					<h3 style="padding: 0px; margin: 6px;">
						<b>Pedidos pendientes 
							<i class="fa fa-clock-o" aria-hidden="true"></i>
							
						</b>
						<span class="pull-right">&nbsp;</span>
						<a href=" {{route('pedido.index')}} " class="btn btn-default pull-right">Ver todos
							<i class="fa fa-eye"></i>
						</a>
					</h3>
					<p style="margin: 0px;"> &nbsp;&nbsp;Totales: <span class="badge">{{$cantidadpedidospendientes}}</span>
							Para hoy: <span class="badge">{{$cantidadpedidospendienteshoy}}</span></p>
					@if(Session::has('infopedidopendiente'))
					<div class="animatedParent animateOnce">
						<div class="alert alert-info animated bounceInRight" style="padding: 5px; margin: 0;" align="center">
							<button type="button" class="close" data-dismiss="alert">
								<span>&times;</span>
							</button>
							<b> {{Session::get('infopedidopendiente')}} </b>
						</div>
					</div>
					@endif
				</div>
				<div class="panel-body" style="padding: 0;" id="pedidospendientes">
					<table class="table table-bordered" style="margin: 0px;">
						<tbody>
							@foreach($pedidospendientes as $pedido)
							<tr>
								<td colspan="5" style="margin: 0; padding: 0;  border: 0px solid #ffffff">
									<div class="accordion-container">
										<b class="accordion-titulo">
											<table class="table table-bordered" style="margin: 0; padding: 0;">
												<tr style="margin: 0; padding: 0;">
													<td class="pd" style="width: 36%;">
														<i class="fa fa-user-o"></i> {{ $pedido->nombre }}</td>
													<td class="pd" colspan="2" style="width: 30%;">
														<i class="fa fa-calendar"></i> {{ $pedido->fecha_entrega }}
														<i class="fa fa-clock-o"></i> {{ $pedido->hora_entrega }}</td>
													<td class="pd" style="width: 30%;">
														</i> {{ $pedido->telefono }}
														<i class="fa fa-phone"></i>
													</td>
													<td class="pd" align="center" style="width: 3%;">
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
															<th>Unidades pedidas</th>
															<th>Unidades disponibles</th>
														</tr>
													</thead>
													<tbody class="centertext">
														@foreach($pedido->detalles as $pd)
														<tr>
															<td>{{ $pd->id_tipo_producto }}</td>
															<td>{{ $pd->cantidad }}</td>
															@if($pd->cantidad > $pd->cantidaddisponible)
															<td class="menos5productos">
															@else
															<td>
															@endif
															{{ $pd->cantidaddisponible }}</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											<a href="{{ route('cancelarpedido', $pedido->id) }}" class="btn btn-danger pull-left">
												Cancelar
												<i class="fa fa-times" aria-hidden="true"></i>
												</i>
											</a>
											<a href="{{ route('pedidoencamino', $pedido->id) }}" class="btn btn-success pull-right">
												En camino
												<i class="fa fa-motorcycle"></i>
											</a>
											<span class="pull-right">&nbsp;</span>
											@if($pedido->id_factura != 0)
											<a target="_blank" href="{{ route('imprimirfactura', $pedido->id_factura) }}" class="btn btn-success pull-right">
												Ver factura
												<i class="fa fa-eye"></i>
											</a>
											@else
											<a target="_blank" href="{{ route('pedido/factura/', $pedido->id) }}" class="btn btn-primary pull-right">
												Facturar
												<i class="fa fa-pencil-square-o"></i>
											</a>
											@endif

										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6" style="padding: 5px;">
			<div class="panel panel-primary animated bounceInDown">
				<div class="panel-heading">
					<h3>Productos
						<span class="pull-right">&nbsp;</span>
						<a href=" {{route('producto.index')}} " class="btn btn-default pull-right">Ver todos
							<i class="fa fa-eye"></i>
						</a>
					</h3>
				</div>
				<div class="panel-body" style="padding: 0;">
					<table class="table table-bordered table-hover" style="margin: 0px;">
						<thead>
							<th>Nombre</th>
							<th>Unidades disponibles</th>
							<th class="hidden-xs">Opciones</th>
						</thead>
						<tbody>
							@foreach($productos as $producto) @if($producto->cantidad
							<=5 ) <tr class="menos5productos">
								@elseif($producto->cantidad
								<=10) <tr class="menos10productos">
									@else
									<tr>
										@endif

										<td>
											<b> {{ $producto->nombre }} </b>
										</td>
										<td>{{ $producto->cantidad }}</td>
										<td align="center" style="padding: 0;">
											<a href="{{ route('producto.show', $producto->id) }}" class="btn btn-success">
												Ver
												<i class="fa fa-eye"></i>
											</a>
											<a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning">
												Editar
												<i class="fa fa-pencil-square-o"></i>
											</a>
										</td>

									</tr>
									@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6" style="padding: 5px;">
			<div class="panel panel-primary animated bounceInDown">
				<div class="panel-heading" style="margin: 0;">
					<h3>
						<b>Pedidos en camino <span class="badge">{{$cantidadpedidosencamino}}</span>
							<i class="fa fa-motorcycle" aria-hidden="true"></i>
						</b>
						<span class="pull-right">&nbsp;</span>
						<a href=" {{route('pedido.index')}} " class="btn btn-default pull-right">Ver todos
							<i class="fa fa-eye"></i>
						</a>
					</h3>
					@if(Session::has('infopedidoentregado'))
					<div class="animatedParent animateOnce">
						<div class="alert alert-info animated bounceInRight" style="padding: 5px; margin: 0;" align="center">
							<button type="button" class="close" data-dismiss="alert">
								<span>&times;</span>
							</button>
							<b> {{Session::get('infopedidoentregado')}} </b>
						</div>
					</div>
					@endif
				</div>
				<div class="panel-body" style="padding: 0;">
					<table class="table table-bordered" style="margin: 0px;">
						<tbody>
							@foreach($pedidosencamino as $pedido)
							<tr>
								<td colspan="5" style="margin: 0; padding: 0;  border: 0px solid #ffffff">
									<div class="accordion-container">
										<b class="accordion-titulo">
											<table class="table table-bordered" style="margin: 0; padding: 0;">
												<tr style="margin: 0; padding: 0;">
													<td class="pd" style="width: 36%;">
														<i class="fa fa-user-o"></i> {{ $pedido->nombre }}</td>
													<td class="pd" colspan="2" style="width: 30%;">
														<i class="fa fa-calendar"></i> {{ $pedido->fecha_entrega }}
														<i class="fa fa-clock-o"></i> {{ $pedido->hora_entrega }}</td>
													<td class="pd" style="width: 30%;">
														</i> {{ $pedido->telefono }}
														<i class="fa fa-phone"></i>
													</td>
													<td class="pd" align="center" style="width: 3%;">
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
														</tr>
													</thead>
													<tbody>
														@foreach($pedido->detalles as $pd)
														<tr>
															<td>{{ $pd->id_tipo_producto }}</td>
															<td>{{ $pd->cantidad }}</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											<a href="{{ route('pedidonoentregado', $pedido->id) }}" class="btn btn-danger pull-left">
												No entregado
												<i class="fa fa-times" aria-hidden="true"></i>
												</i>
											</a>
											<a href="{{ route('pedidoentregado', $pedido->id) }}" class="btn btn-primary pull-right">
												Entregado
												<i class="fa fa-check-square-o" aria-hidden="true"></i>
												</i>
											</a>
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
				</div>
			</div>
		</div>
		<div class="col-md-6" style="padding: 5px;">
			<div class="panel panel-primary animated bounceInDown">
				<div class="panel-heading">
					<h3>Últimas 5 ventas
						<a href=" {{route('factura.create')}} " class="btn btn-success pull-right">Nueva
							<i class="fa fa-plus"></i>
						</a>
						<span class="pull-right">&nbsp;</span>
						<a href=" {{route('factura.index')}} " class="btn btn-default pull-right">Ver todas
							<i class="fa fa-eye"></i>
						</a>
					</h3>
				</div>
				<div class="panel-body" style="padding: 0;">
					<table class="table table-bordered" style="margin: 0px;">
						<thead>
							<th class="hidden-xs">#</th>
							<th class="hidden-xs">Fecha</th>
							<th>Comprador</th>
							<th>Total</th>
							<th>Opciones</th>
						</thead>
						<tbody>
							@foreach($facturas as $factura)
							<tr style="line-height: 20px; min-height: 20px; height: 20px;">
								<td class="hidden-xs">{{ $factura->id }}</td>
								<td class="hidden-xs">{{ $factura->fecha }}</td>
								<td>{{ $factura->comprador }}</td>
								<td>{{ $factura->total }}</td>
								<td align="center" style="padding: 0;">
									<a href="{{ route('factura.show', $factura->id) }}" class="btn btn-success">
										Ver
										<i class="fa fa-eye"></i>
									</a>
								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endrole @role('cliente')
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="padding: 5px;">
				<div class="panel panel-primary animated bounceInDown">
					<div class="panel-heading" style="margin: 0;">
						<h3>
							<b>Mis pedidos
								<i class="fa fa-motorcycle" aria-hidden="true"></i>
							</b>
							<span class="pull-right">&nbsp;</span>
							<a href=" {{route('pedido.create')}} " class="btn btn-success pull-right">Nuevo
								<i class="fa fa-plus"></i>
							</a>
						</h3>
						@if(Session::has('infopedidocliente'))
						<div class="animatedParent animateOnce">
							<div class="alert alert-info animated bounceInRight" style="padding: 5px; margin: 0;" align="center">
								<button type="button" class="close" data-dismiss="alert">
									<span>&times;</span>
								</button>
								<b> {{Session::get('infopedidocliente')}} </b>
							</div>
						</div>
						@endif
					</div>
					<div class="panel-body" style="padding: 0;">
						<table class="table table-bordered" style="margin: 0px;">
							<tbody>
								@foreach($pedidoscliente as $pedido)
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
															</tr>
														</thead>
														<tbody>
															@foreach($pedido->detalles as $pd)
															<tr>
																<td>{{ $pd->id_tipo_producto }}</td>
																<td>{{ $pd->cantidad }}</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
												<span></span>

												@if($pedido->estado == 'Pendiente')
												<a target="_blank" href="{{ route('cancelarpedido', $pedido->id) }}" class="btn btn-danger pull-right">
													Cancelar Pedido
													<i class="fa fa-times"></i>
												</a>
												@endif @if($pedido->id_factura != 0)
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
					</div>
					<div class="panel-footer">
						<a href="{{ url('/') }}" class="btn btn-default">Ir a la página web</a>
					</div>
				</div>
			</div>
		</div>
		@endrole
	</div>
</div>
@endsection('content') @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection