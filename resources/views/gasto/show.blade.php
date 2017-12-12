@extends('layouts.app') @section('title', 'Detalles gasto #'. $gasto->id) @section('content')
<div class="container animatedParent animatedOnce">
	<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				@include('_mensaje')
				<table width="100%">
					<tr>
						<td colspan="2">
							<img src="{{ asset('img/logo.png') }}" class="img-responsive pull-right" alt="" height="100" width="100" style="padding-top: 0px; margin: 0px;">
						</td>
						<td>
							<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 25px;">Detalles del gasto #{{ $gasto->id }} </h1>
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
			<div class="panel-body" style="padding: 0px;">
				<div class="table-responsive">
					<table class="table table-bordered" style="margin: 0px;">
						<tbody>
							<tr>
								<td colspan="3">
									{!! Form::label('tipodegasto', 'Tipodegasto: ') !!} {{ $gasto->tipodegasto->nombre_tipo_gasto }}
								</td>
								<td colspan="3">
									{!! Form::label('fecha', 'Fecha: ') !!} {{ $gasto->fecha }}
								</td>
							</tr>
							<tr>
								<td colspan="3" width="100">
									{!! Form::label('registradopor', 'Registrado por: ') !!} {{$gasto->usuario}}
								</td>
								<td colspan="3">
									{!! Form::label('descripcion', 'Descripción: ') !!} {{ $gasto->descripcion }}
								</td>
							</tr>
							<tr>
							</tr>
							<tr class="bg-primary" align="center">
								<td width="60">
									<b> Número </b>
								</td>
								<td colspan="3">
									<b>Producto </b>
								</td>
								<td>
									<b> Cantidad </b>
								</td>
								<td>
									<b> Precio </b>
								</td>
							</tr>
							@foreach($detalles as $detalle)
							<tr align="center">
								<td width="60">{{ $detalle->id_detalle }}</td>
								<td colspan="3">
									<label>{{ $detalle->producto}} </label>
								</td>
								<td width="60">
									<b> {{ $detalle->cantidad }} </b>
								</td>
								<td width="60">
									<b> {{ $detalle->precio }} </b>
								</td>
							</tr>
							@endforeach
							<tr class="bg-primary">
								<td colspan="6" align="center">
									<b></b>
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<p align="right">
										<b> Total </b>
									</p>
								</td>
								<td colspan="1">
									<p align="center">$
										<b> {{ $gasto->total }} </b>
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel-footer">
				<a href="{{ route('gasto.index') }}" class="btn btn-default pull-left">
					<b> Volver a la lista </b>
				</a>

				<a href="{{ route('gasto.create') }}" class="btn btn-success btn-md pull-right">
					Nuevo
					<i class="fa fa-plus-square-o" aria-hidden="true"></i>
				</a>
				<span class="pull-right"> &nbsp; </span>
				@role('admin')
                    {!! Form::open(['route' => ['gastonovalido', $gasto->id], 'name' => 'gastonovalido', 'method'=>'GET']) !!}
                    <span class="pull-right">&nbsp;</span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
                    <input type="button" onclick="confirmargnv()" value="Gasto no válido" class="btn btn-danger pull-right"> 
                    {!! Form::close() !!}
                @endrole


				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection