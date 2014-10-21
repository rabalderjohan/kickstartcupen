<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Kickstartcupen
 * @since Kickstartcupen 1.0
 */
?>
<!DOCTYPE html>
<html ng-app="KscApp" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kickstartcupen</title>

    <!-- Bootstrap -->

    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ."?" . rand(); ?>" type="text/css" media="screen" />

    <!--[if IE]>
      <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/ksc-ie.css">
    <![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Le javascript -->
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular/angular.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-scroll/angular-scroll.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/ng-parallax/angular-parallax.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/spin.js/spin.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-spinner/angular-spinner.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-inview/angular-inview.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-timer/dist/angular-timer.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/app.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/controllers.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/factories.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/services.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/config.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/directives.js"></script>
  </head>
  <body ng-cloak>
    <?php
    $args = array(
      'numberposts' => 1,
      'post_type' => 'CustomHeader'
    );
    $var = get_posts($args);
    foreach ($var as $key) {
      $intro_background_image = get_field('header_background_image',$key->ID);
      $intro_text = get_field('intro_text',$key->ID);
      $instructions_header = get_field('instructions_header',$key->ID);
      $instructions_text = get_field('instructions_text',$key->ID);
      $prize_header = get_field('prize_header',$key->ID);
      $prize_text = get_field('prize_text',$key->ID);
    }

    $movies = array('//www.youtube.com/embed/HxnrkFELX6M?rel=0&controls=0&showinfo=0&autoplay=0','//www.youtube.com/embed/URUGWbpRc_I?rel=0&controls=0&showinfo=0&autoplay=0');
    $the_pick = $movies[array_rand($movies)];
    ?>
    <div id="top" class="full-wrapper" ng-controller="WrappCtrl">
      <a href="#top" du-smooth-scroll>
        <img class="back-to-top" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-back-to-top-pink.png" alt="Back to top image" />
      </a>
      <div class="header" ng-controller="HeaderCtrl">
        <div class="header-top">
          <div class="container visible-sm visible-xs">
            <div class="row">
              <div class="col-sm-6 col-xs-6">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.svg" alt="" />
              </div>
              <div class="col-sm-6 col-xs-6">
                <button class="navbar-toggle" ng-click="navCollapsed = !navCollapsed">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
            </div>
          </div>
          <div class="nav-xs hidden-md" collapse="!navCollapsed">
            <ul>
              <?php
              get_ksc_header_items();
              ?>
            </ul>
          </div>
        </div>
        <div class="header-info">
          <div class="header-lamp">
            <div class="header-nav hidden-xs hidden-sm">
              <div class="container lamp-container">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="logo-wrapper">
                      <img class="ksc-svg-logo" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.svg" alt="" />
                    </div>
                  </div>
                  <div class="col-sm-10 clearfix">
                    <nav class="MainMenu--desktop pull-right">
                      <ul class="menu">
                        <?php
                        get_ksc_header_items();
                        ?>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <div class="header-description">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6 hd-padder">
                    <img class="img-responsive ksc-logo-xs visible-xs visible-sm" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-lamp-v.2.0.png" alt="Kickstartcupen logotyp" />
                    <img class="img-responsive ksc-logo hidden-xs hidden-sm" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-logo-w-lamp-v2.0.png" alt="Kickstartcupen logotyp" />
                    <p class="tilter">
                      <?php echo $intro_text; ?>
                    </p>
                    <a href="http://www.ungforetagsamhet.se/" target="_blank">
                      <img class="ksc-push" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-ylw-push.png" alt="Kickstartcupen push" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-instructions vignette-bg">
          <div class="container">
            <div class="row">
              <div id="instuctions" class="col-sm-6 instructions">
                <h2 class="as-btn-xs" ng-click="instCollapsed = !instCollapsed"><?php echo $instructions_header; ?></h2>
                <p class="tilter hidden-sm awh-sm" collapse="!instCollapsed"><?php echo $instructions_text;  ?> <a href="#rules" du-smooth-scroll ng-click="rulesCollapsed = !rulesCollapsed">här</a>.</p>
                <p class="tilter hidden-xs"><?php echo $instructions_text;  ?> <a href="#rules" du-smooth-scroll ng-click="rulesFix()">här</a>.</p>
                <h2 class="as-btn-xs" ng-click="prizeCollapsed = !prizeCollapsed"><?php echo $prize_header; ?></h2>
                <p class="tilter hidden-sm" collapse="!prizeCollapsed">
                  <?php echo $prize_text;  ?>
                </p>
                <p class="tilter hidden-xs">
                  <?php echo $prize_text;  ?>
                </p>
                <div class="ksc-scroll-info">

                </div>
              </div>
              <div class="col-sm-6 phone-play" ng-controller="PlayCtrl">
                <div class="phone-wrapper">
                  <iframe width="275" height="285" src="<?php echo $the_pick; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <img class="arrow-up hidden-xs hidden-sm" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-arrow-pnk-up.png" alt="Arrow ponting to phone" />
                <img class="play-text hidden-xs hidden-sm" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-play-movie-as-text.png" alt="" />
              </div>
            </div>
          </div>
        </div>
        <div class="header-end">

        </div>
        <div class="section-break">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 section-break-intro hidden-xs hidden-sm">
                <img class="scrll-txt" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-scroll-text-as-img-v.2.png" alt="" />
                <img class="scrll-img" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-arrow.png" alt="Pink arrow" />
              </div>
            </div>
          </div>
        </div>
      </div>
