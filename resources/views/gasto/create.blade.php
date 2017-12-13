@extends('layouts.app')
@section('title', 'Registrar gasto')
@section('content')
<div class="container animatedParent animatedOnce">
    <div class="col-md-10 col-xs-12 col-sm-12 col-lg-8 col-md-offset-1 col-lg-offset-2">
        <div class="panel panel-primary animated bounceInUp">
            <div class="panel-heading">
                <table width="100%">
					<tr>
						<td colspan="2">
							<img src="{{ asset('img/logo.png') }}" class="img-responsive pull-right" alt="" height="100" width="100" style="padding-top: 0px; margin: 0px;">
						</td>
						<td>
							<h1 align="left" class="pull-letf" style="padding-left: 0px; margin-left: 30px;">Registrar gasto</h1>
						</td>
					</tr>
				</table>
                @include('error')
            </div>
            
            {!! Form::open(['route' => 'gasto.store', 'name' => 'creargasto']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            <div class="panel-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin: 0;">
                        <tbody id="productosgasto">                
                            <tr>
                                <td colspan="5">
                                    {!! Form::label('tipodegasto', 'Tipo de gasto: ') !!}
                                    {!! Form::select('id_tipo_gasto', $tiposdegastos , null, ['class' => 'form-control', 'required' => 'required'] ) !!}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    {!! Form::label('fecha', 'Fecha: ') !!}
                                    {!! Form::date('fecha', \Carbon\Carbon::now()->subHours(5), ['class' => 'form-control', 'required' => 'required']) !!}
                                </td>
                                <td colspan="3">
                                    {!! Form::label('usuario', 'Registrado por: ') !!}
                                    {!! Form::text('usuario', Auth::user()->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    {!! Form::label('descripcion', 'Descripción: ') !!}
                                    {!! Form::text('descripcion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </td>
                            </tr>
                            <tr>   
                            </tr>
                            <tr class="bg-primary" align="center">
                                <td colspan="2"><b> Producto </b></td>
                                <td ><b> Cantidad </b></td>
                                <td width="90"><b> Precio </b></td>
                                <td colspan="1" width="20"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <td colspan="5">
                                    <center>
                                        <a class="btn btn-success" id="add_producto()" onClick="addProductoGasto()"><i class="fa fa-plus"></i> Agregar producto</a>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right"><b>Total: </b></td>
                                <td colspan="2"> $ 
                                    <input style="width: 87%" type="number" readonly="readonly" id="total" name="total" class="form-control pull-right" placeholder="0" />
                                </td>
                            </tr>
                            <input type="text" name="cantidaddetalles" id="cantidaddetalles"  hidden/>        
                    </table>
                </div>
            {!! Form::close() !!}   
            </div>
            <div class="panel-footer">
                <input type="button" onclick="confirmargasto()" value="Guardar" class="btn btn-primary pull-right">
                <a href="{{ url()->previous() }}" class="btn btn-default pull-left"><b> Volver </b> </a>
                <span>&nbsp;</span><br><span>&nbsp;</span>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection