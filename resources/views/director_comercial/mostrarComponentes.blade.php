@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Validar componentes</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($componentes))
                                <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descrpicion</th>
                                <th>Precio</th>
                                <th>Zona</th>
                                <th>Acción</th>
                                </thead>
                                <tbody>
                                @foreach($componentes as $c)
                                    @if($c->validado == 0)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->nombre}}</td>
                                        <td>{{$c->descripcion}}</td>
                                        <td>{{$c->precio}}</td>
                                        <td>{{$c->zona}}</td>
                                        <td>
                                            <form action="{{route('componente.update', $c->id)}}" role="form" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('PUT') !!}
                                                <input type="submit" class="btn btn-success btn-s" value="Validar">
                                            </form>
                                            <br>
                                           <form action="{{route('componente.destroy', $c->id)}}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <input type="submit" class="btn btn-danger btn-s" value="Descartar">
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