@extends('layouts.app')

@section('content')
    <div class="container">
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 panel panel-default">
            <div class="panel-heading">Planos</div>
            <div class="panel-body">
                @if(isset($planos))
                    @foreach($planos as $p)
                        <img src="{{$p->imagen_plano}}">
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-sm-8  panel panel-default ">
            <div class="panel-heading">Componentes</div>
            <div class="panel-body">
                @if(isset($componentes))
                    @foreach($componentes as $c)
                        <img src="{{$c->imagen}}">
                    @endforeach
                @endif
            </div>
            <div class="panel-heading">Configuracion</div>
            <div class="panel-body">
                 <h1>PONER CANVAS</h1>
            </div>
        </div>
        <div class="col-sm-2 panel panel-default">
            <div class="panel-heading">Cuenta</div>
            <div class="panel-body">
                <div class="well">
                    <p>ADS</p>
                </div>
                <div class="well">
                    <p>ADS</p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
