<?php namespace Allegro\Http\Controllers\View;

use Allegro\Http\Requests;
use Allegro\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Allegro\Product;
use Allegro\CartItem;

use Auth;


class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if (Auth::check()) {
			$cartItems = CartItem::where('user_ID', $request->user()->id)->get();
		} else {
			$cartItems = [];
		}
		
		return view('products.products', [
				'products' => Product::all(),
				'cartItems' => $cartItems
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
	public function show($id)
	{
		return view('products.product',[ 
			'product' => Product::find($id)
			
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
