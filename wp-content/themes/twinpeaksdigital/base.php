<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
  <!--[if lt IE 7]><div class="alert"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>
  <div class="row tpd-hdr">
      <div class="tpd-hdr-1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <a href="/">
            <img src="/media/twin-peaks-digital-video-production.png" alt="Video Production by Twin Peaks Digital" class="tpd-logo" />
          </a>
      </div>
      <div class="tpd-hdr-2 hidden-xs col-sm-6 col-md-6 col-lg-6">
          <p class="callnow">Video Production Services</p>
          <p><a href="tel:14807890619">480.789.0619</a></p>
          <p class="ochre">Search box here</p>
      </div>
  </div>
  <div class="wrap container" role="document">
    <div class="content row">
      <div class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </div><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>
  
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=575659772525619";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>
