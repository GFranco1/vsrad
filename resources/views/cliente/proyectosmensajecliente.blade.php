@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Proyectos</div>

                    <div class="panel-body">
                        <table class="table table-hover text-center">
                            @if(isset($proyectos))
                                <thead>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Tecnico</th>
                                <th style="text-align: center">Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $p)
                                    @if($users->id == $p->id_cliente)
                                    <tr>
                                        <td>{{$p->nombre}}</td>
                                        @foreach($usuarios as $u)
                                            @if($u->id == $p->id_tecnico)
                                        <td>{{$u->nombre}} {{$u->apellidos}}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <form action="{{url('enviarmensajeatecnico',$p->id)}}" method="GET">
                                                {!! csrf_field() !!}
                                                <input type="submit" class="btn btn-success btn-block"
                                                       value="Enviar mensaje">
                                            </form>
                                            <br>
                                        </td>

                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                        <a href="{{url('mensajeria')}}">
                            <button type="button" class="btn btn-primary btn-lg btn-block">Volver</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection