<?php if(theme_get_setting('header_background_type', 'jarvis') == 'callout-text') : ?>
<div id="home" class="page9 section home-parallax fullscreen pagescroll home" style="background-image:url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('design_static_bg_path', 'jarvis'))); ?>)"><!-- SECTION -->

  <div class="rnr-offset"  data-section="home"></div>
  
  <!--BEGIN HOME SECTION -->
  
  <div class="home-text-wrapper">
  
  
      <div data-effect="fadeInUp" class="container clearfix home1 rnr-animate animated">
          <div class="home-quote">
              <h1>
                  <span class="slabtext"><?php print theme_get_setting('header_text1', 'jarvis'); ?></span>
                  <span class="slabtext second-child "><?php print theme_get_setting('header_text2', 'jarvis'); ?></span>
                  <span class="slabtext"><?php print theme_get_setting('header_text3', 'jarvis'); ?></span>
              </h1>
          </div>
      </div>
      
      <a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
  </div><!-- END HOME TEXT WRAPPER -->
      
  <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'callout-text-2') : ?>

<!-- HEADER SECTION -->	

<div id="home" class="page9 section home-parallax fullscreen pagescroll home" style="background-image:url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('design_static_bg_path', 'jarvis'))); ?>)"><!-- SECTION -->

    <div class="rnr-offset"  data-section="home"></div>
    
    
    <!--BEGIN HOME SECTION -->
    
    <div class="home-text-wrapper">
    
    
    	<div data-effect="fadeInUp" class="home4 rnr-animate animated">
    		<div class="container clearfix">
    			<div class="home-quote">
                    <h1>
                    	<span class="slabtext"><?php print theme_get_setting('header_text1', 'jarvis'); ?></span>
                    	<span class="slabtext second-child "><?php print theme_get_setting('header_text2', 'jarvis'); ?></span>
                    </h1>
    			</div>
    		</div>
    	</div>
    
    	<a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'text-slider') : ?>

<!-- HEADER SECTION -->

<?php
	$hd_vd_slide = theme_get_setting('hd_vd_slide', 'jarvis');
?>
 
<div id="home" class="page9 section home-parallax fullscreen  home" style="background-image:url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('design_static_bg_path', 'jarvis'))); ?>)"><!-- SECTION -->

    <div class="rnr-offset"  data-section="home"></div>
    
    
    <!--BEGIN HOME SECTION -->
    
    <div class="home-text-wrapper">
    
    
        <div id="home-slider" class="flexslider"><div data-effect="fadeInUp" class="rnr-animate animated">			
        	<ul class="slides styled-list">
                <?php
                	foreach($hd_vd_slide as $key => $value) :
						print '<li class="home-slide"><p class="home-slide-content">'.$hd_vd_slide[$key]['des'].'</p></li>';
					endforeach;
				?>
        	</ul>
        </div></div>
        
        <a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'bg-image-slider') : ?>

<!-- HEADER SECTION -->	

<div id="home" class="page9 section home-fullscreenslider full-background fullscreen  home"><!-- SECTION -->

    <div class="rnr-offset"  data-section="home"></div>
    
    <!--BEGIN HOME SECTION -->
    
    <div class="home-text-wrapper">
    
        <div data-effect="fadeInUp"class="home3 rnr-animate animated">
        	<div class="container clearfix">
        		<div class="home-quote">
        			<h1>
        				<span class="slabtext"><?php print theme_get_setting('header_text1', 'jarvis'); ?></span>
        				<span class="slabtext highlight"><?php print theme_get_setting('header_text2', 'jarvis'); ?></span>
        				<span class="slabtext"><?php print theme_get_setting('header_text3', 'jarvis'); ?></span>
        				<span class="slabtext"><?php print theme_get_setting('header_text4', 'jarvis'); ?></span>
        			</h1>
        		</div>
        	</div>
        </div>
        
        <a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'full-slider') : ?>

<!-- HEADER SECTION -->	

<div id="home" class="page9 section home-fullscreenslider fullscreen  home"><!-- SECTION -->

    <div class="rnr-offset"  data-section="home"></div>
    
    
    <!--BEGIN HOME SECTION -->
    
    <div class="home-text-wrapper"> 
    
        <div class="slider-text clearfix">
            <div class="container">
            
            	<div class="sixteen columns">
            		<div id="slidecaption"></div>
            	</div>
            
            	<div class="sixteen columns">
            		<a id="prevslide" class="load-item"></a>
            		<a id="nextslide" class="load-item"></a>
            	</div>
        	</div>
    	</div>	

    	<a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'circle-quote') : ?>

<!-- HEADER SECTION -->	

<div id="home" class="page9 section home-parallax fullscreen  home" style="background-image:url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('design_static_bg_path', 'jarvis'))); ?>)"><!-- SECTION -->
    
     <div class="rnr-offset"  data-section="home"></div>
        
     <!--BEGIN HOME SECTION -->
    
     <div class="home-text-wrapper">
                
        <div data-effect="fadeInUp"class="home3 rnr-animate animated">
            <div class="container clearfix">
                <div class="home-quote">
                    <h1>
                    	<span class="slabtext"><?php print theme_get_setting('header_text1', 'jarvis'); ?></span>
                    	<span class="slabtext highlight"><?php print theme_get_setting('header_text2', 'jarvis'); ?></span>
                    	<span class="slabtext"><?php print theme_get_setting('header_text3', 'jarvis'); ?></span>
                    	<span class="slabtext"><?php print theme_get_setting('header_text4', 'jarvis'); ?></span>
                    </h1>
                </div>
            </div>
        </div>
        
        <a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'vimeo') : ?>

<!-- HEADER SECTION -->	

<div id="home" class="page9 section home-video fullscreen  home"><!-- SECTION -->

    <div class="rnr-offset"  data-section="home"></div>
    
    <!--BEGIN HOME SECTION -->
    
    <div class="home-background-vimeo rnr-video"></div> 
    
    <div class="home-text-wrapper">
    
        <div class="home-logo-text light">
        	<a href="#about"><?php print theme_get_setting('header_text', 'jarvis'); ?></a>
        </div>  

    	<a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'youtube') : ?>

<div id="home" class="page250 section home-video fullscreen  home"><!-- SECTION -->
 
    <div class="rnr-offset"  data-section="home"></div>
    
    <!--BEGIN HOME SECTION -->
    
    <div id="home-background-video" class="rnr-video"></div>
    <?php (theme_get_setting('design_vimeo_mute', 'jarvis')) ? print '<a href="#" class="rnr-video-control rnr-unmute">Mute</a>' : print '<a href="#" class="rnr-video-control rnr-mute">Unmute</a>' ?>
    
    <div class="home-text-wrapper">
    
        <div data-effect="fadeInUp" class="container clearfix home1 rnr-animate animated">
            <div class="home-quote">
                <h1>
                	<span class="slabtext"><?php print theme_get_setting('header_text1', 'jarvis'); ?></span>
                	<span class="slabtext second-child "><?php print theme_get_setting('header_text2', 'jarvis'); ?></span>
                	<span class="slabtext"><?php print theme_get_setting('header_text3', 'jarvis'); ?></span>
                </h1>
            </div>
        </div>
        
        <a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php if (theme_get_setting('design_vimeo_mute', 'jarvis')) : ?>
<a id="rnr-background-video" class="rnr-video-player" data-property="{ videoURL : '<?php print theme_get_setting('design_youtube', 'jarvis'); ?>' , containment : '#home-background-video' , mute : 1, startAt : 0, stopAt : 0, opacity : 1, optimizeDisplay: true, autoPlay : true, vol: 0, showControls: false, loop: 0}"></a>
<?php else: ?>
<a id="rnr-background-video" class="rnr-video-player" data-property="{ videoURL : '<?php print theme_get_setting('design_youtube', 'jarvis'); ?>' , containment : '#home-background-video' , mute : 0, startAt : 0, stopAt : 0, opacity : 1, optimizeDisplay: true, autoPlay : true, vol: 100, showControls: false, loop: 0}"></a>
<?php endif; ?>

<?php elseif(theme_get_setting('header_background_type', 'jarvis') == 'simplenews') : ?>

<div id="home" class="page9 section home-parallax fullscreen  home"><!-- SECTION -->

    <div class="rnr-offset"  data-section="home"></div>
    
    <!--BEGIN HOME SECTION -->
    
    <div class="home-text-wrapper">

        <?php
		  $block = module_invoke('simplenews', 'block_view', 14);
		  $block_obj = block_load('simplenews', 14);
		?>
        <div data-effect="fadeInUp" class="container clearfix home1 rnr-animate animated">
    		<div class="home-quote">
                <h1>
                	<span class="slabtext  highlight"><?php print $block_obj->title; ?></span>
                </h1>
    		</div>
    	</div>
        <?php
		  print $block['content']; 
		?>
    
    	<a class="scroll-down scroll-to" href="#about"><span data-effect="bounce" class="rnr-animate icon icon-angle-down animated"></span></a>  
    </div><!-- END HOME TEXT WRAPPER -->
    
    <div class="rnr-scroll-up" data-section="home" ></div>  

</div><!--END SECTION -->

<?php endif; ?>