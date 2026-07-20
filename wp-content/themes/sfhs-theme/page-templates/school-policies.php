<?php 
/* Template Name: School Policies  */
?>

<?php
get_header();
?>


<style>
.templatePage h2 {margin: 60px 0 20px;}

.templatePage a {
    text-transform: none;
    font-family: 'Work Sans', sans-serif;
    font-size: 17px;
    line-height: 24px;
    color: #1e1e1e;
    font-weight: normal;
    letter-spacing: 0;
}

.twoColumnTemplate .templateHeading {
    margin: 55px 0 20px 0;
}

.templatePage a {padding-bottom: 5px;}

li {
    padding: 0 !important;
}

.templatePage ul > li > ul {
    margin: 5px 0;
}

.templatePage ul {
    margin: -10px 0 0 0;
}

.templatePage a::after {
    top: 1px;
    position: relative;
}

@media (max-width: 768px) {
    
    .templatePage a {
        padding-bottom: 15px;
    }

    .templatePage ul {
        margin-bottom: 10px;
    }


}

</style>

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
