<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use \Cart;

class AjaxController extends Controller {

	/**
	 * check existance of email in registered users.
	 * @param  email $email
	 * @return json
	 */
	public function validateEmail($email)
	{
		if (User::where('email', '=', str_replace('!', '.', $email))->count())
			return response()->json(['email'=>1]);
		else
			return response()->json(['email'=>0]);
	}

	public function login(Request $request)
	{
		return $request->all();
	}

	public function cartAdd($id, $name, $qty, $price, $options = null)
	{
        if($options === null) $options = array();

        $cart = Cart::add($id, $name, $qty, $price, $options);

        return Cart::content();
	}
}
