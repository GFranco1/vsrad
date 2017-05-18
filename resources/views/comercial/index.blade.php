@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Opciones</div>

                    <div class="panel-body">
                        <a href="{{route('imprimirClientes',Auth::user()->id)}}"><button type="button" class="btn btn-primary btn-lg btn-block">Gestionar Clientes asignados</button></a>
                    </div>

                    <div class="panel-body">
                        <a href="{{route('recibidoscomercial')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Recibidos</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{route('enviadoscomercial')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Enviados</button></a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('peticionescompra')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Peticiones de compra</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection