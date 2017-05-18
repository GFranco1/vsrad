@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Opciones</div>

                    <div class="panel-body">
                        <a href="{{url('/peticiones')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Peticiones</button></a>
                    </div>

                    <div class="panel-body">
                        <a href="{{url('/peticionoferta')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Aplicar Oferta</button></a>
                    </div>

                    <div class="panel-body">
                        <a href="{{url('/mostrarComponentes')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Validar Componentes</button></a>

                    </div>

                    <div class="panel-body">
                        <a href="{{url('/mostrarPlanos')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Validar Planos</button></a>

                    </div>
                    <div class="panel-body">
                        <a href="{{url('/asignarcomercial')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Asignar comercial a cliente</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('/asignartecnico')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Asignar tecnico a proyecto</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('/visualizartecnicos')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Eliminar técnicos</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection