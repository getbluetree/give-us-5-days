<?php
/**
 * @file
 * Returns the HTML for a wrapping container around comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728230
 */

// Render the comments and form first to see if we need headings.
$comments = render($content['comments']);
$comment_form = render($content['comment_form']);
?>
<section id="comments" class="comments <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($comments && $node->type != 'forum'): ?>
    <h3 class="heading"><span><?php print $node->comment_count.' '.t('Comments'); ?></span></h3>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="commentlist">
  	<?php print $comments; ?>
  </div>

  <?php if ($comment_form): ?>
    <h3 class="heading"><span><?php print t('Leave a Comment'); ?></span></h3>
    <?php print $comment_form; ?>
  <?php endif; ?>
</section>
