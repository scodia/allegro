@extends('layouts.master', ['categories' => $categories])

@section('title', 'Ürünler')

@section('content')


<ul>
@foreach ($products as $product)
    <li><a href="/product/{!!$product->id!!}">İncele</a> {{ $product->name }}: {{ $product->price }} TL <button onclick="addToCart({{ $product->id }})">Sepete Ekle</button></li>
@endforeach
</ul>


<h2>Sepetim</h2>
<ul id="xyz">
@foreach ($cartItems as $cartItem)
    <li>Ürün adı :{{ $cartItem->warehouse_product_ID }} Ürün adeti:{{$cartItem->quantity}} <button onclick="removeCart({{ $cartItem->id }})">Sepetten Çıkar</button></li>
@endforeach
</ul>

@stop