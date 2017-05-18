@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alta Plano</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('altaPlano') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nombre_class') ? ' has-error' : '' }}">
                            <label for="nombre_class" class="col-md-4 control-label">Nombre clase</label>

                            <div class="col-md-6">
                                <input id="nombre_class" type="text" class="form-control" name="nombre_class" value="{{ old('nombre_class') }}" required autofocus>

                                @if ($errors->has('nombre_class'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre_class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imagen_plano') ? ' has-error' : '' }}">
                            <label for="imagen_plano" class="col-md-4 control-label">Imagen (URL) </label>

                            <div class="col-md-6">
                                <input id="imagen_plano" type="text" class="form-control" name="imagen_plano" value="{{ old('imagen_plano') }}" required>

                                @if ($errors->has('imagen_plano'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imagen_plano') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('icono_plano') ? ' has-error' : '' }}">
                            <label for="icono_plano" class="col-md-4 control-label">Icono (URL)</label>

                            <div class="col-md-6">
                                <input id="icono_plano" type="text" class="form-control" name="icono_plano" value="{{ old('icono_plano') }}" required>

                                @if ($errors->has('icono_plano'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('icono_plano') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div align = left class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Alta
                                </button>
                                 <a href="{{url('/home')}}">
                                <button type="button" class="btn btn-primary">
                                    Volver
                                </button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

