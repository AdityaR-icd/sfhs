<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SFS
 */

get_header();
?>


<?php 
//sort by submit
if(isset($_REQUEST['sort'])){
	if($_REQUEST['sort'] == 'newest' )
		$order = 'DESC'; 
	else if($_REQUEST['sort'] == 'oldest' )
		$order = 'ASC'; 
	
}
else{
		$order = 'DESC'; 
}



// set the "paged" parameter (use 'page' if the query is on a static front page)
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
$args = array (
    // 'nopaging'               	 	=> false,
    'paged'                  	 	=> $paged,
    'posts_per_page'         	 	=> '9',
		'category_name'             => 'news',
		'orderby'										=> 'date',
		'order'											=> $order,
);

// The Query
$query = new WP_Query( $args );
?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main latestNews__page">
			<!-- Title And Feature Image Section -->
			<section class="mB__80">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="head-nav sectionHeading templateHeading">News</h1>
						</div>
					</div>
				</div>
				<div class="container m-fullwidth">
					<div class="row">
						<div class="col-md-12 no-padding">
							<div class="leadImage">
								<img src="<?php bloginfo("template_directory")?>/assets/resources/img/template-img/img-10.png" class="img-responsive hidden-xs" alt="">
								<img src="<?php bloginfo("template_directory")?>/assets/resources/img/template-img/img-10-mobile.png" class="img-responsive m-fullwidth hidden-sm hidden-lg hidden-md " alt="">						
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End of Title And Feature Image Section -->
			
			<!-- Search and Sort Section -->
			<section class="mB__40">
				<div class="container searchContainer">
					<div class="row">
						<div class="col-md-7 col-md-offset-1 searchInput">
							<input type="submit" class="searchBtn newsSeachIcon" value="" onclick="fetch(event)">
							<input type="text" placeholder="Type a keyword" name="keyword" id="keyword" onkeyup="fetch(event)" class="latestNews__search">
						</div>
						<div class="col-md-3">
							<div class="alignRight">
								<span class="news__sortby">Sort By</span>
								<form method="post" id="order" class="sort--form">
									<select name="sort" onchange='this.form.submit()'>
										<option value="newest" <?php if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == 'newest' ){ ?> selected="selected" <?php } ?> >Latest</option> <!-- default -->
										<option value="oldest" <?php if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == 'oldest' ){ ?> selected="selected" <?php } ?> >Oldest</option>
									</select>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- End Of search and Sort Section -->

			
			<section class="mB__80">

				<!-- Start of post list section -->
				<div class="container grid" id="datafetch">

					<?php if ( $query->have_posts() ) : ?>
					
								<!-- <header class="page-header"> -->
								<?php
								// the_archive_title( '<h1 class="page-title">', '</h1>' );
								// the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							<!-- </header> .page-header -->

							<?php
							/* Start the Loop */
							while ( $query->have_posts() ) :
								$query->the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'news' );

							endwhile;

					?>
						</div>
						<!-- End of post list section -->
				
					<?php 
						if($query->max_num_pages > 1) :
					?>
					
						<!-- Start of pagination section -->
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="news__pagination alignCenter">
										<a href="<?php echo esc_url( get_pagenum_link( 1 ) ); ?>" class="firstPage"></a>
										
										<span class="pagination__number">
											<?php pagination_bar( $query );?>
										</span>
										
										<a href="<?php echo esc_url( get_pagenum_link( $query->max_num_pages ) ); ?>" class="lastPage"></a>
									</div>
								</div>
							</div>
						</div>
						<!-- End of Pagination section -->
						<?php
							else :

							endif;
						?>
				
					</section>

					<?php

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						// Restore original Post Data
						wp_reset_postdata();
						
					?>

					
				
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>

<script>
$(document).ready(function(){
	// $('.grid').isotope({
	// 	itemSelector: '.grid-item',
	// 	layoutMode: 'masonry',
	// 	masonry: {
	// 	// columnWidth: 283,
	// 	horizontalOrder: true
	// 	},
	// 	resizesContainer: true,
	// });

	$('.grid').isotope({
		itemSelector: '.grid-item',
		layoutMode: 'packery',
		packery: {
			gutter: 10,
			horizontal: true
		},
		itemSelector: '.mini-item',
		percentPosition: true
	});

});
</script>
