@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="alert alert-success" role="alert">Logeado {{ Auth::user()->nombre}} {{ Auth::user()->apellidos}}</div>
                    <table class="table table-hover">
                        @if( Auth::user()->rol == 4)
                            @if(isset($peticiones))
                                <thead>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($peticiones as $p)
                                    <tr>
                                        <td>{{$p->email}}</td>
                                        <td>{{$p->password_temporal}}</td>
                                        <td>
                                             <form action="{{route('test-mail',$p->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="submit" class="btn btn-success btn-s" value="Aceptar">
                                            </form>
                                            <form action="{{route('peticion.destroy', $p->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <input type="submit" class="btn btn-danger btn-s" value="Denegar">
                                            </form>
                                        </td>
                                        <!-- <td><a href="/borrar/{{$p->id}}">Eliminar</a></td>-->
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        @endif
                    </table>
                    @if( Auth::user()->rol == 0)
                    @include('auth.register')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
