<!DOCTYPE html>
<html>
<head>
	<title>ARC System</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<script>
	$(document).on("click", "#suspended", function(){
	  	if($('#suspended').is('checked') == true){
			$('.hidden_unless_label').show();
			$('.hidden_unless_field form-control').show();
		} else{
			$('.hidden_unless_label').hide();
			$('.hidden_unless_field form-control').hide();
		}
	});
	$(document).ready(function(){
		if($('#suspended').is('checked') == false){
			$('.hidden_unless_label').hide();
			$('.hidden_unless_field form-control').hide();
		}		
	});
		
	</script>
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to(lcfirst(str_plural($model_name)) ) }}">{{ $model_name }} Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to(lcfirst(str_plural($model_name))) }}">View All {{ str_plural($model_name) }}</a></li>
		<li><a href="{{ URL::to(lcfirst(str_plural($model_name)) . '/create') }}">Add New {{ $model_name }}</a>
	</ul>
</nav>
@yield('content')
</div>
</body>
</html>
