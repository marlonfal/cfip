@extends('layouts.app') @section('title', 'Retroalimentaciones') @section('content')
<div class="container animatedParent col-md-8 col-md-offset-2">
	<div class="panel panel-primary animated bounceInUp">
		<div class="panel-heading">
			@include('_mensaje')
			<h2>
				<b>Realimentaciones</b>
				<h2>
		</div>
		{!! Form::open(['route' => 'retroalimentacion.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right',
		'role' => 'search']) !!}
		<div class="form-group">
			{!! Form::label('busquedaportipo', 'Filtrar por tipo: ') !!} {!! Form::select('tipo', ['' => 'Seleccione', 'Queja' => 'Quejas',
			'Reclamo' => 'Reclamos', 'Sugerencia' => 'Sugerencias'], null, ['class' => 'form-control'] ) !!}
		</div>
		{!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
		<div class="panel-body">
			<h4>
				<b> Hay {{ $retroalimentaciones->total() }} retroalimentaciones</b>
			</h4>
			@foreach($retroalimentaciones as $retroalimentacion) @if($retroalimentacion->tipo == "Reclamo")
			<div class="alert alert-warning">
				@elseif($retroalimentacion->tipo == "Queja")
				<div class="alert alert-danger">
					@else($retroalimentacion->tipo == "Sugerencia")
					<div class="alert alert-success">
						@endif
						<h3>{{ $retroalimentacion->titulo }}</h3>
						<h4>
							<b>{{ $retroalimentacion->tipo }} de {{ $retroalimentacion->nombre }} </b>
						</h4>
						<hr>
						<p> {{ $retroalimentacion->contenido }} </p>
						<br> Fecha: {{ $retroalimentacion->created_at }} @role('admin')
						<a href="{{route('retroalimentacion.show', $retroalimentacion->id)}}" class="btn btn-primary pull-right">
							<b>Editar</b>
						</a>
						@endrole
					</div>
					@endforeach {!!$retroalimentaciones->appends(Request::only(['tipo']))->render()!!}
				</div>
			</div>
		</div>

		@endsection