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
                    {!! Form::open(['route' => ['producto.update', $producto], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre del producto') !!}
                            {!! Form::text('nombre', $producto->nombre, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('precioventakilo', 'Precio de venta por kilo') !!}
                            {!! Form::number('precioventakilo', $producto->precioventakilo, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('preciocomprakilo', 'Precio de compra por kilo') !!}
                            {!! Form::number('preciocomprakilo', $producto->preciocomprakilo, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cantidad', 'Cantidad') !!}
                            {!! Form::number('cantidad', $producto->cantidad, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('gramos', 'Kilos') !!}
                            {!! Form::number('gramos', $producto->gramos, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('activo', 'Se vende actualmente: ') !!}
                            <br>
                            @if ($producto->activo == 1)
                            {!! Form::label('si', 'Sí') !!}
                            {!! Form::radio('activo', '1', true) !!}
                            &nbsp;
                            {!! Form::label('no', 'No') !!}
                            {!! Form::radio('activo', '0') !!}
                            @else
                            {!! Form::label('si', 'Sí') !!}
                            {!! Form::radio('activo', '1') !!}
                            &nbsp;
                            {!! Form::label('no', 'No') !!}
                            {!! Form::radio('activo', '0', true) !!}
                            @endif
                        </div>
                        <div>
                            {!! Form::label('imagen', 'Imagen') !!}
                            <img class="img-responsive" width="200px" height="180px" src="{{ asset(Storage::url($producto->imagen)) }}" alt="">
                        </div>
                        <div class="form-group">
                            
                            {!! Form::label('imagen', 'Imagen') !!}
                            <input type="file" name="imagen">
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