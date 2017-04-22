<table class="table table-hover">
    @if( Auth::user()->rol == 4)
    @if(isset($peticiones))
    <thead>
        <th>Correo</th>

    </thead>
    <tbody>
        @foreach($peticiones as $p)
            <tr>
                <td>{{$p->email}}</td>
                <td>
                    <form action="{{route('peticion.destroy', $p->id)}}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <input type="submit" class="btn btn-danger btn-s" value="Eliminar">
                    </form>
                </td>
               <!-- <td><a href="/borrar/{{$p->id}}">Eliminar</a></td>-->
            </tr>
        @endforeach
    </tbody>
    @endif
    @endif


</table>