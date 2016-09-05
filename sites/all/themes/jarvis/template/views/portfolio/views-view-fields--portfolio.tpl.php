<?php 
$Category = $fields['field_portfolio_category']->content;
$Image = $fields['field_portfolio_thumb']->content;
$Title = $fields['title']->raw;
$VideoLink = $fields['field_portfolio_video']->content;
$ItemDescription = $fields['field_portfolio_description']->content;
$FilePath = $fields['uri']->content;
$Nid = $fields['nid']->content;
 ?>
 
<!-- START PORTFOLIO ITEM -->                   
<div class="portfolio-item one-third column <?php print strtolower($Category); ?>">
       <div class="portfolio">
          
          <?php if (!empty($VideoLink)) : ?>
  				<a class="portfolio-image" href="#!porfolio-item/<?php print $Nid; ?>" title="">
                	<?php print $Image; ?>
                    <div class="portfolio-overlay">                
                        <div class="thumb-info">                
                          <h3><?php print $Title; ?></h3><!-- OVERLAY TITLE -->  
                          <p class="portfolio-tags"><?php print str_replace(" ", ", ", $Category); ?></p><!-- END PORTFOLIO TAGS -->  
        				  <i class="icon-film"></i>
                        </div>                
                    </div><!-- END PORTFOLIO OVERLAY -->
                </a>
      	  <?php else : ?>
      			<a class="portfolio-image" href="#!porfolio-item/<?php print $Nid; ?>" title="">
                	<?php print $Image; ?>
                    <div class="portfolio-overlay">                
                        <div class="thumb-info">                
                          <h3><?php print $Title; ?></h3><!-- OVERLAY TITLE -->  
                          <p class="portfolio-tags"><?php print str_replace(" ", ", ", $Category); ?></p><!-- END PORTFOLIO TAGS -->  
        				  <i class="icon-picture"></i>
                        </div>                
                    </div><!-- END PORTFOLIO OVERLAY -->
                </a>
      	  <?php endif; ?>
       </div>
</div>
<!-- END PORTFOLIO ITEM -->
