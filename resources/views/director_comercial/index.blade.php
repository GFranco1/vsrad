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
                </div>
            </div>
        </div>
    </div>
@endsection