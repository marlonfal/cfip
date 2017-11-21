@extends('layouts.app')
@section('title', 'Editar tipo de gasto')
@section('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Editar tipo gasto {{ $tipodegasto->id }}</h1>
                </div>
                @include('_error')
                <div class="panel-body">
                    {!! Form::open(['route' => ['tipodegasto.update', $tipodegasto], 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            {!! Form::label('nombre_tipo_gasto', 'Nombre del gasto') !!}
                            {!! Form::text('nombre_tipo_gasto', $tipodegasto->nombre_tipo_gasto, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'descripcion') !!}
                            {!! Form::text('descripcion', $tipodegasto->descripcion, ['class' => 'form-control']) !!}
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