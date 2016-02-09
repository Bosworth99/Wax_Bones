<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">		
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>

	
		<meta name="msapplication-TileColor" content="#ED2E12">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		
		<link rel="author" href="https://plus.google.com/u/0/101300168865609340798/posts">

	</head>

	<body <?php body_class(); ?>>

		<div id="page-wrapper" class="page-wrapper clearfix">

			<header id="page-header" class="header scaffold" role="banner">

				<div id="server-message" class="container">
					<div class="row">
						<div class="wrap">&nbsp;</div>
					</div>
				</div>

				<div id="inner-header" class="topbar container">

					<div id="header-actions" class="actions"> 
						<span class="reveal"><i class="icon-align-justify"></i></span>
					</div>

					<div class="row clearfix">

						<div id="header-branding" class="branding">
						<?php if ( is_home() ) { ?>
						    <h1 class="logo">
						    	<a href="<?php echo home_url(); ?>" rel="nofollow">
						    		<img class="mobile" src="/img/brands/WaxwingLegal_Wordmark_Vert.png" alt="Waxwing Legal Logo" />
						    		<img class="desktop" src="/img/brands/WaxwingLegal_Wordmark_Horiz.png" alt="Waxwing Legal Logo" />
							    </a>
							</h1>
						<?php } else { ?>
						    <h2 class="logo">
						    	<a href="<?php echo home_url(); ?>" rel="nofollow">
						    		<img class="mobile" src="/img/brands/WaxwingLegal_Wordmark_Vert.png" alt="Waxwing Legal Logo" />
						    		<img class="desktop" src="/img/brands/WaxwingLegal_Wordmark_Horiz.png" alt="Waxwing Legal Logo" />
						    	</a>
						    </h2>
						<?php } ?>
						</div>

						<div id="header-contact" class="contact clearfix">

							<div class="mobile">
								<div class="contact-item contact-phone">
									<a class="phone" href="tel:855.780.1081"><i class="icon-phone"></i></a>
								</div>
								<div class="contact-item contact-mail">
									<a class="mail" href="" ><i class="iconic-mail"></i></a>
								</div>
							</div>

							<div class="desktop">
								<div class="contact-item contact-phone">
									<a class="phone" href="tel:855.780.1081">(855) 780-1081</a>
								</div>
								<!--<div class="contact-item contact-mail">
									<a class="mail" href="" ><i class="iconic-mail"></i></a>
								</div>-->
								<div class="contact-item contact-social">
									<ul id="header-social-links" class="social-links">
										<li><a href="//www.facebook.com/waxwinglegal" class="fb" target="_blank">&nbsp;</a></li>
										<li><a href="//twitter.com/waxwinglegal" class="tw" target="_blank">&nbsp;</a></li>
										<li><a href="//plus.google.com/+Waxwinglegalmarketing/posts" class="gp" target="_blank">&nbsp;</a></li>
									</ul>
								</div>
							</div>
						</div>

						<nav id="header-nav" role="navigation" class="nav">
							<?php bones_main_nav(); ?>
						</nav>

					</div>

				</div>

			</header>