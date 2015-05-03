<?php namespace Allegro\Http\Controllers\API;

use Allegro\Http\Requests;
use Allegro\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Allegro\CartItem;

class CartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		return CartItem::where('user_ID', $request->user()->id)->get()->toJson();
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
		$quantity = $request->input('quantity');

		$cartItem = new CartItem();
		$cartItem->user_ID = $request->user()->id;
		$cartItem->quantity = $quantity > 0 ? $quantity : 1;
		$cartItem->warehouse_product_ID = $request->input('product_ID');
		$cartItem->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//return response()->json(["status"=>false], 401);
		return CartItem::find($id)->toJson();
		
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
		$quantity = $request->input('quantity');

		$cartItem = CartItem::where(['id' => $id, 'user_ID' => $request->user()->id])->first();
		if (!$cartItem) {
			abort(404);
		}
		if ($quantity != $cartItem->quantity) {
			$cartItem->quantity = $quantity > 0 ? $quantity : 1;
			$cartItem->save();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::check()){
			CartItem::find($id)->delete();
		}
	}

}
