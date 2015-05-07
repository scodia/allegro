@extends('layouts.master')

@section('title', 'Ürünler')

@section('content')

<script>
function addToCart(id) {
	$.post('/api/cart', {quantity: prompt('Kaç adet'), product_ID: id}, function (response, status, xhr) {
		if (xhr.status === 200) {
			alert('Ürün eklendi');

			$.get('/api/cart', function (data) {
				$('#xyz').append(data);
			});
		}
	});
}

function logout(id){
	$.ajax({
		url: '/api/login/exit',
		method: 'delete'
	}, function (response, status, xhr) {
		if (xhr.status === 200) {
			alert('Çıkış yapıldı');
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

@if (Auth::check())

Merhaba {{ Auth::user()->mail }}
	<button onClick="logout()">Çıkış</button>
@else

Şimdi giriş yapın

@endif

<ul>
@foreach ($products as $product)
    <li><a href="product/{!!$product->id!!}">İncele</a> {{ $product->name }}: {{ $product->price }} TL <button onclick="addToCart({{ $product->id }})">Sepete Ekle</button></li>
@endforeach
</ul>


<h2>Sepetim</h2>
<ul id="xyz">
@foreach ($cartItems as $cartItem)
    <li>Ürün adı :{{ $cartItem->warehouse_product_ID }} Ürün adeti:{{$cartItem->quantity}} <button onclick="removeCart({{ $cartItem->id }})">Sepetten Çıkar</button></li>
@endforeach
</ul>

@stop