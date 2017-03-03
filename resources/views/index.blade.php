@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="/indexAction">
            <button class="btn">Submit</button>{{ csrf_field() }}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="checkbox_parent"> id<input class="form-control" type="text" name="id"></th>
                        <th>Post Content<input class="form-control" type="text" name="pc"></th>
                        <th>Likes Count<input class="form-control" type="text" name="likes_count"></th>
                        <th>Comments Count<input class="form-control" type="text" name="comments_count"></th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td><input type="checkbox" name="id[]" value="{{ $row->id }}"> {{ $row->id }}</td>
                            <td>{{ $row->post_content }}</td>
                            <td>{{ $row->likes_count }}</td>
                            <td>{{ $row->comments_count }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </form>
            {{ $table->links() }}
        </div>
    </div>
</div>

@endsection