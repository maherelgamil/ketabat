<ul class="nav nav-pills nav-justified admin-pills">
	<li role="presentation" class="home"><a href="{{ url('admin') }}"><i class="fa fa-home"></i> Home</a></li>
	<li role="presentation" class="articles"><a href="{{ url('admin/articles') }}"><i class="fa fa-edit"></i> Article</a></li>
	<li role="presentation" class="products"><a href="{{ url('admin/products') }}"><i class="fa fa-book"></i> Product</a></li>
	<li role="presentation" class="users"><a href="{{ url('admin/users') }}"><i class="fa fa-users"></i> User</a></li>
	<li role="presentation" class="settings"><a href="{{ url('admin/settings') }}"><i class="fa fa-cogs"></i> Setting</a></li>
</ul>

<script type="text/javascript">
	$(function () {
		var activeItem = '{{ $active }}';
		$('.admin-pills').find(activeItem).addClass('active');
	});
</script>