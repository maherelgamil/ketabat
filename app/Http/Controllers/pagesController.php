<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class pagesController extends Controller {

	/**
	 * return home page
	 * @return blade
	 */
	public function home()
	{
		return view('articles.index');
	}

	public function about()
	{
		$first = "Amirmasoud";

		$last = "Sheidayi";

		return view('pages.about', compact('first', 'last'));
	}

	/**
	 * Create simple contact form
	 * @return void
	 */
	public function contact(Request $request)
	{
		if ($request->isMethod('get'))
			return view('pages.contact');
		elseif ($request->isMethod('post'))
		{
			dd($request->all());
		}
	}

	/**
	 * admin main page
	 * @return view
	 */
	public function admin()
	{
		return view('pages.admin');
	}

	/**
	 * show main settings page
	 * @return view
	 */
	public function settings()
	{
		return view('settings.index');
	}

	/**
	 * backup whole database
	 * @return url
	 */
	public function backup()
	{	// mysqldump -u username -p databasename > filename.sql
		// mysql -u username -p databasename < filename.sql
		dd(   DB::select( DB::raw("mysqldump -u " . env('DB_USERNAME') . " -p " . env('DB_PASSWORD') . " > " . storage_path() . "/backup.sql") )  );
	}
}
