@extends('layouts.app') @section('title', 'Cambio de contraseña ') @section('content') @section('content')
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align="center">Cambiar contraseña</h1>
			 @include('_mensaje')
		</div>

		<div class="panel-body">
			<form method="post" action="{{route('updatepassword')}}">
				{{csrf_field()}}
				<div class="form-group">
					<label for="mypassword">Introduce tu contraseña actual:</label>
					<input type="password" name="mypassword" class="form-control">
					<div class="text-danger">{{$errors->first('mypassword')}}</div>
				</div>
				<div class="form-group">
					<label for="password">Introduce tu nueva contraseña:</label>
					<input type="password" name="password" class="form-control">
					<div class="text-danger">{{$errors->first('password')}}</div>
				</div>
				<div class="form-group">
					<label for="mypassword">Confirma tu nueva contraseña:</label>
					<input type="password" name="password_confirmation" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary pull-right">Cambiar</button>
			</form>
		</div>
	</div>
</div>
@stop @endsection