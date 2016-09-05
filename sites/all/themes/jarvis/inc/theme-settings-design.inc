<?php

/**
 * @file
 * Theme settings .
 */

function jarvis_theme_settings_design(&$form, &$form_state) {
    global $base_url;
    $options = array();
    if(module_exists('icon')) {
        foreach (icon_bundles() as $bundle_name => $bundle) {
            if (!$bundle['status']) {
                continue;
            }
            foreach ($bundle['icons'] as $icon_key => $icon_value) {
                $icon_name = is_string($icon_key) ? $icon_key : $icon_value;
                if (is_array($icon_value) && isset($icon_value['name'])) {
                    $icon_name = $icon_value['name'];
                }
                $icon_title = is_string($icon_value) ? $icon_value : $icon_name;
                if (is_array($icon_value) && isset($icon_value['title'])) {
                    $icon_title = $icon_value['title'];
                }
                $options[$bundle['title']][$bundle['name'] . '|' . $icon_name] = $icon_title;
            }
            $icon_default_value = $options;
        }
        $icon_mark_up = '';
        $icon_fake_markup = '<ul class="list-icon">';
        foreach($icon_default_value as $key => $value) {
            $icon_mark_up .= '<option selected="selected" value="">- No Icon -</option><optgroup label="'.$key.'">';
            foreach ($icon_default_value[$key] as $key2 => $value2) {
                $fake_icon_explode = explode("|",$key2);
                $icon_fake_markup .= '<li><a href="javascript:;" class="fake-icon" icon-name="'.$fake_icon_explode[1].'" data-icon="'.$key2.'"><i class="'.$fake_icon_explode[0].' '.$fake_icon_explode[1].'"></i></a></li>';
                $icon_mark_up .= '<option value="'.$key2.'">'.$value2.'</option>';
            }
            $icon_mark_up .= '</optgroup>';
        }
        $icon_fake_markup .= '</ul>';
        drupal_add_js(array('iconMarkUp' => $icon_mark_up),'setting');
        drupal_add_js(array('iconFakeMarkUp' => $icon_fake_markup),'setting');
    }

	$form['jarvis_settings']['design'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -4,
		'#prefix'  				=> '<div id="md-design" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-design -->',
	);
	
	$form['jarvis_settings']['design']['design_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
				    <li><a href="#ds-skin">Skins</a></li>
				    <li><a href="#ds-menu">Menu</a></li>
				    <li><a href="#ds-sidebar">Sidebar</a></li>
				    <li><a href="#ds-header">Header</a></li>
					<li><a href="#ds-parallax">Parallax</a></li>
					<!--<li><a href="#ds-footer">Footer</a></li>-->
                    <!--<li><a href="#ds-nf">404 Page</a></li>-->
				</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);
	$form['jarvis_settings']['design']['design_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);

    /* 1.   Site Skins
     --------------------------------------------------------------------------*/
    $form['jarvis_settings']['design']['design_skin'] = array(
        '#type'             => 'fieldset',
        '#weight'           => -8,
        '#prefix'           => '<div id="ds-skin" class="md-tabcontent clearfix">',
        '#suffix'           => '</div><!-- / #ds-skin -->',
    );
    $form['jarvis_settings']['design']['design_skin']['skin_color'] = array(
        '#type'          => 'select',
        '#title'         => t('Skin Color'),
        '#default_value' => theme_get_setting('skin_color') ? theme_get_setting('skin_color') : 'default',
        '#options'          => array(
            'default'           => t('Default'),
            'blue'              => t('Blue'),
            'green'             => t('Green'),
            'light-violet'      => t('Pink'),
            'violet'            => t('Violet'),
            'orange'            => t('Orange'),
            'red'               => t('Red'),
        ),
    );
    /* 2.   Menu
    --------------------------------------------------------------------------*/
    $form['jarvis_settings']['design']['design_menu'] = array(
        '#type' 					=> 'fieldset',
        '#weight' 				=> -5,
        '#prefix'  				=> '<div id="ds-menu" class="md-tabcontent clearfix"><h3>Menu Configuration</h3>',
        '#suffix'        => '</div><!-- / #ds-general -->',
    );
    $form['jarvis_settings']['design']['design_menu']['menu_sticky'] = array(
        '#type' => 'checkbox',
        '#title'    => 'Enable Menu Sticky',
        '#default_value'    => theme_get_setting('menu_sticky')
    );
    $form['jarvis_settings']['design']['design_menu']['menu_style'] = array(
        '#type' => 'select',
        '#title'    => 'Choose menu style',
        '#default_value' => theme_get_setting('menu_style') ? theme_get_setting('menu_style') : 'light',
        '#options'          => array(
            'light'         => t('Light'),
            'dark'          => t('Dark'),
            'colored'       => t('Colored'),
            'transparent'   => t('Transparent'),
        ),
    );
    $form['jarvis_settings']['design']['design_menu']['menu_pos'] = array(
        '#type' => 'select',
        '#title'    => 'Choose menu position',
        '#default_value' => theme_get_setting('menu_pos') ? theme_get_setting('menu_pos') : 'bottom',
        '#options'          => array(
            'top'           => t('Top'),
            'bottom'        => t('Bottom'),
        ),
    );
    /* 3.Sidebar
    --------------------------------------------------------------------------*/
    $form['jarvis_settings']['design']['design_sidebar'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -5,
        '#prefix'  				=> '<div id="ds-sidebar" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['jarvis_settings']['design']['design_sidebar']['sidebar_position'] = array(
        '#type'          => 'select',
        '#title'         => t('Sidebar position'),
        '#default_value' => theme_get_setting('sidebar_position') ? theme_get_setting('sidebar_position') : 'right',
        '#options'       => array(
            'no'        => t('No sidebar'),
            'left'      => t('Left'),
            'right' 	=> t('Right'),
        ),
    );
    /* 4.   Header
    --------------------------------------------------------------------------*/
    $form['jarvis_settings']['design']['design_header'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -6,
        '#prefix'  				=> '<div id="ds-header" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['jarvis_settings']['design']['design_header']['header_background_type'] = array(
        '#type' => 'select',
        '#title'    => 'Choose header background type',
        '#options'  => array(
            'callout-text'      => 'Callout Text',
            'callout-text-2'    => 'Callout Text 2',
            'text-slider'       => 'Text Slider',
            'bg-image-slider'   => 'Background Image Slider',
            'full-slider'       => 'Fullscreen Slider',
            'circle-quote'      => 'Circle Quote',
            'vimeo'             => 'Vimeo Background',
            'youtube'           => 'Youtube Background',
            'simplenews'        => 'Simplenews Integration',
        ),
        '#default_value'    => theme_get_setting('header_background_type'),
        '#attributes'   => array(
            'class' => array('header-background-type')
        ),
    );
    $form['jarvis_settings']['design']['design_header']['header_text'] = array(
        '#type' => 'fieldset',
        '#title' => 'Custom Text Content',
        '#prefix' => '<div id="header-text-wrapper">',
        '#suffix' => '</div>',
        '#attributes' => array(
            'class' => array('header-text-wrapper'),
        )
    );
    $form['jarvis_settings']['design']['design_header']['header_text']['header_text'] = array(
        '#type' => 'textfield',
        '#title'    => 'Text Content',
        '#attributes' => array(
            'class' => array('header_text'),
        ),
        '#default_value'    => theme_get_setting('header_text', 'jarvis'),
        '#maxlength' => 1000,
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'vimeo'),
                ),
            ),
        ),
    );
    $form['jarvis_settings']['design']['design_header']['header_text']['header_text1'] = array(
        '#type' => 'textfield',
        '#title'    => 'Text Content 1',
        '#attributes' => array(
            'class' => array('header_text1'),
        ),
        '#default_value'    => theme_get_setting('header_text1', 'jarvis'),
        '#maxlength' => 1000,
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'callout-text'),
                    array('value' => 'callout-text-2'),
                    array('value' => 'bg-image-slider'),
                    array('value' => 'circle-quote'),
                    array('value' => 'youtube'),
                ),
            ),
        ),
    );
    $form['jarvis_settings']['design']['design_header']['header_text']['header_text2'] = array(
        '#type' => 'textfield',
        '#title'    => 'Text Content 2',
        '#attributes' => array(
            'class' => array('header_text2'),
        ),
        '#default_value'    => theme_get_setting('header_text2', 'jarvis'),
        '#maxlength' => 1000,
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'callout-text'),
                    array('value' => 'callout-text-2'),
                    array('value' => 'bg-image-slider'),
                    array('value' => 'circle-quote'),
                    array('value' => 'youtube'),
                ),
            ),
        ),
    );
    $form['jarvis_settings']['design']['design_header']['header_text']['header_text3'] = array(
        '#type' => 'textfield',
        '#title'    => 'Text Content 3',
        '#attributes' => array(
            'class' => array('header_text3'),
        ),
        '#default_value'    => theme_get_setting('header_text3', 'jarvis'),
        '#maxlength' => 1000,
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'callout-text'),
                    array('value' => 'bg-image-slider'),
                    array('value' => 'circle-quote'),
                    array('value' => 'youtube'),
                ),
            ),
        ),
    );
    $form['jarvis_settings']['design']['design_header']['header_text']['header_text4'] = array(
        '#type' => 'textfield',
        '#title'    => 'Text Content 4',
        '#attributes' => array(
            'class' => array('header_text4'),
        ),
        '#default_value'    => theme_get_setting('header_text4', 'jarvis'),
        '#maxlength' => 1000,
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'bg-image-slider'),
                    array('value' => 'circle-quote'),
                ),
            ),
        ),
    );

    /* -------------------------------------------Header Static Background -------------------------------------------------- */

    $form['jarvis_settings']['design']['design_header']['design_static_bg'] = array(
        '#type'   => 'fieldset',
        '#prefix' => '<div id="header-static-bg-wrapper">',
        '#suffix' => '</div>',
        '#attributes' => array(
            'class' => array('header-static-bg-wrapper'),
        )
    );
    $form['jarvis_settings']['design']['design_header']['design_static_bg']['design_static_bg_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to static background image'),
        '#default_value' =>  theme_get_setting('design_static_bg_path'),
        '#prefix' => '<div>',
        '#maxlength' => 1000,
    );
    $form['jarvis_settings']['design']['design_header']['design_static_bg']['design_static_bg_upload'] = array(
        '#type' => 'file',
        '#suffix' => '</div>'
    );

    /* -------------------------------------------Header Text Slider -------------------------------------------------- */
    $form['jarvis_settings']['design']['design_header']['header_video'] = array(
        '#type' => 'fieldset',
        '#prefix' => '<div id="header-video-wrapper">',
        '#suffix' => '</div>',
        '#attributes' => array(
            'class' => array('header-video-wrapper'),
        )
    );
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="hd-vd-content-wrapper" class="hd-vd-content-wrapper">',
        '#suffix'   => '</div>'
    );
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="hd-vd-slide-wrapper" class="hd-vd-slide-wrapper"><h3>Header Text Slide Content</h3>',
        '#suffix'   => '</div>'
    );
    $max_num = theme_get_setting('hd_vd_slide_max_num') ? theme_get_setting('hd_vd_slide_max_num') : 1;
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_popup_add_wrapper'] = array(
        '#markup'   => '<a class="add-more" data-preview="hd_vd_slide_preview" data-max-num="'.$max_num.'" href="#hd-vd-slide-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_popup_close_wrapper'] = array(
        '#markup' => '</div>'
    );
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="hd_vd_slide_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('hd_vd_slide_max_num') ? theme_get_setting('hd_vd_slide_max_num') : 1,
    );
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview']["hd_vd_preview_openhtml"] = array(
        '#markup'   => '<ul id="hd_vd_slide_sortable" class="sortable">'
    );
    if(theme_get_setting('hd_vd_slide') && count(theme_get_setting('hd_vd_slide')) > 1) {
        $hd_vd_slide = theme_get_setting('hd_vd_slide');
        foreach($hd_vd_slide as $key => $value) {
            $explode = explode("_",$key);
            end($explode);
            $num = current($explode);
            $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview'][$key.'_openhtml'] = array(
                '#markup' => '<li id="hd-vd-slide-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="hd-vd-slide-sortable-no'.substr($num,2).'">'
            );
            $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview'][$key]['hd_vd_slide_des_'.$num] = array(
                '#type' => 'textarea',
                '#title'    => 'Slide Description',
                '#resizable'    => FALSE,
                '#default_value'    => $hd_vd_slide[$key]['des'],
                '#format'   => 'full_html',
            );
            $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview'][$key.'_closehtml'] = array(
                '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
            );
        }
    } else {
        $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview']['hd_vd_slide_sortable_no1_openhtml'] = array(
            '#markup' => '<li id="hd-vd-slide-sortable-no1" class="draggable-item sortable-item toggle-item" data-num="1" data-id="hd-vd-slide-sortable-no1">'
        );
        $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview']['hd_vd_slide_des_no1'] = array(
            '#type' => 'textarea',
            '#title'    => 'Slide Description',
            '#resizable'    => FALSE,
            '#default_value'    => theme_get_setting('hd_vd_slide_des_no1'),
            '#format'   => 'full_html',
        );
        $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview']['hd_vd_slide_sortable_no1_closehtml'] = array(
            '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
        );
    }
    $form['jarvis_settings']['design']['design_header']['header_video']['hd_vd_content']['hd_vd_slide_content_wrapper']['hd_vd_slide_preview']["hd_vd_preview_closehtml"] = array(
        '#markup'   => '</ul>'
    );

    /* -------------------------------------------Header Images Slider -------------------------------------------------- */

    $form['jarvis_settings']['design']['design_header']['header_content'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="header-image-wrapper"><h2>Custom Header Slide</h2>',
        "#suffix"   => '</div>',
    );

    $form['jarvis_settings']['design']['design_header']['header_content']['header_content_wrapper'] = array(
        '#type' => ' fieldset',
        '#title' => 'Header Content Display',
        '#prefix'   => '<div id="header-content-wrapper">',
        '#suffix'   => '</div>'
    );

    $form['jarvis_settings']['design']['design_header']['header_content']['header_content_wrapper']['header_slide_effect'] = array(
        '#type' => 'select',
        '#prefix'   => '<div id="header-slide-effect">',
        '#suffix'   =>  '</div>',
        '#title'    => 'Choose Slide Image Effect',
        '#options'  => array(
            '0'     => 'None',
            '1'     => 'Fade',
            '2'     => 'Slide Top',
            '3'     => 'Slide Right',
            '4'     => 'Slide Bottom',
            '5'     => 'Slide Left',
            '6'     => 'Carousel Right',
            '7'     => 'Carousel Left',
        ),
        '#default_value'    => theme_get_setting('header_slide_effect') ? theme_get_setting('header_slide_effect') : '1',
        '#description' => 'Visit '.l('here','http://jqueryui.com/resources/demos/effect/easing.html').' for more detail. Some effect are removed for better display reason.',
    );

    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="hd-vd-slide-wrapper" class="hd-vd-slide-wrapper"><h3>Header Video Slide Content</h3>',
        '#suffix'   => '</div>'
    );
    $max_num = theme_get_setting('hd_slide_max_num') ? theme_get_setting('hd_slide_max_num') : 1;
    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_popup_add_wrapper'] = array(
        '#markup'   => '<a class="add-more" data-preview="hd_slide_preview" data-max-num="'.$max_num.'" href="#hd-slide-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_popup_close_wrapper'] = array(
        '#markup' => '</div>'
    );
    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="hd_slide_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('hd_slide_max_num') ? theme_get_setting('hd_slide_max_num') : 1,
    );
    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']["hd_slide_preview_openhtml"] = array(
        '#markup'   => '<ul id="hd_slide_sortable" class="sortable">'
    );
    if(theme_get_setting('hd_slide') && count(theme_get_setting('hd_slide')) > 1) {
        $hd_slide = theme_get_setting('hd_slide');
        foreach($hd_slide as $key => $value) {
            $explode = explode("_",$key);
            end($explode);
            $num = current($explode);
            $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key.'_openhtml'] = array(
                '#markup' => '<li id="hd-slide-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="hd-slide-sortable-no'.substr($num,2).'">'
            );
            $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_image_path_'.$num.''] = array(
                '#type' => 'textfield',
                '#title' => t('Path to custom background image'),
                '#default_value' =>  $hd_slide[$key]['image'],
                '#prefix' => '<div>',
                '#maxlength' => 1000,
            );
            $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_image_upload_'.$num.''] = array(
                '#type' => 'file',
                '#suffix' => '</div>'
            );
            $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_title_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Title',
                '#default_value'    => $hd_slide[$key]['title'],
                '#states'   => array(
                    // Hide the logo settings when using the default logo.
                    'visible' => array(
                        ':input[name="header_background_type"]' => array(
                            array('value' => 'full-slider'),
                        ),
                    ),
                ),
            );
            $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_des_'.$num] = array(
                '#type' => 'textarea',
                '#title'    => 'Description',
                '#resizable'    => FALSE,
                '#default_value'    => $hd_slide[$key]['des'],
                '#format'   => 'full_html',
                '#states'   => array(
                    // Hide the logo settings when using the default logo.
                    'visible' => array(
                        ':input[name="header_background_type"]' => array(
                            array('value' => 'full-slider'),
                        ),
                    ),
                ),
            );
            $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key.'_closehtml'] = array(
                '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
            );
        }
    } else {
        $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_sortable_no1_openhtml'] = array(
            '#markup' => '<li id="hd-slide-sortable-no1" class="draggable-item sortable-item toggle-item" data-num="1" data-id="hd-slide-sortable-no1">'
        );
        $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_image_path_no1'] = array(
            '#type' => 'textfield',
            '#title' => t('Path to custom background image'),
            '#default_value' =>  theme_get_setting('hd_slide_image_path_no1'),
            '#prefix' => '<div>',
            '#maxlength' => 1000,
        );
        $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_image_upload_no1'] = array(
            '#type' => 'file',
            '#suffix' => '</div>'
        );
        $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_title_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Title',
            '#resizable'    => FALSE,
            '#default_value'    => theme_get_setting('hd_slide_title_no1'),
            '#states'   => array(
                // Hide the logo settings when using the default logo.
                'visible' => array(
                    ':input[name="header_background_type"]' => array(
                        array('value' => 'full-slider'),
                    ),
                ),
            ),
        );
        $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_des_no1'] = array(
            '#type' => 'textarea',
            '#title'    => 'Description',
            '#resizable'    => FALSE,
            '#default_value'    => theme_get_setting('hd_slide_des_no1'),
            '#format'   => 'full_html',
            '#states'   => array(
                // Hide the logo settings when using the default logo.
                'visible' => array(
                    ':input[name="header_background_type"]' => array(
                        array('value' => 'full-slider'),
                    ),
                ),
            ),
        );
        $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_sortable_no1_closehtml'] = array(
            '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
        );
    }
    $form['jarvis_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']["hd_slide_preview_closehtml"] = array(
        '#markup'   => '</ul>'
    );

    /* -------------------------------------------Header Video -------------------------------------------------- */

    $form['jarvis_settings']['design']['design_header']['design_video_code'] = array(
        '#type'   => 'fieldset',
        '#title' => 'Video Link',
        '#prefix' => '<div id="header-video-code-wrapper">',
        '#suffix' => '</div>',
        '#attributes' => array(
            'class' => array('header-video-code-wrapper'),
        )
    );
    $form['jarvis_settings']['design']['design_header']['design_video_code']['design_vimeo'] = array(
        '#type' => 'textfield',
        '#title' => t('Vimeo video URL'),
        '#default_value' =>  theme_get_setting('design_vimeo'),
        '#description' => 'Enter the url of vimeo video. Ex: http://vimeo.com/95724016',
        '#prefix' => '<div>',
        '#maxlength' => 1000,
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'vimeo'),
                ),
            ),
        ),
    );
    $form['jarvis_settings']['design']['design_header']['design_video_code']['design_youtube'] = array(
        '#type' => 'textfield',
        '#title' => t('Youtube video URL'),
        '#default_value' =>  theme_get_setting('design_youtube'),
        '#description' => 'Enter the url of youtube video. Ex: https://www.youtube.com/watch?v=SZEflIVnhH8',
        '#prefix' => '<div>',
        '#maxlength' => 1000,
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'youtube'),
                ),
            ),
        ),
    );
    $form['jarvis_settings']['design']['design_header']['design_video_code']['design_vimeo_mute'] =  array(
        '#type' => 'checkbox',
        '#title'    => 'Mute',
        '#default_value'  => theme_get_setting('design_vimeo_mute'),
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="header_background_type"]' => array(
                    array('value' => 'vimeo'),
                    array('value' => 'youtube'),
                ),
            ),
        ),
    );
    

    /* 3.	Parallax
    --------------------------------------------------------------------------*/
    $form['jarvis_settings']['design']['design_parallax'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -7,
        '#prefix'  				=> '<div id="ds-parallax" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_htmllist'] = array(
        '#markup' 				=> '<div id="md-subtabs" class="md-subtabs">
								<div class="md-subtabs-head">
		              <ul class="clearfix">
		                <li class="subtab-item clearfix first"> <a class="subtab-link" href="#parallax-1-form">Parallax 1</a> </li>
		                <li class="subtab-item clearfix"> <a class="subtab-link" href="#parallax-2-form">Parallax 2</a> </li>
		                <li class="subtab-item clearfix last"> <a class="subtab-link" href="#parallax-3-form">Parallax 3</a> </li>
		                <li class="subtab-item clearfix last"> <a class="subtab-link" href="#parallax-4-form">Parallax 4</a> </li>
		                <li class="subtab-item clearfix last"> <a class="subtab-link" href="#parallax-5-form">Parallax 5</a> </li>
		              </ul>
		            </div>',
        '#weight' 				=> -15,
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_htmllistclose'] = array(
        '#markup' 				=> '</div><!-- /#sub-tab -->',
        '#weight' 				=> 15,
    );
    for($i=1;$i<=5;$i++){
        $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.''] = array(
            '#type'             => 'fieldset',
            '#title'            => t('<h2>Parallax '.$i.'</h2>'),
            '#description'      => t(''),
            '#prefix'  				=> '<div id="parallax-'.$i.'-form" class="md-subtabcontent clearfix">',
            '#suffix'        => '</div><!-- / #parallax-1 -->',
        );

        jarvis_prepare_parallax_form($form,$i);
    }



   // 4. ---------------------------------- Footer --------------------------------------------
    /*$form['jarvis_settings']['design']['design_footer'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -8,
        '#prefix'  				=> '<div id="ds-footer" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['jarvis_settings']['design']['design_footer']['footer_social'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="footer-social"><h3>Custom Social Account</h3>',
        '#suffix'   => '</div>',
    );
    $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft-social-acc-wrapper">',
        '#suffix'   => '</div>',
        '#attributes'   => array(
            'class' => array('ft-social-acc-wrapper'),
        )
    );
    $max_num = theme_get_setting('ft_social_max_num') ? theme_get_setting('ft_social_max_num') : 1;
    $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_popup_add_wrapper'] = array(
        '#markup'   => '<a class="add-more" data-preview="ft_social_preview" data-max-num="'.$max_num.'" href="#ft-social-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_popup_close_wrapper'] = array(
        '#markup' => '</div>'
    );
    $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft_social_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('ft_social_max_num') ? theme_get_setting('ft_social_max_num') : 1,
    );
    $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']["ft_social_preview_openhtml"] = array(
        '#markup'   => '<ul id="ft_social_sortable" class="sortable">'
    );
    if(theme_get_setting('ft_social') && count(theme_get_setting('ft_social')) > 1) {
        $social_acc = theme_get_setting('ft_social');
        foreach(theme_get_setting('ft_social') as $key => $value){
            $explode = explode("_",$key);
            end($explode);
            $num = current($explode);
            $social_icon = $social_acc[$key]['icon'];
            $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_openhtml'] = array(
                '#markup' => '<li id="ft-social-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="ft-social-sortable-no'.substr($num,2).'">'
            );
            if(module_exists('icon')) {
                $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key]['ft_social_icon_'.$num] = array(
                    '#type' => 'icon_selector',
                    '#title'    => 'Social Icon',
                    '#default_bundle' => isset($social_icon['bundle']) ? $social_icon['bundle'] : '',
                    '#default_icon' => $social_icon['icon'],
                    '#attributes'   => array(
                        'class' => array('icon-select'),
                        'id'    => array('footer-social-'.$num.'')
                    )
                );
            }


            $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key]['ft_social_link_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Social Link',
                '#attributes' => array(
                    'class' => array('social_link'),
                ),
                '#default_value' => $social_acc[$key]['link'],
                '#maxlength' => 1000,
            );
            $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_closehtml'] = array(
                '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
            );
        }
    } else {
        $social_icon_1 = theme_get_setting('ft_social_icon_1');
        $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_preview_openhtml'] = array(
            '#markup' => '<li id="ft-social-sortable-no1" class="draggable-item sortable-item toggle-item" data-num="1" data-id="ft-social-sortable-no1">'
        );
        if(module_exists('icon')) {
            $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_icon_no1'] = array(
                '#type' => 'icon_selector',
                '#title'    => 'Social Icon',
                '#default_bundle' => isset($social_icon_1['bundle']) ? $social_icon_1['bundle'] : '',
                '#default_icon' => $social_icon_1['icon'],
                '#attributes'   => array(
                    'class' => array('icon-select'),
                    'id'    => array('footer-social-no1')
                )
            );

        }

        $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_link_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Social Link',
            '#attributes' => array(
                'class' => array('ft_social_link'),
            ),
            '#default_value' => theme_get_setting('ft_social_link_no1'),
            '#maxlength' => 1000,
        );
        $form['jarvis_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_preview_closehtml'] = array(
            '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
        );
    }

    $form['jarvis_settings']['design']['design_footer']['footer_content_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft-content-wrapper">',
        '#suffix'   => '</div>'
    );
    $form['jarvis_settings']['design']['design_footer']['footer_content_wrapper']['footer_text'] = array(
        '#type' => 'textarea',
        '#format'   => 'full_html',
        '#title'    => 'Footer Text Display',
        '#resizable'    => false,
        '#default_value'    => theme_get_setting('footer_text') ? theme_get_setting('footer_text') : '© 2015 All Rights Reserved. Made with <i class="icon-heart"></i> by <a href="http://themeforest.net/user/RockNRollaDesigns">RockNRolla Designs</a> - Developed by <a href="http://themeforest.net/user/NooTheme">Nootheme</a>'
    );*/
    /* 6.
    --------------------------------- 404 Page -------------------------------------------*/
    /*$form['jarvis_settings']['design']['design_nf'] = array(
        '#type' 					=> 'fieldset',
        '#weight' 				=> -9,
        '#prefix'  				=> '<div id="ds-nf" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-general -->',
    );
    $form['jarvis_settings']['design']['design_nf']['nf_pattern_bg'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="nf-pattern-bg" class="nf-pattern-bg">',
        '#suffix' => '</div>',
    );
    $items = array();
    $path_data_dir = drupal_get_path('theme', 'jarvis') . '/images/background/patterns';
    $files = file_scan_directory($path_data_dir, '/.png$/');
    $pattern_css = "";
    foreach ($files as $file) {
        $items[$file->name] = t('Pattern ' . $file->name);
        $pattern_css .= '#nf'.$file->name.' {background:url(' . $base_url .'/'. drupal_get_path('theme', 'jarvis') . '/images/background/patterns/' . $file->name . '.png) repeat 0 0;}';
    }
    drupal_add_css($pattern_css, 'inline');


    $form['jarvis_settings']['design']['design_nf']['nf_pattern_bg']['choose_nf_pattern'] = array(
        '#type'          => 'select',
        '#title'         => t('Choose Pattern'),
        '#default_value' => theme_get_setting('choose_nf_pattern'),
        '#options'       => $items,
        '#prefix' => '<div id="design-nf-bg-pattern" class="clearfix">',
        '#suffix' => '</div>',
    );
    $form['jarvis_settings']['design']['design_nf']['nf_content'] = array(
        '#type' => 'fieldset',
        '#title'    => '<h3>404 Content</h3>'
    );
    $form['jarvis_settings']['design']['design_nf']['nf_content']['nf_text'] = array(
        '#type' => 'textfield',
        '#title'    => '404 Text Display',
        '#default_value' => theme_get_setting('nf_text') ? theme_get_setting('nf_text') : "404<i>Page not found</i>",
    );
    $form['jarvis_settings']['design']['design_nf']['nf_content']['nf_des'] = array(
        '#type' => 'textfield',
        '#title'    => '404 Description',
        '#default_value' => theme_get_setting('nf_des') ? theme_get_setting('nf_des') : "Sorry, the page you are looking for does not exist.",
    );*/
}



function jarvis_prepare_parallax_form(&$form, $i) {
    global $base_url;
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['parallax_'.$i.'_enabled'] = array(
        '#type'             => 'checkbox',
        '#title'            => t('Enable Parallax '.$i.''),
        '#default_value'    => theme_get_setting('parallax_'.$i.'_enabled'),
        '#suffix'           => '<div id="parallax-'.$i.'-custom">',
        '#attributes'   => array(
            'class' => array('enable-parallax'),
        )
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_bg_image_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to custom background image'),
        '#default_value' =>  theme_get_setting('pr_'.$i.'_bg_image_path'),
        '#maxlength' => 1000,
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_bg_image_upload'] = array(
        '#type' => 'file',
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_overlay_enable'] = array(
        '#type' => 'checkbox',
        '#title'    => 'Enable Parallax '.$i.' Overlay',
        '#attributes'   => array(
            'class' => array('enable-overlay')
        ),
        '#default_value'    => theme_get_setting('pr_'.$i.'_overlay_enable')
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_overlay_settings'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="pr-'.$i.'-overlay-settings">',
        '#suffix'   => '</div>'
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['parallax_'.$i.'_type'] = array(
        '#type' => 'select',
        '#title'    => 'Choose Parallax type',
        '#options'  => array(
            'quote'     => 'Quotes',
            'testi'     => 'Testimonials',
            'contact'   => 'Contact',
        ),
        '#default_value'    => theme_get_setting('parallax_'.$i.'_type'),
        '#attributes'   => array(
            'class' => array('pr-type')
        )
    );
    /* ----------------------------------------------    Parallax Quotes   ---------------------------------------------------- */

    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_quote'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="pr-'.$i.'-quote-wrapper" class="pr-quote-wrapper"><h3>Quotes</h3>',
        '#suffix'   => '</div>'
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_quote']['pr_'.$i.'_quote_content'] = array(
        '#type' => 'textfield',
        '#title' => 'Parallax '.$i.' Quote Content',
        '#default_value'    => theme_get_setting('pr_'.$i.'_quote_content') ? theme_get_setting('pr_'.$i.'_quote_content') : '',
        '#max_length'   => 1000,
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_quote']['pr_'.$i.'_quote_author'] = array(
        '#type' => 'textfield',
        '#title' => 'Parallax '.$i.' Quote Author',
        '#max_length'   => 1000,
        '#default_value'    => theme_get_setting('pr_'.$i.'_quote_author') ? theme_get_setting('pr_'.$i.'_quote_author') : ''
    );

    /* ----------------------------------------------    Parallax Testimonials   ---------------------------------------------- */

    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="pr-'.$i.'-skills-wrapper" class="pr-skill-wrapper"><h3>Testimonials</h3>',
        '#suffix'   => '</div>'
    );

    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div class="content-wrapper"><h3>Parallax Content</h3>',
        '#suffix'   => '</div>'
    );
    $max_num = theme_get_setting('pr_'.$i.'_skills_max_num') ? theme_get_setting('pr_'.$i.'_skills_max_num') : 1;
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_popup_add_wrapper'] = array(
        '#markup'   => '<a class="add-more" data-preview="pr_'.$i.'_skills_preview" data-max-num="'.$max_num.'" href="#pr-'.$i.'-skill-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_popup_close_wrapper'] = array(
        '#markup' => '</div>'
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="pr_'.$i.'_skills_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skill_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('pr_'.$i.'_skills_max_num') ? theme_get_setting('pr_'.$i.'_skills_max_num') : 1,
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview']["pr_'.$i.'_skills_preview_openhtml"] = array(
        '#markup'   => '<ul id="pr_'.$i.'_skills_sortable" class="sortable">'
    );
    if(theme_get_setting('pr_'.$i.'_skill') && count(theme_get_setting('pr_'.$i.'_skill')) > 1) {
        $skills = theme_get_setting('pr_'.$i.'_skill');
        foreach($skills as $key => $value) {
            $explode = explode("_",$key);
            end($explode);
            $num = current($explode);
            $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview'][$key.'_openhtml'] = array(
                '#markup' => '<li id="pr-'.$i.'-skill-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="pr-'.$i.'-skill-sortable-no'.substr($num,2).'">'
            );
            $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview'][$key]['pr_'.$i.'_skill_title_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Author',
                '#resizable'    => FALSE,
                '#default_value'    => $skills[$key]['title']
            );
            $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview'][$key]['pr_'.$i.'_skill_des_'.$num] = array(
                '#type' => 'textarea',
                '#title'    => 'Content',
                '#default_value'    => $skills[$key]['des']
            );

            $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview'][$key.'_closehtml'] = array(
                '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
            );
        }
    } else {
        $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview']['pr_'.$i.'_skill_hidden_no1_openhtml'] = array(
            '#markup' => '<li id="pr-'.$i.'-skill-sortable-no1" class="draggable-item sortable-item toggle-item" data-num="1" data-id="pr-'.$i.'-skill-sortable-no1">'
        );
        $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview']['pr_'.$i.'_skill_title_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Author',
            '#default_value'    => theme_get_setting('pr_'.$i.'_skill_title_no1'),

        );
        $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview']['pr_'.$i.'_skill_des_no1'] = array(
            '#type' => 'textarea',
            '#title'    => 'Content',
            '#resizable'    => FALSE,
            '#default_value'    => theme_get_setting('pr_'.$i.'_skill_des_no1')
        );
        $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview']['pr_'.$i.'_skill_hidden_no1_closehtml'] = array(
            '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
        );
    }
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_skills']['pr_'.$i.'_skills_content_wrapper']['pr_'.$i.'_skills_preview']["pr_'.$i.'_skills_preview_closehtml"] = array(
        '#markup'   => '</ul>',
    );

    /* ---------------------------------------------------- Parallax Contact -----------------------------------------------*/

    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_contact'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="pr-'.$i.'-contact-wrapper" class="pr-contact-wrapper"><h3>Your contact</h3>',
        '#suffix'   => '</div>'
    );

    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_contact']['pr_'.$i.'_contact_content_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div class="content-wrapper"><h3>Parallax Content</h3>',
        '#suffix'   => '</div>'
    );

    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_contact']['pr_'.$i.'_contact_content_wrapper']['pr_'.$i.'_contact_email'] = array(
        '#type' => 'textfield',
        '#title'    => 'Contact Email',
        '#default_value'    => theme_get_setting('pr_'.$i.'_contact_email'),

    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_contact']['pr_'.$i.'_contact_content_wrapper']['pr_'.$i.'_contact_phone'] = array(
        '#type' => 'textfield',
        '#title'    => 'Contact Phone',
        '#default_value'    => theme_get_setting('pr_'.$i.'_contact_phone'),

    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['pr_'.$i.'_contact']['pr_'.$i.'_contact_content_wrapper']['pr_'.$i.'_contact_des_no1'] = array(
        '#type' => 'textarea',
        '#format' => 'full_html',
        '#title'    => 'Contact Description',
        '#resizable'    => FALSE,
        '#default_value'    => theme_get_setting('pr_'.$i.'_contact_des_no1')
    );
    $form['jarvis_settings']['design']['design_parallax']['parallax_'.$i.'']['parallax_'.$i.'_enable_close'] = array(
        '#markup' 	=> '</div>'
    );
}
function new_form_value($form,&$form_state){
    $form = array();
    for($i=1;$i<=5;$i++) {
        $form['pr_'.$i.''] = array(
            '#type' => 'fieldset',
        );
        $form['pr_'.$i.'']['pr_'.$i.'_skill_title'] = array(
            '#type' => 'textfield',
            '#title'    => 'Skill Title',
        );
        $form['pr_'.$i.'']['pr_'.$i.'_skill_des'] = array(
            '#type' => 'textfield',
            '#title'    => 'Skill Description',
        );
    }
    return $form;
}