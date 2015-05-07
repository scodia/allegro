<?php namespace Allegro\Http\Controllers\API;

use Allegro\Http\Requests;
use Allegro\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Allegro\Product;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Product::all()->toJson();
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
	public function store(Request $request)
	{
		$product = new Product();
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->category_ID = $request->input('category');
		$product->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Product::find($id)->toJson();
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
	public function update(Request $request, $id)
	{
		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->category_ID = $request->input('category');
		$product->save();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::find($id)->delete();
	}

}
