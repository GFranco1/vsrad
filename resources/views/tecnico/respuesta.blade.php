@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar mensaje a tecnico</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('mensajeria.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="destino">Destinatario</label>
                            <div class="col-md-6">
                            <input type="hidden" name="destino" value="{{$mensaje->origen}}" >
                            @foreach($users as $u)
                                @if($u->id == $mensaje->origen)
                                        <div class="col-md-6">
                                    <p> {{$u->nombre}} {{$u->apellidos}} </p>
                                @endif
                            @endforeach
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}">
                            <label for="asunto" class="col-md-4 control-label">Asunto</label>

                            <div class="col-md-6">
                                <input id="asunto" type="text" class="form-control" name="asunto" value="{{ old('asunto') }}" required autofocus>

                                @if ($errors->has('asunto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asunto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mensaje') ? ' has-error' : '' }}">
                            <label for="mensaje" class="col-md-4 control-label">Mensaje</label>

                            <div class="col-md-6">
                                <textarea id="mensaje" name="mensaje" rows="4" cols="50"></textarea>

                                @if ($errors->has('mensaje'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mensaje') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
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