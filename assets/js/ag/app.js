var app = angular.module('anyawebapp', ["ngRoute"]);
app.config(function($routeProvider){
	$routeProvider.when("/web/products",{
		templateUrl :"view-list.html",
		controller: "listcontroller"
	}).when("/web/add",{
		templateUrl :"view-detail.html",
		controller: "addcontroller"
	}).
	when("/web/:index",{
		templateUrl :"view-detail.html",
		controller: "editcontroller"
	}).otherwise({redirectTo:"/web"})
});

app.controller("listcontroller",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {
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
app.controller("addcontroller",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
]);
app.controller("editcontroller",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
]);


