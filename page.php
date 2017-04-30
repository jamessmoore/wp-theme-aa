<?php
/**
 * The template for displaying all pages.
 *
 * @package Causes
 */
  get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
 		<div id="content" class="content">
			<div class="section-page-title">
				<div class="container">
					<div class="gutter">
				        <h5><?php the_title(); ?></h5>
					</div>
				</div>
			</div>
			<div class="section-inner-page">
				<div class="container">
					<div class="column-container">
						<div class="column-9-12 left">
							<div class="gutter">
								<div class="page-container">
									<article class="article-single">
										<?php the_content(); ?>
									</article>
									<p><?php posts_nav_link(); ?></p>
									<div class="padinate-page"><?php wp_link_pages(); ?></div>
									<?php comments_template(); ?>
								</div>
							</div>
						</div>
						<div class="column-3-12 right">
							<div class="gutter">
						<nav class="sidebar-container">
<?php

$user = wp_get_current_user();
if ( has_nav_menu( 'secure-agents-menu' ) && (in_array( 'agent', (array) $user->roles ))) {
?>
                               <h3 class="widget-title">Agents</h3>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'secure-agents-menu', 'items_wrap'  => '<ul class="menu-frontpage">%3$s</ul>'  ) );
                                         echo "<br /><br />";?>
<?php } ?>

<?php

if ( has_nav_menu( 'secure-members-menu' ) && (in_array( 'member', (array) $user->roles ))) {
?>
                               <h3 class="widget-title">Members</h3>

							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'secure-members-menu', 'items_wrap'  => '<ul class="menu-frontpage">%3$s</ul>'  ) );
                                                                                               echo "<br /><br />";?>
<?php  }
?>

							<?php if ( has_nav_menu( 'front-page-menu' ) ) { ?>
                               <h3 class="widget-title">Quick Links</h3>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'front-page-menu', 'items_wrap'  => '<ul class="menu-frontpage">%3$s</ul>'  ) ); ?>
							<?php } ?>
						</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php endwhile; ?>
<?php get_footer(); ?>
