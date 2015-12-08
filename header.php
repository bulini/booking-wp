<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bootstrapwp
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
	    <div class="header-top">
	      <div class="container">
	        <div class="row">
	          <div class="col-lg-5 col-md-5 col-sm-12">
	            <ul class="contact-info custom-list list-inline">
	              <li><i class="fa fa-phone"></i><span><?php echo mytheme_get_option('phone'); ?></span></li>
	              <li><i class="fa fa-envelope"></i><span><?php echo mytheme_get_option('email'); ?></span></li>
	            </ul>
	          </div>
	          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 text-right pull-right">
	            <div class="contact-right">
	              <ul class="social custom-list list-inline">
	                <li><a href="<?php echo mytheme_get_option('facebook_url');?>"><i class="fa fa-facebook-square"></i></a></li>
	                <li><a href="<?php echo mytheme_get_option('twitter_url');?>"><i class="fa fa-twitter-square"></i></a></li>
	                <!--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>-->
	              </ul>
								<!--
								<div class="header-login">
	                <button class="login-toggle header-btn"><i class="fa fa-power-off"></i> Login</button>
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
							-->
	              <div class="header-language">
	                <button class="header-btn"><i class="fa fa-globe"></i>EN</button>
	                <nav class="header-nav">
	                  <ul class="custom-list">
	                    <li class="active"><a href="#">EN</a></li>
	                    <li><a href="#">DE</a></li>
	                    <li><a href="#">FR</a></li>
	                    <li><a href="#">IT</a></li>
	                  </ul>
	                </nav>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
			<!--header -->

			<div class="header-navi">
				<div class="container">
					<div class="row">
						<div class="col-md-12" id="bs-example-navbar-collapse-1">
							<div class="row">
								<div class="col-lg-5 col-md-5 col-sm-12">
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
								<div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-12 col-sm-offset-0">
									<?php
								$args = array(
								'theme_location'  => 'header-menu',
								'menu'            => 'right',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'nav navbar-nav main-nav pull-right text-right',
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
				</div>
			</div>
			</header>
			<!-- End Header -->

			  <!-- Start Header-Toggle -->
			  <div id="header-toggle">
			    <i class="fa fa-bars"></i>
			  </div>
			  <!-- End Header-Toggle -->

			  <!-- Start Header-Logo -->
			  <div class="header-logo">
			    <div class="header-logo-inner">
			      <div class="css-table">
			        <div class="css-table-cell">
								<?php if (LogoImage()) { ?>
										<a href="#"><img src="<?php echo LogoImage(); ?>" style="max-width:150px;" class="img-responsive center-block" alt="<?php bloginfo('name'); ?>" /></a>
										<?php } else { ?>
											<h2><a class="navbar-brand" href="#">Hotel Logo</a></h2>
											<?php } ?>
			        </div>
			      </div>
			    </div>
			  </div>
			  <!-- End Header-Logo -->
