<?php namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;

class TagsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::all();

		return view('tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TagRequest $request)
	{
		Tag::create($request->all());

		// Success message
		\Flash::success('New Tag added.');

		return redirect('admin/tags');		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Tag $tag)
	{
		$articles = $tag->articles()->get();

		return view('tags.show', compact('tag', 'articles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return view
	 */
	public function edit(Tag $tag)
	{
		return view('tags.edit', compact('tag'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(TagRequest $request, Tag $tag)
	{
		$tag->update($request->all());

		\Flash::success('Your tag has been Updated');

		return redirect('admin/tags');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Tag $tag)
	{
		$tag->delete();

		\Flash::success('Your tag has been Deleted');

		return redirect('admin/tags');
	}

}
