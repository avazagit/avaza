{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => $data['3'])) }}
@foreach($fields as $field)
	{{ $field }}
@endforeach
{{ Form::submit('Create ' . $data['0'], array('class' => 'btn btn-primary')) }}
{{ Form::close() }}