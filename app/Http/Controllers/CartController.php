<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softonic\GraphQL\ClientBuilder;
use Softonic\GraphQL\Response;

class CartController extends Controller
{
    protected $client;

    public function __construct(){
        $this->client = ClientBuilder::build('https://mock.shop/api');
    }

    public function createCart(Request $request) {
        $variantId = $request->input('variantId');
        $quantity = (int)$request->input('quantity', 1);
        
        $query = 'query GetProduct($id: ID!) {
            product(id: $id) {
                id
                title
                description
                images(first: 1) {
                    edges{
                        node{
                            url
                        }
                    }
                }
                variants(first: 1) {
                    edges {
                    node {
                            price {
                            amount
                            currencyCode
                            }
                        }
                    }
                }
            }
        }';

        $variables = [
            'id' => $variantId
        ];
        $response = $this->client->query($query, $variables);
        $data = $response->getData();

        if (isset($data['product'])) {
            $product = $data['product'];
            $price = (float) $product['variants']['edges'][0]['node']['price']['amount'];
            $totalAmount = $price * $quantity;
            $product['totalAmount'] = [
                'price' => $price,
                'quantity' => $quantity,
                'amount' => number_format($totalAmount, 2)
            ];
            $cart = session('cart', []);
            $quantities = session('quantities', []);
            $cart[] = $product;
            $quantities[] = $quantity;
            session(['cart' => $cart]);

            return response()->json(['cart' => $data['product']]);
        } else {
            return response()->json(['error' => '¡Fallo al añadir producto!'], 500);
        }
    }

    public function viewCart()
    {
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }
}
