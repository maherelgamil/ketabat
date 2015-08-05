<article>
	<?php $lastPartOfUrl = substr(Request::path(), strrpos(Request::path(), '/') + 1) ?>
	<a href="{{ url('admin/' . $lastPartOfUrl . '/create' ) }}">
		<button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus"></i> Add new {{ (substr($lastPartOfUrl, -1) == 's') ? ucfirst(substr($lastPartOfUrl, 0, -1)) : ucfirst($lastPartOfUrl) }}</button>
	</a>
</article>