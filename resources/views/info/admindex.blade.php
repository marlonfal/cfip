@extends ('Layouts.app')
@section ('content')

<div class="container animatedParent" style="background-color: rgba(f,f,f,0.5);">
    <div class="panel panel-default animated bounceInUp" id="div" style="background-color: rgba(0,0,0,0.01);" border="0">
        <center>
            <div class="seccion panel-heading" style="height: 100px !important">
                <h1>Bienvenido {{ Auth::user()->name }}</h1>
            </div>
            <div class="panel-body">
                <div>
                    <h4 class="seccion"><b> REGISTROS </b></h4>
                    <a href="{{ route('factura.create') }}" class="btn btn-yellow">VENTA</a>
                    <a href="#" class="btn btn-yellow">GASTO</a>
                </div>
                <div>
                    <h4 class="seccion"><b>  BÚSQUEDA </b></h4>
                    <a href="{{ route('factura.index') }}" type="button" class="btn btn-yellow">FACTURA</a>
                    <a href="" type="button" class="btn btn-yellow">CLIENTE</a>
                    <a href="" type="button" class="btn btn-yellow">PROVEEDOR</a>
                </div>

                <div>
                    <h4 class="seccion"><b> VER </b></h4>
                    <a href="" type="button" class="btn btn-yellow">PEDIDOS</a>
                    <a href="" type="button" class="btn btn-yellow">INVENTARIO</a>
                    <a href="" type="button" class="btn btn-yellow">BALANCE</a>
                </div>
            </div>
            <div class="seccion"></div>
        </center>
    </div>  
</div>
@endsection('content')