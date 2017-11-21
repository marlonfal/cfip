@extends ('layouts.app')
@section('title', 'Detalles tipo de gasto')
@section ('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    @include('_mensaje')
                    <h1 align="center"><b>Tipo de gastos {{$tipodegasto->id}}</b></h1>
                </div>

                <div class="panel-body">  
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td>Id: </td>
                                <td>{{$tipodegasto->id}}</td>
                            </tr>
                            <tr>
                                <td>Nombre </td>
                                <td>{{$tipodegasto->nombre_tipo_gasto}}</td>
                            </tr>
                            <tr>
                                <td>Precio:</td>
                                <td>{{$tipodegasto->descripcion}}</td>
                            </tr>
                            <tr>
                                
                             
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{route('tipodegasto.index')}}" class="btn btn-default pull-left"><b>Volver a la lista</b></a>                                                           
                    <a href="{{route('tipodegasto.edit', $tipodegasto->id)}}" class="btn btn-primary pull-right"><b>Editar</b></a>

                    <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                    {!! Form::model($tipodegasto, ['route' => ['tipodegasto.update', $tipodegasto->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection