<div class="row">
	<!-- Logo -->
	<div class="col-md-4 col-md-offset-4 text-center">
	    <?php if(LogoImage()!=''): ?>
	    	    <a href="<?php bloginfo('siteurl');?>"><img id="default-logo" style="width:150px;" src="<?php echo LogoImage(); ?>"  alt="Gala"></a>
	    <?php else : ?>
	    	<h2 class="logotext"><a href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('name'); ?></a></h2>
		<?php endif; ?>
	</div>
</div>



<!-- Header -->
<header class="text-center">
 <!-- Navigation -->
  <div class="navbar yamm navbar-inverse" id="sticky">
    <div class="container">
	  <div class="col-md-8 col-md-offset-2 text-center">
	      <div class="navbar-header">
	        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
		</div>
	      <div id="navbar-collapse-grid" class="navbar-collapse collapse text-center">
	      				<?php
						$args = array(
						'theme_location'  => 'header-menu',
						'menu'            => 'main',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'nav navbar-nav',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => new wp_bootstrap_navwalker()
						);

						wp_nav_menu($args);
						?>
	      </div>
	    </div>
    </div>
  </div>
</header>
