{!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'DELETE', 'class' => 'pull-left']) !!}
		<button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw fa-trash"></i></button>
{!! Form::close() !!}

<a href="{!! URL::route('admin.articles.edit', ['id' => $article->id]) !!}">
	<button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
</a>
