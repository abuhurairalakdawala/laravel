@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<ul class="list-group">
				@foreach($articles as $article)
				<li class="list-group-item">
					<a href="/articles/{{ $article->id }}">{{ $article->name }}</a>
				</li>
				@endforeach
			</ul>
			{{ $articles->links() }}
		</div>
	</div>
</div>


@endsection