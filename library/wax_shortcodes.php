<?php 

/* 
*  @intent  : Waxwing Interactive
*  @src     : Shortcodes.php
*  @comment : Pile of shortcodes, yo 
*/


//////////////////////////////////////////////////////////////////
// render_html
//////////////////////////////////////////////////////////////////

add_shortcode('render_html', 'shortcode_render_html');
function shortcode_render_html($atts) {
	 extract( shortcode_atts( array(
	      'file' => '',
     ), $atts ) );

	$html = file_get_contents( $_SERVER['DOCUMENT_ROOT'].'/html/'.$file, false);

	if(empty($html)){
		$html = '<div class="alert" style="color:red; text-align:center; margin:40px;">Error rendering document : '. $file.'</div>'; 
	};

	return $html;
}

//////////////////////////////////////////////////////////////////
// Wax Call To Action
//////////////////////////////////////////////////////////////////

add_shortcode('wax_cta', 'shortcode_wax_cta');
function shortcode_wax_cta($atts, $content = "") {
	extract( shortcode_atts( array(
		'action' 	=> 'email_subscribe',
		'btntxt'	=> 'Submit',
		'marketing' => ''
	), $atts ) );

	$html = '';

	switch ($action) {

		case 'email_subscribe':
			$html .= '<div id="wax-cta-simple" class="cta-wrap simple">';
			$html .= 	'<div class="content-wrap">';
			$html .=		'<div class="inner">'.$content.'</div>';
			$html .= 	'</div>';				
			$html .= 	'<div class="form-wrap">';
			$html .= 		'<form class="big-form validate clearfix" name="wax_cta" action="/form-processor.php" method="POST">';
			$html .=			'<input class="ignore" type="hidden" name="formtype" value="email_subscribe">';
			$html .=			'<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com :: CtA - Simple">';
			$html .=			'<input class="ignore" type="hidden" name="marketing" value="'.$marketing.'">';
			$html .= 			'<input class="input" name="email" type="text" placeholder="you@somewhere.com">';
			$html .=			'<button class="button submit large" type="button">'.$btntxt.'</button>';
			$html .= 		'</form>';
			$html .= 		'<script type="text/javascript">';
			$html .= 			'(function($){$(\'document\').ready(function(){new Wax.Validate($,\'wax-cta-simple\');});})(jQuery);';
			$html .= 		'</script>';			
			$html .= 	'</div>';
			$html .= '</div>';
			break;
		
		case 'lead_basic':
			$html .= '<div id="wax-cta-basic" class="cta-wrap basic">';
			$html .= 	'<div class="content-wrap col_twothird first">';
			$html .= 		'<div class="inner">'.$content.'</div>';			
			$html .= 	'</div>';	
			$html .= 	'<div class="form-wrap col_third last">';
			$html .= 		'<div class="inner">';
			$html .= 			'<form class="big-form validate clearfix" name="wax_cta" action="/form-processor.php" method="POST">';
			$html .=				'<input class="ignore" type="hidden" name="formtype" value="lead_generation">';
			$html .=				'<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com :: CtA - Basic">';
			$html .=				'<input class="ignore" type="hidden" name="marketing" value="'.$marketing.'">';
			$html .= 				'<input class="input" name="name" type="text" placeholder="Name">';
			$html .= 				'<input class="input" name="phone" type="text" placeholder="(555) 555-555">';
			$html .= 				'<input class="input" name="email" type="text" placeholder="you@somewhere.com">';
			$html .=				'<button class="button submit large" type="button">'.$btntxt.'</button>';
			$html .= 			'</form>';
			$html .= 		'</div>';	
			$html .= 		'<script type="text/javascript">';
			$html .= 			'(function($){$(\'document\').ready(function(){new Wax.Validate($,\'wax-cta-basic\');});})(jQuery);';
			$html .= 		'</script>';			
			$html .= 	'</div>';
			$html .= '</div>';
			break;

		case 'lead_complex':
			$html .= '<div id="wax-cta-complex" class="cta-wrap complex">';
			$html .= 	'<div class="content-wrap col_twothird first">';	
			$html .= 		'<div class="inner">'.$content.'</div>';			
			$html .= 	'</div>';	
			$html .= 	'<div class="form-wrap col_third last">';
			$html .= 		'<div class="inner">';
			$html .= 			'<form class="big-form validate clearfix" name="wax_cta" action="/form-processor.php" method="POST">';
			$html .=				'<input class="ignore" type="hidden" name="formtype" value="lead_generation">';
			$html .=				'<input class="ignore" type="hidden" name="origin" value="waxwinglegal.com :: CtA - Complex">';
			$html .=				'<input class="ignore" type="hidden" name="marketing" value="'.$marketing.'">';
			$html .= 				'<input class="input" name="name" type="text" placeholder="Name">';
			$html .= 				'<input class="input" name="email" type="text" placeholder="you@somewhere.com">';
			$html .= 				'<input class="input" name="phone" type="text" placeholder="(555) 555-555">';
			$html .= 				'<input class="input" name="domain" type="text" placeholder="www.domain.com">';
			$html .= 				'<input class="input" name="subject" type="text" placeholder="subject">';
			$html .= 				'<textarea class="input" name="message" type="text" placeholder="message"></textarea>';
			$html .=				'<button class="button submit large" type="button">'.$btntxt.'</button>';
			$html .= 			'</form>';
			$html .= 		'</div>';	
			$html .= 		'<script type="text/javascript">';
			$html .= 			'(function($){$(\'document\').ready(function(){new Wax.Validate($,\'wax-cta-complex\');});})(jQuery);';
			$html .= 		'</script>';			
			$html .= 	'</div>';
			$html .= '</div>';

			break;

		default:
			$html .= '<div class="cta-wrap">wax_cta[\'action\'] not defined!</div>';
			break;
	}

	return $html;
}

?>