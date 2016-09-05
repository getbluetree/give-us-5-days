<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
        print $styles;
        print $scripts;
        global $base_url;
    ?>
    <style type="text/css">
        <?php if (isset($googlewebfonts)): print $googlewebfonts; endif; ?>
        <?php if (isset($theme_setting_css)): print $theme_setting_css; endif; ?>
        <?php
        // custom typography
        if (isset($typography)): print $typography; endif;
        ?>
        <?php if (isset($custom_css)): print $custom_css; endif; ?>
    </style>
</head>
<body data-spy="scroll" data-target=".navigation" class="<?php print $classes; ?>" <?php print $attributes;?>>
<?php print $page_top; ?>
<?php print $page; ?>
<?php
print $page_bottom;
if (isset($footer_code)): print $footer_code; endif;
?>

<?php if(drupal_is_front_page()): ?>
	<?php if(theme_get_setting('header_background_type', 'jarvis') == 'bg-image-slider' || theme_get_setting('header_background_type', 'jarvis') == 'full-slider') : ?>
    	<?php
        	$hd_slide = theme_get_setting('hd_slide', 'jarvis');
		?>
		<script type="text/javascript">			  
				  
			$(document).ready(function() { 
		
			jQuery(function($){
						
						$.supersized({
						
							// Functionality
							slideshow               :   1,			// Slideshow on/off
							autoplay				:   1,			// Slideshow starts playing automatically
							start_slide             :   1,			// Start slide (0 is random)
							stop_loop			   :   0,			// Pauses slideshow on last slide
							random				  :   0,			// Randomize slide order (Ignores start slide)
							slide_interval          :   4000,		// Length between transitions
							transition              :   <?php theme_get_setting('header_slide_effect') ? print theme_get_setting('header_slide_effect') : print '1' ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
							transition_speed		:   1000,		// Speed of transition
							new_window			  :   1,			// Image links open in new window/tab
							pause_hover             :   0,			// Pause slideshow on hover
							keyboard_nav            :   1,			// Keyboard navigation on/off
							performance			 :   1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
							image_protect		   :   1,			// Disables image dragging and right click with Javascript
								   
							min_width		       :   0,			// Min width allowed (in pixels)
							min_height		      :   0,			// Min height allowed (in pixels)
							vertical_center         :   1,			// Vertically center background
							horizontal_center       :   1,			// Horizontally center background
							fit_always			  :   0,			// Image will never exceed browser width or height (Ignores min. dimensions)
							fit_portrait         	:   1,			// Portrait images will not exceed browser height
							fit_landscape		   :   0,			// Landscape images will not exceed browser width
									
							slide_links			 :   'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
							thumb_links			 :   0,			// Individual thumb links for each slide
							thumbnail_navigation    :   0,			// Thumbnail navigation
							slides 				  :   [						   
									<?php
										if(theme_get_setting('header_background_type', 'jarvis') == 'bg-image-slider') :
											foreach($hd_slide as $key => $value) :
												print "{image : '".jarvis_theme_setting_check_path($hd_slide[$key]['image'])."', title : '', thumb : '', url : '#'},";
											endforeach;
										else :
											foreach($hd_slide as $key => $value) :
												print "{image : '".jarvis_theme_setting_check_path($hd_slide[$key]['image'])."', title : '".$hd_slide[$key]['title']."<div class=\"slidedescription\">".$hd_slide[$key]['des']."</div>', thumb : '', url : '#'},";
											endforeach;
										endif;
									?>
							],		   
							progress_bar		:	0,			// Timer for each slide							
							mouse_scrub			 :	0
							
						});
					});
			
		});
		</script>
	<?php endif; ?>
    <?php if(theme_get_setting('header_background_type', 'jarvis') == 'vimeo') : ?>
    	<script type="text/javascript">
        	$(document).ready(function() {
				jQuery('.home-background-vimeo').okvideo({ 
					  video: '<?php print theme_get_setting('design_vimeo', 'jarvis') ?>', //set your vimeo video source here
					  loop: 0,
					  volume: <?php (theme_get_setting('design_vimeo_mute', 'jarvis')) ? print '0' : print '100' ?>,
					  adproof: true,// control the volume by setting a value from 0 to 99
					  autoplay: true
				});
			});
		</script>
    <?php endif; ?>
    <?php if(theme_get_setting('header_background_type', 'jarvis') == 'youtube') : ?>
    	<script type="text/javascript">
        	$(document).ready(function() {
				$(".rnr-video-player").mb_YTPlayer();		
				/* player mute control */
				$(".rnr-video-control").click(function(event){
					
					event.preventDefault();		
					
					if( $(".rnr-video-control").hasClass("rnr-unmute") ) {
						
						$(this).removeClass("rnr-unmute").addClass("rnr-mute").text("MUTE");														
						$(".rnr-video-player").unmuteYTPVolume();
						$(".rnr-video-player").setYTPVolume(100);
						
					} else if( $(".rnr-video-control").hasClass("rnr-mute") ){
						
						$(this).removeClass("rnr-mute").addClass("rnr-unmute").text("UNMUTE");
						$(".rnr-video-player").muteYTPVolume();							
						
					}
		  
				});
			});
		</script>
    <?php endif; ?>
<?php endif; ?>
<?php if(theme_get_setting('enable_map', 'jarvis') == true) : ?>
<script>
	$(document).ready(function() {
		if($("#google-map").size() > 0) {
			function initialize() {
			  var secheltLoc = new google.maps.LatLng(<?php print theme_get_setting('map_latlng', 'jarvis') ?>);
			  var myMapOptions = {
				   center: secheltLoc
				  ,mapTypeId: google.maps.MapTypeId.<?php print theme_get_setting('map_types', 'jarvis') ?>
				  ,zoom: <?php print theme_get_setting('map_zoom_level', 'jarvis') ?> , scrollwheel: false,mapTypeControl: true, zoomControl: true, draggable: false
			  };
			  var theMap = new google.maps.Map(document.getElementById("google-map"), myMapOptions);
			  var image = new google.maps.MarkerImage(
				  '<?php print(jarvis_theme_setting_check_path(theme_get_setting('map_marker_path', 'jarvis'))); ?>',
				  new google.maps.Size(17,26),
				  new google.maps.Point(0,0),
				  new google.maps.Point(8,26)
			  );
			  var shadow = new google.maps.MarkerImage(
				  '<?php print base_path().path_to_theme() ?>/images/pinMap-shadow.png',
				  new google.maps.Size(33,26),
				  new google.maps.Point(0,0),
				  new google.maps.Point(9,26)
			  );
			  var marker = new google.maps.Marker({
				  map: theMap,
				  icon: image,
				  shadow: shadow,
				  draggable: false,
				  animation: google.maps.Animation.DROP,
				  position: secheltLoc,
				  visible: true,
				  title: "<?php print theme_get_setting('map_marker_title', 'jarvis') ?>"
			  });
	  
			  var boxText = document.createElement("div");
			  boxText.innerHTML = '<div class="captionMap animated bounceInDown"><img src="<?php print(jarvis_theme_setting_check_path(theme_get_setting('map_logo_path', 'jarvis'))); ?>" class="alignleft"  alt="Contact Address"> <span><?php print theme_get_setting('map_marker_description', 'jarvis'); ?></span></div>';
	  
			  var myOptions = {
				   content: boxText
				  ,disableAutoPan: false,maxWidth: 0
				  ,pixelOffset: new google.maps.Size(-140, 0)
				  ,zIndex: null
				  ,boxStyle: { 
					  width: "280px"
				   }
				  ,closeBoxURL: ""
				  ,infoBoxClearance: new google.maps.Size(1, 1)
				  ,isHidden: false
				  ,pane: "floatPane"
				  ,enableEventPropagation: false
			  };
	  
			  google.maps.event.addListener(theMap, "click", function (e) {
				  ib.open(theMap, this);
			  });
	  
			  var ib = new InfoBox(myOptions);
			  ib.open(theMap, marker);
			  }
			  google.maps.event.addDomListener(window, 'load', initialize);
		}
	});
</script>
<script type='text/javascript' src='http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js?ver=2.1'></script>
<?php endif; ?>
</body>

</html>