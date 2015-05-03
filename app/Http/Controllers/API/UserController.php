<?php namespace Allegro\Http\Controllers\API;

use Allegro\Http\Requests;
use Allegro\Http\Controllers\Controller;

use Auth;
use Session;
use Hash;
use Validator;
use Illuminate\Http\Request;
use Allegro\User;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{



	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
				//Yeni Kullanıcı oluşturma 

		$validator = Validator::make($request->all(), [
		    'name' => 'required',
		    'password' => 'required|min:8',
		    'mail' => 'required|email|unique:users',
		]);

		if ($validator->fails()) {
			return response()->json(['success' => false, 'errors' => $validator->errors()]);
		}

		$user = new User();
		$user->name = $request->input('name');
		$user->mail = $request->input('mail');
		$user->password = Hash::make(md5($request->input('password')));
		
		if ($user->save()) {
			Auth::loginUsingId($user->id);
			return response()->json(['success' => true, 'id' => $user->id]);
		} else {
			return response()->json(['success' => false]);
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request, $id)
	{
		
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
	public function destroy()
	{
		//
	}

}
