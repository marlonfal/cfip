@extends ('Layouts.app')
@section ('title', 'Inicio')
@section ('content')

<div class="container animatedParent" style="background-color: rgba(f,f,f,0.5);">
    <div class="row">
        <div class="col-md-6" style="padding: 5px;">
            <div class="panel panel-primary animated bounceInDown" >
                <div class="panel-heading">
                    <h3>Últimas 5 ventas
                        <a href=" {{route('factura.create')}} " class="btn btn-success pull-right">Nueva <i class="fa fa-plus"></i> </a>
                        <span class="pull-right">&nbsp;</span>
                        <a href=" {{route('factura.index')}} " class="btn btn-default pull-right">Ver todas <i class="fa fa-eye"></i></a>
                    </h3>
                </div>
                <div class="panel-body" style="padding: 0;">
                        <table class="table table-bordered" style="margin: 0px;">
                            <thead>
                                <th class="hidden-xs">#</th>
                                <th class="hidden-xs">Fecha</th>
                                <th>Comprador</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach($facturas as $factura)
                                    <tr style="line-height: 20px; min-height: 20px; height: 20px;" >
                                        <td class="hidden-xs">{{ $factura->id }}</td>
                                        <td class="hidden-xs">{{ $factura->fecha }}</td>
                                        <td>{{ $factura->comprador }}</td>
                                        <td>{{ $factura->total }}</td>
                                        <td align="center" style="padding: 0;">
                                            <a href="{{ route('factura.show', $factura->id) }}" class="btn btn-success">
                                                Ver <i class="fa fa-eye"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding: 5px;">
            <div class="panel panel-primary animated bounceInDown" >
                <div class="panel-heading" >
                    <h3>Productos
                        <span class="pull-right">&nbsp;</span>
                        <a href=" {{route('producto.index')}} " class="btn btn-default pull-right">Ver todos <i class="fa fa-eye"></i></a>
                    </h3>
                </div>
                <div class="panel-body" style="padding: 0;">
                    <table class="table table-bordered" style="margin: 0px;">
                            <thead>
                                <th>Nombre</th>
                                <th>Cantidad disponible</th>
                                <th class="hidden-xs">Opciones</th>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                @if($producto->cantidad <= 5)
                                    <tr style="background-color: yellow;">
                                @else
                                    <tr>
                                @endif

                                        <td><b> {{ $producto->nombre_producto }} </b></td>
                                        <td>{{ $producto->cantidad }}</td>
                                        <td align="center" style="padding: 0;">
                                            <a href="{{ route('producto.show', $producto->id) }}" class="btn btn-success">
                                                Ver <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning">
                                                Editar <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary animated bounceInDown">
        <div class="panel-heading">
            <h3><b>Pedidos pendientes</b> 
                <span class="pull-right">&nbsp;</span>
                <a href=" {{route('pedido.index')}} " class="btn btn-default pull-right">Ver todos <i class="fa fa-eye"></i></a>
            </h3>
        </div>
        <div class="panel-body" style="padding: 0;">
            <table class="table table-bordered" style="margin: 0px;">
                    <thead>
                        <th class="hidden-xs">#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Fecha y hora de entrega</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td class="hidden-xs">{{ $pedido->id }}</td>
                                <td>{{ $pedido->nombre }}</td>
                                <td>{{ $pedido->direccion }}</td>
                                <td>{{ $pedido->fecha_entrega }} - {{ $pedido->hora_entrega }}</td>
                                <td align="center" style="padding: 0;">
                                    <a href="{{ route('pedido.show', $pedido->id) }}" class="btn btn-success">
                                        Ver <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-warning">
                                        Editar <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>


</div>
@endsection('content')