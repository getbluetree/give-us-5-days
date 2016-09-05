<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>

<?php
$Video = @str_replace(" ", "",$node->field_portfolio_video[$node->language][0]['value']);
$Images = render($content['field_portfolio_images']);
$Desc = render($content['field_portfolio_description']);
?>

<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

<div class="post">
   <?php if(!empty($Video)):?>
		<?php if(is_numeric($Video)):	?>
        <div class="post-media">
          <div class="fluid-width-video-wrapper" style="padding-top: 50%;">
            <iframe src="//player.vimeo.com/video/<?php print $Video;?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ff0179" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
          </div>
        </div>
        <?php else:?>
        <div class="post-media">
          <div class="fluid-width-video-wrapper" style="padding-top: 50%;">
            <iframe src="//www.youtube.com/embed/<?php print $Video;?>" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
          </div>
        </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="post-media">
        	<?php if(substr_count($Images, '<li>') > 1): ?>
                <div class="flexslider">
                    <ul class="slides">
                        <?php print $Images; ?>
                    </ul>
                </div>
            <?php else:?>
            	<div class="single-image">
					<div class="flexslider">
                        <ul class="slides">
                            <?php print $Images; ?>
                        </ul>
                    </div>
                </div>
			<?php endif; ?>
        </div>
   <?php endif; ?>

    <div class="post-title">
        <?php print $title; ?>
    </div>
                        
    <div class="post-content">
        <?php print $Desc; ?>
    </div>

</div>
</article>