<!DOCTYPE html>
<html>
<head>
	<title>ARC System</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to($data['3']) }}">{{ $data['0'] }} Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to($data['3']) }}">View All {{ $data['2'] }}</a></li>
		<li><a href="{{ URL::to($data['3'] . '/create') }}">Create an {{ $data['0'] }}</a>
	</ul>
</nav>
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => $data['3'])) }}
@foreach($fields as $field)
	{{ $field }}
@endforeach
{{ Form::submit('Create ' . $data['0'], array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>
</body>
</html>