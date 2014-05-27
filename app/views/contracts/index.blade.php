<!-- app/views/contracts/index.blade.php -->

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
		<a class="navbar-brand" href="{{ URL::to('contracts') }}">Contract Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('contracts') }}">View All Contracts</a></li>
		<li><a href="{{ URL::to('contracts/create') }}">Create a Contract</a>
	</ul>
</nav>
<h1>Contracts List</h1>
{{ print_r(Contract::columns()) }}
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Account Number</td>
			<td>Contract Number</td>
			<td>Start Date</td>
			<td>End Date</td>
			<td>Options</td>
		</tr>
	</thead>
	<tbody>
	@foreach($contracts as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->account_number }}</td>
			<td>{{ $value->contract_number }}</td>
			<td>{{ $value->start_date }}</td>
			<td>{{ $value->end_date }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the contract (uses the destroy method DESTROY /contracts/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the contract (uses the show method found at GET /contracts/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('contracts/' . $value->id) }}">Show this Contract</a>

				<!-- edit this contract (uses the edit method found at GET /contracts/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('contracts/' . $value->id . '/edit') }}">Edit this Contract</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>