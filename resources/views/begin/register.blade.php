@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<div class="panel panel-default register-panel">
			  <div class="panel-heading">Create An Account</div>
			  <form method="post" action="/register_user" id="user_form_registration" class="form-horizontal">
			  	<div class="panel-body">
			  		<div class="form-group">
					    <label for="u_firstname" class="col-sm-2 control-label">Firstname</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" name="firstname" id="u_firstname" placeholder="Firstname" autocomplete="off">
					    	<p class="form-field-err firstname-err"></p>
					    </div>
					</div>
					<div class="form-group">
					    <label for="u_lastname" class="col-sm-2 control-label">Lastname</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" name="lastname" id="u_lastname" placeholder="Lastname" autocomplete="off">
					    	<p class="form-field-err lastname-err"></p>
					    </div>
					</div>
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
					<div class="form-group">
					    <label for="u_cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					    	<input type="password" class="form-control" name="password_confirmation" id="u_cpassword" placeholder="Confirm Password">
					    </div>
					</div>
			  	</div>
			  	{{ csrf_field() }}
			  	<div class="panel-footer"><button class="btn btn-default user_reg_btn">Register <i class="fa fa-spin fa-spinner hide"></i></button></div>
			  </form>
			</div>
		</div>
	</div>
</div>

@endsection