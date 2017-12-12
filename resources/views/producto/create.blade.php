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
                {!! Form::open(['route' => 'producto.store', 'enctype' => 'multipart/form-data']) !!}
                @include('_error')
                <div class="panel-body">
                @include('_mensaje')
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre del producto') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('precioventakilo', 'Precio de venta por kilo') !!}
                            {!! Form::number('precioventakilo', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('preciocomprakilo', 'Precio de compra por kilo') !!}
                            {!! Form::number('preciocomprakilo', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('cantidad', 'Cantidad disponible') !!}
                            {!! Form::number('cantidad', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>
                        

                        <div class="form-group">
                            {!! Form::label('gramos', 'Kilos disponibles') !!}
                            {!! Form::number('gramos', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('activo', 'Se vende actualmente: ') !!}
                            <br>
                            {!! Form::label('si', 'Sí') !!}
                            {!! Form::radio('activo', '1', ['selected' => 'selected']) !!}
                            &nbsp;
                            {!! Form::label('no', 'No') !!}
                            {!! Form::radio('activo', '0') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('imagen', 'Imagen') !!}
                            <input type="file" name="imagen" required>
                        </div> 
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                                <a href="{{url()->previous()}}" class="btn btn-default pull-left"><b>Volver</b></a>
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                        <span>&nbsp; </span> 
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection