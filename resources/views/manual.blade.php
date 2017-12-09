@extends('layouts.app') @section('title', 'Manual de usuario') @section('content')
<div class="container">
	<div class="panel panel-primary">
        <div class="panel-heading">
            <h1>Manual de usuario</h1>  
        </div>
		<table class="table table-bordered" style="margin: 0px;">
			<tbody>
				<tr>
					<td>
						<div class="accordion-container">
							<b class="accordion-titulo">
								<b><h3> Registrar venta</h3></b>
								<span class="toggle-icon"></span>
							</b>
							<div class="accordion-content">
								<div style="padding: 0;">
										
									
								</div>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
        </div>
	</div>
</div>
@endsection('content') @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection