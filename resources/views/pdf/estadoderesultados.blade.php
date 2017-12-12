<style>
	table,
	td,
	th {
		border: 1px solid black;
		text-align: center;
	}
</style>
<table width="100%" cellspacing="0" cellpadding="2" bordercolor="666633">
	<tr>
		<td align="center" style="padding-top: 20px;">
			<img src="{{ asset('img/logo.png')}}" alt="" witdh="58" height="58">
			<br>
		</td>
		<td align="center">
			<h2>Estado de resultados desde {{ $fechai }} hasta {{ $fechaf }}</h2>
		</td>
	</tr>
</table>
<table class="table" style="margin: 0px;" width="100%" cellspacing="0" cellpadding="2" bordercolor="666633">
	<thead>
		<tr>
			<th>Mes</th>
			<th>Total ventas</th>
			<th>Total compras</th>
			<th>Total gastos</th>
			<th>Ganancia</th>
		</tr>
	</thead>
	<tbody>
		@foreach($meses as $mes) @if($mes->ganancia != 0 && $mes->ventas != 0)
		<tr class="centertext">
			<td>{{ $mes->nombre }}
			</td>
			<td>$ {{ $mes->ventas }}
			</td>
			<td>$ {{ $mes->compras }}
			</td>
			<td>$ {{ $mes->gastos }}
			</td>
			<td>$ {{ $mes->ganancia }}
			</td>
		</tr>
		@endif @endforeach
        <tr class="centertext">
			<td><b>Total:</b>
			</td>
			<td><b>$ {{ $ventas }}</b>
			</td>
			<td><b>$ {{ $compras }}</b>
			</td>
			<td><b>$ {{ $gastos }} </b>
			</td>
			<td><b>$ {{ $ventas - $gastos - $compras }} </b>
			</td>
		</tr>
	</tbody>
</table>