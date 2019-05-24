@extends('layouts.app')

@section('content')

@if (session()->has('infoContraseña'))
      <div class="alert alert-success mt-10"><strong>Aviso: </strong>{{ session('infoContraseña') }}</div>
      @endif

<div class="contenedorimg">
    <div class="container">
        <div class="row sesionLogin justify-content-center">
            <div class="col-7">
                <div class="card-group">
                  <div class="card bg-light mb-3 text-center">
                    <div class="card-header"><i class="icono fas fa-user-cog"></i>{{ __('') }}</div>
                      <div class="card-body">
                            <form method="POST" action="{{ url('login') }}">
                                @csrf

                                <div class="form-group row">
                                    {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                                    <div class="col-md-12">
                                        <p class="font-weight-bolder">Cuenta Empleados</p>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingresa tu email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ingresa tu password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="r form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordar') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                    @if (Route::has('password.request'))
                                    <div class="col-12 ">
                                        <a class="a btn btn-link" style="margin-top: -7px " href="{{ route('password.request') }}">
                                                {{ __('Olvidé mi contraseña?') }}
                                        </a>
                                    </div>
                                    @endif
                                <div class="form-group row pt-1">
                                    <div class="col-md-12">
                                        <button type="submit" class="b btn-block btn-success btn-sm">
                                            {{ __('Login') }}
                                        </button>  
                                    </div>
                                </div>
                            </form>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                        <div class="card bg-light mb-3 text-center">
                          <img class="card-img-top img-fluid" src="images/logoGrande.PNG"  alt="Card image cap">
                            <div class="card-body">
                                <small class=" font-italic text-muted">Sistema de gestion de prestamos he inventario </small>
                                <div class="card-footer">
                                    <small class="text-muted">Universitaria de Colombia</small>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

@endsection
