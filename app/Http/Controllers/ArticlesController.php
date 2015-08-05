<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

//use App\Upload;
use App\Http\Requests\CreateArticleRequest;
use Symfony\Component\HttpFoundation\Response;

use Auth;

class ArticlesController extends Controller {

    /**
     * Create new article instance.
     */
	public function __construct()
	{
		//$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 * show all articles
	 * @return view
	 */
	public function index()
	{
		$articles = Article::orderBy('published_at', 'desc')
							->simplePaginate(30);

		return view('articles.index', compact('articles'));
	}

    /**
     * show one article.
     *
     * @param Article $article
     * @return Article
     */
	public function show(Article $article)
	{
		return view('articles.show', compact('article'));
	}

	/**
	 * create new article
	 * @return article
	 */
	public function create()
	{
		$tags = Tag::lists('name', 'id');

		return view('articles.create', compact('tags'));
	}

    /**
     * store data to db
     * @param CreateArticleRequest $request
     * @return Response
     */
	public function store(CreateArticleRequest $request)
	{
        $this->createArticle($request);

		\Flash::success('Your post has been published');

		return redirect()->route('admin.articles.index');
	}

	/**
	 * Edit an article
	 * @return Response
	 */
	public function edit(Article $article)
	{
        $tags = Tag::lists('name', 'id');
        //$uploads = Upload::lists('name', 'id');


		return view('articles.edit', compact('article', 'tags'));
	}

    /**
     * Update an article.
     *
     * @param CreateArticleRequest $request
     * @param Article $article
     * @return Response
     */
	public function update(CreateArticleRequest $request, Article $article)
	{
		$article->update($request->all());

        $tag_list = $request->input('tag_list');

        if (! empty($tag_list))
            $this->syncTags($article, $request->input('tag_list'));

		return redirect()->route('admin.articles.index');
	}

	public function destroy(Article $article)
	{
		$article->delete();

		\Flash::success('Your article has been Deleted');

		return redirect()->route('admin.articles.index');
	}

    /**
     * Sync up the lists of the tags in the database.
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article.
     *
     * @param CreateArticleRequest $request
     */
    private function createArticle(CreateArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        //$article->uploads()->sync(Upload::put($request->file('cover')));

        $tag_list = $request->input('tag_list');

        if (! empty($tag_list))
            $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
