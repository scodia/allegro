@extends('layouts.master')

@section('title', 'Ürünler')

@section('content')

Merhaba {{ Auth::user()->mail }}

<script>
function addToCart(id) {
	$.post('/api/cart', {quantity: prompt('Kaç adet'), product_ID: id}, function (response, status, xhr) {
		if (xhr.status === 200) {
			alert('Ürün eklendi');

			$.get('/api/cart', function (data) {
				$('#xyz').html(data);
			});
		}
	});
}

function removeCart(id) {
	$.ajax({
		url: '/api/cart/' + id,
		method: 'delete'
	}, function (response, status, xhr) {
		if (xhr.status === 200) {
			alert('Ürün silindi');
		}
	});
}

</script>

<ul>
@foreach ($products as $product)
    <li>{{ $product->name }}: {{ $product->price }} TL <button onclick="addToCart({{ $product->id }})">Sepete Ekle</button></li>
@endforeach
</ul>


<h2>Sepetim</h2>
<ul id="xyz">
@foreach ($cartItems as $cartItem)
    <li>Ürün adı :{{ $cartItem->warehouse_product_ID }} Ürün adeti:{{$cartItem->quantity}} <button onclick="removeCart({{ $cartItem->id }})">Sepetten Çıkar</button></li>
@endforeach
</ul>

@stop