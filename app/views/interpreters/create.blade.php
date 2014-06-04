@section('content')
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'interpreters')) }}
<div class="form-group">
	{{ Form::label('id_number', 'Interpreter ID') }}
	{{ Form::text('id_number', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('interpreter_since', 'Interpreter Since') }}
	{{ Form::text('interpreter_since', null, array('class' => 'datepicker form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'yyyy-mm-dd')) }}
</div>
<div class="checkbox">
	{{ Form::label('suspended', 'Suspended') }}
	{{ Form::checkbox('suspended', null, false) }}
</div>
<div class="form-group">
	{{ Form::label('suspended_reason', 'Suspended For', array('class' => 'hidden_unless_label')) }}
	{{ Form::text('suspended_reason', null, array('class' => '.hidden_unless_field form-control')) }}
</div>
{{ Form::submit('Create Interpreter', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection