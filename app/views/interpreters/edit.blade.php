@section('content')
{{ HTML::ul($errors->all()) }}
{{ Form::model($interpreter, array('method' => 'put', 'route' => array('interpreters.update', $interpreter->id))) }}
<div class="form-group">
	{{ Form::label('id_number', 'Interpreter ID') }}
	{{ Form::text('id_number', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('interpreter_since', 'Interpreter Since') }}
	{{ Form::text('interpreter_since', null, array('class' => 'form-control')) }}
</div>
<div class="checkbox">
	{{ Form::label('suspended', 'Suspended') }}
	{{ Form::checkbox('suspended', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('suspended_reason', 'Suspended For') }}
	{{ Form::text('suspended_reason', null, array('class' => 'form-control')) }}
</div>
{{ Form::submit('Create Interpreter', array('class' => 'btn btn-primary')) }}
{{ link_to('interpreters', 'Cancel', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection