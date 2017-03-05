@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="alert alert-success" role="alert">Logeado {{ Auth::user()->nombre}} {{ Auth::user()->apellidos}}</div>

                    <!--<a href="http://localhost:63342/VSRAD-Codigo/VSRAD/GeneradorPassword.php">generar</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
