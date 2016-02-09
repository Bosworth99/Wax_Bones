			<footer id="page-footer" class="footer scaffold" role="contentinfo">

				<div id="inner-footer" class="container clearfix">
					<div id="footer-content" class="row">
						<div class="column_8 first">
						 	<nav role="navigation">
                            	<?php bones_footer_links(); ?>
                            </nav>
						</div>
						<div class="column_4 last">
							<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
								<?php dynamic_sidebar( 'footer1' ); ?>
							<?php endif; ?>
						</div>
					</div>

					<div id="footer-colophon" class="row">
						<div class="colophon">
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
						</div>
					</div>						

				</div>

			</footer>

		</div>
		
		<div id="fixed-wrapper">
			<span id="lifter">&nbsp;</span>
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
