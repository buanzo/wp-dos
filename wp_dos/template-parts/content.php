<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_DOS
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('bs-component mb-6'); ?>>
	<div class="card text-white bg-dark">
		<div class="card-header py-2">
			<?php
			if ( is_singular() ) :
				the_title();
			else :
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			endif;
			?>

			<?php
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					
					
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
		<div class="card-body">
			<h4 class="card-title mb-2"><?php wp_dos_posted_on(); wp_dos_posted_by(); ?></h4>
			<div class="card-text text-white">
			<?php wp_dos_post_thumbnail(); ?>
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp_dos' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp_dos' ),
						'after'  => '</div>',
					)
				);
				?>				
			</div>
		</div>
		<div class="card-footer text-muted">
			<?php wp_dos_entry_footer(); ?>
		</div>
	</div>
</div>





<!-- #post-<?php the_ID(); ?> -->
