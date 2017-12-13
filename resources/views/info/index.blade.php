@extends('layouts.paginaweb') @section ('content')

<!-- IMAGEN DEL HEADER -->
<div class="animatedParent">
	<div style="margin-top: 0px;">
		<img src="img/frente.jpg" class="animated bounceInDown" alt="Foto del local" style="width: 100%;" />
	</div>
</div>
<br>

<div class="container">
	<!-- PRODUCTOS -->
	<br>
	<div class="animatedParent" id="productos">
		@if($infogeneral->descuentos == 1)
			<img class="discount-label animated bounceInUp animatedOnce" src="{{ asset('/img/tag.png')}}" alt="descuentos" />
		@endif
		<div class="seccion animated bounceInUp">
			<b>PRODUCTOS
			</b>

		</div>

		<br>
		<div class="row animated bounceInUp">
			@foreach($productos as $producto)
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-6">
				<div class="bordecard">
					<img class="img-responsive" alt="{{ $producto->nombre }}" src="{{asset(Storage::url($producto->imagen))}}">
					<div class="nombreproducto">
						<h3 class="nombreproducto centro">{{ $producto->nombre }}</h3>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<br>

	</div>

	<div class="animatedParent" align="center">
		<a class="centro btn btn-yellow btn-lg animated bounceInUp" href="{{ route('pedido.create')}}">
			<b>HACER PEDIDO</b>
		</a><img src=" {{asset('/img/EnvioGratis.png')}} " class="animated bounceInUp" heigth="120" width="120" alt="enviogratis" />
	</div>
	<!-- SOBRE NOSOTROS -->
	<br>

	<div class="animatedParent" id="nosotros">
		<div class="seccion animated bounceInUp">
			<p>
				<b>SOBRE NOSOTROS</b>
				<p>
		</div>
		<br>
		<div class="bordecard animated bounceInUp">
			<div class="container">
				<div class="row centro">
					<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 " style="padding: 0px">
						<div class="table-responsive">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31859.499237662552!2d-76.22192439472005!3d3.4856450904151095!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeab6d1ce3b898cd1!2sPollos+El+Paisita!5e0!3m2!1ses!2sco!4v1513083747038"
							 width="500" height="370" style="border:0" allowfullscreen>
							</iframe>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-8 col-xs-hide" style="color: black !important;">
						<div style="padding-right: 45px; !important" align="center">
							<h1>
								<b> ¿Quiénes somos? </b>
							</h1>
							<p>
								Somos una empresa Distribuidora de pollo 100% campesino, ubicada en La Buitrera de Palmira.
							</p>
							<h3>
								<b> Misión </b>
							</h3>
							<p>
								Brindar con nuestros productos alimenticios una experiencia única en la mesa de los hogares con higiene y calidad, generando
								crecimiento, rentabilidad y sostenibilidad de la empresa, siendo líderes en el mercado y reconocidos por nuestros
								clientes y consumidores.
							</p>

							<h3>
								<b> Visión </b>
							</h3>
							<p>
								Posicionar nuestra empresa como la mejor en brindar productos alimenticios de calidad y ampliar nuestra cobertura en la región.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="animatedParent">
		<div align="center">
			<a href="{{ route('retroalimentacion.create') }}" class="btn btn-yellow animated bounceInLeft">QUEJAS, SUGERENCIAS Y RECLAMOS</a>
		</div>
	</div>
	<!-- CONTACTO -->
	<br>
</div>

<div class="container" style="width: 100%;">
	<div class="footer">
		<div class="row">
			<div class="col-md-2 col-lg-2 col-sm-2 hidden-xs col-md-offset-2  col-lg-offset-2 ">
				<img alt="logo" src="img/logo.png" class="img-responsive">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
				<br>
				<table class="table centro table-bordered">
					<tr>
						<td>
							<h4>
								<b> Teléfono: </b>
							</h4>
						</td>
						<td>
							<h4>
								<b> {{ $infogeneral->telefono }} </b>
							</h4>
						</td>
					</tr>
					<tr>
						<td>
							<h4>
								<b> Dirección: </b>
							</h4>
						</td>
						<td>
							<h4>
								<b> La Buitrera - Palmira </b>
							</h4>
						</td>
					</tr>
					<tr>
						<td>
							<h4>
								<b> Horarios </b>
							</h4>
						</td>
						<td>
							<h4>
								<b> Lunes a sábado 8 a.m. - 7 p.m. </b>
							</h4>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection('content')