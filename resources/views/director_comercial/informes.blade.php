@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Peticiones</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            @if(isset($informes))
                                <thead>
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Precio</th>
                                <th>Ofertas</th>
                                </thead>
                                <tbody>
                                @foreach($informes as $i)
                                    @if($i->estado == 6)
                                    <tr>
                                        @foreach($users as $u)
                                            @if($u->id == $i->id_cliente)
                                                <td>{{$u->nombre}} {{$u->apellidos}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$i->nombre}}</td>
                                            <td>{{$i->precio}}&euro;(CON IVA)</td>
                                        <td>
                                            <form class="form-horizontal" role="form" method="GET" action="{{route('oferta', $i->id)}} ">
                                                {!! csrf_field() !!}
                                                <input type="range" min="0" max="100" name="oferta" value="0" step="5" onchange="showValue(this.value)" />
                                                <span id="range">0</span>
                                                <script type="text/javascript">
                                                    function showValue(newValue)
                                                    {
                                                        document.getElementById("range").innerHTML=newValue;
                                                    }
                                                </script><br>
                                                <input type="submit" class="btn btn-success btn-block"
                                                       value="%">
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