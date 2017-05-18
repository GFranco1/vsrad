<?php
function current_page($url = "/")
{
    return request()->path() == $url;
}
?>


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Opciones</div>

                    <div class="panel-body">
                        <li class="{{ current_page('/') ? 'active': '' }}"><a href="{{url('/formulario')}}"> pRUEA </a></li>
                        <a href="{{url('/formulario')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Dar de alta personal</button></a> <br>
                        <a href="{{url('/mostrarPersonal')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Gestionar Personal</button></a> <br>

                        <a href="{{url('/componenteForm')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Añadir componente</button></a><br>
                        <a href="{{url('/planoForm')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Añadir plano</button></a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection