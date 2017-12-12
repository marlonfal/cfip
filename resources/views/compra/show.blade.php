@extends('layouts.app')
@section('title', 'Detalles compra #'. $compra->id)
@section('content')
<div class="container animatedParent animatedOnce">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                @include('_mensaje')
                <table width="100%">
					<tr>
						<td colspan="2">
							<img src="{{ asset('img/logo.png') }}" class="img-responsive pull-right" alt="" height="100" width="100" style="padding-top: 0px; margin: 0px;">
						</td>
						<td>
							<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 25px;">Detalles de la compra {{$compra->id}} </h1>
						</td>
					</tr>
				</table>
                </h1>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin: 0;">
                        <tbody>
                            <tr>
                                <td colspan="2" width="100">
                                    {!! Form::label('proveedor', 'Proveedor: ') !!}                       
                                    {{$compra->proveedor}}
                                </td>
                                <td colspan="2" width="100">
                                    {!! Form::label('usuario', 'Registrada por: ') !!}                       
                                    {{$compra->usuario}}
                                </td>
                                <td colspan="2">
                                    {!! Form::label('fecha', 'Fecha: ') !!}
                                    {{ $compra->fecha }}
                                </td>
                            </tr>
                            <tr class="bg-success">
								<td colspan="6" align="center"><b> Productos comprados </b></td>
							</tr>
                            <tr class="bg-primary" align="center">
                                <td width="60"><b> Número </b></td>
                                <td colspan="2"><b>Producto </b></td>
                                <td width="60"><b> Peso </b></td>
                                <td width="60"><b> Cantidad </b></td>
                                <td><b> Precio </b></td>
                            </tr>
                            
                            @foreach($detalles as $detalle)
                                <tr align="center">
                                    <td width="60">{{ $detalle->id_detalle }}</td>
                                    <td colspan="2">
                                        <label>{{ $detalle->producto->nombre }} </label> 
                                    </td>
                                    <td width="60"><b> {{ $detalle->peso_kilo }} </b></td>
                                    <td width="60"><b> {{ $detalle->cantidad }} </b></td>
                                    <td><b>$ {{ $detalle->precio }} </b></td>
                                </tr>
                            @endforeach
                            <tr class="bg-primary">
								<td colspan="6" align="center"></td>
							</tr>
                            <tr>
                                <td colspan="5">
                                    <p align="right"><b> Total </b></p>
                                </td>
                                <td colspan="1">
                                    <p align="center">$ <b> {{ $compra->total }} </b></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('compra.index') }}" class="btn btn-default pull-left"><b> Ver todas
                <i class="fa fa-eye"></i> </b></a>
                <a href="{{ route('compra.create') }}" class="btn btn-success btn-md pull-right"> 
                    Nueva 
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </a> 
                <span class="pull-right"> &nbsp; </span> 
                @role('admin')
                    {!! Form::open(['route' => ['compranovalida', $compra->id], 'name' => 'compranovalida', 'method'=>'GET']) !!}
                    <span class="pull-right">&nbsp;</span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
                    <input type="button" onclick="confirmarcnv()" value="Compra no válida" class="btn btn-danger pull-right"> 
                    {!! Form::close() !!}
                @endrole   
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection
