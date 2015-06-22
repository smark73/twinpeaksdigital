<footer class="content-info container pg-ftr" role="contentinfo">
  <div class="row">
    <div class="ftr-col-a col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
    <div class="ftr-col-b col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>  |  An <a href="http://ambitionsweb.com" target="_blank" style="color:#d4c2ae;">Ambitions Web</a> Project</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>