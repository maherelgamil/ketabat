@if ( strpos(Request::path(), 'articles') != false )
	@include ('partials.admin.partials.pills', ['active'=>'.articles'])

@elseif ( strpos(Request::path(), 'products') != false )
	@include ('partials.admin.partials.pills', ['active'=>'.products'])

@elseif ( strpos(Request::path(), 'users') != false )
	@include ('partials.admin.partials.pills', ['active'=>'.users'])

@elseif ( strpos(Request::path(), 'settings') != false )
	@include ('partials.admin.partials.pills', ['active'=>'.settings'])

@else
	@include ('partials.admin.partials.pills', ['active'=>'.home'])
	
@endif