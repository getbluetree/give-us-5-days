<?php 
$Title = $fields['title']->content; 
$SmallThumb = $fields['field_ourteam_avatar']->content;
$LargeThumb = $fields['field_ourteam_avatar_1']->content;
$Body = $fields['body']->content;
$FirstName = $fields['field_ourteam_first_name']->content; 
$LastName = $fields['field_ourteam_last_name']->content;
$JobPosition = $fields['field_ourteam_job_position']->content;
$ShortDescription = $fields['field_ourteam_short_description']->content; 
$Skills = $fields['field_ourteam_skills']->content;
$Social = $fields['field_ourteam_social_icons']->content;

?>

<!-- START TEAM MEMBER --> 
<div class="team-member">
     <!-- START TEAM THUMBNAIL -->  
           <div class="team-thumb img-wrp">
                      
                  <!-- START MEMBER IMAGE --> 
                  <?php print $SmallThumb; ?>
                  <!-- END MEMBER IMAGE --> 
                  <!-- START TEAM OVERLAY -->  
                  <div class="team-overlay">
                      <div class="img-overlay"></div>
                      <!-- START OVERLAY CONTENT -->  
                      <div class="overlay-content">                            
                                
                           <!-- START MEMBER ROLE --> 
                           <h4><?php print $JobPosition; ?></h4>
                           <!-- END MEMBER ROLE --> 
                                
                           <!-- START PROFILE LINK --> 
                           <p><a data-toggle="modal" href="#<?php print $FirstName.$LastName; ?>" class="modal-popup-link view-profile">View Profile</a></p>
                                <!-- END PROFILE LINK -->  
                      </div><!-- END OVERLAY CONTENT -->  
                             
                  </div><!-- END TEAM OVERLAY -->          
           </div><!-- END TEAM THUMBNAIL -->  
                                       
           <!-- START TEAM DESCRIPTION -->  
           <div class="team-desc">
                 <h4><?php print $Title; ?></h4>
            </div>  
            <!-- END TEAM DESCRIPTION -->  
                    
                    
                    
                         
             <!-- START TEAM MEMBER BIO MODAL POPUP  -->
             <div id="<?php print $FirstName.$LastName; ?>" class="modal hide fade.in animated fadeIn">
                     
                     <!-- START TEAM BIO -->       
                        <div class="member-bio">
                         <div class="container">      
                         
                         <!-- START MODAL POPUP CLOSE BUTTON -->                                     
                         <a href="#" class="close" data-dismiss="modal">&#215;</a>
                         <!-- END MODAL POPUP CLOSE BUTTON -->
                         
                         
                         <!-- START MEMBER NAME AND ROLE --> 
                          <div class="member-role">
                            <h1><?php print $Title; ?></h1>
                            <h4 class="highlight"><?php print $JobPosition; ?></h4>
                          </div>
                          <!-- END MEMBER NAME AND ROLE -->  
                          
                          
                          <div class="row">
                            <div class="seven columns">
                              <!-- START MEMBER IMAGE --> 
                              <?php print $LargeThumb; ?>	
                              <!-- END MEMBER IMAGE --> 
                              
                              <!-- START MEMBER SHARING ICONS --> 
                              <div class="member-details">                             
                                   <div class="social-icons">
                                       <?php print $Social; ?>  
                                   </div>                     
                              </div>
                              <!-- END MEMBER SHARING ICONS -->   
                            </div><!-- END COLUMN --> 
                            
                            <!-- START MEMBER DESCRIPTION --> 
                            <div class="eight columns member-description">
                            <p class="lead"><?php print $ShortDescription; ?></p>
                            
                            <h3><?php print $FirstName; ?>'s Standard Skills</h3>
  
                            <?php print $Skills; ?>
                          
                            <?php print $Body; ?>
                                                                
                            </div><!-- END MEMBER DESCRIPTION -->    
                           
                          </div><!-- END ROW -->  
                         </div><!-- END CONTAINER --> 
                      </div><!-- END TEAM BIO -->                     
                  </div><!-- END TEAM MEMBER BIO MODAL POPUP -->  
</div>