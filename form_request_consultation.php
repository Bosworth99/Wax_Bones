<?php session_start();
/*
Template Name: Form - Request-Consultation
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

							<section id="consultation-request" class="row">

								<div class="inner clearfix">
									<div class="column_12 first last">
										<section class="feature-form-layout">

											<header class="header">
												<h1>Request a Consultation</h1>
												<p class="subtext">&nbsp;</p>
												<span class="watermark">&nbsp;</span>
											</header>

											<section class="details clearfix">

												<div class="detail">
													<div class="wrap">
														<h3>Have a question?</h3>s
														<p>
															Starting an effective online marketing campaign can be challenging. Let us know if you 
															have any outstanding questions or issues. We're here to help
														</p>
													</div>
												</div>

											</section>

											<section id="request-consultation" class="feature-form">

												<form class="big-form validate" name="contact-us" action="/form-processor.php" method="POST">

													<input class="ignore" type="hidden" name="formtype" value="general_inquiry" />
													<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com/request-consultation" />

													<fieldset>
														<legend class="intro">Send Us a Message</legend>

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
															<label class="control-label	col_fourth" for="msg">Message*</label>
															<div class="controls col_threefourth">
																<textarea id="message" class="textarea-comment input input-full" name="message"  cols="39" rows="4" tabindex="4"  placeholder="Enter Message" required><?php isset($fp['msg']) ? $fp['msg']:'' ?></textarea>
															</div>
														</div>

													</fieldset>

													<div class="control-group clearfix"> 
														<div class="actions">
															<span class="button large submit"tabindex="5">Submit</span>
														</div>
													</div>

												</form>
												
											</section>

										
											<footer class="feature-form-footer">
												<span class="watermark">&nbsp;</span>
											</footer>
											
										</section>
									</div>
									
								</div>

							</section>

							<!-- logic -->
							<script type="text/javascript" >

								(function($){ 

									$('document').ready(function(){
										new Wax.Validate($,'request-consultation');
									});

								})(jQuery);

							</script>
							<!-- /logic -->

						</article>

					</div>

				</div>

			</section>

<?php get_footer(); ?>
