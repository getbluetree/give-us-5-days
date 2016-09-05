<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>> 
	<?php print render($title_prefix); ?>
    <?php if ($block->subject): ?>
        <div class="container">	
            <div class="row">	
                <div data-effect="fadeInUp" class="rnr-animate animated sixteen columns">            
                    <!-- START TITLE -->	            
                    <div class="title">
                        <h1 class="header-text"><?php print $block->subject;?></h1>                  
                        <div class="subtitle"><p><?php print $subtitle; ?></p></div><!-- END SUBTITLE -->
                    </div><!-- END TITLE -->  	                           
                </div><!-- END SIXTEEN COLUMNS -->  
            </div><!-- END ROW -->         
        </div><!-- END CONTAINER -->
    <?php endif;?>
    <?php print render($title_suffix); ?>
    <div class="container">	
		<div data-effect="fadeInUp" class="sixteen columns rnr-animate animate">     
        	<div class="full-width" style="color: #333333;background: #f6f6f6;">
				<div class="latest-blog row">
                	<?php print $content; ?>
            	</div>
      		</div>
         </div>
	</div>
</div>