@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mensajes recibidos</div>
                    <table class="table table-hover">
                        @if(isset($mensaje))
                            <thead>
                            <th style="text-align: center">Tipo personal</th>
                            <th style="text-align: center">Recibido de</th>
                            <th style="text-align: center">Opciones</th>
                            </thead>
                            <tbody>
                            @foreach($mensaje as $c)
                                @if($c->destino==\Auth::user()->id)
                                    @foreach($users as $u)
                                        @if($c->origen == $u->id)
                                            <tr>
                                                @if($u->rol == 3)
                                                    <td style="text-align: center">Tecnico</td>
                                                @endif
                                                @if($u->rol == 2)
                                                    <td style="text-align: center">Comercial</td>
                                                @endif
                                                <td style="text-align: center">{{$u->nombre}} {{$u->apellidos}}</td>
                                                <td style="text-align: center"><a href="{{route('visualizarmensajerecibidoscliente',$c->id)}}">
                                                        <button type="button" class="btn btn-warning btn-s">Visualizar mensaje</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                    <a href="{{url('mensajeria')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Volver</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection