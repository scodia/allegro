<?php namespace Allegro\Http\Controllers;

use Allegro\Product;

class ProductController extends Controller {

    public function getProducts($searchKeyword = "") {
        return view('products.products');
    }

    public function getProduct($productId) {
        return view('products.product', ['product' => Product::find($productId)]);
    }

}
