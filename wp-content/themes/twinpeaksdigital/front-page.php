<div class="row fp-row1">
    <div class="fp-txt1 col-md-4">
        <?php get_template_part('templates/content', 'page'); ?>
    </div>
    <?php while (have_posts()) : the_post(); ?>
    <div class="fp-vid col-md-8">
        <?php
            $tagline = get_post_custom_values('tagline_above_video');
            if ($tagline[0] == '' || $tagline[0] == null || $tagline[0] == ' '){
                //no tagline
            } else {
                $txt = $tagline[0];
                $txt_above_video = "$txt";
                echo $txt_above_video;
            }
        ?>
        <?php $slider1 = get_post_custom_values('video_slider');  echo do_shortcode($slider1[0]); ?>
    </div>
</div>
<div class="row fp-row2">
    <div class="fp-pics col-md-4 col-sm-4 hidden-xs">
        <?php $slider2 = get_post_custom_values('photo_slider');  echo do_shortcode($slider2[0]);?>
    </div>
    <div class="fp-txt2 col-md-4 col-sm-4 col-xs-12">
        <?php
            //query the page with slug home-btm-p created for lower paragraph
            $the_query = new WP_Query( 'pagename=home/home-btm-p' );
            while( $the_query->have_posts()) : $the_query->the_post();
            ?>
        <h4 class="terracotta"><?php the_title(); ?></h4>
        <?php the_content();?>
        <?php endwhile; ?>
        <?php
            // Restore original Post Data
            wp_reset_postdata();
        ?>
    </div>
    <?php endwhile; ?>
    <div class="fp-news col-md-4 col-sm-4 col-xs-12">
        <?php
          $posts = get_posts ("cat=news&showposts=1");
          if ($posts) {
            foreach ($posts as $post):
              setup_postdata($post); ?>
            <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
            <p><?php global $more; $more = 0;?><?php the_content("more &raquo;"); ?>
            <?php endforeach;
          }
        ?>
    </div>
</div>
