var app = angular.module('dashboard', ['ngRoute'], function($interpolateProvider) {
$interpolateProvider.startSymbol('{=');
$interpolateProvider.endSymbol('=}');
});
app.service('dashboard_service', function($sce, $http, $rootScope){
	this.result = function(l){
		return $http.get(l).then(function(r){
			$rootScope.links = $sce.trustAsHtml(r.data.links)
			$rootScope.items = r.data.items
			setTimeout(function(){
				$('.page_links a').each(function(){
					$(this).attr('target','_self')
				})
			},1500)
		})
	}
})
app.config(function($routeProvider, $locationProvider) {
	$locationProvider.html5Mode(true);
    $routeProvider
    // .when("/dashboard_angular/", {
    //     controller:'solrCtrl',
    //     templateUrl : '/angular_templates/dashboard.blade.php',
    //     reloadOnSearch: false
    // })
    .when("/dashboard_angular/:id", {
        controller:'solrCtrl',
        templateUrl : '/angular_templates/dashboard.blade.php',
        reloadOnSearch: false
    })
    .otherwise({redirectTo:'/dashboard_angular/1'})
});
app.controller('solrCtrl', function($scope, $location, $routeParams, dashboard_service){alert('ctrl')
	$scope.$watch(function() {
		return $routeParams.id
	}, function(newVal, oldVal) {
		if(undefined == newVal){
			newVal=1
		}
		alert('newVal='+newVal)
		dashboard_service.result('/solr_dashboard_api?page='+newVal)
	});
	$(DOC).on('click', '.page_links a', function(e){
		PD(e)
		// e.stopPropagation()
		dashboard_service.result($(this).attr('href'))
		// alert(getParameterByName('page',$(this).attr('href')))
		// $location.path('/dashboard_angular/'+getParameterByName('page',$(this).attr('href')))
		// $location.path('/dashboard_angular/'+getParameterByName('page',$(this).attr('href'))).search('page='+getParameterByName('page',$(this).attr('href'))).replace().notify(false)
	})
})