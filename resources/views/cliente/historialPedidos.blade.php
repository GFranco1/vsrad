@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Historial de Pedidos</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($proyectos))
                                <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Id Tecnico</th>
                                <th>Precio</th>
                                <th>Fecha de creacion</th>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $u)
                                    @if($u->id_cliente == $user->id)
                                    @if($u->estado == 8)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->nombre}}</td>
                                        @foreach($usuarios as $us)
                                            @if($u->id_tecnico == $us->id )
                                        <td>{{$us->nombre}} {{$us->apellidos}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$u->precio}}</td>
                                        <td>{{$u->created_at}}</td>
                                    </tr>
                                    @endif
                                    @endif
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
    </div>
@endsection