<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar mensaje a comercial</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('clienteComercial.store') }}">
                        {{ csrf_field() }}

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
                             <label for="destino">Destinatario</label>
                             <select name="destino" id="destino" class="form-control">
                             @foreach($users as $u)
                             @if($u->rol == 2)
                             <option  value="{{$u->id}}">{{$u->id}} {{$u->nombre}} {{$u->apellidos}}</option>
                             @endif
                             @endforeach
                             </select>
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