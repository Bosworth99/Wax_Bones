<?php
/*
Template Name: Page - Articles
*/
?>
<?php get_header(); ?>

			<!-- styles-->
			<link rel="stylesheet" id="featured-articles-css" href="/wp-content/themes/wax_bones/library/css/content/featured-articles.css" type="text/css" media="all">
			<!-- /logic -->

			<section id="page-content" class="scaffold">

				<div id="inner-content" class="container clearfix">

					<div id="main"  class="clearfix" role="main">

						<section id="featured-articles-header" class="row">

							<div id="marquee" class="marquee clearfix">
								<div class="col_half first">
									<div class="big-idea">
										<h1 class="header"><?php the_title(); ?></h1>
									</div>
								</div>
								<div class="col_half last"> 
									<div class="callout">
										<h2 class="header">Modern SEO Marketing Strategies</h2>
										<p>
											Our legal marketing experts are always staying up-to-date on the latest SEO techniques and trends. 
											Here you'll find current industry news to help you maximize your firm's marketing potential. 
										</p>
										<?php get_search_form(); ?>
									</div>
								</div>
							</div>

						</section> <!-- /#featured-articles-header -->

						<section id="featured-articles" class="row">

							<div class="articles inner">

							<?php
								$args 	= array( 
									'numberposts' 	=> '8',
									'post_type' 	=> 'post',
									'post_status' 	=> 'publish', 
									'orderby' 		=> 'post_date'
									);
								$recent_posts = wp_get_recent_posts( $args );
								$count 	= 0;
								foreach( $recent_posts as $recent ){
									$first = ($count==0)?'first':'';
									$last = ($count==2)?'last':'';
									$permalink = get_permalink($recent["ID"]);

									if ( has_post_thumbnail( $recent["ID"] ) ){
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'single-post-thumbnail' );
									}
							?>

							<?php 	if (!empty($first)) { ?>
								<div class="article-row clearfix">
							<?php 	} ?>

									<article id="post-<?php echo $recent["ID"]; ?>" class="article column_6 <?php echo $first; echo $last; ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
										<div class="wrap">
											<header class="entry-header clearfix">
												<h2 class="title"><a href="<?php echo $permalink; ?>" ><?php echo $recent["post_title"]; ?></a></h2>
												<small class="date">
													<?php printf(__( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), mysql2date('M j, Y', $recent['post_date']), mysql2date('M j, Y', $recent['post_date'])); ?>
													<span class="comments iconic-chat" title="<?php echo $recent["comment_count"]; ?> Comment(s)">&nbsp;<?php echo $recent["comment_count"]; ?></span>
												</small>													
											</header>

											<section class="entry-body clearfix">
												<p>	
													<?php if (isset($thumb)){ ?>
														<img src="<?php echo $thumb[0]; ?>" style="max-width:185px; height:auto; float:left; margin:5px 15px 10px 0;"/>
													<?php } ?>
													<?php echo $recent['post_excerpt']; ?>
												</p>
											</section>

											<footer class="entry-footer clearfix">
												<a class="button" href="<?php echo $permalink; ?>" >Read</a>
											</footer>
										</div>
									</article>

							<?php 	if (!empty($last)) { ?>
								</div>
							<?php 	} ?>

							<?
									// if we have a thumb, nuke it prior to next loop.
									if( isset($thumb) ){
										unset($thumb);
									}

									// two count rows
									$count++;
									if($count >= 2){
										$count = 0;
									}
								}
							?>
							</div>

							<div class="continue-reading">
								<h2><a href="/legal-blog">Continue Reading</a></h2>
							</div>

						</section> <!-- /#featured-articles -->

						<!-- styles & logic -->
						<script type="text/javascript">
						(function($){
							$('document').ready(function(){
								console.log('nothin');
							});
						})(jQuery);
						</script>
						<!-- /styles & logic -->

					</div>

				</div>

			</section>


<?php get_footer(); ?>