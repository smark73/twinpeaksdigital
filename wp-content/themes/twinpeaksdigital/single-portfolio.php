<?php while (have_posts()) : the_post(); ?>
<article <?php post_class('portfolio'); ?> class="row">
    <div class="col-md-6">
        <header>
          <h3><?php the_title(); ?></h3>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="col-md-6">
        <?php $vid = get_post_custom_values('video_link'); echo $vid[0]; ?>
    </div>
  <footer class="col-md-12">
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
  </footer>
</article>
<?php endwhile; ?>