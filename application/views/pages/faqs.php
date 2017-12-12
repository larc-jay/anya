<div class="container">
	<h1>FAQ's</h1>
	<div ng-controller="FaqsCtrl">
		<div ng-repeat="faq in faqs">
			<div class="list-group-item list-group-item-action">
				<p style="font-size: 20px;color: #3c763d ">{{faq.title}}</p>
				<p>{{faq.description}} </p>
			</div>
		</div>	
	</div>
</div>