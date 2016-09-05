<?php 
	$Title = $fields['title']->content;
	$Body = $fields['body']->content;
	$Images = $fields['field_blog_images']->content;
	$Video = $fields['field_blog_multimedia']->content;
	$PostDate = $fields['created']->content;
	$Author = $fields['name']->content;
	$Tags = $fields['field_blog_tags']->content;
	$Comment = $fields['comment_count']->content;
?>

<style>
	.single-image .flex-caption { display: none; }
</style>

<div class="post">
   <?php if(!empty($Video)):?>
		<?php if($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'audio') : ?>
        	<div class="post-media">
              <div class="fluid-width-video-wrapper" style="padding-top: 50%;">
                <iframe src="//w.soundcloud.com/player/?url=<?php print file_create_url($row->field_field_blog_multimedia[0]['rendered']['#file']->uri); ?>&amp;visual=1" ></iframe>
              </div>
            </div>
        <?php elseif($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'video') : ?>
        	<?php $uri = explode('v/',$row->field_field_blog_multimedia[0]['rendered']['#file']->uri); ?>
        	<div class="post-media">
              <div class="fluid-width-video-wrapper" style="padding-top: 50%;">
				<?php if($row->field_field_blog_multimedia[0]['rendered']['#file']->filemime == 'video/vimeo') : ?>
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

    <div class="post-title">
        <?php print $Title; ?>
    </div>
    
    <div class="post-meta">
        <?php print t('Posted by'); ?> <?php print $Author; ?> on <?php print $PostDate; ?><span><a href="blog-single.html#comments"><?php print $Comment; ?> <?php print t('Comments'); ?></a></span>
    </div>
                        
    <div class="post-content">
        <?php print $Body; ?>
    </div>
    
    <div class="post-tags styled-list">
        <i class="icon-tags"></i>
        <?php print $Tags; ?>
    </div>

</div>
