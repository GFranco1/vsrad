@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Visualizar Mensaje</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            {{ csrf_field() }}
                            @foreach($users as $uu)
                                @if($mensaje->destino == $uu->id && $uu->rol == 3)
                            <div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}">
                                <label for="asunto" class="col-md-4 control-label">Proyecto:</label>

                                <div class="col-md-6">
                                    <p>{{$mensaje->asunto}}</p>

                                    @if ($errors->has('asunto'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('asunto') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                @endif
                                    @if($mensaje->destino == $uu->id && $uu->rol == 2)
                                        <div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}">
                                            <label for="asunto" class="col-md-4 control-label">Asunto:</label>

                                            <div class="col-md-6">
                                                <p>{{$mensaje->asunto}}</p>

                                                @if ($errors->has('asunto'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('asunto') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                            @endforeach

                            <div class="form-group{{ $errors->has('mensaje') ? ' has-error' : '' }}">
                                <label for="mensaje" class="col-md-4 control-label">Mensaje</label>

                                <div class="col-md-6">
                                    <textarea id="mensaje" name="mensaje" rows="4" cols="50">{{$mensaje->mensaje}}</textarea>

                                    @if ($errors->has('mensaje'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mensaje') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </form>


                            <div class="form-group">
                                    <a href="{{route('enviadoscliente')}}">
                                        <button type="button" class="btn btn-primary btn-block">Volver</button>
                                    </a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


