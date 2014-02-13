<div class="row fp-row1">
    <div class="fp-txt1 col-md-4">
        <?php get_template_part('templates/content', 'page'); ?>
    </div>
    <div class="fp-vid col-md-8">
        <?php echo do_shortcode("[metaslider id=31]"); ?>
    </div>
</div>
<div class="row fp-row2">
    <div class="fp-pics col-md-4 col-sm-4 hidden-xs">
        <?php echo do_shortcode("[metaslider id=89]");?>
    </div>
    <div class="fp-txt2 col-md-4 col-sm-4 col-xs-12">
        <h4>Video Production</h4>
        <p>
            We craft your project from concept to finish, or provide only the video production, photography services, or crew needed. Our experience is integrated into every project using advanced budget techniques, while still working within your budget.
        </p>
        <p>
            Still photography and services are available separately or photography may accompany video production.
        </p>
        <p>
            Four complete camera packages are available. 2 traditional style video cameras and 2 DSLR style, large sensor video and photography cameras. We also utilize an 11′ jib arm, Rhino slider, Merlin steadicam, 10 x 20 green screen.
        </p>
    </div>
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
