@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w-25 mb-3">
        <a href="/home" class="text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-10"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg> Seguir Comprando</a>
    </div>
    <h1>Tu Carrito</h1>
    @if (!empty($cart))
        <ul class="list-group">
            @foreach ($cart as $product)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{{ $product['images']['edges'][0]['node']['url'] }}" alt="{{ $product['title'] }}" class="img-fluid">
                        </div>
                        <div class="col-lg-8">
                            <h4>{{ $product['title'] }}</h4>
                            <h5>Precio Unitario: $ {{ $product['totalAmount']['price'] }} c/u</h5>
                            <h5>Cantidad Seleccionada: {{ $product['totalAmount']['quantity'] }} </h5>
                        </div>
                        <div class="col-lg-2">
                            <h4>Total: {{ $product['totalAmount']['amount']}}</h4>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>¡Tu carrito está vacío!</p>
    @endif
</div>
@endsection
