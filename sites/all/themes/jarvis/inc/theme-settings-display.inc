<?php

/**
 * @file
 * Theme settings .
 */

function jarvis_theme_settings_display(&$form, &$form_state) {
	$form['jarvis_settings']['display'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -1,
		'#prefix'  				=> '<div id="md-display" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-display -->',
	);

	$form['jarvis_settings']['display']['display_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
					<li><a href="#s-map">Map</a></li>
                    <li><a href="#s-front">Frontpage settings</a></li>
				</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);

	$form['jarvis_settings']['display']['display_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);

    $form['jarvis_settings']['display']['map'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -8,
        '#prefix'  				=> '<div id="s-map" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #footer -->',
    );
    $form['jarvis_settings']['display']['map']['enable_map'] = array(
        '#type'             => 'checkbox',
        '#title'            => t('Enable Google Map'),
        '#default_value'     => theme_get_setting('enable_map')
    );
    $form['jarvis_settings']['display']['map']['map_setting'] = array(
        '#type'             => 'container',
        '#states'           => array(
            'visible'       => array(
                ':input[name=enable_map]' => array('checked' => true)
            )
        )
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_marker_title'] = array(
        '#type' 					=> 'textfield',
        '#title'					=> t('Marker Title'),
        '#default_value' 	        =>  theme_get_setting('map_marker_title') ? theme_get_setting('map_marker_title') : t('Megadrupal'),
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_marker_description'] = array(
        '#type' 					=> 'textarea',
        '#format'                   => 'full_html',
        '#title'					=> t('Marker Description'),
        '#resizable'                => FALSE,
        '#default_value' 	        =>  theme_get_setting('map_marker_description') ? theme_get_setting('map_marker_description') : t('Ha Noi , Viet Nam, Asia'),
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_latlng'] = array(
        '#type' 					=> 'textfield',
        '#title'					=> t('Google Map location'),
        '#default_value' 	        =>  theme_get_setting('map_latlng') ? theme_get_setting('map_latlng') : t('40.748395,-73.985542'),
        '#description'              =>  t('Find your map point by reading our documentation'),
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_types']   = array(
        '#type'         => 'select',
        '#title'        => t('Map types'),
        '#options'      => array(
            'ROADMAP'  => t('Road Map'),
            'SATELINE' => t('Sate Line'),
            'HYBRID'    => t('Hybrid'),
            'TERRAIN'   => t('Terrain'),
        ),
        '#default_value'    => theme_get_setting('map_types') ? theme_get_setting('map_types') : t('ROADMAP'),
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_zoom_level'] = array(
        '#type'         => 'textfield',
        '#title'        => t(' Map Zoom Level'),
        '#default_value'    => theme_get_setting('map_zoom_level') ? theme_get_setting('map_zoom_level') : 16,
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_marker_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to map marker icon'),
        '#default_value' =>  theme_get_setting('map_marker_path'),
        '#prefix' => '<div>',
        '#maxlength' => 1000,
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_marker_upload'] = array(
        '#type' => 'file',
        '#suffix' => '</div>'
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_logo_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to map logo'),
        '#default_value' =>  theme_get_setting('map_logo_path'),
        '#prefix' => '<div>',
        '#maxlength' => 1000,
    );
    $form['jarvis_settings']['display']['map']['map_setting']['map_logo_upload'] = array(
        '#type' => 'file',
        '#suffix' => '</div>'
    );


    $form['jarvis_settings']['display']['frontpage'] = array(
        '#type'             => 'fieldset',
        '#prefix'           => '<div id="s-front" class="md-tabcontent clearfix">',
        '#suffix'           => '</div><!-- / #footer -->',
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_htmllist'] = array(
        '#markup'               => '<div id="md-subtabs" class="md-subtabs">
                                <div class="md-subtabs-head">
                      <ul class="clearfix">
                        <li class="subtab-item clearfix first"> <a class="subtab-link" href="#aboutus">About Us</a> </li>
                        <li class="subtab-item clearfix"> <a class="subtab-link" href="#team">Our Team</a> </li>
                        <li class="subtab-item clearfix"> <a class="subtab-link" href="#services">Our Services</a> </li>
                        <li class="subtab-item clearfix"> <a class="subtab-link" href="#portfolio">Portfolio</a> </li>
                        <li class="subtab-item clearfix"> <a class="subtab-link" href="#blog">Our Journal</a> </li>
                        <li class="subtab-item clearfix last"> <a class="subtab-link" href="#contact">Contact</a> </li>
                      </ul>
                    </div>',
        '#weight'               => -15,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_htmllistclose'] = array(
        '#markup'               => '</div><!-- /#sub-tab -->',
        '#weight'               => 15,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_about'] = array(
        '#type'             => 'fieldset',
        '#title'            => t('<h3 style="border-bottom: none;">About Us Section</h3>'),
        '#prefix'           => '<div id="aboutus" class="md-subtabcontent clearfix">',
        '#suffix'           => '</div><!-- / #about us -->',
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_about']['frontpage_about_title'] = array(
        '#type'             => 'textfield',
        '#title'            => 'Section Title',
        '#default_value'    => theme_get_setting('frontpage_about_title') ? theme_get_setting('frontpage_about_title') : 'We are Jarvis',
        '#max_length'       => 1000,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_about']['frontpage_about_desc'] = array(
        '#type'             => 'textarea',
        '#title'            => 'Section Description',
        '#format'           => 'full_html',
        '#default_value'    => theme_get_setting('frontpage_about_desc') ? theme_get_setting('frontpage_about_desc') : 'We are utmost <span class="highlight">Creative Agency</span> located in Melbourne, Australia. Praesent rhoncus nunc <span class="highlight">vitae metus</span> condimentum viverra.',
        '#rows'             => 5,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_team'] = array(
        '#type'             => 'fieldset',
        '#title'            => t('<h3 style="border-bottom: none;">Our Team Section</h3>'),
        '#prefix'           => '<div id="team" class="md-subtabcontent clearfix">',
        '#suffix'           => '</div><!-- / #about us -->',
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_team']['frontpage_team_title'] = array(
        '#type'             => 'textfield',
        '#title'            => 'Section Title',
        '#default_value'    => theme_get_setting('frontpage_team_title') ? theme_get_setting('frontpage_team_title') : 'Our Team',
        '#max_length'       => 1000,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_team']['frontpage_team_desc'] = array(
        '#type'             => 'textarea',
        '#title'            => 'Section Description',
        '#format'           => 'full_html',
        '#default_value'    => theme_get_setting('frontpage_team_desc') ? theme_get_setting('frontpage_team_desc') : 'Professional &amp; Outstanding <span class="highlight">ideas</span> of our <span class="highlight">passionate team</span> makes us unique in every sense.',
        '#rows'             => 5,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_services'] = array(
        '#type'             => 'fieldset',
        '#title'            => t('<h3 style="border-bottom: none;">Our Services Section</h3>'),
        '#prefix'           => '<div id="services" class="md-subtabcontent clearfix">',
        '#suffix'           => '</div><!-- / #about us -->',
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_services']['frontpage_services_title'] = array(
        '#type'             => 'textfield',
        '#title'            => 'Section Title',
        '#default_value'    => theme_get_setting('frontpage_services_title') ? theme_get_setting('frontpage_services_title') : 'Our Services',
        '#max_length'       => 1000,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_services']['frontpage_services_desc'] = array(
        '#type'             => 'textarea',
        '#title'            => 'Section Description',
        '#format'           => 'full_html',
        '#default_value'    => theme_get_setting('frontpage_services_desc') ? theme_get_setting('frontpage_services_desc') : 'Our services are delivered by our team with <span class="highlight">years of experience</span> are <span class="highlight">passionate</span> about developing business.',
        '#rows'             => 5,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_porfolio'] = array(
        '#type'             => 'fieldset',
        '#title'            => t('<h3 style="border-bottom: none;">Porfolio Section</h3>'),
        '#prefix'           => '<div id="portfolio" class="md-subtabcontent clearfix">',
        '#suffix'           => '</div><!-- / #about us -->',
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_porfolio']['frontpage_porfolio_title'] = array(
        '#type'             => 'textfield',
        '#title'            => 'Section Title',
        '#default_value'    => theme_get_setting('frontpage_porfolio_title') ? theme_get_setting('frontpage_porfolio_title') : 'Portfolio',
        '#max_length'       => 1000,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_porfolio']['frontpage_porfolio_desc'] = array(
        '#type'             => 'textarea',
        '#title'            => 'Section Description',
        '#format'           => 'full_html',
        '#default_value'    => theme_get_setting('frontpage_porfolio_desc') ? theme_get_setting('frontpage_porfolio_desc') : 'Our Featured Works and Case Studies so far',
        '#rows'             => 5,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_blog'] = array(
        '#type'             => 'fieldset',
        '#title'            => t('<h3 style="border-bottom: none;">Our Journal Section</h3>'),
        '#prefix'           => '<div id="blog" class="md-subtabcontent clearfix">',
        '#suffix'           => '</div><!-- / #about us -->',
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_blog']['frontpage_blog_title'] = array(
        '#type'             => 'textfield',
        '#title'            => 'Section Title',
        '#default_value'    => theme_get_setting('frontpage_blog_title') ? theme_get_setting('frontpage_blog_title') : 'Our Journal',
        '#max_length'       => 1000,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_blog']['frontpage_blog_desc'] = array(
        '#type'             => 'textarea',
        '#title'            => 'Section Description',
        '#format'           => 'full_html',
        '#default_value'    => theme_get_setting('frontpage_blog_desc') ? theme_get_setting('frontpage_blog_desc') : 'Here\'s something you can know about what we are doing around lately.',
        '#rows'             => 5,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_contact'] = array(
        '#type'             => 'fieldset',
        '#title'            => t('<h3 style="border-bottom: none;">Contact Section</h3>'),
        '#prefix'           => '<div id="contact" class="md-subtabcontent clearfix">',
        '#suffix'           => '</div><!-- / #about us -->',
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_contact']['frontpage_contact_title'] = array(
        '#type'             => 'textfield',
        '#title'            => 'Section Title',
        '#default_value'    => theme_get_setting('frontpage_contact_title') ? theme_get_setting('frontpage_contact_title') : 'Contact',
        '#max_length'       => 1000,
    );
    $form['jarvis_settings']['display']['frontpage']['frontpage_contact']['frontpage_contact_desc'] = array(
        '#type'             => 'textarea',
        '#title'            => 'Section Description',
        '#format'           => 'full_html',
        '#default_value'    => theme_get_setting('frontpage_contact_desc') ? theme_get_setting('frontpage_contact_desc') : 'We\'d really love to <span class="highlight">hear from you</span> so why not drop us an email and <span class="highlight">we\'ll get back</span> to you as soon as we can.',
        '#rows'             => 5,
    );
}