@section('content')
{{ HTML::ul($errors->all()) }}
{{ Form::model($language, array('method' => 'put', 'route' => array('languages.update', $language->id))) }}
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
{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
{{ link_to('languages', 'Cancel', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection