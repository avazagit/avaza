@section('content')
<h1>{{ str_plural($model_name) }} List</h1>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<h3>{{ $language->language }}</h3>
<ul>
	<li>ID  : {{ $language->id }}</li>
	<li>Phonetic Spelling  : {{ $language->phonetic }}</li>
	<li>Language Code  : {{ $language->language_code }}</li>
	<li>Country of Origin  : {{ $language->country_of_origin }}</li>
</ul>
{{ link_to('languages', 'Back to List', array('class' => 'btn btn-primary')) }}
@endsection
