var app = angular.module('anyawebappmain', ["ngRoute","ENVConf"]);
app.config(function($routeProvider,BASE_URL){
	$routeProvider.when("/about",{
		templateUrl :BASE_URL+"/about",
		controller: "AboutCtrl"
	}).when("/contact",{
		templateUrl :BASE_URL+"/contact",
		controller: "ContactCtrl"
	}).when("/services",{
		templateUrl :BASE_URL+"/services",
		controller: "ServicesCtrl"
	}).when("/systemdesign",{
		templateUrl :BASE_URL+"/systemdesign",
		controller: "SystemDesignCtrl"
	}).when("/sysinstallation",{
		templateUrl :BASE_URL+"/sysinstallation",
		controller: "SysInstallationCtrl"
	}).when("/sysoperation",{
		templateUrl :BASE_URL+"/sysoperation",
		controller: "SysOpsCtrl"
	}).when("/faqs",{
		templateUrl :BASE_URL+"/faqs",
		controller: "FaqsCtrl"
	}).when("/products/:id",{
		templateUrl :BASE_URL+"/products",
		controller: "ProductsCtrl"
	}).when("/installations",{
		templateUrl :BASE_URL+"/installations",
		controller: "InstallationsCtrl"
	}).otherwise({
		redirectTo:"/app",
		templateUrl :BASE_URL+"/home"
		})
});
