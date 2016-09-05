<?php

/**
 * @file
 * Theme settings .
 */

function jarvis_theme_settings_pages(&$form, &$form_state) {
	$form['jarvis_settings']['pages'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -2,
		'#prefix'  				=> '<div id="md-pages" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-pages -->',
	);
	
	$form['jarvis_settings']['pages']['pages_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
				</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);
	$form['jarvis_settings']['pages']['pages_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);
	


}