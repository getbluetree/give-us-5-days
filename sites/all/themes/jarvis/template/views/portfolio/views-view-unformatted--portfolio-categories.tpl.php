  <div class="container clearfix">  
    <!-- START PORTFOLIO FILTERING -->   
    <div  id="filters" class="sixteen columns">
    	<ul class="clearfix">
    		<li><a href="#" data-filter="*" class="active"><h3><?php print t("All");?></h3></a></li>
            <?php foreach ($rows as $id => $row): ?>
				<?php print $row; ?>
            <?php endforeach; ?>
        </ul>
    </div><!-- END PORTFOLIO FILTERING -->    
  </div><!-- END CONTAINER -->