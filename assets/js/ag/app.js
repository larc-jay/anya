var app = angular.module('anyawebapp', ["ngRoute"]);
app.config(function($routeProvider){
	$routeProvider.when("/about",{
		templateUrl :"http://localhost:55555/anya/index.php/main/about",
		controller: "AboutCtrl"
	}).when("/contact",{
		templateUrl :"http://localhost:55555/anya/index.php/main/contact",
		controller: "ContactCtrl"
	}).when("/services",{
		templateUrl :"http://localhost:55555/anya/index.php/main/services",
		controller: "ServicesCtrl"
	}).when("/installations",{
		templateUrl :"http://localhost:55555/anya/index.php/main/installations",
		controller: "InstallationCtrl"
	}).when("/faqs",{
		templateUrl :"http://localhost:55555/anya/index.php/main/faqs",
		controller: "FaqsCtrl"
	}).when("/products",{
		templateUrl :"http://localhost:55555/anya/index.php/main/products",
		controller: "ProductsCtrl"
	})
	.otherwise({
		redirectTo:"/app",
		templateUrl :"http://localhost:55555/anya/index.php/main/home",
		controller: "MainCtrl"})
});

app.controller("ServicesCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {
	$scope.data=[
		    {name:"GroupLove",genre:"The Bealters",rating:2},
		    {name:"GroupLove",genre:"The Bealters",rating:8},
		    {name:"GroupLove",genre:"The Bealters",rating:4},
		    {name:"GroupLove",genre:"The Bealters",rating:5},
		    {name:"Alt-2",genre:"The Alternate",rating:3}
	    ];
	$scope.addArtist = function(){
		//$location.path = "item/add"
		alert('working add block');
	}
}]);
app.controller("ContactCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
]);
app.controller("AboutCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {
	    $scope.location = $location;
	  
}
]);


