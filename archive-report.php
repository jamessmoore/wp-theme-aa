<?php
/**
 * The template for displaying archive
 *
 *
 * @package Causes
 */
get_header(); ?>
<div id="content" class="content">
	<div class="section-page-title">
		<div class="container">
			<div class="gutter">
				<h5><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'causes' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'causes' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'causes' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'causes' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'causes' ) ) . '</span>' );
					else :
						_e( 'Report Archives', 'causes' );
					endif;
				?></h5>
			</div>
		</div>
	</div>
	<?php get_template_part( 'content', 'report' ); ?>
</div>
<?php get_footer(); ?>
