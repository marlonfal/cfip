@extends('layouts.app')
@section('title', 'Editar producto')
@section('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Editar producto {{ $producto->id }}</h1>
                </div>
                @include('_error')
                <div class="panel-body">
                    {!! Form::open(['route' => ['producto.update', $producto], 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            {!! Form::label('nombre_producto', 'Nombre del producto') !!}
                            {!! Form::text('nombre_producto', $producto->nombre_producto, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('precio_por_gramo', 'Precio por kilo') !!}
                            {!! Form::number('precio_por_gramo', $producto->precio_por_gramo * 1000, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                            <a href="{{url()->previous()}}" class="btn btn-default pull-left"><b>Volver</b>
                            </a>
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection