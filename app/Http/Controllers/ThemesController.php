<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Article;
use App\Tag;
use App\Product;

class ThemesController extends Controller {

	/**
	 * show home page
	 * @return view
	 */
	public function home()
	{
/*		$articles = Article::published()
							->orderBy('published_at', 'desc')
							->simplePaginate(5);

		return view('themes.index', compact('articles'));*/

		$products = Product::simplePaginate(5);

		return view('themes.index', compact('products'));
	}

	/**
	 * show one product to enduser
	 * @return view
	 */
	public function singleProduct($id)
	{
		// Get the product
		$product = Product::findOrFail($id);
		
		return view('themes.singleProduct', compact('product'));
	}

	/**
	 * show single article.
	 * @return view
	 */
	public function single($slug)
	{
		$article = Article::where('slug', '=', $slug)->firstOrFail();
		
		return view('themes.single', compact('article'));
	}

	public function tags($slug)
	{
		$tag = Tag::where('slug', '=', $slug)->firstOrFail();
		$articles = $tag->articles;

		return view('themes.tags', compact('articles', 'tag'));
	}
}
