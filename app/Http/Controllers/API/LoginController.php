<?php namespace Allegro\Http\Controllers\API;

use Allegro\Http\Requests;
use Allegro\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$login = [
			'mail' => $request->input('email'),
			'password' => md5($request->input('password'))
		];

		return response()->json(['success' => Auth::attempt($login)]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		return Auth::logout();
	}

}
