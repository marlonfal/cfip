@extends ('layouts.app')
@section('title', 'Detalles producto')
@section ('content')
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary animated bounceInUp">
                <div class="panel-heading">
                    @include('_mensaje')
                    <h1 align="center"><b>Información general</b></h1>
                </div>

                <div class="panel-body">  
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td>Iva: </td>
                                <td>{{$infogeneral->iva}} %</td>
                            </tr>
                            <tr>
                                <td>NIT: </td>
                                <td>{{$infogeneral->nit}}</td>
                            </tr>
                            <tr>
                                <td>Correo: </td>
                                <td>{{$infogeneral->correo}}</td>
                            </tr>
                            <tr>
                                <td>Teléfono: </td>
                                <td>{{$infogeneral->telefono}}</td>
                            </tr>
                            <tr>
                                <td>¿Hay descuentos?: </td>
                                <td>
                                    @if ($infogeneral->descuentos == 1)
                                        Sí
                                    @else
                                        No 
                                    @endif
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer"><a href="{{route('infogeneral.edit', $infogeneral)}}" class="btn btn-warning pull-right">
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