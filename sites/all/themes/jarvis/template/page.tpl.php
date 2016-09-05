<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="load"></div>
  
<?php if(drupal_is_front_page()): ?>

<div class="page-wrap">
  <?php print $messages; ?>
  
  <?php if(theme_get_setting('menu_pos', 'jarvis') == 'top') : ?>
      <!-- START NAVIGATION -->
        <nav class=" navigation <?php print theme_get_setting('menu_style'); ?> <?php (theme_get_setting('menu_sticky')) ? print 'sticky-nav' : print 'normal-nav'; ?>">
         <!-- START CONTAINER -->	
          <div class="container clearfix">			
              <div class="four columns">			
                  <!-- START LOGO -->	
                  <div class="logo large">
                    <a href="#" class="back-to-top"><img src="<?php ($logo_path) ? print $logo_path : print $logo; ?>" alt="Logo"></a>
                  </div>
                  <!-- END LOGO -->		
              </div><!-- END FOUR COLUMNS -->                
             
               <!-- BEGIN NAVIGATION SECTION --> 
              <div class="twelve columns">            		
                  <!-- START NAVIGATION MENU ITEMS -->
                  <?php if (module_exists('i18n_menu')) {
                      $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
                    } else {
                      $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                    }
                    print drupal_render($main_menu_tree);?>
                  <!-- END NAVIGATION MENU ITEMS -->
              </div><!-- END TWELVE COLUMNS -->	
          </div><!-- END CONTAINER -->	
        </nav>
      <!-- END NAVIGATION -->
  <?php endif; ?>
  
  <?php if ($page['home_slider']): ?>
     <?php print render($page['home_slider']); ?>
  <?php endif; ?>
  
  <?php if(theme_get_setting('menu_pos', 'jarvis') == 'bottom') : ?>
      <!-- START NAVIGATION -->
        <nav class=" navigation <?php print theme_get_setting('menu_style'); ?> <?php (theme_get_setting('menu_sticky')) ? print 'sticky-nav' : print 'normal-nav'; ?>">
         <!-- START CONTAINER -->	
          <div class="container clearfix">			
              <div class="four columns">			
                  <!-- START LOGO -->	
                  <div class="logo large">
                    <a href="#" class="back-to-top"><img src="<?php ($logo_path) ? print $logo_path : print $logo; ?>" alt="Logo"></a>
                  </div>
                  <!-- END LOGO -->		
              </div><!-- END FOUR COLUMNS -->                
             
               <!-- BEGIN NAVIGATION SECTION --> 
              <div class="twelve columns">            		
                  <!-- START NAVIGATION MENU ITEMS -->
                  <?php if (module_exists('i18n_menu')) {
                      $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
                    } else {
                      $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                    }
                    print drupal_render($main_menu_tree);?>
                  <!-- END NAVIGATION MENU ITEMS -->
              </div><!-- END TWELVE COLUMNS -->	
          </div><!-- END CONTAINER -->	
        </nav>
      <!-- END NAVIGATION -->
  <?php endif; ?>
  
  <!-- START ABOUT US SECTION -->	
	<div id="about" class="page section about">
	
        <div class="container">	
           <div class="row">	
            <div data-effect="fadeInUp" class="sixteen columns rnr-animate animated">            
                <!-- START TITLE -->	            
                <div class="title">
                  <h1><?php print theme_get_setting('frontpage_about_title', 'jarvis');?></h1>
                  <div class="subtitle">
                      <?php print theme_get_setting('frontpage_about_desc', 'jarvis');?>
                  </div><!-- END SUBTITLE -->
                </div><!-- END TITLE -->  	                           
            </div><!-- END SIXTEEN COLUMNS -->  
           </div><!-- END ROW -->         
        </div><!-- END CONTAINER -->

    	
        <?php if ($page['about_us_top']): ?>
        <div class="fullwidth grey">
            <div class="container">  
                <div class="row">          
                	<?php print render($page['about_us_top']); ?>
                </div><!-- END ROW -->                            		
            </div><!-- END CONTAINER --> 
        </div>        
        <?php endif; ?>
        
        <?php if ($page['about_us_bottom']): ?>    
        <div class="container">  
           <div class="row">
           		<?php print render($page['about_us_bottom']); ?>
           </div><!-- END ROW -->
        </div><!-- END CONTAINER --> 
        <?php endif; ?>
        
                
      </div>
      <!-- End ABOUT US SECTION -->
      
      
      <?php if (theme_get_setting('parallax_1_enabled', 'jarvis') == true) : ?>
      <!-- START PARALLAX SECTION -->	
      <div id="parallax1" class="parallax" style="background-image: url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('pr_1_bg_image_path', 'jarvis'))); ?>)">
        <div class="<?php if(theme_get_setting('pr_1_overlay_enable')) : ?> parallax-overlay <?php endif; ?>">
            <div class="container clearfix">
                <div class="parallax-content">
                    <?php if(theme_get_setting('parallax_1_type') == 'quote') : ?>
                        <p data-effect="fadeInUp" class="quote rnr-animate animated">
                            <i class="icon icon-quote-left"></i>
                                <?php print theme_get_setting('pr_1_quote_content'); ?>
                            <i class="icon icon-quote-right"></i>
                        </p>
                        <div data-effect="fadeInUp" class="quote-author rnr-animate animated">&minus; <?php print theme_get_setting('pr_1_quote_author'); ?> &minus;</div>
                    <?php elseif(theme_get_setting('parallax_1_type') == 'testi') : ?>
                        <p data-effect="fadeInUp" class="testimonial-icon rnr-animate animated">
                            <i class="icon icon-quote-left"></i>
                        </p>
                        <h3 data-effect="fadeInUp" class="title rnr-animate animated">
                            <span><?php print t('What our Clients say'); ?></span>
                        </h3>
                        <div data-effect="fadeInUp" class="testimonial-slider rnr-animate animated">
                            <?php if(theme_get_setting('pr_1_skill') && count(theme_get_setting('pr_1_skill')) > 1) : ?>
                                <div class="flexslider testi">
                                    <ul class="slides styled-list">
                                        <?php $skills = theme_get_setting('pr_1_skill'); ?>
                                        <?php foreach($skills as $key => $value) : ?>
                                            <li class="testimonial-slide">
                                                <p class="client-testimonial"><?php print $skills[$key]['des']; ?></p>
                                                <div class="client-info"> <?php print $skills[$key]['title']; ?> </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                 </div>
                             <?php endif; ?>
                         </div>
                    <?php elseif(theme_get_setting('parallax_1_type') == 'contact') : ?>
                         <div data-effect="fadeInUp" class="contact-details rnr-animate animated">
                            <h2><?php print theme_get_setting('pr_1_contact_email') ?></h2>
                            <h1><?php print theme_get_setting('pr_1_contact_phone') ?></h1>
                            <h2><?php print theme_get_setting('pr_1_contact_des_no1') ?></h2>
                         </div>
                    <?php endif; ?>
                </div><!-- END PARALLAX CONTENT -->
            </div><!-- END CONTAINER -->
          </div>
          <!-- END PARALLAX SECTION -->
      </div>
      <?php endif; ?>
	
      
      <!-- START TEAM SECTION --> 
	  <div id="team" class="page">
		
		<div class="container">	
           <div class="row">	
			<div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">            
	            <!-- START TITLE -->	            
				<div class="title">
				  <h1><?php print theme_get_setting('frontpage_team_title', 'jarvis');?></h1>
                  <div class="subtitle">
                  	<?php print theme_get_setting('frontpage_team_desc', 'jarvis');?>
                  </div><!-- END SUBTITLE -->
                </div><!-- END TITLE -->  	                           
			</div><!-- END SIXTEEN COLUMNS -->  
           </div><!-- END ROW -->         
          </div><!-- END CONTAINER -->            
            

       <?php if ($page['our_team']): ?>
       <div class="fullwidth grey">                   
          <div class="container">	
             <div class="row">      
              
              <div class="sixteen columns">               
              	<?php print render($page['our_team']); ?>
           	  </div><!-- END SIXTEEN COULMNS --> 
          </div> <!-- END ROW -->     
         </div><!-- END CONTAINER --> 
       </div>
       <?php endif; ?>

	   <?php if ($page['clients']): ?>
	   <div class="container clearfix">
		    
			<div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">
            	<?php print render($page['clients']); ?>                
			</div><!-- END SIXTEEN COLUMNS --> 
	    </div>                
     	<?php endif; ?>

    </div>
    <!-- END TEAM SECTION -->
    
    <?php if (theme_get_setting('parallax_2_enabled', 'jarvis') == true) : ?>
      <!-- START PARALLAX SECTION -->	
      <div id="parallax2" class="parallax" style="background-image: url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('pr_2_bg_image_path', 'jarvis'))); ?>)">
        <div class="<?php if(theme_get_setting('pr_2_overlay_enable')) : ?> parallax-overlay <?php endif; ?>">
            <div class="container clearfix">
                <div class="parallax-content">
                    <?php if(theme_get_setting('parallax_2_type') == 'quote') : ?>
                        <p data-effect="fadeInUp" class="quote rnr-animate animated">
                            <i class="icon icon-quote-left"></i>
                                <?php print theme_get_setting('pr_2_quote_content'); ?>
                            <i class="icon icon-quote-right"></i>
                        </p>
                        <div data-effect="fadeInUp" class="quote-author rnr-animate animated">&minus; <?php print theme_get_setting('pr_2_quote_author'); ?> &minus;</div>
                    <?php elseif(theme_get_setting('parallax_2_type') == 'testi') : ?>
                        <p data-effect="fadeInUp" class="testimonial-icon rnr-animate animated">
                            <i class="icon icon-quote-left"></i>
                        </p>
                        <h3 data-effect="fadeInUp" class="title rnr-animate animated">
                            <span><?php print t('What our Clients say'); ?></span>
                        </h3>
                        <div data-effect="fadeInUp" class="testimonial-slider rnr-animate animated">
                            <?php if(theme_get_setting('pr_2_skill') && count(theme_get_setting('pr_2_skill')) > 1) : ?>
                                <div class="flexslider testi">
                                    <ul class="slides styled-list">
                                        <?php $skills = theme_get_setting('pr_2_skill'); ?>
                                        <?php foreach($skills as $key => $value) : ?>
                                            <li class="testimonial-slide">
                                                <p class="client-testimonial"><?php print $skills[$key]['des']; ?></p>
                                                <div class="client-info"> <?php print $skills[$key]['title']; ?> </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                 </div>
                             <?php endif; ?>
                         </div>
                    <?php elseif(theme_get_setting('parallax_2_type') == 'contact') : ?>
                         <div data-effect="fadeInUp" class="contact-details rnr-animate animated">
                            <h2><?php print theme_get_setting('pr_2_contact_email') ?></h2>
                            <h1><?php print theme_get_setting('pr_2_contact_phone') ?></h1>
                            <h2><?php print theme_get_setting('pr_2_contact_des_no1') ?></h2>
                         </div>
                    <?php endif; ?>
                </div><!-- END PARALLAX CONTENT -->
            </div><!-- END CONTAINER -->
          </div>
          <!-- END PARALLAX SECTION -->
      </div>
    <?php endif; ?>
    <!-- END PARALLAX SECTION -->
    
    <!-- START SERVICES SECTION -->
	<div id="services" class="page">    
                 
      
		<div class="container">	
           <div class="row">	
			<div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">            
	            <!-- START TITLE -->	            
				<div class="title">
				  <h1><?php print theme_get_setting('frontpage_services_title', 'jarvis');?></h1>
                  <div class="subtitle">
                      <?php print theme_get_setting('frontpage_services_desc', 'jarvis');?>
                  </div><!-- END SUBTITLE -->
                </div><!-- END TITLE -->  	                           
			</div><!-- END SIXTEEN COLUMNS -->  
           </div><!-- END ROW -->         
          </div><!-- END CONTAINER -->       

	    <?php if ($page['services']): ?>
        <div class="fullwidth grey">       
          
            <div class="container clearfix">
               <div class="row">
               		<?php print render($page['services']); ?>             
               </div>  <!-- END ROW -->  
            </div> <!-- END CONTAINER -->  
                   
		</div>
        <?php endif; ?>
        
		<?php if ($page['services_bottom']): ?>
        <div class="container clearfix">
		    
			<div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">
            	<?php print render($page['services_bottom']); ?>
			</div><!-- END SIXTEEN COLUMNS --> 
	    </div><!-- END CONTAINER -->
        <?php endif; ?>       

    </div>
	<!-- END SERVICES SECTION -->
    
    <?php if (theme_get_setting('parallax_3_enabled', 'jarvis') == true) : ?>
      <!-- START PARALLAX SECTION -->	
      <div id="parallax3" class="parallax" style="background-image: url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('pr_3_bg_image_path', 'jarvis'))); ?>)">
        <div class="<?php if(theme_get_setting('pr_3_overlay_enable')) : ?> parallax-overlay <?php endif; ?>">
            <div class="container clearfix">
                <div class="parallax-content">
                    <?php if(theme_get_setting('parallax_3_type') == 'quote') : ?>
                        <p data-effect="fadeInUp" class="quote rnr-animate animated">
                            <i class="icon icon-quote-left"></i>
                                <?php print theme_get_setting('pr_3_quote_content'); ?>
                            <i class="icon icon-quote-right"></i>
                        </p>
                        <div data-effect="fadeInUp" class="quote-author rnr-animate animated">&minus; <?php print theme_get_setting('pr_3_quote_author'); ?> &minus;</div>
                    <?php elseif(theme_get_setting('parallax_3_type') == 'testi') : ?>
                        <p data-effect="fadeInUp" class="testimonial-icon rnr-animate animated">
                            <i class="icon icon-quote-left"></i>
                        </p>
                        <h3 data-effect="fadeInUp" class="title rnr-animate animated">
                            <span><?php print t('What our Clients say'); ?></span>
                        </h3>
                        <div data-effect="fadeInUp" class="testimonial-slider rnr-animate animated">
                            <?php if(theme_get_setting('pr_3_skill') && count(theme_get_setting('pr_3_skill')) > 1) : ?>
                                <div class="flexslider testi">
                                    <ul class="slides styled-list">
                                        <?php $skills = theme_get_setting('pr_3_skill'); ?>
                                        <?php foreach($skills as $key => $value) : ?>
                                            <li class="testimonial-slide">
                                                <p class="client-testimonial"><?php print $skills[$key]['des']; ?></p>
                                                <div class="client-info"> <?php print $skills[$key]['title']; ?> </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                 </div>
                             <?php endif; ?>
                         </div>
                    <?php elseif(theme_get_setting('parallax_3_type') == 'contact') : ?>
                         <div data-effect="fadeInUp" class="contact-details rnr-animate animated">
                            <h2><?php print theme_get_setting('pr_3_contact_email') ?></h2>
                            <h1><?php print theme_get_setting('pr_3_contact_phone') ?></h1>
                            <h2><?php print theme_get_setting('pr_3_contact_des_no1') ?></h2>
                         </div>
                    <?php endif; ?>
                </div><!-- END PARALLAX CONTENT -->
            </div><!-- END CONTAINER -->
          </div>
          <!-- END PARALLAX SECTION -->
      </div>
    <?php endif; ?>
    <!-- END PARALLAX SECTION -->
	
    <?php if ($page['blog']): ?>   
   		<div id="blog-section" class="page179 section  blog-section"><!-- SECTION -->
 			<div class="rnr-offset"  data-section="blog-section"></div>
				<!-- START BLOG CONTENT -->
					<?php print render($page['blog']); ?>  
                <!-- END BLOG CONTENT -->
            <div class="rnr-scroll-up" data-section="blog-section" ></div>  
    	</div><!--END SECTION -->
   	<?php endif; ?>
    
    <?php if (theme_get_setting('parallax_5_enabled', 'jarvis') == true) : ?>
      <!-- START PARALLAX SECTION -->	
      <div id="parallax5" class="parallax" style="background-image: url(<?php print(jarvis_theme_setting_check_path(theme_get_setting('pr_5_bg_image_path', 'jarvis'))); ?>)">
        <div class="<?php if(theme_get_setting('pr_5_overlay_enable')) : ?> parallax-overlay <?php endif; ?>">
            <div class="container clearfix">
                <div class="parallax-content">
                    <?php if(theme_get_setting('parallax_5_type') == 'quote') : ?>
                        <p data-effect="fadeInUp" class="quote animated rnr-animate">
                            <i class="icon icon-quote-left"></i>
                                <?php print theme_get_setting('pr_5_quote_content'); ?>
                            <i class="icon icon-quote-right"></i>
                        </p>
                        <div data-effect="fadeInUp" class="quote-author animated rnr-animate">&minus; <?php print theme_get_setting('pr_5_quote_author'); ?> &minus;</div>
                    <?php elseif(theme_get_setting('parallax_5_type') == 'testi') : ?>
                        <p data-effect="fadeInUp" class="testimonial-icon rnr-animate animated">
                            <i class="icon icon-quote-left"></i>
                        </p>
                        <h3 data-effect="fadeInUp" class="title rnr-animate animated">
                            <span><?php print t('What our Clients say'); ?></span>
                        </h3>
                        <div data-effect="fadeInUp" class="testimonial-slider rnr-animate animated">
                            <?php if(theme_get_setting('pr_5_skill') && count(theme_get_setting('pr_5_skill')) > 1) : ?>
                                <div class="flexslider testi">
                                    <ul class="slides styled-list">
                                        <?php $skills = theme_get_setting('pr_5_skill'); ?>
                                        <?php foreach($skills as $key => $value) : ?>
                                            <li class="testimonial-slide">
                                                <p class="client-testimonial"><?php print $skills[$key]['des']; ?></p>
                                                <div class="client-info"> <?php print $skills[$key]['title']; ?> </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                 </div>
                             <?php endif; ?>
                         </div>
                    <?php elseif(theme_get_setting('parallax_5_type') == 'contact') : ?>
                         <div data-effect="fadeInUp" class="contact-details rnr-animate animated">
                            <h2><?php print theme_get_setting('pr_5_contact_email') ?></h2>
                            <h1><?php print theme_get_setting('pr_5_contact_phone') ?></h1>
                            <h2><?php print theme_get_setting('pr_5_contact_des_no1') ?></h2>
                         </div>
                    <?php endif; ?>
                </div><!-- END PARALLAX CONTENT -->
            </div><!-- END CONTAINER -->
          </div>
          <!-- END PARALLAX SECTION -->
      </div>
    <?php endif; ?>
    <!-- END PARALLAX SECTION -->
    
	<!-- START CONTACT SECTION -->
	<div id="contact" class="page">
    
		<div class="container">	
           <div class="row">	
			<div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">            
	            <!-- START TITLE -->	            
				<div class="title">
				  <h1><?php print theme_get_setting('frontpage_contact_title', 'jarvis');?></h1>
                  <div class="subtitle">
                      <?php print theme_get_setting('frontpage_contact_desc', 'jarvis');?>
                  </div><!-- END SUBTITLE -->
                </div><!-- END TITLE -->  	                           
			</div><!-- END SIXTEEN COLUMNS -->  
           </div><!-- END ROW -->         
         </div><!-- END CONTAINER -->
         <?php if(theme_get_setting('enable_map', 'jarvis') == true) : ?>
             <div  class="row contact-map"> 
                  <div id="google-map" class="embed clearfix">
                    <div class="mapPreLoading">
                        <h4><span><?php print t('Loading'); ?></span></h4>
                        <span class="l-1"></span>
                        <span class="l-2"></span>
                        <span class="l-3"></span>
                        <span class="l-4"></span>
                        <span class="l-5"></span>
                        <span class="l-6"></span>
                    </div>
                  </div>
             </div>         
		 <?php endif; ?>
         <div class="container clearfix">
			<div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">
				
	  	 		<!-- START CONTACT BOX -->
      			<?php if ($page['contact']): ?>
                <div class="contact-box">
        			<!-- START CONTACT FORM -->
         			<div id="contact-form">			
            			<?php print render($page['contact']); ?>
         				<div class="clear"></div>
         			</div>
         			<div class="result"></div>  
				<!-- END CONTACT FORM -->
				</div>
				<!-- END CONTACT BOX -->
                <?php endif; ?>
			</div> <!-- END SIXTEEN COLUMNS -->        
		</div><!-- END CONTAINER -->
        
        <?php if ($page['footer']): ?>
        <!-- START COPYRIGHT SECTION -->   	
        <div class="copyright center">
         <div class="container clearfix">
            <div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">   
            	<div class="copyright-logo">
                	<h1>
                        <a href="#home">
                            <?php print $site_name; ?>
                        </a>
                    </h1>
                </div>
                <?php print render($page['footer']); ?>
            </div> <!-- END SIXTEEN COLUMNS -->        
          </div><!-- END CONTAINER -->
     	</div>
     	<!-- END COPYRIGHT SECTION -->	 
        <?php endif; ?>
	</div>
    <!-- END CONTACT SECTION -->
    
    <div id="back-to-top"><a href="#">Back to Top</a></div>
</div> <!-- End of Page Wrap -->
    
<?php else: ?>
    
    
  <!-- START NAVIGATION -->
    <nav class="light sticky-nav navigation">
     <!-- START CONTAINER -->	
      <div class="container clearfix">			
          <div class="four columns">			
              <!-- START LOGO -->	
              <div class="logo large">
               <a href="<?php print base_path(); ?>"><img src="<?php print $logo; ?>" title="logo" alt="<?php print t('Home'); ?>"/></a>
              </div>
              <!-- END LOGO -->			
          </div><!-- END FOUR COLUMNS -->   
          
                   
          <div class="twelve columns">            		
              <!-- START NAVIGATION MENU ITEMS -->
              <?php if (module_exists('i18n_menu')) {
				  $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
				} else {
				  $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
				}
				print drupal_render($main_menu_tree);?>
              <!-- END NAVIGATION MENU ITEMS -->				
          </div><!-- END TWELVE COLUMNS -->	
      </div><!-- END CONTAINER -->	
    </nav>
  <!-- END NAVIGATION --> 

  <div class="page-wrap">
  	<div class="page multipage">
      <!-- START CONTAINER -->
      <div class="container">	
       <div class="row">	
        <div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">            
            <!-- START TITLE -->	            
            <div class="title">
              <h1><?php print $title; ?></h1>
            </div><!-- END TITLE -->  	                           
        </div><!-- END SIXTEEN COLUMNS -->  
       </div><!-- END ROW -->         
      </div> <!-- END CONTAINER -->
      
      <!-- START CONTAINER -->
      <div class="container">
			<?php if ($page['sidebar']): ?>
                <?php if(theme_get_setting('sidebar_position') == 'left') : ?>
                    <div class="four columns">
                        <div class="sidebar">
                            <?php print render($page['sidebar']); ?>		
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(theme_get_setting('sidebar_position') == 'no') : ?>
					<?php print $messages; ?>
                    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
                    <?php print render($page['content']); ?>
                <?php else : ?>
                	<div class="twelve columns">
                        <?php print $messages; ?>
                        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
                        <?php print render($page['content']); ?>
                    </div>
				<?php endif; ?>
				<?php if(theme_get_setting('sidebar_position') == 'right') : ?>
                    <div class="four columns">
                        <div class="sidebar">
                            <?php print render($page['sidebar']); ?>		
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
            	<?php print $messages; ?>
				<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($page['content']); ?>
            <?php endif; ?>
						
	   </div>
       <!-- END OF CONTAINER -->
       
       <?php if ($page['footer']): ?>
        <!-- START COPYRIGHT SECTION -->   	
        <div class="copyright center">
         <div class="container clearfix">
            <div class="sixteen columns rnr-animate animated" data-effect="fadeInUp">   
            	<div class="copyright-logo">
                	<h1>
                        <a href="#home">
                            <?php print $site_name; ?>
                        </a>
                    </h1>
                </div>
                <?php print render($page['footer']); ?>
            </div> <!-- END SIXTEEN COLUMNS -->        
          </div><!-- END CONTAINER -->
     	</div>
     	<!-- END COPYRIGHT SECTION -->	 
        <?php endif; ?>
    </div>
  	<div id="back-to-top"><a href="#">Back to Top</a></div>   
  </div> <!-- End of Page Wrap -->
	
<?php endif; ?>
