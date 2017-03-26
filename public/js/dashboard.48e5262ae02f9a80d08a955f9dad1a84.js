var app = angular.module('dashboard', [], function($interpolateProvider) {
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
			},1000)
		})
	}
})
app.config(function($locationProvider){
	$locationProvider.html5Mode(true);
})
// app.config(function($routeProvider, $locationProvider) {
//     $routeProvider
//     .when("/dashboard_angular/", {
//         controller:'solrCtrl',
//         templateUrl : '/angular_templates/dashboard.blade.php',
//         reloadOnSearch: false
//     })
//     // .when("/dashboard_angular/:id", {
//     //     controller:'solrCtrl',
//     //     templateUrl : '/angular_templates/dashboard.blade.php',
//     //     reloadOnSearch: false
//     // })
//     // .otherwise({redirectTo:'/dashboard_angular/1'})
// });
app.controller('dashCtrl', function($location, $scope, dashboard_service){
	page_no = $location.search().page
	if(undefined == page_no){
		page_no = 1
	}
	$scope.$on("$locationChangeSuccess", function () {
		page_no = $location.search().page
		if(undefined == page_no){
			page_no = 1
		}
		dashboard_service.result('/solr_dashboard_api?page='+page_no)
	})
	// $scope.$watch(function() {
		// return $location.search()
	// 	return getParameterByName('page',$(this).attr('href'))
	// }, function(newVal, oldVal) {
	// 	if(undefined == newVal.page){
	// 		newVal.page=1
	// 	}
	// 	alert('newVal='+newVal.page)
	// 	dashboard_service.result('/solr_dashboard_api?page='+newVal)
	// });
	$(DOC).on('click', '.page_links a', function(e){
		PD(e)
		$scope.$apply(function() {
			$location.path('/dashboard_angular/').search('page',getParameterByName('page',$(this).attr('href'))).replace()
		})
		dashboard_service.result($(this).attr('href'))
		//.search('page',getParameterByName('page',$(this).attr('href')))
		// alert($location.search().page)
		// alert(getParameterByName('page',$(this).attr('href')))
		// $location.path('/dashboard_angular/'+getParameterByName('page',$(this).attr('href'))).search('page='+getParameterByName('page',$(this).attr('href'))).replace().notify(false)
	})
})