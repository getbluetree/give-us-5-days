<?php

include_once './' . drupal_get_path('theme', 'jarvis') . '/inc/template.process.inc';
include_once './' . drupal_get_path('theme', 'jarvis') . '/inc/template.node.process.inc';
/**
 * Global $base_url
 */
function base_url() {
    global $base_url;
    return $base_url;
}
/**
 * Implements theme_field__field_type().
 */
function jarvis_field__taxonomy_term_reference($variables) {
    $output = '';

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
    }

    // Render the items.
    $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
    foreach ($variables['items'] as $delta => $item) {
        $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
    }
    $output .= '</ul>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

    return $output;
}

/**
 * Override of theme('textarea').
 * Deprecate misc/textarea.js in favor of using the 'resize' CSS3 property.
 */
function jarvis_textarea($variables) {
    $element = $variables['element'];
    $element['#attributes']['name'] = $element['#name'];
    $element['#attributes']['id'] = $element['#id'];
    $element['#attributes']['cols'] = $element['#cols'];
    $element['#attributes']['rows'] = $element['#rows'];
    _form_set_class($element, array('form-textarea'));

    $wrapper_attributes = array(
        'class' => array('form-textarea-wrapper'),
    );

    // Add resizable behavior.
    if (!empty($element['#resizable'])) {
        $wrapper_attributes['class'][] = 'resizable';
    }

    $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
    $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
    $output .= '</div>';
    return $output;
}

/**
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function jarvis_form_alter(&$form, &$form_state, $form_id) {
    if (strpos($form_id,"webform_client_form") === false) {
        switch ($form_id) {
            case 'user_login':
                $form['name']['#attributes']['class'][] = 'form-control input-lg';
                $form['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
                $form['name']['#suffix'] = '</div>';
                $form['pass']['#attributes']['class'][] = 'form-control input-lg';
                $form['pass']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
                $form['pass']['#suffix'] = '</div>';
                $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
                $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
                break;
            case 'user_register_form':
                $form['account']['name']['#attributes']['class'][] = 'form-control input-lg';
                $form['account']['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
                $form['account']['name']['#suffix'] = '</div>';
                $form['account']['mail']['#attributes']['class'][] = 'form-control input-lg';
                $form['account']['mail']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
                $form['account']['mail']['#suffix'] = '</div>';
                $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
                $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
                break;
            case 'user_login_block':
                $form['name']['#attributes']['class'][] = 'form-control input-lg';
                $form['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
                $form['name']['#suffix'] = '</div>';
                $form['pass']['#attributes']['class'][] = 'form-control input-lg';
                $form['pass']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
                $form['pass']['#suffix'] = '</div>';
                $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
                $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
                break;
            case 'user_pass':
                $form['name']['#attributes']['class'][] = 'form-control input-lg';
                $form['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
                $form['name']['#suffix'] = '</div>';
                $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
                $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
                break;				
			case 'simplenews_block_form_14':
				$form['#attributes']['class'][] = 'form mc4wp-form';
				$form['mail']['#title_display'] = 'invisible';
				$form['mail']['#attributes']['placeholder'] = t('Your email address');
				$form['#prefix'] = '<div class="form-sign-up"><div class="form-sign-up-inner">';
				$form['#suffix'] = '</div></div>';
				
				$form['submit']['#attributes']['class'][] = 'f-primary-b';
				$form['submit']['#value'] = t('Sign Up');
				break;
        }
    } else {
        $form['#attributes']['class'][] = 'element-inline';
        $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
        $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
    }


}
/**
 * Process variables for comment.tpl.php.
 *
 * @see comment.tpl.php
 */
function jarvis_preprocess_comment(&$variables) {
    $comment = $variables['elements']['#comment'];
    $node = $variables['elements']['#node'];
    $variables['comment']   = $comment;
    $variables['node']      = $node;
    $variables['author']    = theme('username', array('account' => $comment));

    $variables['created']   = date('d F Y',$comment->created);

    // Avoid calling format_date() twice on the same timestamp.
    if ($comment->changed == $comment->created) {
        $variables['changed'] = $variables['created'];
    }
    else {
        $variables['changed'] = format_date($comment->changed);
    }

    $variables['new']       = !empty($comment->new) ? t('new') : '';
    $variables['picture']   = theme_get_setting('toggle_comment_user_picture') ? theme('user_picture', array('account' => $comment)) : '';
    $variables['signature'] = $comment->signature;

    $uri = entity_uri('comment', $comment);
    $uri['options'] += array('attributes' => array('class' => 'permalink', 'rel' => 'bookmark'));

    $variables['title']     = l($comment->subject, $uri['path'], $uri['options']);
    $variables['permalink'] = l(t('Permalink'), $uri['path'], $uri['options']);
    $variables['submitted'] = t('!username  on !datetime', array('!username' => $variables['author'], '!datetime' => date('d F Y',$comment->created)));

    // Preprocess fields.
    field_attach_preprocess('comment', $comment, $variables['elements'], $variables);

    // Helpful $content variable for templates.
    foreach (element_children($variables['elements']) as $key) {
        $variables['content'][$key] = $variables['elements'][$key];
    }

    // Set status to a string representation of comment->status.
    if (isset($comment->in_preview)) {
        $variables['status'] = 'comment-preview';
    }
    else {
        $variables['status'] = ($comment->status == COMMENT_NOT_PUBLISHED) ? 'comment-unpublished' : 'comment-published';
    }

    // Gather comment classes.
    // 'comment-published' class is not needed, it is either 'comment-preview' or
    // 'comment-unpublished'.
    if ($variables['status'] != 'comment-published') {
        $variables['classes_array'][] = $variables['status'];
    }
    if ($variables['new']) {
        $variables['classes_array'][] = 'comment-new';
    }
    if (!$comment->uid) {
        $variables['classes_array'][] = 'comment-by-anonymous';
    }
    else {
        if ($comment->uid == $variables['node']->uid) {
            $variables['classes_array'][] = 'comment-by-node-author';
        }
        if ($comment->uid == $variables['user']->uid) {
            $variables['classes_array'][] = 'comment-by-viewer';
        }
    }
}

/**
 * template_preprocess_user_picture()
 */
function jarvis_preprocess_user_picture(&$variables) {
    $variables['user_picture'] = '';
    if (variable_get('user_pictures', 0)) {
        $account = $variables['account'];
        if (!empty($account->picture)) {
            // @TODO: Ideally this function would only be passed file objects, but
            // since there's a lot of legacy code that JOINs the {users} table to
            // {node} or {comments} and passes the results into this function if we
            // a numeric value in the picture field we'll assume it's a file id
            // and load it for them. Once we've got user_load_multiple() and
            // comment_load_multiple() functions the user module will be able to load
            // the picture files in mass during the object's load process.
            if (is_numeric($account->picture)) {
                $account->picture = file_load($account->picture);
            }
            if (!empty($account->picture->uri)) {
                $filepath = $account->picture->uri;
            }
        }
        elseif (variable_get('user_picture_default', '')) {
            $filepath = variable_get('user_picture_default', '');
        }
        if (isset($filepath)) {
            $alt = t("@user's picture", array('@user' => format_username($account)));
            // If the image does not have a valid Drupal scheme (for eg. HTTP),
            // don't load image styles.
            if (module_exists('image') && file_valid_uri($filepath) && $style = variable_get('user_picture_style', '')) {
                $variables['user_picture'] = theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt, 'attributes' => array('class' => array('thumb img-rounded'))));
            }
            else {
                $variables['user_picture'] = theme('image', array('path' => $filepath, 'alt' => $alt, 'title' => $alt));
            }
            if (!empty($account->uid) && user_access('access user profiles')) {
                $attributes = array(
                    'attributes' => array('title' => t('View user profile.')),
                    'html' => TRUE,
                );
                $variables['user_picture'] = l($variables['user_picture'], "user/$account->uid", $attributes);
            }
        }
    }

}

/**
 * @param $variables
 * @return string
 * theme_links()
 */
function jarvis_links($variables) {
    $links = $variables['links'];
    $attributes = $variables['attributes'];
    $heading = $variables['heading'];
    global $language_url;
    $output = '';

    if (count($links) > 0) {
        $output = '';

        // Treat the heading first if it is present to prepend it to the
        // list of links.
        if (!empty($heading)) {
            if (is_string($heading)) {
                // Prepare the array that will be used when the passed heading
                // is a string.
                $heading = array(
                    'text' => $heading,
                    // Set the default level of the heading.
                    'level' => 'h2',
                );
            }
            $output .= '<' . $heading['level'];
            if (!empty($heading['class'])) {
                $output .= drupal_attributes(array('class' => $heading['class']));
            }
            $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
        }

        $output .= '<ul' . drupal_attributes($attributes) . '>';

        $num_links = count($links);
        $i = 1;

        foreach ($links as $key => $link) {
            $class = array($key);

            // Add first, last and active classes to the list of links to help out themers.
            if ($i == 1) {
                $class[] = 'first';
            }
            if ($i == $num_links) {
                $class[] = 'last';
            }
            if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
                && (empty($link['language']) || $link['language']->language == $language_url->language)) {
                $class[] = 'active';
            }
            $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

            if (isset($link['href'])) {
                // Pass in $link as $options, they share the same keys.
                $output .= l($link['title'], $link['href'], $link);
            }
            elseif (!empty($link['title'])) {
                // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
                if (empty($link['html'])) {
                    $link['title'] = check_plain($link['title']);
                }
                $span_attributes = '';
                if (isset($link['attributes'])) {
                    $span_attributes = drupal_attributes($link['attributes']);
                }
                $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
            }

            $i++;
            $output .= "</li>\n";
        }

        $output .= '</ul>';
    }

    return $output;
}
/**
 * Remove N/A options
 */
function jarvis_form_element($variables) {
$element = $variables['element'];
  // Disable radio button N/A
  if ($element['#type'] == 'radio' && $element['#return_value'] === '_none') {
      $variables['element']['#attributes']['disabled'] = TRUE;
  }
  return theme_form_element($variables);
}
/**
 * Check file path upload in theme setting
 */
function jarvis_theme_setting_check_path($path) {
    $path_scheme = file_uri_scheme($path);
    if ($path_scheme == 'public') {
        $return_path = file_create_url($path);
    } else if (($path_scheme == 'http') || ($path_scheme == 'https')) {
        $return_path = $path;
    } else {
        $return_path = file_create_url(file_build_uri($path));
    }
    return $return_path;
}

function jarvis_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
}

/**
 * Override contact form template
 */
function jarvis_form_webform_client_form_47_alter(&$form, &$form_state) {
  $form['#prefix'] = '<div class="sixteen columns"><div class="wpcf7">';
  $form['#suffix'] = '</div></div>';
  $form['#attributes']['class'][] = 'wpcf7-form';
  
  $form['submitted']['first_name']['#title_display'] = 'invisible';
  $form['submitted']['first_name']['#attributes'] = array('placeholder' => t('First name'), 'required' => 'required');
  $form['submitted']['first_name']['#attributes']['contenteditable'][] = 'true';
  $form['submitted']['first_name']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required';
  $form['submitted']['first_name']['#prefix'] = '<div class="side-by-side clearfix"><div class="wpcf7-form-control-wrap first-name">';
  $form['submitted']['first_name']['#suffix'] = '</div>';
  
  $form['submitted']['last_name']['#title_display'] = 'invisible';
  $form['submitted']['last_name']['#attributes'] = array('placeholder' => t('Last name'), 'required' => 'required');
  $form['submitted']['last_name']['#attributes']['contenteditable'][] = 'true';
  $form['submitted']['last_name']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required';
  $form['submitted']['last_name']['#prefix'] = '<div class="wpcf7-form-control-wrap last-name">';
  $form['submitted']['last_name']['#suffix'] = '</div></div>';

  $form['submitted']['email']['#title_display'] = 'invisible';
  $form['submitted']['email']['#attributes'] = array('placeholder' => t('Email address'), 'required' => 'required');
  $form['submitted']['email']['#attributes']['contenteditable'][] = 'true';
  $form['submitted']['email']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email';
  $form['submitted']['email']['#prefix'] = '<div class="full clearfix"><div class="wpcf7-form-control-wrap your-email">';
  $form['submitted']['email']['#suffix'] = '</div></div>';
  
  $form['submitted']['message']['#title_display'] = 'invisible';
  $form['submitted']['message']['#attributes'] = array('placeholder' => t('Message Content'), 'required' => 'required');
  $form['submitted']['message']['#attributes']['contenteditable'][] = 'true';
  $form['submitted']['message']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required';
  $form['submitted']['message']['#prefix'] = '<div class="full clearfix"><div class="wpcf7-form-control-wrap textarea-782">';
  $form['submitted']['message']['#suffix'] = '</div></div>';

  $form['actions']['submit']['#prefix'] = '<div class="stretch-submit">';
  $form['actions']['submit']['#suffix'] = '</div>';
  $form['actions']['submit']['#value'] = 'Send';
  $form['actions']['submit']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-submit';
}
/**
 * @see template_preprocess_block().
 * @param type $variables
 */
function jarvis_preprocess_block(&$vars) {
  $block = $vars['block'];
  $name  = $block->module . '-' . $block->delta;
  $vars['subtitle'] = variable_get($name, '');
}

function jarvis_form_comment_form_alter(&$form, &$form_state) {
	unset($form['actions']['preview']);
	unset($form['subject']);
	
	if($form['form_id']['#id'] == 'edit-comment-node-blog-form') {
		$form['#attributes']['class'][] = 'wpcf7-form';
		$form['#prefix'] = '<div class="wpcf7">';
  		$form['#suffix'] = '</div>';
		
		$form['author']['name']['#attributes'] = array('placeholder' => t('YOUR NAME*'));
		$form['author']['_author']['#title_display'] = 'invisible';
		$form['author']['name']['#title_display'] = 'invisible';
		$form['author']['name']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required';
		$form['author']['name']['#prefix'] = '<div class="wpcf7-form-control-wrap">';
  		$form['author']['name']['#suffix'] = '</div>';
		
		$form['field_comment_email']['und'][0]['email']['#attributes'] = array('placeholder' => t('YOUR MAIL*'));
		$form['field_comment_email']['und'][0]['email']['#title_display'] = 'invisible';
		$form['field_comment_email']['und'][0]['email']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required';
		$form['field_comment_email']['und'][0]['email']['#prefix'] = '<div class="wpcf7-form-control-wrap">';
  		$form['field_comment_email']['und'][0]['email']['#suffix'] = '</div>';
		
		$form['comment_body']['und'][0]['value']['#attributes'] = array('placeholder' => t('MESSAGE OR DESCRIPTION'));
		$form['comment_body']['und'][0]['value']['#title_display'] = 'invisible';
		$form['comment_body']['und'][0]['value']['#attributes']['class'][] = 'wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required';
		$form['comment_body']['und'][0]['value']['#prefix'] = '<div class="full clearfix"><div class="wpcf7-form-control-wrap">';
  		$form['comment_body']['und'][0]['value']['#suffix'] = '</div></div>';
		
		$form['actions']['submit']['#value'] = 'submit';
		$form['actions']['submit']['#attributes']['class'][] = 'comment-submit small button green form-submit';
		$form['actions']['submit']['#prefix'] = '<div class="wpcf7-form-control-wrap">';
  		$form['actions']['submit']['#suffix'] = '</div>';
	}
}

function jarvis_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => '',
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('current'),
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => '',
      );
    }
    return '<h2 class="element-invisible">' . t('Pages') . '</h2><div class="pagination">' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pages styled-list')),
    )).'</div>';
  }
}