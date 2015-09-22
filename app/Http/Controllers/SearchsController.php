<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class SearchsController extends Controller
{
    public function results(Request $request)
    {
    	$query = $request->input('for');

    	$results = Product::search($query)->get();
    	
    	return view('searchs.results', compact('results', 'query'));
    }

    public function form()
    {
        return view('searchs.form');
    }
}
