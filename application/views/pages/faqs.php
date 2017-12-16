<div class="container">
	<h1>FAQ's</h1>
	<div ng-controller="FaqsCtrl">
		<div ng-repeat="faq in faqs">
			<div class="list-group-item list-group-item-action">
				<span  style="font-size: 20px;color: #3c763d">{{faq.title}}</span><button ng-click="showDetails = ! showDetails" class="btn btn-bg"> {{showDetails ? '-' : '+'}} </button>	 
			<div class="procedure-details" ng-show="showDetails"><p ng-bind-html="faq.faq"></p></div>
		</div>	
	</div>
</div>