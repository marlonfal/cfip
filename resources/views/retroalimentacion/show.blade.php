@extends ('layouts.app')
@section('title', 'Detalles retroalimentación')
@section ('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    @include('_mensaje')
                    <h1 align="center"><b>Retroalimentación número {{$retroalimentacion->id}}</b></h1>
                </div>

                <div class="panel-body">  
                @if($retroalimentacion->tipo == "Reclamo")
                    <div class="alert alert-warning">
                @elseif($retroalimentacion->tipo == "Queja")
                    <div class="alert alert-danger">
                @else($retroalimentacion->tipo == "Sugerencia")
                    <div class="alert alert-success">    
                @endif
                        <h3>{{ $retroalimentacion->titulo }}</h3>
                        <h4><b>{{ $retroalimentacion->tipo }} de {{ $retroalimentacion->nombre }} </b></h4>
                        <hr>
                        <p> {{ $retroalimentacion->contenido }} </p>
                        <br>
                        Fecha: {{ $retroalimentacion->created_at }}
                    </div>
                    @role('admin')
                    <a href="{{route('retroalimentacion.edit', $retroalimentacion->id)}}" class="btn btn-primary pull-right"><b>Editar</b></a>
                    @endrole
                    <a href="{{ url('/')}}" class="btn btn-default pull-left"><b>Ir a la página web</b></a>                                                             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection