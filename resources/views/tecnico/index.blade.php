@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Opciones</div>
                    <div class="panel-body">
                        <a href="{{route('recibidostecnico')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Recibidos</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{route('enviadostecnico')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviados</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url(' ')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Proyectos asignados</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url(' ')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Nuevo mensaje</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection