
<!-- Header -->
<header>
  <!-- Navigation -->
  <div class="navbar yamm navbar-default" id="sticky">
    <div class="container">
      <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="<?php the_permalink();?>" class="navbar-brand">         
        <!-- Logo -->
        <div id="logo">
	        
	        <?php if(LogoImage()!=''): ?>
	        <img id="default-logo" src="<?php echo LogoImage(); ?>" alt="Starhotel" style="height:44px;"><img id="retina-logo" src="<?php bloginfo('template_url'); ?>/assets/images/logo-retina.png" alt="Starhotel" style="height:44px;" />
	        <?php else : ?>	        
	        	<h2 class="logotext"><a href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('name'); ?></a></h2>
			<?php endif; ?>
	        </div>
        </a> </div>
      <div id="navbar-collapse-grid" class="navbar-collapse collapse">
      				<?php 
					$args = array(
					'theme_location'  => 'header-menu',
					'menu'            => 'main', 
					'container'       => '', 
					'container_class' => '', 
					'container_id'    => '',
					'menu_class'      => 'nav navbar-nav ', 
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
</header>