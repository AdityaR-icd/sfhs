<?php 
/* Template Name: Job Opportunities  */
?>

<?php
get_header();
?>
	
	<div id="primary" class="content-area jobPage">
		<main id="main" class="site-main">

			<!--- Heading Section --->
			<section class="mB__80">
				<div class="container">
					<div class="row">
						<div class="col-md-11 col-md-offset-1 col-xs-12">
							<h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
						</div>
					</div>

					<div class="row">
						<div class="col-md-5 col-md-offset-1">
							<?php echo CFS()->get('intro_para_1'); ?>
						</div>
						<div class="col-md-5">
							<?php echo CFS()->get('intro_para_2'); ?>
						</div>
					</div>

					<div class="row templateContent__Container">
						<div class="col-md-5 col-md-offset-1">
							<h3>
                                <?php echo CFS()->get( 'content_heading' ); ?>
							</h3>
						</div>
					</div>

                    <div class="row templateContent__Container">
	
                        <div class="col-md-5 col-md-offset-1">
                            <span class="paddingRight">
                                <?php echo CFS()->get( 'content_para_1' ); ?>
                            </span>
                        </div>
                        <div class="col-md-5">
                            <span class="paddingRight">
                                <?php echo CFS()->get( 'content_para_2' ); ?>
                            </span>
                        </div>
                    </div>

				</div>
			</section>
			
			<!--- Jobs List Section --->

			<section class="mB__80">
				<div class="container">
				<?php 
						// $announcements = CFS()->get('')

						$relargs = array(
							'post_type' =>  array('jobs'),
							'orderby' => 'publish_date', 
							'order' => 'ASC',
							'posts_per_page'=>-1, 
							'numberposts'=>-1
						);

						$relposts = get_posts( $relargs );
						$jobslists = array();
						foreach( $relposts as $current_post ) {
				?>

							<div class="row">
								<div class="col-md-11 col-md-offset-1">
									<h3 class="font--red"><?php echo apply_filters( 'post_title', $current_post->post_title ); ?></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<?php echo apply_filters('the_content', $current_post->post_content); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<span class="applyBtn submit__ripple">
										<!-- ADD SLUG TO URL AND CATCH IN CONTACT FORM 7 -->
										<a href="#jobForm" data-value="<?php echo apply_filters( 'post_title', $current_post->post_title ); ?>" >Apply</a>
									</span>
									<span class="borderBottom"></span>
								</div>
							</div>

				<?php 			
								$jobslists[]	= $current_post->post_title;
							} //end foreach
							// use implode to build a string for JavaScript
							$jobs_list = '["' . implode('", "', $jobslists) . '"]'; 
							
						
				?>
					
				</div>
			</section>
		

			<!--- Contact us Section --->
			<section class="mB__80 <?php if(!$relposts){ echo 'hideDropdown'; } ?>" id="jobForm">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<span class="jobForm__title alignCenter">Fill out the form below and we’ll get in touch with you</span>
						</div>
					</div>
					<?php echo do_shortcode('[contact-form-7 id="104" title="Contact Form (Jobs)"]'); ?>					
					
				</div>
				
			</section>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
<script>
	
var myobject = <?php echo $jobs_list ?>;

var select = document.getElementById("jobsdropdown");
for(index in myobject) {
    select.options[select.options.length] = new Option(myobject[index], myobject[index]);
}

</script>
