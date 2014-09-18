<?php
/**
 * The main page.
 *
 * Basic page.
 *
 * @package WordPress
 * @subpackage Kickstartcupen
 * @since Kickstartcupen 1.0
 * Template Name: kscBasic
 */
get_header();
?>
      <div class="page-wrapper" ng-controller="PageCtrl">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
          <div class="container">
            <div class="page-header text-center">
              <h2><?php the_title(); ?></h2>
            </div>
            <div class="page-intro">
              <div class="row">
                <div class="col-sm-12">
                  <div class="page-text">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="page-rules-search">
              <div class="row">
                <div id="search" class="col-sm-6">
                  <button class="btn btn-ksc-blu btn-block" ng-click="isCollapsed = !isCollapsed">Toggle collapse</button>
                  <div collapse="isCollapsed">
		                <div class="well well-lg">Some content</div>
	                 </div>
                </div>
                <div class="col-sm-6">
                  <input class="form-control search" placeholder="Sök">
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
<?php
get_footer();
?>
