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
                  <button class="btn btn-ksc-blu btn-block" ng-click="rulesCollapsed = !rulesCollapsed">Toggle collapse</button>
                  <div collapse="!rulesCollapsed">
		                <div class="well well-lg">Some content</div>
	                 </div>
                </div>
                <div class="col-sm-6">
                  <input class="form-control search" ng-model="search.user.username" placeholder="Sök">
                </div>
              </div>
            </div>
            <div id="tags" class="page-tags" ng-controller="TagCtrl">
              <div class="row">
                <div class="col-sm-3" ng-repeat="item in items | filter:search">
                  <div class="ig-item">
                    <img class="img-responsive" ng-src="{{item.images.standard_resolution.url}}" alt="" />
                    <h6 ng-click="isCollapsed = !isCollapsed">@{{item.user.username}}</h6>
                    <div class="ig-item-caption" collapse="!isCollapsed">
                      <p>
                        {{item.caption.text}}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 ig-spinner">
                  <span us-spinner="{color:'#ffffff'}" spinner-key="spinner" spinner-start-active="1"></span>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
<?php
get_footer();
?>
