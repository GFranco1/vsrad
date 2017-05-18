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
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Precio</th>
                                <th>Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($peticiones as $p)
                                    @if($p->id_comercial == Auth::user()->id && $p->estado == 4)
                                    <tr>
                                        @foreach($users as $u)
                                            @if($u->id == $p->id_cliente)
                                        <td>{{$u->nombre}} {{$u->apellidos}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(SIN IVA)</td>
                                        <td>
                                            <form action="{{url('cambiarestado5comercial',$p->id)}}" method="GET">
                                                {!! csrf_field() !!}
                                                <input type="submit" class="btn btn-success btn-s" value="Aceptar">
                                            </form>
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
@endsection