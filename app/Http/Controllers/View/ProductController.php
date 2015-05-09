<?php namespace Allegro\Http\Controllers\View;

use Allegro\Http\Requests;
use Allegro\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Allegro\Product;
use Allegro\CartItem;
use Allegro\Category;

use Auth;


class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, $category = 0)
	{
		$categories = Category::where('category_ID', 0)->get();
		
		
		for ($i=0;$i<$categories->count();$i++){
			$x = Category::where('category_ID', $categories[$i]['id'])->select('name')->get();
			$subCategory[]=['icerik'=>$x]; 
		}
		
		//return $subCategory;
		
		if (Auth::check()) {
			$cartItems = CartItem::where('user_ID', $request->user()->id)->get();
			$toplamUrun = $cartItems->count();
		} else {
			$cartItems = [];
			$toplamUrun = 0;
		}
		
		return view('products.products', [
				'products' => Product::where('category_ID', $category)->get(),
				'cartItems' => $cartItems,
				'categories'=> $categories,
				'toplamUrun' => $toplamUrun,
				'subCategory' =>$subCategory
		]);
	
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
		if (Auth::check()) {
			$cartItems = CartItem::where('user_ID', $request->user()->id)->get();
			$toplamUrun = $cartItems->count();
		} else {
			$cartItems = [];
			$toplamUrun = 0;
		}
		$categories = Category::where('category_ID', $category)->get();
		return view('products.product',[ 
			'product' => Product::find($id),
			'categories'=> $categories,
			'toplamUrun'=> $toplamUrun
			
		]);

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
