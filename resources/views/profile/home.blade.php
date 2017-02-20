@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<form method="post" action="/post_new_content" id="new_post_form" enctype="multipart/form-data">
				<div class="form-group">
				    <textarea class="form-control post_box" rows="3" name="content" placeholder="Enter New Post"></textarea>
				    <input type="file" name="filename">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">POST</button>
				</div>
				{{ csrf_field() }}
			</form>
			<div class="well well-sm">Note : Double Click on post to delete</div>
			<ul class="list-group profile_posts">
				@foreach ($posts as $key => $post)
		    		<li class="list-group-item" data-id="{{$post->id}}">
		    			{!! str_replace("\n",'<br>',e($post->post_content)) !!}<br>
		    			By : {{$post->user->firstname}} {{$post->user->lastname}}
		    			@foreach ($post->userPostLike as $userPostLike)
		    				<?php var_dump($userPostLike->user->firstname); ?>
		    			@endforeach
		    		</li>
		    	@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection