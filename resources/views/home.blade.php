
@if( Auth::user()->rol == 0)
    @include('auth.register')
@endif
@if (Auth::user()->rol == 1)
    @include('cliente.index')
@endif
@if (Auth::user()->rol == 2)
    @include('comercial.index')
@endif
@if (Auth::user()->rol == 3)
    @include('tecnico.index')
@endif
@if( Auth::user()->rol == 4)
    @include('director_comercial.index')
@endif
@if( Auth::user()->rol == 5)
    @include('administrador.index')
@endif
@if( Auth::user()->rol == 6)
    @include('cliente.index')
@endif