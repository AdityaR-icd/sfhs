<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package SFS
 */

get_header();
global $wp_query;
?>
	<style>
		.search__btn{
			display: none;
		}
	</style>

	<section id="primary" class="content-area">
		<main id="main" class="site-main search__Page">

			<section class="mB__80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-11">
							<?php get_search_form(); ?>
                        </div>
                    </div>
					<?php if ( have_posts() ) : ?>

						<!-- <header class="page-header">
							<h1 class="page-title"> -->
								<?php
								/* translators: %s: search query. */
								//printf( esc_html__( 'Search Results for: %s', 'school-website' ), '<span>' . get_search_query() . '</span>' );
								?>
							<!-- </h1> -->
						<!--</header> .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						if($wp_query->max_num_pages > 1):
						?>

						<!-- Start of pagination section -->
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="news__pagination alignCenter">
										<a href="<?php echo esc_url( get_pagenum_link( 1 ) ); ?>" class="firstPage"></a>
										
										<span class="pagination__number">
											<?php pagination_bar( $wp_query );?>
										</span>
										
										<a href="<?php echo esc_url( get_pagenum_link( $wp_query->max_num_pages ) ); ?>" class="lastPage"></a>
									</div>
								</div>
							</div>
						</div>
						<!-- End of Pagination section -->
					
					<?php
						else:

						endif;
					
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
