@section('content')
<h1>Interpreters List</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Interpreter ID</td>
			<td>Interpreter Since</td>
			<td>Suspended</td>
			<td>Country of Origin</td>
			<td>Options</td>
		</tr>
	</thead>
	<tbody>
	@foreach($interpreters as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->id_number }}</td>
			<td>{{ $value->interpreter_since }}</td>
			<td>{{ $value->suspended == 1 ? 'YES':'NO' }}</td>
			<td>{{ $value->suspended == 1 ? $value->suspended_reason:'' }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the language (uses the destroy method DESTROY /languages/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the language (uses the show method found at GET /languages/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('interpreters/' . $value->id) }}">Show this Interpreter</a>

				<!-- edit this language (uses the edit method found at GET /languages/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('interpreters/' . $value->id . '/edit') }}">Edit this Interpreter</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
