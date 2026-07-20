<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SFS
 */

?>

	<div class="row">
		<div class="col-md-8">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<a href="<?php sprintf(esc_url(the_permalink()));?>"><?php the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2>' ); ?></a>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
					//school_website_posted_on();
					// school_website_posted_by();
					?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php //school_website_post_thumbnail(); ?>

			<div class="entry-summary">
			<a href="<?php sprintf(esc_url(the_permalink()));?>"><span class="searchFont"><?php the_excerpt();?></span></a>
				
				
			</div><!-- .entry-summary -->

			<div>
				<a href="<?php sprintf(esc_url(the_permalink()));?>"><?php sprintf(esc_url(the_permalink())); ?></a>
			</div>

			<!-- <footer class="entry-footer"> -->
				<?php //school_website_entry_footer(); ?>
			<!-- </footer> .entry-footer -->
		</article><!-- #post-<?php the_ID(); ?> -->
		</div>
	</div>


