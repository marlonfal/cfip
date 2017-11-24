@extends('layouts.paginaweb')
@section('title', 'Recuperar cuenta')
@section('content')
<br><br><br>
<div class="container animatedParent">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary animated bounceInDown">
                <div class="panel-heading">
                    <center>
                        <img src="{{ asset('img/logo.png') }}" alt="" class="img-responsive" height="140" width="140">
                    </center>
                    <h2 align="center"><b> Recuperar cuenta </b></h2>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar link para recuperar cuenta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
