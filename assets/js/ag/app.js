var app = angular.module('anyawebapp', ["ngRoute","ENVConf"]);
app.config(function($routeProvider,BASE_URL){
	$routeProvider.when("/about",{
		templateUrl :BASE_URL+"main/about",
		controller: "AboutCtrl"
	}).when("/contact",{
		templateUrl :BASE_URL+"main/contact",
		controller: "ContactCtrl"
	}).when("/services",{
		templateUrl :BASE_URL+"main/services",
		controller: "ServicesCtrl"
	}).when("/systemdesign",{
		templateUrl :BASE_URL+"main/systemdesign",
		controller: "SystemDesignCtrl"
	}).when("/sysinstallation",{
		templateUrl :BASE_URL+"main/sysinstallation",
		controller: "SysInstallationCtrl"
	}).when("/sysoperation",{
		templateUrl :BASE_URL+"main/sysoperation",
		controller: "SysOpsCtrl"
	}).when("/faqs",{
		templateUrl :BASE_URL+"main/faqs",
		controller: "FaqsCtrl"
	}).when("/products/:id",{
		templateUrl :BASE_URL+"main/products",
		controller: "ProductsCtrl"
	}).when("/installations",{
		templateUrl :BASE_URL+"main/installations",
		controller: "InstallationsCtrl"
	}).otherwise({
		redirectTo:"/app",
		templateUrl :BASE_URL+"main/home",
		})
});

app.controller("ServicesCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {
	$scope.data=[
		    {name:"GroupLove",genre:"The Bealters",rating:5},
		    {name:"Alt-2",genre:"The Alternate",rating:3}
	    ];
	$scope.addArtist = function(){
	}
}]);
app.controller("ContactCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
]);
app.controller("AboutCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {
	    $scope.location = $location;
}
]);
app.controller("FaqsCtrl",["$scope","$location","$routeParams","$http", function($scope,$location,$routeParams,$http) {
	  $http.get('http://localhost:55555/anya/index.php/api/getFaqs').then(function(response) {
          $scope.faqs = response.data;
      });
	  $scope.routeParams = $routeParams;
	  console.log($routeParams);
	  
}
]);
app.controller("ProductsCtrl",["$scope","$location","$routeParams", "$http", function($scope,$location,$routeParams,$http) {
    $http({
    	        url: 'http://localhost:55555/anya/index.php/api/getViewProduct',
    	        method: "POST",
    	        data: { 'id' : $routeParams.id },
    	        headers: {'Content-Type': 'application/json'}
    	    }).then(function(response) {
    	    $scope.product = response.data;
    	    console.log(response);
       });
	}
]);

