<?php namespace Allegro\Http\Controllers\API;

use Allegro\Http\Controllers\Controller;
use Allegro\Product;

class ProductController extends Controller {

    public function getProducts($searchKeyword = "") {
        return Product::all()->toJSON();
    }

    public function getProduct($productId) {
        return Product::find($productId)->toJSON();
    }

}
