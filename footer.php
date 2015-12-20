<?php $options=load_theme_options(); ?>
<!-- Start Footer -->
<footer id="footer">

	<!-- Start Footer-Top -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12 logo-footer">
					<?php if (LogoImage()) { ?>
							<a href="#"><img src="<?php echo LogoImage(); ?>" style="max-width:150px;" class="img-responsive center-block" alt="<?php bloginfo('name'); ?>" /></a>
							<?php } else { ?>
								<h2><a href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>
				</div>

				<?php dynamic_sidebar( 'footer-1' ); ?>

				<?php dynamic_sidebar( 'footer-2' ); ?>

				<?php dynamic_sidebar( 'footer-3' ); ?>
				<!--
				<div class="col-md-4 widget widget-newsletter">
					<h5 class="title">
						Newsletter
					</h5>
					<form action="#" class="default-form">
						<input type="text" placeholder="Your email">
						<button class="btn btn-transparent pull-right">Sign Up</button>
					</form>
					<div class="social">
						<h5 class="title pull-left">
							Stay in touch
						</h5>
						<ul class="custom-list list-inline pull-right">
							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
						</ul>
					</div>
				</div>
			-->
			</div>
		</div>
	</div>
	<!-- End Footer-Top -->

	<!-- Start Footer-Copyrights -->
	<div class="footer-copyrights">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>&copy; <?php echo date('Y'); ?> - <?php echo $options['footer_text']; ?></p>
				</div>
			</div>
		</div>
	</div>
	<!-- End Footer-Copyrights -->

</footer>
<!-- End Footer -->

</div>
<!-- End Main-Wrapper -->

<?php wp_footer(); ?>
</body>
</html>
