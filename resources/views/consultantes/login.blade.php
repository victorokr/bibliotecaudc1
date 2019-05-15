@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row sesionLogin justify-content-center">
        <div class="col-8">
            <div class="card  ">
                <div class="card-header"><i class="icono far fa-user"></i>{{ __('') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/consultantes/login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label> --}}

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
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label> --}}

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
                                @if (Route::has('password.request')) 
                                <div class="col-12">   
                                        <label class="a btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidé mi contraseña?') }}
                                        </label>
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
</div>
@endsection