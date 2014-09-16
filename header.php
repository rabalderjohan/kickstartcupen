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
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/app.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/controllers.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/factories.js"></script>
  </head>
  <body>
    <?php
    $args = array(
          'numberposts' => 1,
          'post_type' => 'CustomHeader'
          //'order' => 'ASC'
        );
        $var = get_posts($args);
        print_r($var);
        echo 'hej';
        foreach ($var as $key) {
          echo 'nj';
          echo $key->ID;
          $sna = get_field('intro_text',$key->ID);
          echo $sna;

        }
        echo '<h1>YES</h1>';
    ?>
    <div class="full-wrapper">
      <div class="header">
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

              </p>
            </div>
          </div>
        </div>
      </div>
