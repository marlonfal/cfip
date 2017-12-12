@extends('layouts.app') @section('title', 'Balance') @section('content')

<div class="container animatedParent">
	<div class="panel panel-primary">
		<div class="panel-heading">
			{!! Form::open(['route' => 'balanceporproductos', 'method' => 'GET','role' => 'search']) !!}
			<div class="row" align="center">
				<div class="form-group col-md-3">
					<h1>Balance por productos
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
		<div class="panel-body" style="padding: 0px;">
		@include('_mensaje')
			<div class="table-resposive">
				<table class="table table-bordered centertext" style="margin: 0px;">
					@if($mt == 0)
					<br> @endif @if($mt == 1)
					<thead>
						<tr>
							<th class="centertext">Producto</th>
							<th class="centertext">Unidades vendidas</th>
							<th class="centertext">Kilos vendidos</th>
							<th class="centertext">Vendidos en</th>
							<th class="centertext">Comprados en</th>
							<th class="centertext">Diferencia</th>
						</tr>
					</thead>
					<tbody>
						@foreach($productos as $producto)
						<tr>
							<td>{{ $producto->nombre }}</td>
							<td>{{ $producto->cantidadventas }}</td>
							<td>{{ $producto->gramosvendidos }}</td>
							<td>$ {{ $producto->totalvendido }}</td>
							<td>$ {{ $producto->totalcomprado }}</td>
							<td>$ {{ $producto->totalvendido - $producto->totalcomprado}}</td>
						</tr>
						@endforeach
						<tr>
							<td>
								{!! Form::open(['route' => 'imprimirbalanceporproductostabla', 'method' => 'GET', 'target' => '_blank']) !!} 
									{{ Form::hidden('fechai', $fechai) }}
									{{ Form::hidden('fechaf', $fechaf) }}
									<button type="submit" class="btn btn-default">Imprimir tabla <i class="fa fa-print"></i></button>
								{!! Form::close() !!}
							</td>
							<td colspan="4" align="right">
								<b>Total:</b>
							</td>

							<td>$ {{ $ganancia }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			@endif
			@if($mt == 1)
			<div class="table-responsive" align="center" style="height: 700px;">
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<script type="text/javascript">
					google.charts.load("current", {packages:['corechart']});
						google.charts.setOnLoadCallback(drawChart);
						function drawChart() {
						var data = google.visualization.arrayToDataTable([
							["Producto", "Ganancia", { role: "style" } ],
							@foreach($productos as $producto)
								["{{ $producto->nombre }}",{{ $producto->totalvendido - $producto->totalcomprado }}, '#'+(Math.random()*0xFFFFFF<<0).toString(16)],
							@endforeach
						]);

						var view = new google.visualization.DataView(data);
						view.setColumns([0, 1,
										{ calc: "stringify",
											sourceColumn: 1,
											type: "string",
											role: "annotation" },
										2]);

						var options = {
							title: "Ganancias por producto",
							width: 800,
							height: 300,
							bar: {groupWidth: "95%"},
							legend: { position: "none" },
						};
						var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
						chart.draw(view, options);
					}
				</script>
				<div id="columnchart_values" style="width: 900px; height: 300px;"></div>

				<div class="table-responsive" align="center" style="height: 400px;">
					<script type="text/javascript">
						google.charts.load("current", {packages:['corechart']});
						google.charts.setOnLoadCallback(drawChart);
						function drawChart() {
						var data = google.visualization.arrayToDataTable([
							["Producto", "Cantidad ventas", { role: "style" } ],
							@foreach($productos as $producto)
								["{{ $producto->nombre }}",{{ $producto->cantidadventas }}, '#'+(Math.random()*0xFFFFFF<<0).toString(16)],
							@endforeach
						]);

						var view = new google.visualization.DataView(data);
						view.setColumns([0, 1,
										{ calc: "stringify",
											sourceColumn: 1,
											type: "string",
											role: "annotation" },
										2]);

						var options = {
							title: "Unidades vendidas",
							width: 800,
							height: 300,
							bar: {groupWidth: "95%"},
							legend: { position: "none" },
						};
						var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
						chart.draw(view, options);
					}
					</script>
					<div id="columnchart" style="width: 900px; height: 300px;"></div>
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