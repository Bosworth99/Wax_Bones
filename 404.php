<?php get_header(); ?>

			<div id="page-content" class="scaffold">

				<div id="inner-content" class="container clearfix">

					<div id="main" role="main">

						<div id="post-not-found" class="row">

							<div class="inner clearfix">

								<div class="column_12 first last">
									<section class="feature-form-layout">

										<header class="article-header header">
											<h1><?php _e( 'Page Not Found', 'bonestheme' ); ?></h1>
											<span class="watermark">&nbsp;</span>
										</header>

										<article class="hentry clearfix">

											<section class="entry-content">
												<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>
											</section>

											<section class="search">
												<p><?php get_search_form(); ?></p>
											</section>

											<footer class="article-footer">
												&nbsp;
											</footer>

										</article>

										<!-- styles & logic -->
										<link rel="stylesheet" id="features-css" href="/wp-content/themes/wax_bones/library/css/content/feature_forms.css" type="text/css" media="all">
										<script type="text/javascript" >

											(function($){ 

											})(jQuery);

										</script>
										<!-- /styles & logic -->

									</section>

								</div>

							</div>

						</div>

					</div>

				</div>
				
			</div>

<?php get_footer(); ?>
