<div class="form-group">
	{!! Form::label('name', 'Name: ') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('price', 'Price: ') !!}
    {!! Form::input('number', 'price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('qty', 'Quantity: ') !!}
    {!! Form::input('number', 'qty', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('desc', 'Description: ') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>
<?php $i = 0 ?>
@foreach( $attributes as $attribute )
	<div class="form-group">
		{!! Form::label('attributes_list[]',  $attribute->name . ': ') !!}
		{!! Form::text('attributes_list[]', isset($attributes_list)? $attributes_list[$i++]: '', ['class' => 'form-control']) !!}
	</div>
@endforeach

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section ('footer')
	<script type="text/javascript">

	</script>
@endsection