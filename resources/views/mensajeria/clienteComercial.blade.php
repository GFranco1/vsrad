@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Enviar mensaje a comercial</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('mensajeria.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}">
                                <label for="asunto" class="col-md-4 control-label">Asunto:</label>

                                <div class="col-md-6">
                                    <input id="asunto" type="text" class="form-control" name="asunto">
                                    @if ($errors->has('asunto'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('asunto') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('destino') ? ' has-error' : '' }}">
                                <label for="destino" class="col-md-4 control-label" >Destinatario:</label>
                                <div class="col-md-6">
                                    @foreach($users as $u)
                                        @if($u->id == $user->id_comercial)
                                            <p>{{$u->nombre}} {{$u->apellidos}}</p>
                                            <input id="destino" type="hidden" name="destino" class="form-control"  value="{{$u->id}}">
                                        @endif
                                    @endforeach
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
                                    <button type="submit" class="btn btn-success btn-block">
                                        Enviar
                                    </button>
                                    <br>
                                    <a href="{{url('mensajeria')}}">
                                        <button type="button" class="btn btn-primary btn-block">Volver</button>
                                    </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
