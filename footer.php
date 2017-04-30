<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Causes
 */
?>
		<footer id="footer" class="footer">
			<div class="footer-menu-block">
				<div class="container">
						<nav class="menu-footer-container">
							<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'footer-menu', 'items_wrap'  => '<ul class="menu-footer">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu(  array('container'=> '', 'items_wrap'  => '<ul class="menu-footer">%3$s</ul>' ) ); ?>
							<?php } ?>
						</nav>
				</div>
			</div>
			<div class="copyright-block">
				<div class="container">
					<div class="column-container">
						<div class="column-8-12">
							<div class="gutter">
    <p class="text-left"><?php echo sprintf( __('Copyright &copy; '.date('Y').' %s All Rights Reserved.', 'causes'), get_bloginfo('name') );?></p>
							</div>
						</div>
						<div class="column-4-12">
							<div class="gutter">
								 <p class="text-right"><?php do_action( 'causes_display_credits' ); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>
