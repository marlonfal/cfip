@extends('layouts.app') @section('content')
<div class="container animatedParent">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary animated bounceInUp">
				<div class="panel-heading">
					@include('_mensaje')
					<h1 align="center">
						<b>No estás autorizado!</b>
					</h1>
				</div>

				<div class="panel-body" align="center">
                    <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i>
				</div>
			
			<div class="panel-footer">
				<a href="{{ url('inicio') }}" class="btn btn-default">Ir a inicio</a>
			</div></div>
		</div>


	</div>
</div>
@endsection