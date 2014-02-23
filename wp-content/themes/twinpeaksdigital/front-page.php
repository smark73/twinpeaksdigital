<div class="row fp-row1">
    <div class="fp-txt1 col-md-4">
        <?php get_template_part('templates/content', 'page'); ?>
    </div>
    <?php while (have_posts()) : the_post(); ?>
    <div class="fp-vid col-md-8">
        <?php $slider1 = get_post_custom_values('video_slider');  echo do_shortcode($slider1[0]); ?>
    </div>
</div>
<div class="row fp-row2">
    <div class="fp-pics col-md-4 col-sm-4 hidden-xs">
        <?php $slider2 = get_post_custom_values('photo_slider');  echo do_shortcode($slider2[0]);?>
    </div>
    <div class="fp-txt2 col-md-4 col-sm-4 col-xs-12">
        <h4><?php $btm_hdr = get_post_custom_values('bottom_text_header');  echo $btm_hdr[0];?></h4>
        <?php $btm_txt = get_post_custom_values('bottom_text');  echo $btm_txt[0];?>
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
