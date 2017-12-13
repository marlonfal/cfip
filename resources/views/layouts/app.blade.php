<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
	<!-- Icono-->
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animations.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

</head>

<body>
	<div id="app">
		<div class="container-fluid navbar-default yellow">
			<div class="container" >
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					 aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img src="{{ asset('img/logo.png') }}" alt="logo" class="pull-left" height="50" width="50">
					<a class="navbar-brand" href="{{ url('/inicio') }}">
						<b> {{ config('app.name', 'Laravel') }} </b>
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					@role(['admin', 'vendedor'])<ul class="nav navbar-nav">
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrar
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('factura.create') }}">Venta</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="{{ route('compra.create') }}">Compra a proveedor</a>
								</li>
								<li>
									<a href="{{ route('gasto.create') }}">Gasto </a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="{{ route('pedido.create') }}">Pedido </a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ver
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('factura.index') }}">Ventas</a>
								</li>
								<li>
									<a href="{{ route('pedido.index') }}">Pedidos </a>
								</li>
								<li>
									<a href="{{ route('compra.index') }}">Compras </a>
								</li>
								<li>
									<a href="{{ route('gasto.index')}}">Gastos </a>
								</li>
								<li>
									<a href="{{ route('producto.index') }}">Productos</a>
								</li>
								@role('admin')
								<li role="separator" class="divider"></li>
								<li>
									<a href="{{ route('retroalimentacion.index') }}">Realimentaciones</a>
								</li>
								<li>
									<a href="{{ url('admin/users') }}"> Usuarios </a>
								</li>
								<li>
									<a href="{{ route('infogeneral.show', 1) }}">Información general</a>
								</li>
								<li>
									<a href="{{ route('tipodegasto.index') }}">Tipos de gastos</a>
								</li>
								@endrole
							</ul>
						</li>
						@role('admin')
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Balances
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('balance') }}">Estado de resultados</a>
								</li>
								<li>
									<a href="{{ route('balanceporproductos') }}">Por productos </a>
								</li>
							</ul>
						</li>
						@endrole
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@role('admin')
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								Configuración
								<i class="fa fa-cog"></i>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li> &nbsp; Agregar</li>
								<li>
									<a href="{{ route('producto.create') }}"> Producto </a>
								</li>
								<li>
									<a href="{{ route('tipodegasto.create') }}"> Tipo de gasto </a>
								</li>
								<li>
									<a href="{{ url('admin/users/create') }}"> Usuario </a>
								</li>
								<li role="separator" class="divider"></li>
								<li> &nbsp; Cambiar</li>
								<li>
									<a href="{{ route('infogeneral.edit', 1) }}">Información general</a>
								</li>
							</ul>
						</li>
						@endrole @endrole
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
											Salir
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											<input type="hidden" name="_token" value="{{ csrf_token() }}"> {{ csrf_field() }}
										</form>
									</li>
									<li><a href="{{ route('changepassword')}}">Cambiar contraseña</a></li>
								</ul>
							</li>
							<li style="padding: 0px; margin: 0px">
								<a href="{{route('manual')}}" style="padding: 10px; margin: 0px">
									<i class="fa fa-question-circle-o fa-2x"></i>
								</a>
							</li>
						</ul>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</div>
		<!-- /.container-fluid -->
		<br> @yield('content')
	</div>
	<!-- Scripts -->

	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<script src="{{ asset('js/css3-animate-it.js') }}"></script>
	@yield('scripts')
</body>

</html>