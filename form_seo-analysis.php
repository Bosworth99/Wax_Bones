<?php session_start();
/*
Template Name: Form - SEO Analysis
*/
?>

<?
	get_header(); 
	global $data;

	$fp = array();
	if ( isset($_SESSION['formprocessor']) ) {
	   $fp = $_SESSION['formprocessor'];
	   unset($_SESSION['formprocessor']);
	}

	/*
		SEMRush.com API. http://www.semrush.com/api.html
	*/
	
	set_time_limit ( 0 );

	// 1) $query - Your request. This can be one of three:
	// 		1) domain name, e.g.: ebay.com
	// 		2) keyphrase, e.g.: money
	// 		3) URL, e.g.: http://www.ebay.com/
	$querydomain = (empty($_GET['querydomain'])) ? false : $_GET['querydomain'];

	// 2) $type - Type of report. This can take different values, depending on the query.
	// 
	// If your query is a domain name, the $type can be:
	// 		1) domain_organic
	// 		2) domain_adwords
	// 		3) domain_organic_organic
	// 		4) domain_adwords_adwords
	// 		5) domain_organic_adwords
	// 		6) domain_adwords_organic
	// 		7) domain_rank
	// 
	// If your query is a keyphrase, the $type can be:
	//		1) phrase_related
	//		2) phrase_this
	// 
	// If your query is URL, the $type can be:
	//		1) url_organic
	//		2) url_adwords
	$type		= 'domain_organic';
	
	// 3) $request_type - type of the request. This shows what type of query you are using.
	// This can be, depending on your query:
	//		1) domain
	//		2) phrase
	//		3) url
	$request_type = 'domain';
	
	// 4) $api_key - Your unique SEMRush API key
	//
	$api_key	= '1f7bb889a0fbe5caddbabf4804ebdc1e';
	
	// 5) $db - Database (for the moment can be: en, uk, ru, de, fr, es)
	$db			= 'us';
	
	// 6) $limit - How many results to return
	$limit		= 3;
	
	// 7) $offset - How many results to skip from the beginning
	$offset		= 0;
	
	// 8) $export_columns - which columns should be returened in what order
	// Values, replicating SEMRush web interface by report type:
	// 		1) for domain_organic - $export_columns=Ph,Po,Nq,Cp,Ur,Tr,Tc,Co,Nr,Td
	// 		2) for domain_adwords - $export_columns=Ph,Po,Nq,Cp,Vu,Tr,Tc,Co,Nr,Td
	// 		3) for domain_organic_organic - $export_columns=Dn,Np,Or,Ot,Oc,Ad
	// 		4) for domain_adwords_adwords - $export_columns=Dn,Np,Ad,At,Ac,Or
	// 		5) for domain_organic_adwords - $export_columns=Dn,Np,Ad,At,Ac,Or
	// 		6) for domain_adwords_organic - $export_columns=Dn,Np,Or,Ot,Oc,Ad
	// 		7) for domain_rank - $export_columns=Dn,Rk,Or,Ot,Oc,Ad,At,Ac
	//		8) for phrase_related - $export_columns=Ph,Nq,Cp,Co,Nr,Td
	//		9) for phrase_this - $export_columns=Ph,Nq,Cp,Co,Nr
	//		10) for url_organic - $export_columns=Ph,Po,Nq,Cp,Co,Tr,Tc,Nr,Td
	//		11) for url_adwords - $export_columns=Ph,Po,Nq,Cp,Co,Tr,Tc,Nr,Td
	$export_columns = 'Ph,Po,Nq,Cp,Ur';
	
	function performRequest ( $params ){
		$url	= 'http://' . $params [ 'db' ] . '.api.semrush.com/?action=report&type=' . $params [ 'type' ] . '&' . $params [ 'request_type' ] . '=' . $params [ 'q' ] . '&key=' . $params [ 'key' ] . '&display_limit=' . $params [ 'limit' ] . '&display_offset=' . $params [ 'offset' ] . '&export=api&export_columns=' . $params [ 'export_columns' ];
		$cUrl	= 	curl_init			();
					curl_setopt			( $cUrl, CURLOPT_URL, $url );
					curl_setopt			( $cUrl, CURLOPT_RETURNTRANSFER, 1 );
					curl_setopt			( $cUrl, CURLOPT_TIMEOUT, 30 );
					curl_setopt			( $cUrl, CURLOPT_HTTPHEADER, array ( 'X-Real-IP', $params [ 'uip' ] ) );
		$answer	= 	curl_exec			( $cUrl );
		if ( curl_getinfo ( $cUrl, CURLINFO_HTTP_CODE ) == 200 ){
					curl_close			( $cUrl );
			return $answer;	// Return request results

		} elseif ( curl_errno ( $cUrl ) && curl_errno ( $cUrl ) != 28 ){
					curl_close			( $cUrl );

			return false;	// Error occured during request
		}
					curl_close			( $cUrl );
		return false;		// Request timed out
	}
	
	$ip_address	= $_SERVER['SERVER_ADDR'];
	
	$params = Array
	(
		'request_type'		=> $request_type,
		'type'				=> $type,
		'q'					=> urlencode ( $querydomain ),
		'key'				=> $api_key,
		'uip'				=> $ip_address,
		'db'				=> $db,
		'limit'				=> $limit,
		'offset'			=> $offset,
		'export_columns'	=> $export_columns
	);
?>

			<section id="page-content" class="scaffold">

				<div id="inner-content" class="container clearfix">

					<div id="main" role="main">
						
						<!-- styles -->
						<link rel="stylesheet" id="features-css" href="/wp-content/themes/wax_bones/library/css/content/feature_forms.css" type="text/css" media="all">
						<!-- /styles -->

						<article id="page-<?php the_ID(); ?>" <?php post_class( 'feature-page clearfix' ); ?> >

							<section id="seo-analysis" class="row">

								<div class="inner clearfix">

									<div class="column_12 first last">

										<section class="feature-form-layout">

											<header class="header">
												<h1>Free SEO Report</h1>
												<span class="watermark">&nbsp;</span>
											</header>

									<? 
											if ( !$querydomain ) { 
									?>

											<section id="free-seo-analysis" class="noquery details clearfix">
												<div class="detail">
													<div class="wrap">
														<h3>How does <strong>your</strong> site rank?</h3>
														<p>
															Are you standing out from the crowd? Competition on the web is fierce, and you need
															high ranking to make sure your prospective clients can find you. Enter your domain now to 
															reveal a complementary SEO analysis.
														</p>
														<form  class="big-form" name="seo-analysis" action="" method="GET">
															<input class="input input-large" name="querydomain" type="text" placeholder="yourdomain.com" />
															<button class="button large">Free Analysis</button>
														</form>
														<script type="text/javascript">

															(function($){
																$(document).ready(function(){ 

																	var _wrapper = $('#free-seo-analysis');
																	var _form 	=  _wrapper.find('.big-form');
																	var _input 	= _wrapper.find('.big-form [name="querydomain"]');
																	var _button = _wrapper.find('.big-form .button');

																	_button.on({
																		'click': function(e){
																			e.preventDefault();

																			var url = _input.val();

																			if (url.indexOf("https://") == 0){
																				url = url.substring(8);
																			}

																			if (url.indexOf("http://") == 0){
																				url = url.substring(7);
																			}

																			url = url.split('/')[0];

																			_input.val(url);
																			_form.submit();
																		}
																	});

																});
															})(jQuery);

														</script>
													</div>
												</div>
											</section>

									<? 
											} else {  // if ( !$querydomain )
									?>
											<section class="results details clearfix">
												<h2 class="results-header">Results for <span class="query"><? echo($querydomain) ?></span></h2>
												<a class="check-domain" href="/seo-analysis"> Check another domain.</a>
												<div class="wrap">
									<?

												if ( false !== ( $result = performRequest ( $params ) ) ){

													if ( preg_match ( "/^ERROR\s[0-9]+\s::[a-zA-Z0-9\s]+/i", $result ) ){
									?>

													<h3 class="results-error">No results found. Lets change that.</h3>
									<?
													} else {  // no error, continue

														$data = explode ( "\n", trim ( $result ) );
														$fields = explode ( ";", array_shift ( $data ) );

														if ( count ( $data ) > 0 ) {
									?>
													<table class="output">
														<tr>
									<?
															foreach ( $fields as $field ){
									?>
															<th>
																<div class="wrap <?= $field; ?>">
																	<?= $field; ?>
																</div>
															</th>
									<?
															}
									?>
														</tr>
									<?
															foreach ( $data as $line ){
																$values = explode ( ";", $line, count ( $fields ) );
									?>
														<tr>
									<?
																foreach ( $values as $value ){
									?>
															<td>
																<div class="wrap <?= $field; ?>">
																	<?= $value; ?>
																</div>
															</td>
									<?
																}
									?>
														</tr>
									<?
															}
									?>
													</table>
													<div class="obscured-data">
														<h3 class="snippet">
															Want to know more?<br>
															Get a Complete SEO Report - Free!
														</h3>
													</div>
									<?
														}  else {  // no count(data)
									?>
													<h3 class="results-error no-data">No results found. Lets change that.</h3>
									<?	
														} // if ( count ( $data ) > 0 )

													} // if ( preg_match ( "ERROR", $result ) )

												} else { // if $results == false
									?>
													<h3 class="results-error">No results found. Lets change that.</h3>
									<?	
												} // if ( false !== ( $result = performRequest ( $params ) ) )
									?>
												
												</div>
											</section> <!-- /.results -->

											<section class="feature-form">

												<div class="callout">
													<div class="wrap">
														<h2>Get a Free Comprehensive SEO Report Now! <span id="form-reveal" class="button large secondary">Get Yours</span></h2>
														<p>
															No matter how well you are currently ranking, we can help you do better!<br>
															Our expert team of SEO professionals are ready to help get to the next level.
														</p>
													</div>
												</div>

												<div id="seo-request-consultation" class="form-wrapper">
													<form class="big-form validate" name="request-consultation" action="/form-processor.php" method="POST">
														<input class="ignore" type="hidden" name="formtype" value="lead_generation" />
														<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com/free-seo-analysis - request_consultation" />
														<div class="inputs clearfix">
															<div class="col_half first">
																<div class="control-group">
																	<label class="modern-label" for="name">Name*</label>
																	<input class="input input-full" type="text" name="name" placeholder="Name*" value="" tabindex="1" required />
																</div>
																<div class="control-group">
																	<label class="modern-label" for="email">Email*</label>
																	<input class="input input-full" type="email" name="email" placeholder="Email*" value="" tabindex="2" required />
																</div>
																<div class="control-group">
																	<label class="modern-label" for="phone">Phone*</label>
																	<input class="input input-full" type="tel" name="phone" placeholder="Phone*" value="" tabindex="3" required />
																</div>
															</div>
															<div class="col_half last">
																<div class="control-group">
																	<label class="modern-label" for="domain">Domain</label>
																	<input class="input input-full" type="text" name="domain" placeholder="Domain" value="" tabindex="4" />
																</div>
																<div class="control-group">
																	<label class="modern-label" for="message">Message*</label>
																	<textarea name="message" class="input input-full" placeholder="Message*" value="" tabindex="5" required></textarea>
																</div>
															</div>
														</div>
														<div class="actions">
															<div class="human-wrap"></div>
															<span class="button large submit" tabindex="5">Send</span>
														</div>
													</form>
												</div>

											</section>

									<? 
											} // if ( !$querydomain )
									?>

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

										new Wax.Validate($,'seo-request-consultation');

										var _clicker	= $('#form-reveal');
										var _wrapper  	= $('#seo-request-consultation');
										var _isOpen 	= false;

										_wrapper.hide();
										_clicker.on({
											'click' : function(){
												if(!_isOpen){
													_wrapper.slideDown();
													_isOpen = true;
													    $('html, body').animate({
													        scrollTop: $('section.feature-form').offset().top
													    }, 2000);
												} else {
													_wrapper.slideUp();
													_isOpen = false;
												}
											}
										});

									});

								})(jQuery);

							</script>
							<!-- /logic -->

						</article>

					</div>

				</div>

			</section>

<?php get_footer(); ?>