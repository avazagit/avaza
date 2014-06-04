@section('content')
<h1>{{ str_plural($model_name) }} List</h1>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<h3>{{ $language->language }}</h3>
<ul>
	<li>ID  : {{ $interpreter->id }}</li>
	<li>Interpreter ID  :  {{ $interpreter->id_number }</li>
	<li>Interpreter Since  : {{ $interpreter->interpreter_since }}</li>
	<li>Suspended  : {{ $interpreter->suspended == 1 ? 'YES':'NO' }}</li>
	<li>{{ $interpreter->suspended == 1 ? Suspended for  :  $interpreter->suspended_reason:'' }}</li>
</ul>
{{ link_to('languages', 'Back to List', array('class' => 'btn btn-primary')) }}
@endsection