<?php 
$Title = $fields['title']->raw;
$Description = $fields['field_services_description']->content;
$Icon = $fields['field_services_icon']->content;
$Offer = $fields['field_services_offer']->content;

?>

<div class="one-third column">
  <!-- START service-box -->
    <div class="service-box">
     <!-- START ICON -->
       <div>
          <h3><?php print t($Title); ?></h3><!-- END service-box TITLE -->
          <i class="service-icon icon-<?php print $Icon; ?>"></i>
       </div>
     <!-- END ICON -->  
     
    <!-- START service-box DESCIPTION --> 
    <div class="service-description">
       <p><?php print $Description; ?></p><!-- END service-box DESCRIPTION --> 
    </div>
       <h6><?php print t('What we offer'); ?></h6>
       <ul class="styled-list">
       	<?php print $Offer; ?> 	
       </ul>
    <!-- START service-box DESCIPTION --> 
     
   </div> <!-- END service-box -->                                   
</div> <!-- END ONETHIRD COLUMN -->