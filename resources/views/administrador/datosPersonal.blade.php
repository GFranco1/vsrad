@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modificar Datos Personal</div>
                <div class="panel-body">
                    @if(isset($users))
                    <form class="form-horizontal" role="form" method="GET" action="{{ route('actualizardatos', $users->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $users->nombre }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ $users->apellidos }}" required autofocus>

                                @if ($errors->has('apellidos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="dni" class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control" name="dni" value="{{ $users->dni }}" required>

                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $users->telefono }}" required>

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label for="rol" class="col-md-4 control-label">Rol de tipo:
                            @if($users->rol == "1")
                                <p>Cliente</p>
                            @endif
                            @if($users->rol == "2")
                                <p>Comercial</p>
                            @endif
                            @if($users->rol == "3")
                                <p>Tecnico</p>
                            @endif
                            @if($users->rol == "4")
                                <p>Director Comercial</p>
                            @endif
                            @if($users->rol == "5")
                                <p>Administrador</p>
                            @endif</label><br><br><br>
                         <div align = center class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                             <input type="radio" name="rol" value="1" required> Cliente <br>
                            <input type="radio" name="rol" value="2" required> Comercial <br>
                            <input type="radio" name="rol" value="3" required> Técnico   <br>
                            <input type="radio" name="rol" value="4" required> Director comercial   <br>
                             <input type="radio" name="rol" value="5" required> Administrador  <br>
                        </div>
                        <div align = left class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-warning btn-s">
                                    Modificar Personal
                                </button>
                                 <a href="{{url('/home')}}">
                                <button type="button" class="btn btn-primary">
                                    Volver
                                </button></a>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

