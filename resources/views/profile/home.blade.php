@extends('layouts.app')
@section('content')
@extends('layouts.navbar')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<form method="post" action="/post_new_content" id="new_post_forms">
				<div class="form-group">
				    <textarea class="form-control" rows="3" name="content" placeholder="Enter New Post"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">POST</button>
				</div>
				{{ csrf_field() }}
			</form>
			<ul class="list-group">
				@foreach ($posts as $key => $post)
		    		<li class="list-group-item">
		    			{{$post->post_content}}<br>
		    			By : {{$post->user->firstname}}
		    		</li>
		    	@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection