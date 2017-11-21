@extends('layouts.app')
@section('title', 'Crear tipo de gasto')
@section('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Crear tipo de gasto</h1>
                </div>
                @include('_error')
                <div class="panel-body">
                    {!! Form::open(['route' => 'tipodegasto.store']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre_tipo_gasto', 'Nombre del gasto') !!}
                            {!! Form::text('nombre_tipo_gasto', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
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