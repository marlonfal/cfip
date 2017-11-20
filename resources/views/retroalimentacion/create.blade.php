@extends('layouts.paginaweb')

@section('content')
<div class="container animatedParent" style="margin-top: 55px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Enviar retroalimentación</h1>
                </div>
                @include('_error')
                <div class="panel-body">
                    {!! Form::open(['route' => 'retroalimentacion.store']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tipo', 'Tipo: ') !!}
                            {!! Form::select('tipo', ['' => 'Seleccione', 'Queja' => 'Queja', 'Reclamo' => 'Reclamo', 'Sugerencia' => 'Sugerencia'], null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('titulo', 'Titulo') !!}
                            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contenido', 'Contenido') !!}
                            {!! Form::text('contenido', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Su correo, si desea que respondamos') !!}
                            {!! Form::text('email', 'ninguno@gmail.com', ['class' => 'form-control']) !!}
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