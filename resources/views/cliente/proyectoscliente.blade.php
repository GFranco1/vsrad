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
                                    @if($users->id == $p->id_cliente)
                                    <tr>
                                        @if($p->estado == 0)
                                            <td>{{$p->nombre}}</td>
                                        <td>-</td>
                                            <td>-</td>
                                        @endif
                                        @if($p->estado == 1)
                                                <td>{{$p->nombre}}</td>
                                                <td>-</td>
                                            <td>Validando</td>
                                        @endif
                                            @if($p->estado == 2)
                                                <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(SIN IVA)</td>
                                                <td>Validado</td>
                                            @endif
                                        @if($p->estado == 3)
                                                <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(SIN IVA)</td>
                                            <td>Modificado</td>
                                        @endif
                                            @if($p->estado == 4)
                                                <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(SIN IVA)</td>
                                                <td>Esperando</td>
                                            @endif
                                            @if($p->estado == 5)
                                                <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(CON IVA)</td>
                                                <td>Comprar</td>
                                            @endif
                                            @if($p->estado == 6)
                                                <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(CON IVA)</td>
                                                <td>Espera de oferta</td>
                                            @endif
                                            @if($p->estado == 7)
                                                <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(CON OFERTA)</td>
                                                <td>-</td>
                                            @endif
                                            @if($p->estado == 8)
                                                <td>{{$p->nombre}}</td>
                                                <td>{{$p->precio}}&euro;(CON OFERTA)</td>
                                                <td>Comprado</td>
                                            @endif

                                        <td>
                                            @if($p->estado == 0)
                                            <form action="{{url('cambiarestado',$p->id)}}" method="GET">
                                                {!! csrf_field() !!}
                                                <input type="submit" class="btn btn-primary btn-block"
                                                       value="Validar">
                                            </form>
                                            <br>

                                            @endif
                                                @if($p->estado == 2)
                                                    <form action="{{route('cambiarestado4cliente', $p->id)}} " method="GET">
                                                        {!! csrf_field() !!}
                                                        <input type="submit" class="btn btn-warning btn-block"
                                                               value="Pedir Presupuesto Real">
                                                    </form>
                                                    <br>
                                                    <form action="{{route('proyecto.destroy', $p->id)}}" method="POST">
                                                        {!! csrf_field() !!}
                                                        {!! method_field('DELETE') !!}
                                                        <input type="submit" class="btn btn-danger btn-block" value="Borrar">
                                                    </form>
                                                @endif
                                                @if($p->estado == 3)
                                                    <form action="{{url('validacionproyectocliente',$p->id)}}" method="GET">
                                                    {!! csrf_field() !!}
                                                    <input type="submit" class="btn btn-success btn-block"
                                                           value="Visualizar">
                                                </form>
                                                    <br>
                                                @endif
                                                @if($p->estado == 5)
                                                    <form action="{{url('enviarinforme',$p->id)}}" method="GET">
                                                        {!! csrf_field() !!}
                                                        <input type="submit" class="btn btn-success btn-block"
                                                               value="Comprar">
                                                    </form>
                                                    <br>
                                                @endif
                                                @if($p->estado == 7)
                                                    <form action="{{url('comprar',$p->id)}}" method="GET">
                                                        {!! csrf_field() !!}
                                                        <input type="submit" class="btn btn-success btn-block"
                                                               value="Comprar">
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