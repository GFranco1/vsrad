@extends('layouts.app)

@section('content')

<h1>Mis proyectos</h1>

<ul>
    @foreach($proyectos as $p)
        <li>{{$p->nombre}}</li>
    @endforeach


</ul>

    <a href="{{route('proyectos.create')}}" class="btn btn-primary">



    </a>