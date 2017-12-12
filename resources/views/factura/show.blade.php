@extends('layouts.app') @section('title', 'Detalles venta #'. $factura->id) @section('content')
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
								<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 0px;">Detalles de la venta #{{ $factura->id }}
								<a href="{{ route('imprimirfactura', $factura->id) }}" target="_blank" class="btn btn-default pull-right">
									<i class="fa fa-print fa-2x" aria-hidden="true"></i>
								</a></h1>
							</td>
						</tr>
					</table>
					
				</h1>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
			<div class="panel-body" style="padding: 0;">
				<div class="table-responsive">
					<table class="table table-bordered" style="margin: 0;">
						<tbody>
							<tr>
								<td colspan="2" width="100">
									{!! Form::label('comprador', 'Comprador: ') !!} {{$factura->comprador}}
								</td>
								<td colspan="2" width="100">
									{!! Form::label('vendedor', 'Vendedor: ') !!} {{$factura->vendedor}}
								</td>
								<td colspan="2">
									{!! Form::label('fecha', 'Fecha: ') !!} {{ $factura->fecha }}
								</td>
							</tr>
							<tr>
							</tr>
							<tr class="bg-success">
								<td colspan="6" align="center"><b> Productos vendidos </b></td>
							</tr>
							<tr class="bg-primary" align="center">
								<td width="60">
									<b> Número </b>
								</td>
								<td colspan="2">
									<b>Producto </b>
								</td>
								<td width="60">
									<b> Unidades </b>
								</td>
								<td width="80">
									<b> Kilos</b>
								</td>
								<td>
									<b> Precio </b>
								</td>
							</tr>
							@foreach($detalles as $detalle)
							<tr align="center">
								<td width="60">{{ $detalle->id_detalle }}</td>
								<td colspan="2">
									<label>{{ $detalle->producto->nombre }} </label>
								</td>
								<td width="60">
									<b> {{ $detalle->cantidad }} </b>
								</td>
								<td width="60">
									<b> {{ $detalle->peso_kilo }} </b>
								</td>
								<td>
									<b>$ {{ $detalle->precio }} </b>
								</td>
							</tr>
							@endforeach
							<tr class="bg-success">
								<td colspan="6"></td>
							</tr>
							<tr>
								<td colspan="4" align="center">
									<b> Subtotal + IVA: </b>
									<b>$ {{ $factura->subtotal }} + $ {{ $factura->iva }} </b>
								</td>
								<td align="right">
									<b> Total: </b>
								</td>
								<td colspan="1">
									<p align="center">
										<b>$ {{ $factura->total }} </b>
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel-footer">
				<a href="{{ route('factura.index') }}" class="btn btn-default pull-left">
					<b> Volver a la lista </b>
				</a>
				<a href="{{ route('factura.create') }}" class="btn btn-success btn-md pull-right">
					Nueva
					<i class="fa fa-plus-square-o" aria-hidden="true"></i>
				</a>
                
				@role('admin')
                    {!! Form::open(['route' => ['facturanovalida', $factura->id], 'name' => 'facturanovalida', 'method'=>'GET']) !!}
                        <span class="pull-right">&nbsp;</span>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
                        <input type="button" onclick="confirmarfnv()" value="Venta no válida" class="btn btn-danger pull-right">
                    {!! Form::close() !!}
				@endrole
				<span class="pull-right"> &nbsp; </span>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection