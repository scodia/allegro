<?php namespace Allegro\Http\Controllers\View;

use Allegro\Http\Requests;
use Allegro\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Allegro\Product;
use Allegro\CartItem;
use Allegro\Category;

use Auth;


class ProductController extends Controller {

	private function getProductPageData(Request $request, $categoryID = 0, $id = 0)
	{
		$categories = Category::where('category_ID', 0)->get();
		
		foreach ($categories as $category){
			$category->fillSubCategories();
		}
		
		//return $subCategory;
		
		if (Auth::check()) {
			$cartItems = CartItem::where('user_ID', $request->user()->id)->get();
			$toplamUrun = $cartItems->count();
		} else {
			$cartItems = [];
			$toplamUrun = 0;
		}

		if ($categoryID > 0) {
			$category = Category::find($categoryID);
			$category->fillSubCategories();
		} else {
			$category = [];
		}

		return [
			'products' => Product::where('category_ID', $categoryID)->get(),
			'cartItems' => $cartItems,
			'categories'=> $categories,
			'toplamUrun' => $toplamUrun,
			'category' => $category,
			'product' => ($id > 0 ? Product::find($id) : [])
		];
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, $category = 0)
	{
		return view('products.products', $this->getProductPageData($request, $category));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request,$id,$category=0)
	{
		return view('products.product', $this->getProductPageData($request, $category, $id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
