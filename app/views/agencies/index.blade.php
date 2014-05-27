<!-- app/views/agencies/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('agencies') }}">Agency Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('agencies') }}">View All Agencies</a></li>
		<li><a href="{{ URL::to('agencies/create') }}">Create a Agency</a>
	</ul>
</nav>

<h1>Agencies List</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Agency Level</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($agencies as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->email }}</td>
			<td>{{ $value->agency_level }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the agency (uses the destroy method DESTROY /agencies/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the agency (uses the show method found at GET /agencies/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('agencies/' . $value->id) }}">Show this Agency</a>

				<!-- edit this agency (uses the edit method found at GET /agencies/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('agencies/' . $value->id . '/edit') }}">Edit this Agency</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>