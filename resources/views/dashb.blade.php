@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="/dashAction">
            <button class="btn">Submit</button>{{ csrf_field() }}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="checkbox_parent"> ID</th>
                            <th>Customer Name</th>
                            <th>Created Date</th>
                        </tr>
                        <tr>        
                            <td>
                                <input class="form-control" type="text" name="id" value="@if(isset($filter['id'])){{ $filter['id'] }}@endif">
                            </td>        
                            <td>
                                <select class="form-control" name="name"><option value="">Select An Option</option>
                                    @foreach($name_dd as $value)
                                        <option value="{{ $value->id }}">{{ $value->customer_name }}</option>
                                    @endforeach
                                </select>
                            </td>        
                            <td>
                                <input class="form-control date-input" type="text" name="date_from" value="@if(isset($filter['date_from'])){{ $filter['date_from'] }}@endif">
                                <input class="form-control date-input" type="text" name="date_to" value="@if(isset($filter['date_to'])){{ $filter['date_to'] }}@endif">
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

@endsection