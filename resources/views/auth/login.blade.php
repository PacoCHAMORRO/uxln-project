@extends('layouts.app')

@section('content')
<div class="background-img"></div>
<div class="container login-container">
    <div class="d-flex justify-content-center">
        <div class="login-wrapper px-0 col-lg-8 col-md-12 d-flex justify-content-center">
            {{-- LOGIN COL --}}
            <div class="col-sm-12 col-md-6 login-form">
                <div class="text-center">
                    <img class="py-4" src="theme/images/icon/logo.png" alt="">
                    <h3>UXLN Admin</h3>
                    <p class="px-5">Bienvenido, inicie sesión para tener acceso a UXLN Admin</p>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                    @endif
                </div>
                <form method="POST" action="{{ route('login') }}" class="">
                    @csrf
                    <div class="form-group pt-5">
                        <div class="col-md-12">
                            <input id="email" type="email" class="login-input @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required
                                autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="login-input @error('password') is-invalid @enderror" name="password"
                                placeholder="Contraseña" required autocomplete="current-password">
    
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    Recordar
                                </label>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group row mb-3 text-center">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Iniciar Sesión
                            </button>
    
    
                        </div>
                    </div>
                </form>
            </div>
            {{-- END LOGIN FORM --}}
            <div class="col-md-6 d-none d-md-block login-img">
                
            </div>
        </div>
    </div>
</div>
    
    @endsection

