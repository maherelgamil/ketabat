@include ('partials.header')

<section>
	@if(null !== Auth::user())
	@if (Auth::user()->isAdmin())
		<article>
			@include('partials.admin.menu')
		</article>
	@endif
	@endif
	@yield('content')
<!--     <a href="{!! url::route('admin.articles.create') !!}" class="add-new-article-link">
    <div class="add-new-article">
        <i class="fa fa-fw fa-plus"></i>
    </div>
</a> -->
	<script type="text/javascript">
		//$('div.alert').not('.alert-important').delay(3000).slideUp(400);
	</script>
</section>

@include ('partials.footer')