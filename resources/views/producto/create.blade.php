@extends('layouts.app')
@section('title', 'Crear producto')
@section('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Crear producto</h1>
                </div>
                @include('_error')
                <div class="panel-body">
                    {!! Form::open(['route' => 'producto.store', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre_producto', 'Nombre del producto') !!}
                            {!! Form::text('nombre_producto', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('precio_por_gramo', 'Precio por kilo') !!}
                            {!! Form::number('precio_por_gramo', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('cantidad', 'Cantidad disponible') !!}
                            {!! Form::number('cantidad', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gramos', 'Gramos disponibles') !!}
                            {!! Form::number('gramos', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('imagen', 'Imagen') !!}
                            <input type="file" name="imagen" Required>
                        </div>

                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-default pull-left"><b>Volver</b></a>
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection