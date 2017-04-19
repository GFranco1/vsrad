@if( Auth::user()->rol == 4)
    @include('director_comercial.index')
@endif
@if( Auth::user()->rol == 0)
    @include('auth.register')
@endif
@if (Auth::user()->rol == 1)
    @include('cliente.index')
@endif