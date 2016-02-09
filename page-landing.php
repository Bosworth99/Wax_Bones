<?php
/*
Template Name: Page - Landing
*/
?>
<?php get_header(); ?>

			<section id="page-content" class="scaffold">

				<div id="inner-content" class="container clearfix">

					<div class="row">

						<div id="main" class="column_12 first last clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="page-<?php the_ID(); ?>" <?php post_class( 'landing-page clearfix' ); ?> >

								<!-- styles-->
								<link rel="stylesheet" id="features-css" href="/wp-content/themes/wax_bones/library/css/content/landing_forms.css" type="text/css" media="all">
								<!-- /styles -->
								<section id="landing-content" class="landing-form-layout">
									<div class="inner">
										<header class="landing-header">
											<h1><?php echo the_title(); ?></h1>
											<span class="watermark">&nbsp;</span>
										</header>
										<section class="landing-content">
											<?php the_content(); ?>
										</section>
										<footer class="landing-footer">
											<span class="watermark">&nbsp;</span>
										</footer>
									</div>
								</section>
							</article>

						<?php endwhile; else : ?>

							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e( 'Oops, Page Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php _e( 'This is the error message in the page-landing.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article>

						<?php endif; ?>

						</div>

					</div>

				</div>

			</section>

<?php get_footer(); ?>