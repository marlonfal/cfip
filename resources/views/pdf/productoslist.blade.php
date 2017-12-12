<!DOCTYPE html>
<html>
<body>
<style>
    table,td, th {
        border: 1px solid black;
        text-align: center;
    }
</style>
<div class="container">
    <table width="100%" cellspacing="0" cellpadding="2" bordercolor="666633">
        <tr>
            <td align="center" style="padding-top: 20px;">
                <img src="{{ asset('img/logo.png')}}" alt="" witdh="58" height="58"> <br>
            </td>
            <td align="center"><h1>Listado de productos en inventario</h1></td>
        </tr>
   </table>
   <table class="table" width="100%" cellspacing="0" cellpadding="2" bordercolor="666633">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Unidades disponibles</th>
                <th>Kilos disponibles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td> {{$producto->id}} </td>
                    <td> {{$producto->nombre}} </td>
                    <td> {{$producto->cantidad}} </td>
                    <td> {{$producto->gramos}} </td>
                </tr>
            @endforeach
        </tbody>
   </table>
</div>
    

</body>
</html>