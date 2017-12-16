<div class="container">
	
	<div ng-controller="ProductsCtrl">
		<div class="row">
			<div lass="col-md-12">
				<div class="list-group-item list-group-item-action">
					<h4>{{title}}</h4>
				</div>
			</div>
		</div>
		<div class="row">
			<div lass="col-md-12">
				<div class="list-group-item list-group-item-action">
					<p ng-bind-html="summary"></p>
				</div>
			</div>
		</div>
	</div>
</div>