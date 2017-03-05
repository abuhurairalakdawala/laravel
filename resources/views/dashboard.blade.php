@extends('layouts.app')
@include('layouts.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        	<form method="post" action="">
        		<div class="panel panel-default">
				  <div class="panel-body">
					<div class="pull-left">{{ $table->links() }}</div>
				    <div class="pull-left"><button class="btn margin-l10 btn-default">Search</button></div>
				  </div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th><input type="checkbox" class="checkbox_parent"> ID</td>
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
							<td><input type="text" name="order_id" value="" class="form-control"></td>
							<td><input type="text" name="order_id" value="" class="form-control"></td>
							<td><input type="text" name="order_id" value="" class="form-control"></td>
							<td><input type="text" name="order_id" value="" class="form-control"></td>
							<td><select class="form-control"><option value="0">Select Order Status</option></select></td>
							<td><input type="date" name="order_id" value="" class="form-control"></td>
							<td><input type="date" name="order_id" value="" class="form-control"><div class="text-center"><b>To</b></div><input type="date" name="order_id" value="" class="form-control"></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($table as $row)
						<tr>
							<td><input type="checkbox" class="name=id[]"> {{ $row->id }}</td>
							<td>{{ $row->product->product_name }}</td>
							<td>{{ $row->product->sku }}</td>
							<td>{{ $row->customer->customer_name }}</td>
							<td>{{ $row->order_quantity }}</td>
							<td>{{ $row->order_status->name }}</td>
							<td>{{ $row->inward_date }}</td>
							<td>{{ $row->created_at }}</td>
							<td></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</form>
		</div>
    </div>
</div>

@endsection