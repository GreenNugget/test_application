@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card w-75 border-0 h-75">
            <div class="row flex-sm-column-reverse justify-content-center justify-content-md-center position-relative h-100">
                <div class="col-lg-4 col-sm-1 py-5 text-end">
                    <h1 class="shadow rounded-end position-absolute top-0 start-0 pe-4 bg-light ps-5 w-60">
                        {{ __('Registro') }}</h1>
                </div>
                <div class='position-absolute top-20 start-0 card border register-card-component w-75 p-0 rounded'>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mx-2 my-5 align-items-center justify-content-around">
                            <div class="col-lg-12">
                                <div class="row justify-content-around">
                                    <div class="col-lg-5">
                                        <label for="name" class="col-md-4 col-form-label">{{ __('Nombres') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-5">
                                        <label for="lastname" class="col-form-label">{{ __('Apellido') }}</label>
                                        <input id="lastname" type="text"
                                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                            value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-lg-5">
                                        <label for="username" class="col-md-4 col-form-label">{{ __('Usuario') }}</label>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-5">
                                        <label for="email"
                                        class="col-form-label">{{ __('Correo') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-lg-5">
                                        <label for="password" class="col-form-label">{{ __('Contraseña') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-5">
                                        <label for="password-confirm"
                                        class="col-form-label">{{ __('Confirmar Contraseña') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end align-items-center">
                            <div class="col-lg-auto col-sm-auto">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8 col-sm-11 bg-primary rounded-start h-100">
                    .
                </div>
            </div>
        </div>
    </div>
@endsection
