@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Proyectos</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($proyectos))
                                <thead>
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Tecnico</th>
                                <th>Comercial</th>
                                <th>Asignar Tecnico</th>
                                </thead>
                                <tbody>

                                @foreach($proyectos as $p)
                                    @if($p->id_cliente!=6)
                                    <tr>
                                        @foreach($usuarios as $u)
                                            @if($p->id_cliente == $u->id)
                                                <td>{{$u->nombre}} {{$u->apellidos}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$p->nombre}}</td>
                                        @if($p->id_tecnico != 0)
                                            @foreach($usuarios as $u)
                                                @if($p->id_tecnico == $u->id)
                                                    <td>{{$u->nombre}} {{$u->apellidos}}</td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td>VACIO</td>
                                        @endif

                                        @if($p->id_comercial != 0)
                                            @foreach($usuarios as $u)
                                                @if($p->id_comercial == $u->id)
                                                    <td>{{$u->nombre}} {{$u->apellidos}}</td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td>VACIO</td>
                                        @endif

                                        <td>
                                            <form class="form-horizontal" role="form" method="GET" action="{{ route('asignaciontecnico', $p->id) }}">
                                                {!! csrf_field() !!}
                                                <select name="id_tecnico" id="id_tecnico" class="form-control">
                                                    @foreach($usuarios as $u)
                                                        @if($u->rol == 3)
                                                            <option  value="{{$u->id}}">{{$u->id}} {{$u->nombre}} {{$u->apellidos}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <input type="submit" class="btn btn-success btn-s"
                                                       value="Aceptar">
                                            </form>

                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                        <a href="{{url('/home')}}">
                            <button type="button" class="btn btn-primary btn-lg btn-block">Volver</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection