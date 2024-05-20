@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card w-75 border-0 h-30em">
            <div class="row justify-content-center position-relative h-100">
                <div class="col-lg-6 rounded-end bg-primary bottom-border">
                    <img src="{{ asset('img/logo.png') }}" alt="Placeholder Image" class="rounded-circle my-5 col-login-img border">
                </div>
                <div class='top-login-card position-absolute top-30 start-0 card border w-40 p-0 rounded'>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="m-3">
                            <div class="row mb-3">
                                <label for="username"
                                    class="col-md-auto col-form-label text-md-end">{{ __('Usuario') }}</label>

                                <div class="col-md-12">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-auto col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-lg-5 col-sm-5">
                                <div class="form-check">
                                    <input class="form-check-input shadow border border-dark" type="checkbox"
                                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-between align-items-center">
                            <div class="col-lg-auto col-sm-4 ms-5">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                @endif
                            </div>
                            <div class="col-lg-auto col-sm-6">
                                <button type="submit" class="btn btn-primary rounded-pill w-100 px-5">
                                    {{ __('Iniciar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <h1 class="shadow position-absolute top-0 start-50 rounded-start bg-light ps-5 w-50">
                        {{ __('Login') }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
