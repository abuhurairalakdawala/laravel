@extends('layouts.app')
@section('content')
@include('layouts.navbar')

 <div class="container-fluid" ng-app="dashboard">
    <div class="row">
		<div class="col-xs-12" ng-controller="dashCtrl">
			<div ng-bind-html="links" class="page_links"></div>
			<form method="post" action="/solr_dashboard_action" class="dashboard_form">
				<div class="table-loader"></div>
				{{ csrf_field() }}
				<table class="table table-bordered">
					<thead>
				        <tr>
				            <th><input type="checkbox" class="checkbox_parent"> id</th>
				            <th>Product Name</th>
				            <th>Product SKU</th>
				            <th>Customer Name</th>
				            <th>Order Quantity</th>
				            <th>Order Status</th>
				            <th>Inward Date</th>
				            <th>Order Date</th>
				        </tr>
				        <tr>        
				            <td>
				                <input class="form-control" type="text" name="id" value="@if(isset($filter['id'])){{ $filter['id'] }}@endif">
				            </td>        
				            <td>
				                <input class="form-control" type="text" name="product_name" value="@if(isset($filter['product_name'])){{ $filter['product_name'] }}@endif">
				            </td>        
				            <td>
				                <input class="form-control" type="text" name="product_sku" value="@if(isset($filter['product_sku'])){{ $filter['product_sku'] }}@endif">
				            </td>        
				            <td>
				                <input class="form-control" type="text" name="customer_name" value="@if(isset($filter['customer_name'])){{ $filter['customer_name'] }}@endif">
				            </td>        
				            <td>
				                
				            </td>        
				            <td>
				                <select class="form-control" name="order_status"><option value="">Select An Option</option>
				                    @foreach($order_status_dd as $value)
				                        <option value="{{ $value->id }}">{{ $value->name }}</option>
				                    @endforeach
				                </select>
				            </td>        
				            <td>
				                <input class="form-control date-input" type="text" name="inward_date_from" value="@if(isset($filter['inward_date_from'])){{ $filter['inward_date_from'] }}@endif">
				                <input class="form-control date-input" type="text" name="inward_date_to" value="@if(isset($filter['inward_date_to'])){{ $filter['inward_date_to'] }}@endif">
				            </td>        
				            <td>
				                <input class="form-control date-input" type="text" name="order_date_from" value="@if(isset($filter['order_date_from'])){{ $filter['order_date_from'] }}@endif">
				                <input class="form-control date-input" type="text" name="order_date_to" value="@if(isset($filter['order_date_to'])){{ $filter['order_date_to'] }}@endif">
				            </td>
				        </tr>
				    </thead>
				    <tbody>
						<tr ng-repeat="item in items">
							<td>{= item.id =}</td>
							<td>{= item.product.product_name =}</td>
				    		<td>{= item.product.sku =}</td>
				    		<td>{= item.customer.customer_name =}</td>
				    		<td>{= item.order_quantity =}</td>
				    		<td>{= item.order_status.name =}</td>
				    		<td>{= item.inward_date =}</td>
				    		<td>{= item.created_at =}</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
    </div>
</div>
@endsection