@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Opciones</div>
                    <div class="panel-body">
                        <a href="{{url('proyectosmensajecliente',Auth::user()->id)}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviar mensaje a Tecnico</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('enviarmensajeacomercial',Auth::user()->id)}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviar mensaje a Comercial</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{route('recibidoscliente')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Recibidos</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{route('enviadoscliente')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviados</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('/home')}}"><button type="button" class="btn btn-warning btn-lg btn-block">Volver</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection