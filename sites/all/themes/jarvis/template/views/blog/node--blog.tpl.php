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
$Images = render($content['field_blog_images']);
$Body = render($content['body']);
$Tags = render($content['field_blog_tags']);
$user = user_load($node->uid);
?>

<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

<div class="post">
   <?php if(isset($node->field_blog_multimedia['und'])):?>
		<?php if($node->field_blog_multimedia['und'][0]['file']->type == 'audio') : ?>
        	<div class="post-media">
              <div class="fluid-width-video-wrapper" style="padding-top: 50%;">
                <iframe src="//w.soundcloud.com/player/?url=<?php print file_create_url($node->field_blog_multimedia['und'][0]['file']->uri); ?>&amp;visual=1" ></iframe>
              </div>
            </div>
        <?php elseif($node->field_blog_multimedia['und'][0]['file']->type == 'video') : ?>
        	<?php $uri = explode('v/',$node->field_blog_multimedia['und'][0]['file']->uri); ?>
        	<div class="post-media">
              <div class="fluid-width-video-wrapper" style="padding-top: 50%;">
				<?php if($node->field_blog_multimedia['und'][0]['file']->filemime == 'video/vimeo') : ?>
                    <iframe src="http://player.vimeo.com/video/<?php print $uri[1]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ec155a" ></iframe>
                <?php else : ?>
                	<iframe src="http://www.youtube.com/embed/<?php print $uri[1]; ?>?feature=oembed" ></iframe>
				<?php endif; ?>
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

    <div class="post-title" id="node-title">
        <?php print $title; ?>
    </div>
                        
    <div class="post-content">
        <?php print $Body; ?>
    </div>
    
    <div class="post-tags">
        <i class="icon-tags"></i>
        <?php print $Tags; ?>
    </div>

</div>
</article>

<div id="blog-author" class="clearfix">
    <h3 class="heading"><span><?php print t('About the Author'); ?></span></h3>
    <?php print $user_picture; ?>
    <p><?php print ($user->field_user_description['und'][0]['value']); ?></p>
</div>
<?php print render($content['comments']); ?>