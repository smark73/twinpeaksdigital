<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      <div class="navbar-icons pull-right hidden-sm">
          <a href="http://www.facebook.com/pages/Twin-Peaks-Digital/107938599128" target="_blank" class="icon-fb"><img src="/media/icon-facebook.png" alt="Facebook Twin Peaks Digital"/></a>
          <a href="https://plus.google.com/111869356554768492741/about" target="_blank" class="icon-gp"><img src="/media/icon-google-plus.png" alt="Google Plus Twin Peaks Digital"/></a>
          <a href="http://www.linkedin.com/pub/matthew-nelson/12/808/444" target="_blank" class="icon-li"><img src="/media/icon-linkedin.png" alt="LinkedIn Twin Peaks Digital"/></a>
          <a href="http://www.youtube.com/user/twinpeaksdigital" target="_blank" class="icon-yt"><img src="/media/icon-you-tube.png" alt="YouTube Channel for Twin Peaks Digital"/></a>
          <a href="https://vimeo.com/channels/42610" target="_blank" class="icon-vi"><img src="/media/icon-vimeo.png" alt="Vimeo Channel for Twin Peaks Digital"/></a>
      </div>
    </nav>
  </div>
</header>
