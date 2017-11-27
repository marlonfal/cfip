@extends('layouts.app')
@section('title', 'Editar información general')
@section('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Editar información general</h1>
                </div>
                @include('_error')
                <div class="panel-body">
                    {!! Form::open(['route' => ['infogeneral.update', $infogeneral], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            {!! Form::label('iva', 'Iva %') !!}
                            {!! Form::text('iva', $infogeneral->iva, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nit', 'NIT') !!}
                            {!! Form::text('nit', $infogeneral->nit, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('correo', 'Correo') !!}
                            {!! Form::text('correo', $infogeneral->correo, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('telefono', 'Teléfono') !!}
                            {!! Form::text('telefono', $infogeneral->telefono, ['class' => 'form-control']) !!}
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