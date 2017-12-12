@extends('layouts.app')
@section('title', 'Editar retroalimentación')
@section('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    <h1 align="center">Editar retroalimentación</h1>
                </div>
                @include('_error')
                <div class="panel-body">
                    {!! Form::open(['route' => ['retroalimentacion.update', $retroalimentacion], 'method' => 'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', $retroalimentacion->nombre, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tipo', 'Tipo: ') !!}
                            {!! Form::select('tipo', ['' => 'Seleccione', 'Queja' => 'Queja', 'Reclamo' => 'Reclamo', 'Sugerencia' => 'Sugerencia'],
                                $retroalimentacion->tipo, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('titulo', 'Titulo') !!}
                            {!! Form::text('titulo', $retroalimentacion->titulo, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contenido', 'Contenido') !!}
                            {!! Form::text('contenido', $retroalimentacion->contenido, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Su correo, si desea que respondamos') !!}
                            {!! Form::text('email', $retroalimentacion->email, ['class' => 'form-control']) !!}
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