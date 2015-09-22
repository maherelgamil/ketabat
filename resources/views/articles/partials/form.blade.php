<div class="form-group">
	{!! Form::label('title', 'Title: ') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body: ') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('published_at', 'Published at: ') !!}
    <div class='input-group date' id='datetimepicker'>
        {!! Form::text('published_at', null, ['class' => 'form-control', 'id' => 'published_at']) !!}
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class="form-group">
	{!! Form::label('tag_list', 'Tags: ') !!}
	{!! Form::select('tag_list[]', $tags, null, ['multiple', 'id' => 'tag_list', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section ('footer')
	<script type="text/javascript">
		$('#tag_list').select2({
			'tags': true
		});

        $('#datetimepicker').datetimepicker({
            format:'DD-MM-YY HH:mm:ss'
        });

/*        tinymce.init({
            selector: "textarea",
            skin: "lightgray",
            plugins : "link code"
        });*/
	</script>
@endsection