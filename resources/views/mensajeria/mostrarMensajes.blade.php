 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis mensajes</div>
                    <br><br>
                    <h3> Mensajes recibidos </h3>
                    <br>
                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($mensajeria))
                                <thead>
                                <th>ID del Origen</th>
                                <th>Asunto</th>
                                <th>Mensaje</th>
                                <th>Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($mensajeria as $c)
                                    <tr>
                                    @if($c->destino==\Auth::user()->id)
                                        <td>{{$c->origen}}</td>
                                        <td>{{$c->asunto}}</td>
                                        <td>{{$c->mensaje}}</td> <br>
                                        <td><a href="{{route('responder',$c->id)}}">
                                                <button type="button" class="btn btn-warning btn-s">Responder</button>
                                            </a>
                                            </td>
                                    @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                @endif
                        </table>
                        <br><br>
                        <h3> Mensajes enviados </h3>
                        <br>
                         <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($mensajeria))
                                <thead>
                                <th>ID del Destino</th>
                                <th>Asunto</th>
                                <th>Mensaje</th>
                                </thead>
                                <tbody>
                                @foreach($mensajeria as $c)
                                    <tr>
                                    @if($c->origen==\Auth::user()->id)
                                        <td>{{$c->destino}}</td>
                                        <td>{{$c->asunto}}</td>
                                        <td>{{$c->mensaje}}</td> <br>
                                        <td>
                                    @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                @endif
                        </table>

                        <a href="{{url('/home')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Volver</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>