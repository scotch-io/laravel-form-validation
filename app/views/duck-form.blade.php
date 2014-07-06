<!doctype html>
<html>
<head>
	<title>Laravel Form Validation!</title>

	<!-- load bootstrap -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<style>
		body 	{ padding-top:40px; }
	</style>
</head>
<body class="container">

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		
		<div class="page-header">
			<h1><span class="glyphicon glyphicon-flash"></span> Ducks Fly!</h1>
		</div>	

		@if ($errors->has())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }}<br>		
			@endforeach
		</div>
		@endif

		<!-- FORM STARTS HERE -->
		<form method="POST" action="/ducks" novalidate>

			<!-- token provided by laravel to prevent csrf -->
			{{ Form::token() }}

			<div class="form-group @if ($errors->has('name')) has-error @endif">
				<label for="name">Name</label>
				<input type="text" id="name" class="form-control" name="name" placeholder="Lionel Messi" value="{{ Input::old('name') }}">
				@if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
			</div>

			<div class="form-group @if ($errors->has('email')) has-error @endif">
				<label for="email">Email</label>
				<input type="text" id="email" class="form-control" name="email" placeholder="socc3rfan@argentina.com" value="{{ Input::old('email') }}">
				@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
			</div>

			<div class="form-group @if ($errors->has('feathers')) has-error @endif">
				<label for="feathers">Feathers</label>
				<input type="number" id="feathers" class="form-control" name="feathers" placeholder="35" value="{{ Input::old('feathers') }}">
				@if ($errors->has('feathers')) <p class="help-block">{{ $errors->first('feathers') }}</p> @endif
			</div>

			<div class="form-group @if ($errors->has('password')) has-error @endif">
				<label for="password">Password</label>
				<input type="password" id="password" class="form-control" name="password">
				@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
			</div>

			<div class="form-group @if ($errors->has('password_confirm')) has-error @endif">
				<label for="password_confirm">Confirm Password</label>
				<input type="password" id="password_confirm" class="form-control" name="password_confirm">
				@if ($errors->has('password_confirm')) <p class="help-block">{{ $errors->first('password_confirm') }}</p> @endif
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Go Ducks Go!</button>
			</div>

		</form>

	</div>
</div>

</body>
</html>