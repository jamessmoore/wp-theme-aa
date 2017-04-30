<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Causes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php get_bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="wrapper">
		<header id="header" class="header">
			<div class="header-block">
				<div class="container">
					<div class="gutter clearfix">
						<nav class="menu-top-site-container">
							<?php if ( has_nav_menu( 'top-menu' ) ) { ?>
								 <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'top-menu', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>'  ) ); ?>
							<?php } ?>
						</nav>
						<?php get_search_form(); ?>
						<?php if ( get_theme_mod('pwt_logo_upload') ) { ?>
						   <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_mod('pwt_logo_upload')); ?>" /></a></h1>
						<?php } else if (get_theme_mod('pwt_text_logo_1',__( 'AdjustingAlternatives', "causes"))){  ?>
						   <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_theme_mod('pwt_text_logo_1',__( 'Adjusting', "causes"))); ?><span><?php echo esc_html(get_theme_mod('pwt_text_logo_2',__( 'Alternatives', "causes"))); ?></span></a></h1>
						<?php } else {  ?>
						   <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
						<?php } ?>
						<a class="icon-menu" href="#"><span>&#160;</span><span>&#160;</span><span>&#160;</span></a>

            <h1 class="site-title"><?php bloginfo('name'); ?></h1>
						<nav class="menu-top-container">
							<?php if ( has_nav_menu( 'main-menu' ) ) { ?>
                <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'main-menu', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu( array('container'=> '', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>' ) ); ?>
							<?php } ?>
						</nav>
						<nav class="menu-top-mob-container">
							<?php if ( has_nav_menu( 'main-menu' ) ) { ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'main-menu', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu(  array('container'=> '', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>' ) ); ?>
							<?php } ?>
						</nav>
					</div>
				</div>
			</div>
		</header>
