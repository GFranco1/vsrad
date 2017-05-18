@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Gestionar Personal</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($users))
                                <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Rol</th>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->nombre}}</td>
                                        <td>{{$u->apellidos}}</td>
                                        <td>{{$u->email}}</td>
                                        @if($u->rol == "3")
                                            <td>Tecnico</td>
                                        @endif
                                        <td>
                                            <a href="{{route('datosPersonal', $u->id)}}">
                                                <button type="button" class="btn btn-warning btn-s">Modificar Personal</button>
                                            </a>
                                            <br><br>
                                            <form action="{{route('admin.destroy', $u->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <input type="submit" class="btn btn-danger btn-s" value="Eliminar">
                                            </form>
                                        </td>
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
@endsection