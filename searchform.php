<?php
/**
 * The Serach Form for our theme.
 *
 *
 * @package Causes
 */
?>
<form class="search-form" action="<?php echo esc_url(home_url('/')); ?>" method="post">
	<div class="search-field-container">
		<input class="search-field" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search here', 'causes' );  ?>" />
	</div>
	<input class="icon-search" type="submit" name="search" value="" />
</form>
