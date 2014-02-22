<div class="row">
    <div class="portfolio-intro">
        <p>Experience Makes the Difference</p>
        <p>For additional videos visit our <a href="https://vimeo.com/channels/42610" target="_blank">Vimeo channel</a> or our <a href="http://www.youtube.com/user/twinpeaksdigital" target="_blank">YouTube Channel</a></p>
    </div>
    <div style="margin-left:2%">
        <?php get_template_part('templates/page', 'header'); ?>
    </div>
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
            <div class="resp-vid-wrap">
                <iframe src="//player.vimeo.com/video/<?php $vid = get_post_custom_values('video_link');  echo $vid[0]; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6 entry-content portfolio-archv-txt">
            <h4 class='portfolio-archv-title'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4>
            <?php the_content(); ?>
        </div>
    </section>
<div class='clearfix portfolio-separator'></div>
<?php endwhile; ?>