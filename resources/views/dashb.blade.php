@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="/dashAction">
                <button class="btn">Submit</button>{{ csrf_field() }}
                
            </form>
        </div>
    </div>
</div>

@endsection