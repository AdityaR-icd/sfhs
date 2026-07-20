<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SFS
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section class="">
                <div class="container">
                    <div class="page__404">
                        <div class="head__404 font--red">
                            This page doesn’t exist.
                        </div>
                        
                        <div class="info__404">
                            You might have mistyped the address or the page has moved.
                        </div>

                        <div class="info__404">
                            Go back to <span class="font--red italic"><a href="<?php echo get_site_url(); ?>">home</a></span> or <span class="font--red italic"><a href="<?php echo get_site_url(); ?>?s">search</a></span> what you’re looking for.
                        </div>
                    </div>
                </div>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
