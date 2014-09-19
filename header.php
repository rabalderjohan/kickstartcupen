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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Le javascript -->
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular/angular.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-scroll/angular-scroll.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/ng-parallax/angular-parallax.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/spin.js/spin.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-spinner/angular-spinner.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bower_components/angular-inview/angular-inview.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/app.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/controllers.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/factories.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/services.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/config.js"></script>
  </head>
  <body ng-cloak>
    <?php
    $args = array(
      'numberposts' => 1,
      'post_type' => 'CustomHeader'
    );
    $var = get_posts($args);
    foreach ($var as $key) {
      $intro_text = get_field('intro_text',$key->ID);
      $instructions_header = get_field('instructions_header',$key->ID);
      $instructions_text = get_field('instructions_text',$key->ID);
      $prize_header = get_field('prize_header',$key->ID);
      $prize_text = get_field('prize_text',$key->ID);
    }
    ?>
    <div class="full-wrapper">
      <div class="header" ng-controller="HeaderCtrl">
        <div class="header-top">
          <div class="container visible-xs">
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
          <div class="nav-xs hidden-sm" collapse="!navCollapsed">
            <ul>
              <li>
                <a href="#instuctions" du-smooth-scroll>Hur tävlar man?</a>
              </li>
              <li>
                <a href="#tags" du-smooth-scroll>Se alla bidrag</a>
              </li>
              <li>
                <a href="#about" du-smooth-scroll>Om UF</a>
              </li>
              <li>
                <a href="http://www.ungforetagsamhet.se/" target="_blank">ungforetagsamhet.se</a>
              </li>
              <li>
                <a href="#">Kontakt</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="header-info">
          <div class="header-nav hidden-xs hidden-sm">
            <div class="container">
              <div class="row">
                <div class="col-sm-2">
                  <div class="logo-wrapper">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.svg" alt="" />
                  </div>
                </div>
                <div class="col-sm-8">
                  <!-- Static navbar -->
                  <ul class="nav">
                    <li class="first">
                      <a class="active" href="#instuctions" du-smooth-scroll>Hur tävlar man?</a>
                    </li>
                    <li>
                      <a href="#tags" du-smooth-scroll>Se alla bidrag</a>
                    </li>
                    <li>
                      <a href="#about" du-smooth-scroll>Om UF</a>
                    </li>
                    <li>
                      <a href="http://www.ungforetagsamhet.se/" target="_blank">ungforetagsamhet.se</a>
                    </li>
                    <li class="last">
                      <a href="#">Kontakt</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="header-description">
            <div class="container">
              <div class="row">
                <div class="col-sm-6 hd-padder">
                  <img class="img-responsive ksc-logo" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-logo.png" alt="Kickstartcupen logotyp" />
                  <p class="tilter">
                    <?php echo $intro_text; ?>
                  </p>
                  <a href="http://www.ungforetagsamhet.se/" target="_blank">
                    <img class="img-responsive ksc-push" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-ylw-push.png" alt="Kickstartcupen push" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-instructions">
          <div class="container">
            <div class="row">
              <div id="instuctions" class="col-sm-6 instructions">
                <h2 class="as-btn-xs" ng-click="instCollapsed = !instCollapsed"><?php echo $instructions_header; ?></h2>
                <p class="tilter hidden-sm" collapse="!instCollapsed"><?php echo $instructions_text;  ?></p>
                <p class="tilter hidden-xs"><?php echo $instructions_text;  ?></p>
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
                <img class="img-responsive center-block" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-girl-in-phone.png" ng-click="showMov()" du-parallax y="background" alt="Instagram girl in phone" />
                <img class="arrow-up hidden-xs" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-arrow-pnk-up.png" alt="Arrow ponting to phone" />
                <h3 class="play-text hidden-xs tilter">Spela filmen!</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="header-end">

        </div>
        <div class="section-break">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 section-break-intro hidden-xs">
                <h3>Scrolla ner för att följa cupen!</h3>
                <img src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-arrow.png" alt="Pink arrow" />
              </div>
            </div>
          </div>
        </div>
      </div>
