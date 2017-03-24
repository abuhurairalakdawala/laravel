@extends('layouts.app')
@section('content')
@include('layouts.navbar')


<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<div class="panel panel-default register-panel">
				<div class="panel-heading">Create An Account</div>
				<form method="post" action="/articles" class="form-horizontal">
				  	<div class="panel-body">
						<div class="form-group">
						    <label for="article_name" class="col-sm-2 control-label">Title</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="name" id="article_name" placeholder="Title" autocomplete="off">
						    </div>
						</div>
						<div class="form-group">
						    <label for="article_description" class="col-sm-2 control-label">Description</label>
						    <div class="col-sm-10">
						    	<textarea class="form-control" placeholder="Description" name="description" id="article_description"></textarea>
						    </div>
						</div>
				  	</div>
				  	{{ csrf_field() }}
				  	<div class="panel-footer"><button class="btn btn-default user_reg_btn">Submit <i class="fa fa-spin fa-spinner hide"></i></button></div>
			  	</form>
			</div>
		</div>
	</div>
</div>


@endsection