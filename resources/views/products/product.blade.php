@extends('layouts.master')

@section('title')
{{$product->name}}
@stop

@section('headAdd')
<script src="/js/zoom/zoom.js"></script>
@stop	

@section('content')

	<div class="product">

		<img src="/js/zoom/test_th.jpg" data-zoom="/js/zoom/test.jpg" data-zoom-images=".test-navigate">
		<h1>{{$product->name}}</h1>

		<ul>
			<li><a class="test-navigate" href="#" data-zoom-navigate="/js/zoom/test_th.jpg,/js/zoom/test.jpg"><img src="/js/zoom/test_th.jpg"></a></li>
			<li><a class="test-navigate" href="#" data-zoom-navigate="/js/zoom/test2_th.jpg,/js/zoom/test2.jpg"><img src="/js/zoom/test2_th.jpg"></a></li>
			
		</ul>
		@if ($product->discount_percent > 0)
			<div class="indirim" ></div>
			<span class="discount">% {{$product->discount_percent}}</span>
			<span class="prePrice">{{$product->price}} TL</span>
			<span id="newPrice"  > TL</span>
			<script type="text/javascript">
			window.discountCalculator({{$product->discount_percent}},{{$product->price}})</script>
		@else
			<span>{{$product->price}} TL</span>
		@endif
		
		
		<input  type="number" name="quantity" id="quantity" min="1" value="1" max="15"/><button onclick="addToCart({{ $product->id }})">Sepete Ekle</button>
		
	</div>
	

	<script>
		$("[data-zoom]").zoom();
	</script>

@stop