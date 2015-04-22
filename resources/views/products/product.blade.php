@extends('layouts.master')

@section('title', $product->name)

@section('content')
	Ürün Adı: <span>{{ $product->name }}</span>

	<button>x</button>
	<script>
		$('button').click(function () {
			$.getJSON('/api/product/' + prompt('Ürün ID'), function (data) {
				$('span').html(data.name);
			});
		})
	</script>	

@stop