@extends('layouts.master', ['categories' => $categories])

@section('title', 'Ürünler')


@section ('slider')
	@include('slider.slider')
@stop


@section('content')
		
			<ul>
			@foreach ($category->subCategories as $category)
				<li>{{$category->name}}</li>
			@endforeach
			</ul>




	<div class="categoryList">
		<ul>
		@foreach ($products as $product)
		
			
			<li>
				<a href="/product/{!!$product->id!!}">
					<img src="/img/category/ceket_12.jpg">
					<h3>{{ $product->name }}</h3>
					<span class="price"> {{ $product->price }} TL </span>
				</a>
				@if ($product->isAvailable())
				<button onclick="addToCart({{ $product->id }})">Sepete Ekle</button>
				@else
				Bu ürün bulunmamaktadır.
				@endif
			</li>
		
		
		@endforeach	
		</ul>
	</div>
@stop