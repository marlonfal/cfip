@extends('layouts.app')
@section('content')
<div class="container animatedParent">
    <div class="panel panel-primary animated bounceInUp">
        <div class="panel-heading">
            @include('_mensaje')
            <h2>
                <b>Listado de Productos</b>
                <a href="{{route('producto.create')}}" class="btn btn-success pull-right"><b>Nuevo </b> (+)</a>
            <h2>
        </div>
        <div class="panel-body"> 
        {!! Form::open(['route' => 'producto.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::label('buscar', 'Buscar: ') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'title' => 'Escriba el nombre del producto', 'placeholder' => 'Nombre de producto'] ) !!}
            </div>
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

            <h4><b> Hay {{ $productos->total() }} productos</b> </h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio por gramo</th>
                            <th colspan="3">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre_producto }}</td>
                                <td>{{ $producto->precio_por_gramo }}</td>
                                <td width="50">
                                    <a href="{{route('producto.show', $producto->id)}}" class="btn btn-success pull-right">Ver</a>
                                </td>
                                <td width="50">
                                    <a href="{{route('producto.edit', $producto->id)}}" class="btn btn-warning pull-right">Editar</a>
                                </td>
                                <td width="50">
                                    {!! Form::model($producto, ['route' => ['producto.update',
                                    $producto->id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right'])
                                    !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- {!!$productos->appends(Request::only(['numerodesala']))->render()!!} -->
                {!!$productos->render()!!}
        </div>
    </div>
</div>

@endsection

