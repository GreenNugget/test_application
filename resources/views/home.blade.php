@extends('layouts.app')

@section('content')
    <!--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard HOLA') }}</div>

                    <div class="card-body">
                        @if (session('status'))
    <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
    @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class='container'>
        @if (isset($products) && count($products) > 0)
            <div class='row'>
                @foreach ($products as $product)
                    <div class='col-lg-3'>
                        <div class='card my-3'>
                            @if (isset($product['node']['featuredImage']))
                                <img src="{{ $product['node']['featuredImage']['url'] }}"
                                    alt="{{ $product['node']['title'] }}" class="w-100 card-img-top">
                            @endif
                            <div class='card-body'>
                                <h4 class='card-title'>{{ $product['node']['title'] }}</h4>
                                <h5 class='price'>${{ $product['node']['variants']['edges'][0]['node']['price']['amount'] }} {{ $product['node']['variants']['edges'][0]['node']['price']['currencyCode'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay productos disponibles.</p>
        @endif
    </div>
@endsection
