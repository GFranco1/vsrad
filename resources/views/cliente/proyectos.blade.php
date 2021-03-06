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
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $p)
                                    <tr>
                                        <td>{{$p->nombre}}</td>
                                        <td>{{$p->precio}}&euro;</td>
                                        <td>{{$p->estado}}</td>
                                        <td>

                                            <form action="{{url(' ',$p->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="submit" class="btn btn-primary btn-s"
                                                       value="Validar Proyecto">
                                            </form>
                                            <br>
                                            <a href="{{route('modificar',$p->id)}}">
                                                <button type="button" class="btn btn-warning btn-s">Modificar Proyecto</button>
                                            </a>
                                            <br><br>
                                            <form action="{{route('proyecto.destroy', $p->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <input type="submit" class="btn btn-danger btn-s" value="Borrar">
                                            </form>
                                        </td>
                                    </tr>
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