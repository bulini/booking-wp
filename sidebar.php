<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package bootstrapwp
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<!--<div class="sidebar-widget">
		<form action="index.html" class="default-form search-form">
			<input placeholder="Search" type="text">
			<button><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="sidebar-widget">
		<h5 class="widget-title">Categories</h5>
		<ul class="custom-list list categories-list">
			<li><a href="#">Lifestyle</a></li>
			<li><a href="#">Luxury</a></li>
			<li><a href="#">CEO Corner</a></li>
			<li><a href="#">Leisure</a></li>
		</ul>
	</div>
	<div class="sidebar-widget">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
	<div class="sidebar-widget">
		<h5 class="widget-title">Tags</h5>
		<ul class="custom-list list-inline tags-list">
			<li><a href="#">Lifestyle</a></li>
			<li><a href="#">Luxury</a></li>
			<li><a href="#">Money</a></li>
			<li><a href="#">Professional</a></li>
			<li><a href="#">Multilingual</a></li>
			<li><a href="#">Expensive</a></li>
			<li><a href="#">Top Class</a></li>
		</ul>
	</div>
-->
</div>
