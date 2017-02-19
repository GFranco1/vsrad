@extends('layouts.app)

@section('content')

    <div class="container container-page">
        <h2>Crear Proyecto</h2>
        <div class="row">
            <div class="col-lg-12">
                <h3>Crear nuevo proyecto</h3>
                <form action="{{route('proyectos.store') }}" method="post">

                    <div class="form-group">
                        <label for="nombre"> Nombre del proyecto</label>
                        <input id="nombre" type="text" name="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="configuracion"> Nombre del proyecto</label>
                        <textarea id="configuracion" type="text" name="nombre" class="form-control">
                    </div>

                </form>
            </div>
        </div>


    </div>