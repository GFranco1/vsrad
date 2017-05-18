@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Gestionar Clientes asignados</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($users))
                                <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    @if($u->id_comercial == $user->id)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->nombre}}</td>
                                        <td>{{$u->apellidos}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>{{$u->dni}}</td>
                                        <td>{{$u->telefono}}</td>
                                        <td>
                                        <a href="{{route('formCliente', $u->id)}}">
                                                <button type="button" class="btn btn-warning btn-s">Editar</button>
                                            </a>
                                        </td>
                                    </tr>
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