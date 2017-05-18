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
                                <th style="text-align: center">Precio</th>
                                <th style="text-align: center">Estado</th>
                                <th style="text-align: center">Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $p)
                                    @if($users->id == $p->id_tecnico)
                                    <tr>
                                        <td>{{$p->nombre}}</td>
                                        <td>{{$p->precio}}&euro;</td>
                                        @if($p->estado == 0)
                                        <td>-</td>
                                        @endif
                                        @if($p->estado == 1)
                                            <td>Validando</td>
                                        @endif
                                        @if($p->estado == 2 || $p->estado == 3)
                                            <td>Enviado al cliente</td>
                                        @endif

                                        <td>
                                            @if($p->estado == 1)
                                            <form action="{{url('validacionproyecto',$p->id)}}" method="GET">
                                                {!! csrf_field() !!}
                                                <input type="submit" class="btn btn-success btn-block"
                                                       value="Validacion">
                                            </form>
                                            <br>
                                            @endif
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