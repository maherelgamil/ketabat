@extends('app')

@section('content')
	@include ('partials.admin.create')
	@foreach($products as $product)
		<article>
			<div class="row">
				<div class="col-md-6"> 
					{!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'DELETE']) !!}
						<button type="submit" class="btn btn-danger btn-block btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw fa-trash"></i> Delete</button>
					{!! Form::close() !!}
				</div>
				<div class="col-md-6">
					<a href="{!! URL::route('admin.products.edit', ['id' => $product->id]) !!}">
						<button type="submit" class="btn btn-primary btn-sm btn-block" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-fw fa-edit"></i> Edit</button>
					</a>
				</div>
			</div>
			<h1>{{ $product->name }}</h1>
			<p>{{ $product->desc }}</p>
			<table class="table table-hover">
				<tbody>
				@foreach ($product->attributes as $attr)
					<tr>
						<td>{{ $attr->name }}</td>
						<td>{{ $attr->pivot->value }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</article>
	@endforeach
@stop

@section ('footer')
	<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	</script>
@endsection