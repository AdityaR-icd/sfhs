<?php 
/* Template Name: Right Sidebar Template  */
?>

<?php
get_header();
?>
	
	<div id="primary" class="content-area templatePage sidebarTemplate">
		<main id="main" class="site-main">

			<!--- Header with Video Or Image --->
			<section class="mB__80">
				<div class="container">
					<div class="row">
						<div class="col-md-11 col-md-offset-1">
							<h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
						</div>
					</div>

					<div class="row">
						
						<div class="col-md-7 col-md-offset-1">
							<?php echo CFS()->get('column_1');?>
						</div>

						<div class="col-md-4">
							<div class="sidebarTemplatePadding"><?php echo CFS()->get('column_2');?></div>
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
