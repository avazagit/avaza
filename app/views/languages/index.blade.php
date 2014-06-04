@section('content')
<h1>{{ str_plural($model_name) }} List</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Language</td>
			<td>Phonetic Spelling</td>
			<td>Language Code</td>
			<td>Country of Origin</td>
			<td>Options</td>
		</tr>
	</thead>
	<tbody>
	@foreach($languages as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->language }}</td>
			<td>{{ $value->phonetic }}</td>
			<td>{{ $value->language_code }}</td>
			<td>{{ $value->country_of_origin }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the language (uses the destroy method DESTROY /languages/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the language (uses the show method found at GET /languages/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('languages/' . $value->id) }}">Show this Language</a>

				<!-- edit this language (uses the edit method found at GET /languages/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('languages/' . $value->id . '/edit') }}">Edit this Language</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
