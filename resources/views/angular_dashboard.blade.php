@extends('layouts.app')
@section('content')
@include('layouts.navbar')

 <div class="container-fluid" ng-app="dashboard">
    <div class="row">
		<div ng-view></div>
    </div>
</div>