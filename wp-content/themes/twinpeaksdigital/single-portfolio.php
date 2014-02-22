<div>
    <div class='hidden-xs pull-right'>
        <a href='/video-production-portfolio'>&laquo Go Back</a>
    </div>
    <div>
        <?php get_template_part('templates/page', 'header'); ?>
    </div>
</div>
<?php while (have_posts()) : the_post(); ?>
<article <?php post_class('portfolio'); ?> class="row">
    <div class="portfolio-single-vid col-md-6">
        <iframe src="//player.vimeo.com/video/<?php $vid = get_post_custom_values('video_link');  echo $vid[0]; ?>" width="100%" height="100%" style="max-width:500px;width:100%;;min-height:281px;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
    <div class="col-md-6">
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </div>
  <footer class="col-md-12 hidden-lg hidden-md hidden-sm text-center">
      <a href='/video-production-portfolio'>&laquo Go Back</a>
  </footer>
</article>
<?php endwhile; ?>