<?php 
$Title = $fields['title']->content; 
$Description = $fields['field_aboutus_description']->content; 
$Image = $fields['field_aboutus_image']->content;

?>

<div class="one-third column">
  <div class="service-features">
  <div class="img-container">
    <?php print $Image; ?>
  </div>  
    <h3><?php print $Title; ?></h3>                
    <p><?php print $Description; ?></p>
  </div>               
</div><!-- END ONE THIRD COLUMN -->
