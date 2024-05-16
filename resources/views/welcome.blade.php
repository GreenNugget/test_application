<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prueba Colorines</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block text-center w-30">
                <h1 class="text-dark mb-5">¡Bienvenido!</h1>
                @auth
                    <a href="{{ url('/home') }}" class="text-sm underline">Home</a>
                @else
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('login') }}" class="btn btn-secondary py-2 px-5">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="btn btn-secondary py-2 px-5">Registro</a>
                        @endif
                    </div>
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
