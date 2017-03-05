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
        </div>
    </div>
</div>

@endsection