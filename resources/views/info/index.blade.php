@extends('layouts.paginaweb')

@section ('content')

    <!-- IMAGEN DEL HEADER -->

    <div  class="animatedParent" style="margin-top: 50px;">
        <img src="img/frente.jpg" class="img-responsive animated bounceInDown" />
    </div>
    <br>
<div class="container">
     <!-- PRODUCTOS -->   

    <br>
    <div class="animatedParent" id="productos">
        <div class="seccion animated bounceInUp">
            <p><b>PRODUCTOS</b><p>
        </div>
        <br>
        <div class="row animated bounceInUp">
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6">
                <div class="card bordecard">
                    <center>
                        <img class="card-img-top img-responsive" src="img/polloentero.png">
                        <div class="card-body">
                            <h4 class="card-title">Pollo entero</h4>
                            <p class="card-text">Lorem Ipsum</p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6">
                <div class="card bordecard">
                    <center>
                        <img class="card-img-top img-responsive" src="img/ala.jpeg">
                        <div class="card-body">
                            <h4 class="card-title">Ala</h4>
                            <p class="card-text">Lorem Ipsum</p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6">
                <div class="card bordecard">
                    <center>
                        <img class="card-img-top img-responsive" src="img/muslo.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Muslo</h4>
                            <p class="card-text">Lorem Ipsum</p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6">
                <div class="card bordecard">
                    <center>
                        <img class="card-img-top img-responsive" src="img/pechuga.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Pechuga</h4>
                            <p class="card-text">Lorem Ipsum</p>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <br>

    </div>
    
        <div class="container animatedParent">
            <center> 
                <a class="btn btn-yellow btn-lg animated bounceInLeft">
                <b>HACER PEDIDO</b></a>
            </center>
        </div>
    <!-- SOBRE NOSOTROS -->
    <br>

    <div class="animatedParent" id="nosotros">
        <div class="seccion animated bounceInUp">
            <p><b>SOBRE NOSOTROS</b><p>
        </div>
        <br>    
        <div class="bordecard animated bounceInUp">
            <div class="row">
                <div class="col-md-7 col-lg-7 col-sm-5 col-xs-11 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d532.508467862627!2d-76.2093206951104!3d3.4839906399061404!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3a1a713b08dfa9%3A0xeab6d1ce3b898cd1!2sPollos+El+Paisita!5e0!3m2!1ses-419!2sco!4v1509826862779" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-8 col-xs-hide">
                    <center>
                        <h1><b> ¿Quiénes somos? </b></h1>
                        <p>
                            Somos una empresa Distribuidora de pollo 100% campesino,
                            ubicada en La Buitrera de Palmira.
                        </p>
                        <h3><b> Misión </b></h3>
                        <p>
                            Brindar con nuestros productos alimenticios 
                            una experiencia única en la mesa de los hogares 
                            con higiene y calidad, generando crecimiento, 
                            rentabilidad y sostenibilidad de la empresa, 
                            siendo líderes en el mercado y reconocidos por 
                            nuestros clientes y consumidores.
                        </p>

                        <h3><b> Visión </b></h3>
                        <p>
                            Posicionar nuestra empresa como la mejor 
                            en brindar productos alimenticios de calidad 
                            y ampliar nuestra cobertura en la región.
                        </p>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="animatedParent">
            <center>
                <a href="{{ route('retroalimentacion.create') }}" class="btn btn-yellow animated bounceInLeft">QUEJAS, SUGERENCIAS Y RECLAMOS</a>
            </center>
    </div>
        <!-- CONTACTO -->
    <br>
</div>
    <div class="animatedParent"> 
        <div class="footer animated bounceInUp">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 col-md-offset-2 col-sm-offset-2 col-lg-offset-2 col-xs-offset-2">
                    <img src="img/logo.png" class="img-responsive">
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                    <br>
                        <table align="center" class="table table-responsive table-bordered">
                            <tr>
                                <td><h4><b> Teléfono: </b> </h4></td>
                                <td><h4><b> 123123123 </b> </h4></td>
                            </tr>
                            <tr>
                                <td><h4><b> Dirección: </b> </h4></td>
                                <td><h4><b> La Buitrera - Palmira </b> </h4></td>
                            </tr>
                            <tr>
                                <td><h4><b> Horarios </b> </h4></td>
                                <td><h4><b> 8 a.m. - 6 p.m. </b> </h4></td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection('content')