<?php
/*
Template Name: Page - Feature
*/
?>
<?php get_header(); ?>

			<section id="page-content" class="scaffold">

				<div id="inner-content" class="container clearfix">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div id="main" role="main">

						<article id="page-<?php the_ID(); ?>" <?php post_class( 'feature-page clearfix' ); ?> >
							<?php the_content(); ?>
						</article>

					</div>

					<?php endwhile; else : ?>

					<div id="main" class="column_12 first last clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">
							<header class="article-header">
								<h1><?php _e( 'Oops, Page Not Found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
							</section>
							<footer class="article-footer">
								<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
							</footer>
						</article>

					</div>

					<?php endif; ?>

				</div>

			</section>

<?php get_footer(); ?>