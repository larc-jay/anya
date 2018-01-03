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
	app.controller('ContactFormController', ['$scope','$http','API_URL', function($scope,$http,apiURL) {
		      $scope.contactedname = 'Enter Name';
		      $scope.contactedEmail = 'example@example.com';
		      $scope.contactedquery = 'Enter query subject';
		      $scope.contactedmessage = 'Enter your query';
		      $scope.cp1 = Math.round((Math.random() * 10) * 10);
		      $scope.cp2 = Math.round((Math.random() * 10) * 10);
		      $scope.contact = [];
		      $scope.submit = function() {
		          if ($scope.contactedname) {
		        	  $scope.contact['name'] = $scope.contactedname;
		          }
		          if ($scope.contactedEmail) {
		        	  $scope.contact['email'] = $scope.contactedEmail;
		          }
		          if ($scope.contactedquery) {
		        	  $scope.contact['query'] = $scope.contactedquery;
		          }
		          if ($scope.contactedmessage) {
		        	  $scope.contact['message'] = $scope.contactedmessage;
		          }
		          if ($scope.cpsum) {
		        	  if($scope.cpsum != ($scope.cp1 + $scope.cp2)){
		        		  $scope.answer = "You have filled wrong answer !!!";
		        		  return;
		        	  }
		          }
		          $http({
		    	        url: apiURL+'/contact',
		    	        method: "POST",
		    	        data: JSON.stringify({name : $scope.contactedname,email : $scope.contactedEmail , query :$scope.contactedquery,message:$scope.contactedmessage}),
		    	        headers: {'Content-Type': 'application/json'}
		    	    }).then(function(response) {
		    	    	  $scope.message = response.data.message;
		    	    	  //alert(response.data.message);
		    	    	  $scope.contactedname = 'Enter Name';
			   		      $scope.contactedEmail = 'example@example.com';
			   		      $scope.contactedquery = 'Enter query subject';
			   		      $scope.contactedmessage = 'Enter your query';
		    	    });
		        };
		}
	]);