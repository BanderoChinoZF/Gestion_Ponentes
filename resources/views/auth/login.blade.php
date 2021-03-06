@extends('layouts.app')

@section('content')
<div class="container p-2">
    <div class="col-12 col-lg-4 offset-lg-4">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="{{ asset('img/logo-gestion.jpeg')}}" />
        <p class="profile-name-card"></p>
        <br>
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf

            <span id="reauth-email" class="reauth-email"></span>

            <div class="col-8 offset-2">
                <input id="email" type="email" class="form-control" name="email" placeholder="Correo Electronico" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-8 offset-2">
                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if (Route::has('password.request'))
                {{-- <div class="forgot">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </div> --}}
            @endif

            <div class="space col-8 offset-2">
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin" style="background-color: #da2c4e; border-radius: 15px;">Iniciar Sesion</button>
            </div>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->
@endsection
