@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row content">
            <div class="col-sm-2 panel panel-default">
                <div class="panel-heading text-center">Planos</div>
                <div class="panel-body">
                    @if(isset($planos))
                        @foreach($planos as $p)
                            <h4>{{ $p->nombre }}</h4>
                            <a href="/home"><img src="{{$p->icono_plano}}" id="casa-1" /></a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="panel col-sm-8 panel-default ">
                <div class="panel-heading text-center">Tipos de Componentes</div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Cocina</a></li>
                        <li><a href="#tab2default" data-toggle="tab">Baño</a></li>
                        <li><a href="#tab3default" data-toggle="tab">Habitacion</a></li>
                        <li><a href="#tab4default" data-toggle="tab">Salon</a></li>
                        <li><a href="#tab5default" data-toggle="tab">Terraza</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 1)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 2)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 3)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab4default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 4)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab5default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 5)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
                <div class="panel-heading text-center">Configuracion</div>
                <div class="panel-body">
                </div>
            </div>

            <div class="col-sm-2 panel panel-default">
                <div class="panel-heading text-center">Cuenta</div>
                <div class="panel-body">
                    <div class="well">
                        <p>ADS</p>
                    </div>
                    <div class="well">
                        <p>ADS</p>
                    </div>
                </div>
                <div class="panel-body">

                    <a href="{{url(' ')}}">
                        <button type="button" class="btn btn-primary btn-block">Validar proyecto</button>
                    </a>
                    <br>
                    <a href="{{url(' ')}}">
                        <button type="button" class="btn btn-success btn-block">Guardar proyecto</button>
                    </a>
                    <br>
                    <a href="{{url(' ')}}">
                        <button type="button" class="btn btn-danger btn-block">Borrar proyecto</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection



