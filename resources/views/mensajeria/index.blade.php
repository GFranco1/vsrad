@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Opciones</div>
                    <div class="panel-body">
                        <a href="{{url('/mensajeatecnico')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviar Mensaje a Tecnico</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url(' ')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviar Mensaje a Comercial</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url(' ')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Recibidos</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url(' ')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviados</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection