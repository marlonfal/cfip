<style>
    table,td, th {
        border: 1px solid black;
        text-align: center;
    }
</style>
<table width="100%" cellspacing="0" cellpadding="2" bordercolor="666633">
        <tr>
            <td align="center" style="padding-top: 20px;">
                <img src="{{ asset('img/logo.png')}}" alt="" witdh="58" height="58"> <br>
            </td>
            <td align="center"><h2>Balance por producto desde {{ $fechai }} hasta {{ $fechaf }}</h2></td>
        </tr>
   </table>
<table class="table" style="margin: 0px;" width="100%" cellspacing="0" cellpadding="2" bordercolor="666633">
	<thead>
		<tr>
			<th class="centertext">Producto</th>
			<th class="centertext">Unidades vendidas</th>
			<th class="centertext">Gramos vendidos</th>
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
			<td colspan="5" align="right">
				<b align="right"> Total:</b>
			</td>

			<td>$ {{ $ganancia }}</td>
		</tr>
	</tbody>
</table>
