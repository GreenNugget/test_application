<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View as View;

class ProductController extends Controller
{
    public function showProducts(): View{
        $url = 'https://mock.shop/api?query=%7B%20products(first%3A%2020)%20%7B%20edges%20%7B%20node%20%7B%20id%20title%20description%20featuredImage%20%7B%20id%20url%20%7D%20variants(first%3A%203)%20%7B%20edges%20%7B%20node%20%7B%20price%20%7B%20amount%20currencyCode%20%7D%20%7D%20%7D%20%7D%20%7D%20%7D%20%7D%7D';

        $headers = [
            'Authorization: Bearer YOUR_API_KEY',
            'Accept: application/json',
        ];
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return view('error')->with('error', $error_msg);
        }

        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_status != 200) {
            curl_close($ch);
            return view('error')->with('error', 'Request failed with status code: ' . $http_status);
        }

        curl_close($ch);
        $data = json_decode($response, true);
        //dd($data);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return view('error')->with('error', 'JSON decode error: ' . json_last_error_msg());
        }
        
        $products = $data['data']['products']['edges'] ?? [];
        
        return view('home')->with('products', $products);        
    }
}
