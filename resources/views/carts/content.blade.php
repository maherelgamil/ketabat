@extends('app')

@section('content')
	<article>
		<h1 class="text-center"><i class="fa fa-shopping-cart"></i> Cart</h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">Price</th>
					<th class="text-center">Quantity</th>
				</tr>
			</thead>
		@foreach( $content as $item )
			<tbody>
				<tr class="text-center">
					<td>{{ $item->name }}</td>
					<td>{{ $item->price }}</td>
					<td>× {{ $item->qty }}</td>
				</tr>
			</tbody>
		@endforeach
		</table>
	</article>
@stop