<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Tag;
use App\Article;
use App\Product;
use App\Attribute;
use App\User;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        // Route model binding for Article
        // $router->model('articles', 'App\Article');
        $router->bind('articles', function($id)
        {
        	return Article::findOrFail($id);
        });

        $router->bind('tags', function($name)
        {
            return Tag::whereName($name)->firstOrFail();
        });

        $router->bind('products', function($id)
        {
            return Product::findOrFail($id);
        });

        $router->bind('attributes', function($id)
        {
            return Attribute::findOrFail($id);
        });

        $router->bind('users', function($id)
        {
            return User::findOrFail($id);
        });
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
