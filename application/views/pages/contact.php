<div class="container">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<h1>Contact us</h1>
	<div class="row">
		<div class="col-md-3">
			<img alt="contact us"
				src="<?php echo base_url()?>assets/images/contact-us.png" style="">
		</div>
		<div class="col-md-3 home-content">
			<p>
			
			
			<h4 style="color: #fff !important">Anya Green Energy Solutions</h4>
			</p>
			<p>Virdhawalpur, Chiurapur</p>
			<p>(Babatpur), Varanasi</p>
			<p>Uttar Pradesh-221204, India.</p>
			<p>
				<b>LandMark :</b>(Near Varanasi Airport)
			</p>
			<p>
				Mobile Number :</b>(+91)7607778601
			</p>
			<p>
				<b>Email:</b>anyagreenenergy@gmail.com
			</p>

		</div>
		<div class="col-md-6">
			<form ng-submit="submit()" name="contactForm"
				ng-controller="ContactFormController" class="my-form">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label> <input type="text"
								class="form-control" name="contactedname"
								ng-model="contactedname" id="contactedname" required /> <span
								class="error"
								ng-show="contactForm.contactedname.$error.required">Required!</span>
						
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label> <input
								type="email" class="form-control" name="contactedEmail"
								ng-model="contactedEmail" id="contactedEmail"
								aria-describedby="emailHelp" required /> <span class="error"
								ng-show="contactForm.contactedEmail.$error.required">Required!</span><small
								id="emailHelp" class="form-text text-muted">We'll never share
								youremail with anyone else.</small>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Query for</label> <input
										type="text" class="form-control" name="contactedquery"
										id="contactedquery" ng-model="contactedquery" required /> <span
										class="error"
										ng-show="contactForm.contactedquery.$error.required">Required!</span>
								
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="contactedmessage">Query Details</label>
									<textarea class="form-control" id="contactedmessage"
										name="contactedmessage" ng-model="contactedmessage" rows="3"
										required></textarea>
									<span class="error"	ng-show="contactForm.contactedmessage.$error.required">Required!</span>
								
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
							<input type="text" class="form-control" name="cp1" id="cp1" ng-model="cp1" disabled/> 
							</div>
							<div class="col-md-1">
								<p style="color:#3c763d;font-size:20px;padding:5px;">+</p>
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="cp2" id="cp2" ng-model="cp2" disabled/> 
							</div>
							<div class="col-md-1">
								<p style="color:#3c763d;font-size:20px;padding:5px;">=</p>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="cpsum" id="cpsum" ng-model="cpsum" required/>
								<span class="error"	ng-show="contactForm.cpsum.$error.required">Fill the answer!</span>
							</div>
							<div class="col-md-3 error">
								 {{answer}} 
							</div>
						</div>	
						<br />
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" class="btn btn-primary form-control"
										value="Submit" />
								</div>
								<p class="response-message">{{message}}</p>
							</div>
						</div>
			
			</form>
		</div>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>