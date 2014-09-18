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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/app.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/controllers.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/factories.js"></script>
  </head>
  <body>
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

        </div>
        <div class="header-info">
          <div class="header-nav">
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
                    <li class="first active">
                      <a class="" href="#">Hur tävlar man?</a>
                    </li>
                    <li>
                      <a href="#">Se alla bidrag</a>
                    </li>
                    <li>
                      <a href="#">Om UF</a>
                    </li>
                    <li>
                      <a href="#">ungforetagsamhet.se</a>
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
              <h1>Kickstart</h1>
              <h1><span class="superlarge">cupen</span></h1>
              <p>
                <?php echo $intro_text; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="header-instructions">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h2><?php echo $instructions_header; ?></h2>
                <p>
                  <?php echo $instructions_text;  ?>
                </p>
                <h2><?php echo $prize_header; ?></h2>
                <p>
                  <?php echo $prize_text;  ?>
                </p>
                <div class="ksc-scroll-info">
                  <h3>Scrolla ner för att följa cupen!</h3>
                </div>
              </div>
              <div class="col-sm-6">
                <img class="img-responsive center-block" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-girl-in-phone.png" du-parallax y="background" alt="Instagram girl in phone" />
              </div>
            </div>
          </div>
        </div>
        <div class="header-end">

        </div>
        <div class="section-break">

        </div>
      </div>
