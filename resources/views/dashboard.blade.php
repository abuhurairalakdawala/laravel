@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        	<form method="post" action="/dashboardAction">
        		{{ csrf_field() }}
        		<div class="panel panel-default">
				  <div class="panel-body">
					<div class="pull-left">{{ $table->links('layouts.paginate_links') }}</div>
				    <div class="pull-left"><button class="btn margin-l10 btn-primary">Search</button></div>
				    <div class="pull-left margin-l10">{!! Dropdown::paginator() !!}</div>
				    <div class="pull-left margin-l10">{!! Dropdown::dashboard_option() !!}</div>
				    <div class="pull-left margin-l10"><button type="button" class="btn btn-warning dashboard-go-btn">GO <i class="fa fa-spin fa-spinner dashboard-go-spinner"></i></button></div>
				  </div>
				</div>
				<table class="table table-bordered dashboard-table">
					<thead>
						<tr>
							<th><label><input type="checkbox" class="checkbox_parent"> ID</label></td>
							<th>Product Name</th>
							<th>Product SKU</th>
							<th>Customer Name</th>
							<th>Order Quantity</th>
							<th>Order Status</th>
							<th>Inward Date</th>
							<th>Order Date</th>
							<th>Action</th>
						</tr>
						<tr>
							<td><input type="text" name="order_id" value="" class="form-control"></td>
							<td><input type="text" name="product_name" value="" class="form-control"></td>
							<td><input type="text" name="customer_name" value="" class="form-control"></td>
							<td><input type="text" name="order_quantity" value="" class="form-control"></td>
							<td><input type="text" name="order_status" value="" class="form-control"></td>
							<td><select class="form-control"><option value="0">Select Order Status</option></select></td>
							<td><input type="date" name="inward_date" value="" class="form-control"></td>
							<td><input type="date" name="order_date_from" value="" class="form-control"><div class="text-center"><b>To</b></div><input type="date" name="order_date_to" value="" class="form-control"></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($table as $row)
						<tr>
							<td><input type="checkbox" class="name=id[]" value="{{ $row->id }}"> {{ $row->id }}</td>
							<td>{{ $row->product->product_name }}</td>
							<td>{{ $row->product->sku }}</td>
							<td>{{ $row->customer->customer_name }}</td>
							<td>{{ $row->order_quantity }}</td>
							<td>{{ $row->order_status->name }}</td>
							<td>{{ $row->inward_date }}</td>
							<td>{{ $row->created_at }}</td>
							<td>{{ $row->oid_pid }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</form>
		</div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    	<div class="modal-body">
      		<h4 class="text-center modal-text"></h4>
      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn center-block btn-success" data-dismiss="modal">OK</button>
      	</div>
    </div>
  </div>
</div>


@endsection