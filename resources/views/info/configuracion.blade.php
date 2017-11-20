@extends ('Layouts.app')
@section ('content')

<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp">

            <div class="panel-heading">
                    <h1>Bienvenido al módulo de configuración</h1>
            </div>
            <center>
                <div class="panel-body">               
                    <h4 class="seccion"><b> AÑADIR </b></h4>
                    <a href="{{ route('producto.create') }}" class="btn btn-yellow">PRODUCTO</a>
                    <a href="{{ route('tipodegasto.create' )}}" class="btn btn-yellow">TIPO DE GASTO</a>

                    <h4 class="seccion"><b> POR DEFINIR </b></h4>
                    <a href="{{ route('producto.create') }}" class="btn btn-yellow">POR DEFINIR</a>
                    <a href="{{ route('tipodegasto.create' )}}" class="btn btn-yellow">POR DEFINIR</a>
                    <a href="{{ route('tipodegasto.create' )}}" class="btn btn-yellow">POR DEFINIR</a>

                    <h4 class="seccion"><b> POR DEFINIR </b></h4>
                    <a href="{{ route('producto.create') }}" class="btn btn-yellow">POR DEFINIR</a>
                    <a href="{{ route('tipodegasto.create' )}}" class="btn btn-yellow">POR DEFINIR</a>
                    <a href="{{ route('tipodegasto.create' )}}" class="btn btn-yellow">POR DEFINIR</a>
                </div>
            </center>

    </div>  
</div>
@endsection('content')