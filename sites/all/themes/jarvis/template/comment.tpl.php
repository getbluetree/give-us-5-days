<div class="the-comment" id="div-comment-<?php print $comment->cid;?>">
    <?php if(theme_get_setting('toggle_comment_user_picture') == 1) { ?>
        <div class="avatar"> 
            <?php if (!$picture) {
                    print '<img src="'.base_path().path_to_theme().'/images/nothing.png">'; 
                  }
                  else { 
                    print $picture; 
                  }
            ?>
        </div>
        <!-- end of avatar -->
    <?php } ?>

    <div class="comment-box">
        <div class="comment-author meta">
        	<div style="float: left; margin-right:3px;">
                <a href="#"><?php print check_plain($comment->name); ?></a>
                <?php print format_date($comment->created, 'custom', 'F j, Y \a\t h:i a').' -'; ?>
            </div>
            <?php print render($content['links']) ?>
        </div>

        <div class="comment-text">
            <p><?php
    
                // We hide the comments and links now so that we can render them later.
            
                hide($content['links']);
            
                print $comment->comment_body[$comment->language][0]['value'];
            
            ?></p>
		</div>
    </div>
    <!-- end of comment-box -->
</div>