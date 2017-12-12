<!DOCTYPE html>
<html>

<body>
<style>
   @page { size: 50mm {{ $height }}pt; margin: 0px;}
   table {
        font-size: 10px;
   }
   body {
       marign: 0px;
   }
   table {
       margin: 0;
   }
   p {
       margin: 0px;
       font-size: 12px;
   }
  </style>
<center>
<br>
    <img src="{{ asset('img/logo.png')}}" alt="" witdh="58" height="58"> <br>
    <p>POLLOS EL PAISITA </p>
    <p>La Buitrera - Palmira </p>
    <p>Tel: 2682668 </p>
    <p>NIT: {{ $nit }} </p>

    <p>Factura de Venta # {{ $factura->id }} </p>
    <p>Fecha {{ $factura->fecha }} </p>
    <p>Comprador: {{ $factura->comprador }} </p>
    <p>Vendedor: {{ $factura->vendedor }} </p>
    ------------------------------------
</center>
    <table align="center">
        <thead>
            <tr>
                <th><b> Producto </b></th>
                <th><b> Gr/Cant  </b></th>
                <th><b> Valor  </b></th>
            </tr>
        </thead>
        <tbody>
        @foreach($detalles as $detalle)
            <tr>
                <td>
                    <label>{{ $detalle->producto->nombre }}</label>
                </td>
                <td>{{ $detalle->peso_kilo }} /  {{ $detalle->cantidad }}</td>
                <td>${{ $detalle->precio }}</td>
            </tr>
        @endforeach
            <tr>
            <td colspan="3">----------------------------------------------------</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>Subtotal: </b></td>
                <td>${{ $factura->subtotal }}</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>+ IVA: </b></td>
                <td>${{ $factura->iva }}</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>Total: </b></td>
                <td>${{ $factura->total }}</td>
            </tr>
            <tr>
            <td colspan="3">----------------------------------------------------</td>
        </tbody>
    </table>
<center>
   <p>Página web </p>
   <p>polloselpaisita.com </p>
   <p>email </p>
   <p>polloselpaisita@gmail.com </p>
   <p>Gracias por su compra!</p>
   <p>Vuelva pronto</p>

</center>
<br>
<p>-</p>
</body>
</html>