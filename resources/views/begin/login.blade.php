@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<div class="panel panel-default">
			  <div class="panel-heading">Login To Your Account</div>
			  <form method="post" action="/login_user" class="form-horizontal">
			  	<div class="panel-body">
					<div class="form-group">
					    <label for="u_email" class="col-sm-2 control-label">Email ID</label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" name="email" id="u_email" placeholder="Email ID" autocomplete="off">
					    	<p class="form-field-err email-err"></p>
					    </div>
					</div>
					<div class="form-group">
					    <label for="u_password" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					    	<input type="password" class="form-control" name="password" id="u_password" placeholder="Password" autocomplete="off">
					    	<p class="form-field-err password-err"></p>
					    </div>
					</div>
			  	</div>
			  	{{ csrf_field() }}
			  	<div class="panel-footer"><button class="btn btn-default">Login</button></div>
			  	{{ session('login_error') }}
			  	@if($errors)
			  		@foreach ($errors->all() as $error)
			  			<p>{{$error}}</p>
			  		@endforeach
			  	@endif
			  </form>
			</div>
		</div>
	</div>
</div>

@endsection