@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
        	<form method="post" action="/indexAction" class="generator_form">
        		<br><br>
        		<button type="button" class="btn btn-default add-row">Add A Row</button>
        		<br><br>
        		<table class="table table-bordered dashboard-table">
        			<thead>
        				<tr>
        					<th>Item</th>
        					<th>Filter</th>
        					<th>Filter Name [name="input_name"]</th>
        					<th>Model Mapping</th>
        					<th>Action</th>
        				</tr>
        			</thead>
        			<tbody></tbody>
        			<tfoot>
        				<tr>
        					<td colspan="5">
                                <label><input type="checkbox" value="1" name="has_checkbox" checked> Has checkbox</label>
        						<button type="submit" class="pull-right btn btn-primary">Generate Code</button>
        					</td>
        				</tr>
        			</tfoot>
				</table>
        		{{ csrf_field() }}
        	</form>
        	<div class="response"></div>
            <form method="post" action="/req">
                {{ csrf_field() }}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="checkbox_parent"> id</th>
                            <th>Emails</th>
                            <th>Created Date</th>
                        </tr>
                        <tr>        
                            <td>
                                <input class="form-control" type="text" name="id" value="@if(isset($filter['id'])){{ $filter['id'] }}@endif">
                            </td>        
                            <td>
                                <select class="form-control" name="name"><option value="">Select An Option</option>
                                    @foreach($name_dd as $value)
                                        <option value="{{ $value->id }}">{{ $value->email }}</option>
                                    @endforeach
                                </select>
                            </td>        
                            <td>
                                <input class="form-control date-input" type="text" name="c_date_from" value="@if(isset($filter['c_date_from'])){{ $filter['c_date_from'] }}@endif">
                                <input class="form-control date-input" type="text" name="c_date_to" value="@if(isset($filter['c_date_to'])){{ $filter['c_date_to'] }}@endif">
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <button>ok</button>
            </form>
        </div>
    </div>
</div>

@endsection