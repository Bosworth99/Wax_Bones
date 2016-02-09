<?php session_start();
/*
Template Name: Form - Support
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

							<section id="support" class="row">

								<div class="inner clearfix">
									<div class="column_12 first last">
										<section class="feature-form-layout">

											<header class="header">
												<h1>Support</h1>
												<p class="subtext">&nbsp;</p>
												<span class="watermark">&nbsp;</span>
											</header>

											<section class="details clearfix">
												<div class="detail col_full first last">
													<div class="wrap">
														<h3>Help when you need it.</h3>
														<p>
															We're here to help quickly solve your support issues! For best service, please 
															include as much detail as possible about your issue, including the account name 
															and domain name. We'll get back to you as soon as possible!
														</p>

														<ul class="support-links clearfix">
															<li>Have a General Inquiry? <a class="button" href="/contact" >Contact Us</a></li>
															<li>Ready to sign up? <a class="button" href="/getting-started" >Get Started</a></li>
														</ul>
													</div>
												</div>

											</section>

											<section id="support-form" class="feature-form">

												<form class="big-form validate" name="tech-support" action="/form-processor.php" method="POST">

													<input class="ignore" type="hidden" name="formtype" value="tech_support" />	
													<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com/support" />

													<fieldset>
														<legend class="intro">Open a Support Ticket</legend>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="Name">Name*</label>
															<div class="controls col_threefourth">
																<input id="name" class="input-name input input-full" type="text" name="name"  value="<?php isset($fp['name']) ? $fp['name']:'' ?>" placeholder="Name*" tabindex="1" required />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="email">Email*</label>
															<div class="controls col_threefourth">
																<input id="email" class="input-email input input-full" type="text" name="email"  value="<?php isset($fp['email']) ? $fp['email']:'' ?>" placeholder="Email*" tabindex="2" required />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="phone">Phone</label>
															<div class="controls col_threefourth">
																<input id="phone" class="input-phone input input-full" type="text" name="phone"  value="<?php isset($fp['phone']) ? $fp['phone']:'' ?>" placeholder="Phone" tabindex="3" />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="Domain">Domain*</label>
															<div class="controls col_threefourth">
																<input id="domain" class="input-name input input-full" type="text" name="domain"  value="<?php isset($fp['domain']) ? $fp['domain']:'' ?>" placeholder="Domain*" tabindex="4" required />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="">Issue</label>
															<div class="controls col_threefourth">
																<select id="set-formtype" class="ignore input input-full" tabindex="5">
																	<option value="tech_support">I need help with my Website.</option>
																	<option value="tech_support">I need help with another Service.</option>
																	<option value="billing_support">I need help with Billing.</option>
																	<option value="general_inquiry">I need help with something else.</option>
																</select>
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="subject">Subject*</label>
															<div class="controls col_threefourth">
																<input id="subject" class="input input-full" type="text" name="subject"  value="<?php isset($fp['subject']) ? $fp['subject']:'' ?>" placeholder="Subject" tabindex="6" required />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="message">Message*</label>
															<div class="controls col_threefourth">
																<textarea id="message" class="textarea-comment input input-full" name="message"  cols="39" rows="4" tabindex="7"  placeholder="Detailed Message"><?php isset($fp['message']) ? $fp['message']:'' ?></textarea>
															</div>
														</div>

													</fieldset>

													<div class="control-group clearfix"> 
														<div class="actions">
															<span class="button large submit" name="submit" tabindex="8">Submit</span>
														</div>
													</div>

												</form>
											</section>

											<section class="details after">

												<div id="email-phone">

													<div class="detail email col_half first">
														<div class="wrap">
															<h3>Email</h3>
															<a href="mailto:support@waxwinglegal.com"><strong>support@waxwinglegal.com</strong></a>
														</div>
													</div>
													<div class="detail phone col_half last">
														<div class="wrap">
															<h3>Phone</h3>
															<span>For plans including phone support:</span><br>
															<strong>(855)780-1081 </strong><span>Toll Free</span><br>
															<strong>(360)866-3731 </strong><span>Outside US</span>
														</div>
													</div>

												</div>
												
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
										new Wax.Validate($,'support-form');
									});

									// Switch up Department

									var select = $('select#set-formtype');
									var formType = $('[name="formtype"]')
									select.on({
										'change': function(){
											formType.val( select[0].value );
										}
									});

								})(jQuery);

							</script>
							<!-- /logic -->

						</article>

					</div>

				</div>

			</section>

<?php get_footer(); ?>