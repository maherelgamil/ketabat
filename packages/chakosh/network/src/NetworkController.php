<?php namespace Chakosh\Network;
use App\Http\Controllers\Controller;
use App\User;

class NetworkController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $users = User::all();

    return view('network::admin')->with('users', $users);
  }
}