<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    
	<?php print render($title_prefix); ?>
    <?php if ($block->subject): ?>
    	<div class="fancy-header2">
        	<h4><?php print $block->subject;?></h4>
            <h2 class="highlight"><?php print $subtitle; ?></h2>
        </div>
    <?php endif;?>
    <?php print render($title_suffix); ?>
	<div class="rnr-animate animated" data-effect="fadeInUp">
		<?php print $content ;?>
    </div>
                
</div>