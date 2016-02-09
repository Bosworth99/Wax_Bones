<?php session_start();
/*
Template Name: Form - Contact-Us
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

							<section id="contact-us" class="row">

								<div class="inner clearfix">
									<div class="column_12 first last">
										<section class="feature-form-layout">

											<header class="header">
												<h1>Contact Us</h1>
												<p class="subtext">&nbsp;</p>
												<span class="watermark">&nbsp;</span>
											</header>

											<section class="details clearfix">

												<div class="detail">
													<div class="wrap">
														<h3>We're here to help.</h3>
														<p>
															We're here to answer questions, or get you started with any of our great services.<br />
															For fastest service, use the contact form below to open a support ticket. We're here to help!
														</p>
														<ul class="support-links clearfix">
															<li>Have a technical problem? <a class="button" href="/support" >Contact Support</a></li>
															<li>Ready to sign up? <a class="button" href="/getting-started" >Get Started</a></li>
														</ul>
													</div>
												</div>

											</section>

											<section id="contact-us-form" class="feature-form">

												<form class="big-form validate" name="contact-us" action="/form-processor.php" method="POST">

													<input class="ignore" type="hidden" name="formtype" value="general_inquiry" />
													<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com/contact-us" />

													<fieldset>
														<legend class="intro">Send Us a Message</legend>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="department">Department</label>
															<div class="controls col_threefourth">
																<select id="set-formtype" class="ignore input input-full">
																	<option value="general_inquiry">General Inquiry</option>
																	<option value="lead_generation">Sales / Products &amp; Services</option>
																	<option value="tech_support">Technical Support</option>
																	<option value="billing_support">Billing</option>
																</select>
															</div>
														</div>
														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="Name">Name*</label>
															<div class="controls col_threefourth">
																<input id="name" class="input-name input input-large" type="text" name="name"  value="<?php isset($fp['name']) ? $fp['name']:'' ?>" placeholder="Name" tabindex="1"  required/>
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="email">Email*</label>
															<div class="controls col_threefourth">
																<input id="email" class="input-email input input-large" type="email" name="email"  value="<?php isset($fp['email']) ? $fp['email']:'' ?>" placeholder="Email" tabindex="2"  required/>
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="phone">Phone</label>
															<div class="controls col_threefourth">
																<input id="phone" class="input-phone input input-full" type="text" name="phone"  value="<?php isset($fp['phone']) ? $fp['phone']:'' ?>" placeholder="Phone" tabindex="3" />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="domain">Domain</label>
															<div class="controls col_threefourth">
																<input id="phone" class="input-phone input input-full" type="text" name="domain"  value="<?php isset($fp['domain']) ? $fp['domain']:'' ?>" placeholder="Domain" tabindex="3" />
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="subject">Subject*</label>
															<div class="controls col_threefourth">
																<input id="subject" class="input-subject input input-full" type="text" name="subject" value="<?php isset($fp['subject']) ? $fp['subject']:'' ?>" placeholder="Subject" tabindex="4"  required/>
															</div>
														</div>

														<div class="control-group clearfix">
															<label class="control-label	col_fourth" for="msg">Message*</label>
															<div class="controls col_threefourth">
																<textarea id="message" class="textarea-comment input input-full" name="message"  cols="39" rows="4" tabindex="5"  placeholder="Enter Message" required><?php isset($fp['msg']) ? $fp['msg']:'' ?></textarea>
															</div>
														</div>

													</fieldset>

													<div class="control-group clearfix"> 
														<div class="actions">
															<div class="human-wrap control-group"></div>
															<span class="button large submit"tabindex="6">Submit</span>
														</div>
													</div>

												</form>
												
											</section>

											<section class="details after">

												<div id="hours-social" class="clearfix">
													<div class="detail hours col_half first">
														<div class="wrap">
															<h3>Office Hours</h3>
															<span>8:00 AM - 5:00 PM <br> Monday-Friday (Pacific Time)</span>
														</div>
													</div>

													<div class="detail social col_half last">
														<div class="wrap">
															<h3>Follow us</h3>
															<ul class="social-links">
																<li><a href="//www.facebook.com/pages/Per-Se-Media/174203439378626" class="fb" target="_blank">&nbsp;</a></li>
																<li><a href="//twitter.com/waxwinglegal" class="tw" target="_blank">&nbsp;</a></li>
																<li><a href="//plus.google.com/+Waxwinglegalmarketing/posts" class="gp" target="_blank">&nbsp;</a></li>
															</ul>
														</div>
													</div>
												</div>

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
										new Wax.Validate($,'contact-us-form');
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
