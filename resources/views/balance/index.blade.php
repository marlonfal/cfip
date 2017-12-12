@extends('layouts.app') @section('title', 'Balance') @section('content')

<div class="container animatedParent">
	<div class="panel panel-primary">
		<div class="panel-heading">
			{!! Form::open(['route' => 'balance', 'method' => 'GET','role' => 'search']) !!}
			<div class="row" align="center">
				<div class="form-group col-md-5">
					<h1>Estado de resultados
						<i class="fa fa-area-chart" aria-hidden="true"></i>
					</h1>
				</div>
				<div class="form-group col-md-2">
					{!! Form::label('fechainicio', 'Fecha inicio: ') !!} {!! Form::date('fechainicio', \Carbon\Carbon::now()->subHours(5), ['class'
					=> 'form-control', 'id' => 'fecha', 'required' => 'required']) !!}
				</div>
				<div class="form-group col-md-2">
					{!! Form::label('fechafinal', 'Fecha final: ') !!} {!! Form::date('fechafinal', \Carbon\Carbon::now()->subHours(5), ['class'
					=> 'form-control', 'id' => 'fecha', 'required' => 'required']) !!}
				</div>
				<div class="col-md-1">
					{!! Form::label('', '&nbsp;') !!}
					<br> {!! Form::submit('Buscar', ['class' => 'btn btn-default']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		<div class="panel-body" style="padding-left: 50px; padding-right: 50px;">
			@if($ventas != 0)
			<div class="row">
				<div class="col-md-3" style="padding: 5px;">
					<div class="panel panel-primary animated bounceInDown">
						<div class="panel-heading">
							<h3 align="center">Ventas
							</h3>
						</div>
						<div class="panel-body" style="padding: 0;">
							<h1 align="center"> $ {{ $ventas }} </h1>
						</div>
					</div>
				</div>
				<div class="col-md-3" style="padding: 5px;">
					<div class="panel panel-primary animated bounceInDown">
						<div class="panel-heading">
							<h3 align="center">Compras
							</h3>
						</div>
						<div class="panel-body" style="padding: 0;">
							<h1 align="center"> $ {{ $compras }} </h1>
						</div>
					</div>
				</div>
				<div class="col-md-3" style="padding: 5px;">
					<div class="panel panel-primary animated bounceInDown">
						<div class="panel-heading">
							<h3 align="center">Gastos
							</h3>
						</div>
						<div class="panel-body" style="padding: 0;">
							<h1 align="center"> $ {{ $gastos }} </h1>
						</div>
					</div>
				</div>
				<div class="col-md-3" style="padding: 5px;">
					<div class="panel panel-primary animated bounceInDown">
						<div class="panel-heading">
							<h3 align="center">Ganancias
							</h3>
						</div>
						<div class="panel-body" style="padding: 0;">
							<h1 align="center"> $ {{ $ventas - $compras -$gastos}} </h1>
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>

		<!-- 
        <div class="panel-footer">
            <div class="row">
                <center class="col-md-offset-3">
                    <div class="col-md-2">
                        <a href="#" class="btn btn-primary">Balance hoy</a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="btn btn-primary">Balance última semana</a>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <a href="#" class="btn btn-primary">Balance último mes</a>
                    </div>
                </center>
            </div>
        </div>
        -->
		<div style="margin: 0; padding: 0; " class="bg-primary">
			<br>
			<h3 style="margin: 0; padding: 0; padding-top: 11;" class="bg-primary" align="center">Últimas 5 compras
				<span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
				<a href="{{ route('compra.index') }}" class="btn btn-default pull-right">
					Ver todas
					<i class="fa fa-eye"></i>
				</a>
			</h3>
			<br>
		</div>
		<div style="margin: 0;">
			<table class="table table-bordered" style="margin: 0px;">
				<tbody>
					@foreach($lcompras as $lcompra)
					<tr>
						<td colspan="5" style="margin: 0; padding: 0;  border: 0px solid #ffffff">
							<div class="accordion-container">
								<b class="accordion-titulo">
									<table class="table table-bordered" style="margin: 0; padding: 0;">
										<tr style="margin: 0; padding: 0;">
											<td class="pd" style="width: 36%;">
												<i class="fa fa-truck"></i> {{ $lcompra->proveedor }}</td>
											<td class="pd" style="width: 15%;">
												<i class="fa fa-calendar"></i> {{ $lcompra->fecha }}</td>
											<td class="pd" style="width: 15%;">
												<i class="fa fa-usd"></i> {{ $lcompra->total }}</td>
											<td class="pd" style="width: 30%;">
												<i class="fa fa-user"></i>
												{{ $lcompra->usuario }}
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
													<th>Gramos</th>
													<th>Precio</th>
												</tr>
											</thead>
											<tbody>
												@foreach($lcompra->detalles as $cd)
												<tr>
													<td>{{ $cd->id_tipo_producto }}</td>
													<td>{{ $cd->cantidad }}</td>
													<td>{{ $cd->peso_kilo }}</td>
													<td>{{ $cd->precio }}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
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
@endsection('content') @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection