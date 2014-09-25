<?php
/**DID THIS HAPPEN!
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Kickstartcupen
 * @since Kickstartcupen 1.0
 */
?>
      <div class="footer vignette-bg">
        <?php
        $args = array(
          'numberposts' => 1,
          'post_type' => 'CustomFooter'
        );
        $var = get_posts($args);
        foreach ($var as $key) {
          $footer_header = get_field('footer_header',$key->ID);
          $footer_all_devices = get_field('footer_all_devices',$key->ID);
          $footer_desktop_only = get_field('footer_desktop_only',$key->ID);
        }
        ?>
        <div id="about" class="container abouter">
          <h2 class="footer-ilh"><?php echo $footer_header; ?></h2>
          <a href="http://www.ungforetagsamhet.se/" target="_blank">
            <img class="ksc-push hidden-xs hidden-xs" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-ylw-push.png" alt="Kickstartcupen push" />
          </a>
          <div class="row">
            <div class="col-sm-6">
              <p class="tilter somepad">
                <?php echo $footer_all_devices; ?>
              </p>
            </div>
            <div class="col-sm-6">
              <p class="tilter hidden-xs">
                <?php echo $footer_desktop_only; ?>
              </p>
              <p class="tilter">
                Läs mer på <a href="http://www.ungforetagsamhet.se/">ungforetagsamhet.se</a>!
              </p>
              <div class="fotter-who hidden-xs">
                <img class="who-arrow" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-arrow-up-up.png" alt="Pink arrow" />
                <h3 class="who-text">Vilka är vi och<br>vad vi gör</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-end text-center bgbrown">
        <p>
          &copy; UNG FÖRETAGSAMHET 2014
        </p>
      </div>
    </div><!-- .full-wrapper -->
    <?php
		/* Always have wp_footer() just before the closing </body>
	 	* tag of your theme, or you will break many plugins, which
	 	* generally use this hook to reference JavaScript files.
	 	*/

		wp_footer();
		?>
  </body>
</html>
