<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Causes
 */
?>
<div class="sidebar-container">
	<?php if ( has_nav_menu( 'front-page-menu' ) ) { ?>
									 <h3 class="widget-title">Quick Links</h3>
		 <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'front-page-menu', 'items_wrap'  => '<ul class="menu-frontpage">%3$s</ul>'  ) ); ?>
	<?php } ?>
</div>
