<?php
$description   = $node->field_portfolio_description['und'][0]['value'];
$client        = $node->field_portfolio_client['und'][0]['value'];
$video		   = $node->field_portfolio_video['und'][0]['value'];
$publish       = $node->created;      
?>

<div id="ajaxpage">
    <!-- START PROJECT MEDIA -->
   <div class="eleven columns"> 
    <div class="project-media">
	<?php
    if(!empty($video)) {
		if(is_numeric($video)) {
    ?>
    	<div class="video">
            <iframe src="http://player.vimeo.com/video/<?php print $video; ?>?color=f2eee5" width="500" height="281" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
        </div>
    <?php
		}else {
	?>
    	<div class="video">
            <iframe width="560" height="315" src="http://www.youtube.com/embed/<?php print $video;?>?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
	<?php	
		}
    }else {
    ?>
        <div class="flexslider">
            <ul class="slides">
                <?php
				
				// get field collections from node 
				$field_portfolio_images = field_get_items('node', $node, 'field_portfolio_images');
				
				// get all fields values if collection exists
				if (!empty($field_portfolio_images)){
					for ($i = 0; $i < count($field_portfolio_images); $i++) {
						$field = field_view_value('node',$node, 'field_portfolio_images', $field_portfolio_images[$i]);  
						foreach ($field['entity']['field_collection_item'] as $id => $field_collection){
							
							// load the field collection item entity
							$field_collection_item = field_collection_item_load($id);
							// wrap the entity and make it easier to get the values of fields
							$field_wrapper = entity_metadata_wrapper('field_collection_item', $field_collection_item);
					
							// all values from a field collection
							$field_image        = $field_wrapper->field_portfolio_image->value(); // an array of image data
							$field_description  = $field_wrapper->field_portfolio_image_des->value(); 
					
							// an example of getting image url from field_image
							$image_url          = $field_image['uri'] ? image_style_url('portfolio_thumb', $field_image['uri']) : '';
				?>
                
                			<li>
                    			<img src="<?php print $image_url; ?>" alt="portfolio slider" />
                    			<p class="flex-caption"><?php print $field_description; ?></p>
                			</li>
				<?php
						}
					}
				}
				
				?>
            </ul>
        </div>
        <?php } ?>         
    </div>  
   </div>
    <!-- END PROJECT MEDIA -->
    
   <div class="five columns"> 
    <!-- START PROJECT INFO --> 
    <div class="project-info">
        <div class="project-description">
          <h3>Project Description</h3>
           <p><?php print t($description);  ?></p>
        </div>
        
        <div class="project-details">
          <h3>Project Details</h3>
          <p><span>Client</span>: <?php print t($client);  ?></p>
          <p><span>Date</span>: <?php print format_date($publish, 'custom', 'jS F, Y'); ?></p>
          <p>
          	<span>Tags</span>:
          	<?php
            	$tags = "";
				foreach( $node->field_portfolio_category['und'] as $term ) {
				  $category = taxonomy_term_load( $term['tid'] );
				  $tags .= t($category->name).', ';
				}
				$tags = substr($tags, 0, $tags.length - 2);
				print $tags;
			?>
          </p>                                        
        </div>
    </div>
    <!-- END PROJECT INFO -->
   </div>
</div><!-- END AJAX PAGE -->