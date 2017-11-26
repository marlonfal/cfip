@extends ('Layouts.app')
@section ('title', 'Inicio')
@section ('content')

<div class="container animatedParent" style="background-color: rgba(f,f,f,0.5);">
    <div class="panel panel-primary animated bounceInDown">
        <div class="panel-heading">
            <h3>Últimas 5 ventas
                <a href=" {{route('factura.create')}} " class="btn btn-success pull-right">Nueva <i class="fa fa-plus"></i> </a>
                <span class="pull-right">&nbsp;</span>
                <a href=" {{route('factura.index')}} " class="btn btn-default pull-right">Ver todas <i class="fa fa-plus"></i> </a>
            </h3>
        </div>
        <div class="panel-body" style="padding-top: 0; padding-bottom: 0; margin 0;">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Comprador</th>
                        <th>Vendedor</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($facturas as $factura)
                            <tr style="line-height: 20px; min-height: 20px; height: 20px;" >
                                <td>{{ $factura->id }}</td>
                                <td>{{ $factura->fecha }}</td>
                                <td>{{ $factura->comprador }}</td>
                                <td>{{ $factura->vendedor }}</td>
                                <td>{{ $factura->total }}</td>
                                <td width="50" align="center">
                                    <a href="{{ route('factura.show', $factura->id) }}" class="btn btn-xs btn-success">Ver</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

    <div class="panel panel-primary animated bounceInDown">
        <div class="panel-heading">
            <h3>Pedidos pendientes
                <span class="pull-right">&nbsp;</span>
                <a href=" {{route('pedido.index')}} " class="btn btn-default pull-right">Ver todos <i class="fa fa-plus"></i> </a>
            </h3>
        </div>
        <div class="panel-body" style="padding-top: 0; padding-bottom: 0; margin 0;">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Fecha y hora de entrega</th>
                        <th colspan="2">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr style="line-height: 20px; min-height: 20px; height: 20px;" >
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->nombre }}</td>
                                <td>{{ $pedido->direccion }}</td>
                                <td>{{ $pedido->fecha_entrega }} - {{ $pedido->hora_entrega }}</td>
                                <td align="center">
                                    <a href="{{ route('pedido.show', $pedido->id) }}" class="btn btn-xs btn-success">Ver</a>
                                </td>
                                <td align="center">
                                <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection('content')