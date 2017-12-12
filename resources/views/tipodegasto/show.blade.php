@extends ('layouts.app')
@section('title', 'Detalles tipo de gasto')
@section ('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    @include('_mensaje')
                    <h1 align="center"><b>Tipo de gasto: {{$tipodegasto->nombre_tipo_gasto}}</b></h1>
                </div>

                <div class="panel-body">  
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td>Nombre </td>
                                <td>{{$tipodegasto->nombre_tipo_gasto}}</td>
                            </tr>
                            <tr>
                                <td>Descripción:</td>
                                <td>{{$tipodegasto->descripcion}}</td>
                            </tr>
                            <tr>
                                
                             
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{route('tipodegasto.index')}}" class="btn btn-default pull-left"><b>Volver a la lista</b></a>                                                           
                    <a href="{{route('tipodegasto.edit', $tipodegasto->id)}}" class="btn btn-primary pull-right"><b>Editar</b></a>

                    <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection