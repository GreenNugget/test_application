<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-to-cart-form').on('submit', function(e){
                e.preventDefault();

                var form = $(this);
                var productId = form.find('input[name="variantId"]').val();
                var quantity = form.find('input[name="quantity"]').val();

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    method: 'POST',
                    data: {
                        variantId: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        alert(response.cart.title + ' ha sido añadido al carrito');
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.error);
                    }
                });
            });
        });
    </script>

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $product['node']['featuredImage']['url'] }}" alt="" class="w-100 card-img-top">
                        <div class="card-body">
                            <h4 class='card-title'>{{ $product['node']['title'] }}</h4>
                            <h5 class='price'>${{ $product['node']['variants']['edges'][0]['node']['price']['amount'] }}
                                {{ $product['node']['variants']['edges'][0]['node']['price']['currencyCode'] }}</h5>
                            <form class="add-to-cart-form">
                                @csrf
                                <input type="hidden" name="variantId" value="{{ $product['node']['id'] }}">
                                <div class="input-group">
                                    <input type="number" name="quantity" value="1" min="1"
                                        class="form-control">
                                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
