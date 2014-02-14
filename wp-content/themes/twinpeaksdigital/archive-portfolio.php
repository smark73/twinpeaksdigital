<div>
    <?php get_template_part('templates/page', 'header'); ?>
</div>
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
<?php endif; ?>

<?php query_posts($query_string);?>
<?php while (have_posts()) : the_post();?>
    <section class="portfolio-archv row">
        <div class="portfolio-archv-vid col-md-6">
            <?php $vid = get_post_custom_values('video_link'); echo $vid[0]; ?>
        </div>
        <div class="col-md-6 entry-content portfolio-archv-txt">
            <h4 class='portfolio-archv-title'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4>
            <?php the_content(); ?>
        </div>
    </section>
<div class='clearfix portfolio-separator'></div>
<?php endwhile; ?>