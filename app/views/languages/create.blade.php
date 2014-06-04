@section('content')
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'languages')) }}
<div class="form-group">
	{{ Form::label('language', 'Language') }}
	{{ Form::text('language', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('phonetic', 'Phonetic') }}
	{{ Form::text('phonetic', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('language_code', 'Language Code') }}
	{{ Form::text('language_code', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('country_of_origin', 'Country of Origin') }}
	{{ Form::text('country_of_origin', null, array('class' => 'form-control')) }}
</div>
{{ Form::submit('Create Language', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection
