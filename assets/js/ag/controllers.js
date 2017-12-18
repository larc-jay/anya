    app = angular.module("anyawebapp", ["anyawebappmain","ENVConf","ngSanitize"]);
    
	app.controller("ServicesCtrl",["$scope","$location","$routeParams",'API_URL', function($scope,$location,$routeParams,apiURL) {
		$scope.data=[ {name:"GroupLove",genre:"The Bealters",rating:5}, {name:"Alt-2",genre:"The Alternate",rating:3} ];
		$scope.addArtist = function(){
		}
	}]);
	app.controller("SystemDesignCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
	]);
	app.controller("SysInstallationCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
	]);
	app.controller("SysOpsCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
	]);
	app.controller("ContactCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {}
	]);
	app.controller("AboutCtrl",["$scope","$location","$routeParams", function($scope,$location,$routeParams) {
	}
	]);
	app.controller("FaqsCtrl",["$scope","$location","$routeParams","$http",'API_URL',"$sce", function($scope,$location,$routeParams,$http,apiURL,$sce) {
		  $http.get(apiURL+'/getFaqs').then(function(response) {
	          $scope.faqs =  response.data;
	      });
		  $scope.toggle = function() {
			    return !this.booleanVal;
		  }
		}
	]);
	app.controller("ProductsCtrl",["$scope","$location","$routeParams","$http",'API_URL',"$sce", function($scope,$location,$routeParams,$http,apiURL,$sce) {
	    	$http({
	    	        url: apiURL+'/getViewProduct',
	    	        method: "POST",
	    	        data: JSON.stringify({id:$routeParams.id }),
	    	        headers: {'Content-Type': 'application/json'}
	    	    }).then(function(response) {
	    	    $scope.title = response.data.title;
	    	    $scope.summary = $sce.trustAsHtml(response.data.summary);
	       });
		}
	]);
	app.filter("sanitize", ['$sce', function($sce) {
        return function(htmlCode){
            return $sce.trustAsHtml(htmlCode);
        }
	}]); 
	
	
	app.controller("VisitorCountCtrl", function($scope, $window) {

		$window.onload = function() {
		 	alert("Angularjs call function on page load");
		};
	});
	/*app.controller("MainCtrl",["$scope","$location","$routeParams","$http",'API_URL', function($scope,$location,$routeParams,$http,apiURL) {
		 $http.get(apiURL+'/visitorCounter').then(function(response) {
	          $scope.visitor =  response.data;
	    });
		}
	]);*/
