<?php session_start();
/*
Template Name: Form - Getting-Started
*/
?>

<?php
	get_header(); 

	$fp = array();
	if ( isset($_SESSION['formprocessor']) ) {
	   $fp = $_SESSION['formprocessor'];
	   unset($_SESSION['formprocessor']);
	}
?>

			<section id="page-content" class="scaffold">

				<div id="inner-content" class="container clearfix">

					<div id="main" role="main">
						
						<!-- styles -->
						<link rel="stylesheet" id="features-css" href="/wp-content/themes/wax_bones/library/css/content/feature_forms.css" type="text/css" media="all">
						<!-- /styles -->

						<article id="page-<?php the_ID(); ?>" <?php post_class( 'feature-page clearfix' ); ?> >

							<section id="getting-started" class="row">

								<div class="inner clearfix">

									<div class="column_12 first last">
										<section class="feature-form-layout">

											<header class="header">
												<h1>Getting Started</h1>
												<p class="subtext">&nbsp;</p>
												<span class="watermark">&nbsp;</span>
											</header>

											<section class="details clearfix">
												<div class="detail col_full first last">
													<div class="wrap">
														<h3>Ready to sign up?</h3>
														<p>
															Getting started with Waxwing Legal is easy! Just call us at (800) 780-1081 or 
															fill out the form below. We'll get you up and running quickly.
														</p>
													</div>
												</div>
											</section>

											<section id="getting-started-form" class="feature-form">
												<form class="big-form validate" name="getting-started" action="/form-processor.php" method="POST">

													<input class="ignore" type="hidden" name="formtype" value="sales_support" />	
													<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com/getting-started" />

													<fieldset class="plans clearfix">
														<div class="control-group">
															<legend><i class="icon-user"></i> <a href="/plans-pricing">Plans &amp; Pricing</a></legend>
														</div>

														<div id="plan-1" class="plan control-group col_third first">
															<div class="wrap">
																<span class="h2">Basic</span>
																<label class="control-label" for="plan">
																	<span class="simple-price">$49.95 /mo</span>
																	<input class="input" type="radio" name="plan" value="plan_1" data-plan="plan_1" checked tabindex="1" /> 
																</label>
															</div>
														</div>

														<div id="plan-2" class="plan control-group col_third">
															<div class="wrap">
																<span class="h2">Advanced</span>
																<label class="control-label" for="plan">
																	<span class="simple-price">$249.95 /mo</span>
																	<input class="input" type="radio" name="plan" value="plan_2" data-plan="plan_2" tabindex="2" />
																</label>
															</div>
														</div>

														<div id="plan-3" class="plan control-group col_third last">
															<div class="wrap">
																<span class="h2">VIP</span>
																<label class="control-label" for="plan">
																	<span class="simple-price">Request Quote</span>
																	<input class="input" type="radio" name="plan" value="plan_3" data-plan="plan_3" tabindex="3" />
																</label>
															</div>
														</div>

													</fieldset>

													<fieldset>
														<div>
															<legend><i class="icon-user"></i> Contact Info</legend>
														</div>

														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="firstname">First Name*</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="firstname" placeholder="First Name*" value="<?php isset($fp['firstname']) ? $fp['firstname']:'' ?>" tabindex="4" required/>
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="lastname">Last Name*</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="lastname" placeholder="Last Name*" value="<?php isset($fp['lastname']) ? $fp['lastname']:'' ?>" tabindex="5" required />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="primaryemail">Email Address*</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="email" name="primaryemail" placeholder="Primary Email*" value="<?php isset($fp['primaryemail']) ? $fp['primaryemail']:'' ?>" tabindex="6" required />
																<span class="help-block">Primary email address</span>
															</div>
														</div>
													</fieldset>

													<fieldset>
														<div>
															<legend><i class="icon-globe"></i> Website</legend>
														</div>

														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="havewebsite">Status</label>
															<div class="controls col_threefourth last">
																<label><input type="checkbox" name="havewebsite" value="I currently have a website" tabindex="8" /> I currently have a website</label>
															</div>
														</div>		
																										
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="domain">Domain</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="domain" placeholder="Domain Name" value="<?php isset($fp['domain']) ? $fp['domain']:'' ?>" tabindex="7" />
																<label><input type="checkbox" name="owndomain" value="I own this domain" tabindex="9" /> I own this domain</label>
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="logo">Logo</label>
															<div class="controls col_threefourth last">
																<label><input type="checkbox" name="logo" value="I have a Logo" tabindex="10" /> I have a logo</label>
																<span class="help-block">We will request artwork.</span>
															</div>
														</div>
													</fieldset>

													<fieldset>
														<div>
															<legend><i class="icon-home"></i> Firm Info</legend>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="practicename">Firm Name*</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="practicename" placeholder="Firm Name" value="<?php isset($fp['practicename']) ? $fp['practicename']:'' ?>" tabindex="11" required />
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="phone">Phone Number</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="phone" placeholder="Phone Number" value="<?php isset($fp['phone']) ? $fp['phone']:'' ?>" tabindex="12" />
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="billingemail">Billing Email</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="email" name="billingemail" placeholder="Billing Email" value="<?php isset($fp['billingemail']) ? $fp['billingemail']:'' ?>" tabindex="13" />
																<span class="help-block">If different than Primary</span>
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="address1">Address</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="address1" placeholder="Address Line 1" value="<?php isset($fp['address1']) ? $fp['address1']:'' ?>" tabindex="14" />
																<input class="input input-full" type="text" name="address2" placeholder="Address Line 2" value="<?php isset($fp['address2']) ? $fp['address2']:'' ?>" tabindex="15" />
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="city">City</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="city" placeholder="City" value="<?php isset($fp['postalcode']) ? $fp['postalcode']:'' ?>" tabindex="16" />
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="state">State</label>
															<div class="controls col_threefourth last">
																<select class="select" name="state" tabindex="17">
																	<option value="" selected="selected">Select a State</option> 
																	<option value="AL">Alabama</option> 
																	<option value="AK">Alaska</option> 
																	<option value="AZ">Arizona</option> 
																	<option value="AR">Arkansas</option> 
																	<option value="CA">California</option> 
																	<option value="CO">Colorado</option> 
																	<option value="CT">Connecticut</option> 
																	<option value="DE">Delaware</option> 
																	<option value="DC">District Of Columbia</option> 
																	<option value="FL">Florida</option> 
																	<option value="GA">Georgia</option> 
																	<option value="HI">Hawaii</option> 
																	<option value="ID">Idaho</option> 
																	<option value="IL">Illinois</option> 
																	<option value="IN">Indiana</option> 
																	<option value="IA">Iowa</option> 
																	<option value="KS">Kansas</option> 
																	<option value="KY">Kentucky</option> 
																	<option value="LA">Louisiana</option> 
																	<option value="ME">Maine</option> 
																	<option value="MD">Maryland</option> 
																	<option value="MA">Massachusetts</option> 
																	<option value="MI">Michigan</option> 
																	<option value="MN">Minnesota</option> 
																	<option value="MS">Mississippi</option> 
																	<option value="MO">Missouri</option> 
																	<option value="MT">Montana</option> 
																	<option value="NE">Nebraska</option> 
																	<option value="NV">Nevada</option> 
																	<option value="NH">New Hampshire</option> 
																	<option value="NJ">New Jersey</option> 
																	<option value="NM">New Mexico</option> 
																	<option value="NY">New York</option> 
																	<option value="NC">North Carolina</option> 
																	<option value="ND">North Dakota</option> 
																	<option value="OH">Ohio</option> 
																	<option value="OK">Oklahoma</option> 
																	<option value="OR">Oregon</option> 
																	<option value="PA">Pennsylvania</option> 
																	<option value="RI">Rhode Island</option> 
																	<option value="SC">South Carolina</option> 
																	<option value="SD">South Dakota</option> 
																	<option value="TN">Tennessee</option> 
																	<option value="TX">Texas</option> 
																	<option value="UT">Utah</option> 
																	<option value="VT">Vermont</option> 
																	<option value="VA">Virginia</option> 
																	<option value="WA">Washington</option> 
																	<option value="WV">West Virginia</option> 
																	<option value="WI">Wisconsin</option> 
																	<option value="WY">Wyoming</option>
																</select>
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="postalcode">Postal Code</label>
															<div class="controls col_threefourth last">
																<input class="input input-small" type="text" name="postalcode" placeholder="Postal Code" value="<?php isset($fp['postalcode']) ? $fp['postalcode']:'' ?>" tabindex="18" />
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label col_fourth" for="country">Country</label>
															<div class="controls col_threefourth last">
																<input class="input input-full" type="text" name="country" placeholder="Country" value="<?php isset($fp['country']) ? $fp['country']:'' ?>" tabindex="19" />
															</div>
														</div>
													</fieldset>

													<fieldset id="human-wrap">
														<div>
															<legend><i class="icon-globe"></i> Anything else?</legend>
														</div>
														<div class="control-group clearfix">
															<div class="controls col_full">
																<textarea id="comment" name="message" cols="39" rows="4" class="textarea-comment input input-full" placeholder="Message" tabindex="20"><?php isset($fp['message']) ? $fp['message']:'' ?> </textarea>
																<span class="help-block">Anything else we need to know?</span>
															</div>
														</div>
													</fieldset>

													<div class="control-group clearfix"> 
														<div class="actions">
															<span class="button large submit" tabindex="21">Submit</span>
														</div>
													</div>

												</form>
												
											</section>

											<footer class="feature-form-footer">
												<span class="watermark">&nbsp;</span>
											</footer>

										</section>
									</div>

									<!--
									<div class="sidebar column_3 last">
										<aside id="sidebar2" class="feature-form-aside sidebar-content" >

											<?php /*if ( is_active_sidebar( 'sidebar2' ) ) : ?>

												<?php dynamic_sidebar( 'sidebar2' ); ?>

											<?php else: ?>

												<img src="/img/ads/default.400x250.jpg" alt="dummy" />

											<?php endif;*/ ?>

										</aside>
									</div>
									-->

								</div>

							</section>

							<!-- logic -->
							<script type="text/javascript" >

								(function($){ 

									$('document').ready(function(){

										// validate this sucker
										new Wax.Validate($,'getting-started-form');

										// anything selected in ye olde url? 

										console.log('url params!', getURLParameter('plan'));

										function getUrlParams(){
											if (getURLParameter('plan') !== null){
												var p = getURLParameter('plan');
												$('[data-plan="'+p+'"]').trigger('click');
											}
										}

										function getURLParameter(name) {
										    return decodeURI(
										        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
										    );
										}

										getUrlParams();
									});


								})(jQuery);

							</script>
							<!-- /logic -->

						</article>

					</div>

				</div>

			</section>

<?php get_footer(); ?>