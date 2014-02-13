<?php
if($post->post_parent == get_page_by_title('Video Production Services')->ID) :
    dynamic_sidebar('services-sidebar');
else :
    dynamic_sidebar('sidebar-primary');
endif;
?>