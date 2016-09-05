<li class="blog-item rnr-column one_third">
	<div class="inner">
    	<div class="blog">
        	<a href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>" class="blog-image">
            	<img alt="" data-original="<?php print $fields['field_blog_thumbnail']->content; ?>" class="rnr-lazyload" src="<?php print $fields['field_blog_thumbnail']->content; ?>"/>
                <div class="blog-overlay">
                	<div class="thumb-info">
                    	<i class="icon icon-plus"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="blog-item-description">
			<div class="desc post-icon link"></div>
            <div class="post-details"> 
				<a href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>"><h4><?php print $fields['title']->content; ?></h4></a>
				<span class="date"><?php print $fields['created']->content; ?> </span><span class="post-comments"><?php print $fields['comment_count']->content; ?> <?php print t('Comments'); ?></span>
				<?php print $fields['body']->content; ?>
                <p><a href="<?php print $fields['path']->content; ?>" class="read-more-link"><?php print t('Read More'); ?> &rarr;</a></p>
			</div>
		</div>
    </div>
</li>