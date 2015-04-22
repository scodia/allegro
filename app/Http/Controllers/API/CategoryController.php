<?php namespace Allegro\Http\Controllers\API;

use Allegro\Http\Controllers\Controller;
use Allegro\Category;

class CategoryController extends Controller {

    public function getCategories() {
        return Category::all()->toJSON();
    }

    public function getCategory($categoryId) {
        return Category::find($categoryId)->toJSON();
    }

}
