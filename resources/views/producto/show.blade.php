@extends ('layouts.app')

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
                                <td>Precio:</td>
                                <td>{{ $producto->precio_por_gramo }}</td>
                            </tr>
                            <tr>
                                
                             
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{route('producto.index')}}" class="btn btn-default pull-left"><b>Volver a la lista</b></a>                                                           
                    <a href="{{route('producto.edit', $producto->id)}}" class="btn btn-primary pull-right"><b>Editar</b></a>

                    <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                    {!! Form::model($producto, ['route' => ['producto.update', $producto->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection