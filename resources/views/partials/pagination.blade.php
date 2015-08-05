<div class="posts-nav">

	@if ($paginate->nextPageUrl())
	<a href="{{ $paginate->nextPageUrl() }}">
		<div class="next-posts hvr-sweep-to-right">
			<div class="fa fa-angle-left fa-fw nav-icon"></div> <p>Next Posts</p>
		</div><!-- .next-posts -->
	</a>
	@endif

	@if ($paginate->previousPageUrl())
	<a href="{{ $paginate->previousPageUrl() }}">
		<div class="prev-posts hvr-sweep-to-left ">
			<p>Prev posts</p> <div class="fa fa-angle-right fa-fw nav-icon"></div>
		</div><!-- .prev-posts -->
	</a>
	@endif

</div><!-- .posts-nav -->