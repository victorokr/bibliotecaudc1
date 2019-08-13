@extends('layouts.app')
@section('content')

@if (session()->has('infoContraseña'))
    <div class="alert alert-success mt-10"><strong>Aviso: </strong>{{ session('infoContraseña') }}</div>
@endif

{{-- <div class="contenedorimg">
    <div class="container">
        <div class="row sesionLogin justify-content-center">
            <div class="col-7">
                <div class="card-group">
                  <div class="card bg-light mb-3 text-center">
                    <div class="card-header"><i class="icono far fa-user"></i>{{ __('') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/consultantes/login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                               

                                <div class="col-md-12">
                                    <p class="font-weight-bolder">Cuenta Consultantes</p>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Ingresa tu email" value="{{ old('email') }}" required autofocus>
     
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Ingresa tu password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar') }}
                                        </label>
                                    </div>
                                </div>
                                    @if (Route::has('consultante.password.request')) 
                                    <div class="col-12">   
                                            <a class="a btn btn-link" href="{{ route('consultante.password.request') }}">
                                        {{ __('Olvidé mi contraseña?') }}
                                            </a>
                                    </div>
                                    @endif
                            </div>

                            <div class="form-group row   pt-1">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn-block btn-success btn-sm">
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
                          <img class="card-img-top " src="/images/logoGrande.PNG"  alt="Card 
                          image cap">
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
</div> --}}

<div class="contenedorimg">
 <div class="row justify-content-center">
   <div class="col-5"> 
    <div class="card-group">
      <div class="card">
        <div class="row sesionLoginn justify-content-center">
          <div class="col-12"> 
             <div class="card-header text-center"><i class="fas fa-users"></i>{{ __('') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/consultantes/login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row text-center">
                               

                                <div class="col-md-12">
                                    <p class="font-weight-bolder">Cuenta Consultantes</p>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Ingresa tu email" value="{{ old('email') }}" required autofocus>
     
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Ingresa tu password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar') }}
                                        </label>
                                    </div>
                                </div>
                                    @if (Route::has('consultante.password.request')) 
                                    <div class="col-12">   
                                            <a class="a btn btn-link" href="{{ route('consultante.password.request') }}">
                                        {{ __('Olvidé mi contraseña?') }}
                                            </a>
                                    </div>
                                    @endif
                            </div>

                            <div class="form-group row   pt-1">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn-block btn-success btn-sm">
                                        {{ __('Login') }}
                                    </button>

                                    
                                </div>
                            </div>
                        </form>
                    </div>
            
          </div> 
        </div>
      </div>
      <div class="card">
        <div class="row justify-content-center text-center">
          <div class="col-12"> 
            <img class="card-img-top img-fluid" src="/images/logoGrande.PNG"  alt="Card image cap">
            <div class="card-body">
                <small class=" font-italic text-muted ">   <h7 class="card-title">Sistema de gestion de prestamos.</h7></small>
                <p class="card-text text-center"><small class="text-muted">Registrate de manera presencial con tu carnet</p></small>
                <p class="card-text text-center"><small class="text-muted">Universitaria de Colombia</small></p>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
 </div>
</div>
@endsection