@extends ('layouts.app')
@section('title', 'Detalles producto')
@section ('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    @include('_mensaje')
                    <h1 align="center"><b>Detalles del producto {{$producto->id}}</b></h1>
                </div>

                <div class="panel-body">  
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td>Id: </td>
                                <td>{{$producto->id}}</td>
                            </tr>
                            <tr>
                                <td>Nombre </td>
                                <td>{{$producto->nombre_producto}}</td>
                            </tr>
                            <tr>
                                <td>Precio por kilo:</td>
                                <td>{{ $producto->precio_por_gramo * 1000 }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <div>
                                    {!! Form::label('imagen', 'Imagen') !!}
                                    <img class="img-responsive" width="200px" height="180px" src="{{ asset(Storage::url($producto->imagen)) }}" alt="">
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="{{route('producto.index')}}" class="btn btn-default pull-left"><b>Volver a la lista</b></a>                                                           
                    <a href="{{route('producto.edit', $producto->id)}}" class="btn btn-warning pull-right">
                        <b>Editar</b>
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <span>&nbsp; </span><br><span>&nbsp;</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection