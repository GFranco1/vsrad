@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Peticiones</div>

                    <div class="panel-body">
                        <table class="table table-hover">
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