@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Eliminar Tecnicos</div>

                    <div class="panel-body">
                        <table class="table table-hover">

                            @if(isset($usuarios))
                                <thead>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Opcion</th>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $u)
                                    @if($u->rol == 3 && $u->eliminado == 0)
                                    <tr>
                                        <td>{{$u->nombre}}</td>
                                        <td> {{$u->apellidos}}</td>
                                        <td>
                                            <form class="form-horizontal" role="form" method="GET" action="{{ route('preliminartecnico',$u->id)}} ">
                                                {!! csrf_field() !!}
                                                <input type="submit" class="btn btn-danger btn-s"
                                                       value="Eliminar">
                                            </form>
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