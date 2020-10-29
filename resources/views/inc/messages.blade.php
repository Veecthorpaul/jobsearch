@if(count($errors) > 0)
	<div class="alert alert-danger">
		{{$errors->first()}}
	</div>
@endif

@if(session('success'))
	<div class="alert alert-success">
		{!!session('success')!!}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger">
		{!!session('error')!!}
	</div>
@endif