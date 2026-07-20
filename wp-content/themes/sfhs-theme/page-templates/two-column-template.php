<?php 
/* Template Name: Two Column Template  */
?>

<?php
get_header();
?>
	
	<div id="primary" class="content-area templatePage twoColumnTemplate">
		<main id="main" class="site-main">

			<section class="mB__80">
				<div class="container">
					<div class="row">
						<div class="col-md-11 col-md-offset-1">
							<h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
						</div>
					</div>
				</div>
                <?php $introPara = CFS()->get('intro_para_1'); ?>
                <div class="container">
                    <div class="row templateContent__Container">
                        <div class="col-md-5 col-md-offset-1">
                            <span class="paddingRight">
                                <?php echo CFS()->get( 'intro_para_1' ); ?>
                            </span>
                        </div>
                        <div class="col-md-5">
                            <span class="paddingRight">
                                <?php echo CFS()->get( 'intro_para_2' ); ?>
                            </span>
                        </div>
                    </div>
				</div>
			</section>		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
<script>



</script>
