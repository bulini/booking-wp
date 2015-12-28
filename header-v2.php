<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bookingwp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400italic' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Start Main-Wrapper -->
<div id="main-wrapper">

  <!-- Start Header -->
  <header id="header">
    <div class="container-fluid">
      <div class="row">
        <div class="logo pull-left">
          <a href="#"><img src="img/logo.png" alt="" class="img-responsive"></a>
        </div>
        <div class="booking-form">
          <form action="index.html" class="default-form">
            <span class="destination input">
              <input type="text" placeholder="Destination">
            </span>
            <span class="arrival calendar">
              <input type="text" name="arrival" placeholder="Arrival" data-dateformat="m/d/y">
              <i class="fa fa-calendar"></i>
            </span>
            <span class="departure calendar">
              <input type="text" name="departure" placeholder="Departure" data-dateformat="m/d/y">
              <i class="fa fa-calendar"></i>
            </span>
            <span class="adults select-box">
              <select name="adults" data-placeholder="Adults">
                <option>Adults</option>
                <option value="1">1 adult</option>
                <option value="2">2 adults</option>
                <option value="3">3 adults</option>
                <option value="4">4 adults</option>
              </select>
            </span>
            <span class="children select-box">
              <select name="children" data-placeholder="Children">
                <option>Children</option>
                <option value="1">1 children</option>
                <option value="2">2 childrens</option>
                <option value="3">3 childrens</option>
                <option value="4">4 childrens</option>
              </select>
            </span>
            <span class="submit-btn">
              <button class="btn btn-transparent-gray">Book Now</button>
            </span>
          </form>
        </div>
        <div class="contact-right pull-right">
          <div class="header-booking">
            <button class="header-btn"><i class="fa fa-calendar"></i></button>
            <div class="booking-form">
              <form action="index.html" class="default-form">
                <span class="destination input">
                  <input type="text" placeholder="Destination">
                </span>
                <span class="arrival calendar">
                  <input type="text" name="arrival" placeholder="Arrival" data-dateformat="m/d/y">
                  <i class="fa fa-calendar"></i>
                </span>
                <span class="departure calendar">
                  <input type="text" name="departure" placeholder="Departure" data-dateformat="m/d/y">
                  <i class="fa fa-calendar"></i>
                </span>
                <span class="adults select-box">
                  <select name="adults" data-placeholder="Adults">
                    <option>Adults</option>
                    <option value="1">1 adult</option>
                    <option value="2">2 adults</option>
                    <option value="3">3 adults</option>
                    <option value="4">4 adults</option>
                  </select>
                </span>
                <span class="children select-box">
                  <select name="children" data-placeholder="Children">
                    <option>Children</option>
                    <option value="1">1 children</option>
                    <option value="2">2 childrens</option>
                    <option value="3">3 childrens</option>
                    <option value="4">4 childrens</option>
                  </select>
                </span>
                <span class="submit-btn">
                  <button class="btn btn-transparent-gray">Book Now</button>
                </span>
              </form>
            </div>
          </div>
          <div class="header-social">
            <button class="header-btn"><i class="fa fa-share-alt"></i></button>
            <nav class="header-nav">
              <ul class="custom-list">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </nav>
          </div>
          <div class="header-login">
            <button class="header-btn"><i class="fa fa-power-off"></i></button>
            <div class="header-form">
              <form action="index.html" class="default-form">
                <p class="alert-message warning"><i class="ico fa fa-exclamation-circle"></i> All fields are required! <i class="fa fa-times close"></i></p>
                <p class="form-row">
                  <input class="required email" type="text" placeholder="Email">
                </p>
                <p class="form-row">
                  <input class="required" type="password" placeholder="Password">
                </p>
                <p class="form-row">
                  <button class="submit-btn button btn-blue"><i class="fa fa-power-off"></i> Login</button>
                </p>
                <p class="form-row forgot-password">
                  <a href="#">Forgot Password?</a>
                </p>
                <p class="form-row register">
                  <a href="#">Register</a>
                </p>
              </form>
            </div>
          </div>
          <div class="header-menu">
            <button class="header-btn"><i class="fa fa-bars"></i></button>
            <?php
          $args = array(
          'theme_location'  => 'header-menu',
          'menu'            => 'main',
          'container'       => '',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'nav navbar-nav main-nav',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => new Bootstrap_Walker_Nav_Menu()
          );

          wp_nav_menu($args);
          ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header -->
