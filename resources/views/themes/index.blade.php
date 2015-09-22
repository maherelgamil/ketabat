@extends('app')

@section('content')
	@foreach($products as $product)
		<article>
			<h1><a href="{{ url('products', $product->id) }}">{{ $product->name }}</a></h1>
			{!! $product->desc !!}
			<div class="row">
				<div class="col-md-6"> 
					<button type="button" class="btn btn-success btn-block"><i class="fa fa-fw fa-usd"></i> {{ $product->price }}</button>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-info btn-block btn-add-to-cart" data-toggle="tooltip" data-placement="bottom" title="Add {{ $product->name }} to your cart" data-cart="{{ url('ajax/cart/add', ['id'=>$product->id, 'name'=>$product->name, 'qty'=>1, 'price'=>$product->price]) }}"><i class="fa fa-fw fa-cart-plus"></i> Add to cart</button>
				</div>
			</div>
		</article>
	@endforeach

	@include ('partials.pagination', ['paginate' => $products])
@stop

@section ('footer')
	<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();

		$addToCartBtn = $('.btn-add-to-cart');
		$addToCartBtn.on('click', function(e){
			$thisAddToCart = $(this);
			$thisAddToCart.html('<i class="fa fa-fw fa-cog fa-spin"></i> Adding to cart');
			e.preventDefault();
			$.ajax({
				method: "GET",
				url: $thisAddToCart.data('cart')
			})
			.done(function( response ) {
				$thisAddToCart.html('<i class="fa fa-fw fa-check"></i> Added to cart');
				$thisAddToCart.addClass('disabled');
				$('.cart .badge').html( parseFloat($('.cart .badge').html()) + 1 );
			});


		});
	});
	</script>
@endsection