@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Proyectos</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($usuarios))
                                <thead>
                                <th>Cliente</th>
                                <th>Comercial</th>
                                <th>Asignar comercial</th>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $u)
                                    @if($u->rol == 1)
                                    <tr>
                                        <td>{{$u->nombre}} {{$u->apellidos}}</td>

                                        @if($u->id_comercial != 0)
                                            @foreach($comerciales as $c)
                                                @if($u->id_comercial == $c->id)
                                                    <td>{{$c->nombre}} {{$c->apellidos}}</td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td>VACIO</td>
                                        @endif

                                        <td>
                                            <form class="form-horizontal" role="form" method="GET" action="{{ route('asignacioncomercial', $u->id) }}">
                                                {!! csrf_field() !!}
                                                <select name="id_comercial" id="id_comercial" class="form-control">
                                                    @foreach($usuarios as $u)
                                                        @if($u->rol == 2)
                                                            <option  value="{{$u->id}}">{{$u->id}} {{$u->nombre}} {{$u->apellidos}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <input type="submit" class="btn btn-success btn-s"
                                                       value="Aceptar">
                                            </form>

                                        </td>
                                    </tr>
                                </tbody>
                                @endif
                                @endforeach
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