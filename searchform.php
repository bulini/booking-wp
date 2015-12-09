<?php
/**
 * Search Form Template
 *
 */
?>
<form method="get" action="<?php echo home_url( '/' ); ?>" class="default-form search-form">
	<input placeholder="Search" type="text">
	<button type="submit" class="btn btn-default" name="submit" id="searchsubmit"><i class="fa fa-search"></i> <?php esc_attr_e('Search', 'bootstrapwp'); ?></button>
</form>
