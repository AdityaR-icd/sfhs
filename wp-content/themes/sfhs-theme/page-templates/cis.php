<?php
/* Template Name: CIS  */
?>

<?php
get_header();
?>

<div id="primary" class="content-area templatePage IBPage">
    <main id="main" class="site-main">

        <!--- Header with Lead Image --->

        <section class="mB__120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="head-nav sectionHeading templateHeading"><?php echo get_the_title(); ?></h1>
                    </div>
                </div>
            </div>
            <div class="container m-fullwidth">
                <div class="row">
                    <div class="col-lg-12 no-padding">

                        <?php
								// Which corner the white triangle bites out of the lead image.
								// The field is a single select, but CFS hands back an array —
								// same unwrapping as the IB Program template this follows.
								$triPosArr = CFS()->get( 'header_image_triangle' );
								$triPos = '';
								foreach ( (array) $triPosArr as $key => $label ) {
									$triPos = $label;
								}

								$desktopLeadImage = CFS()->get( 'desktop_lead_image' );
								$mobileLeadImage  = CFS()->get( 'mobile_lead_image' );
							?>
                        <div class="header__img__cont <?php echo $triPos; ?>">

                            <?php if ( $desktopLeadImage ) : ?>
                            <img src="<?php echo $desktopLeadImage; ?>" class="img-responsive hidden-xs" alt="">
                            <?php endif; ?>

                            <?php if ( $mobileLeadImage ) : ?>
                            <img src="<?php echo $mobileLeadImage; ?>"
                                class="m-fullwidth img-responsive hidden-sm hidden-lg hidden-md" />
                            <?php endif; ?>

                            <span class="triangle__top--white hidden-xs hidden-sm"></span>
                            <span class="triangle__right--white hidden-xs hidden-sm"></span>
                            <span class="triangle__bottom--white hidden-xs hidden-sm"></span>
                            <span class="triangle__left--white hidden-xs hidden-sm"></span>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <?php
				// Content blocks: heading and copy on the left, image on the right.
				// Unlike the IB Program template these don't alternate sides — every
				// row uses the same arrangement. The grid classes are that template's
				// "right image, left text" pair, so the column widths, vertical
				// centring and image padding all come from styles already in the theme.
				$content_rows = CFS()->get( 'content' );

				foreach ( (array) $content_rows as $content ) :
			?>

        <!--- Left Heading and Text, Right Image --->
        <section class="mB__120 mobile__mB-100 cisContent">
            <div class="container">
                <div class="row templateContent__Container">

                    <div class="col-lg-6 col-lg-push-6 templateContent__center">
                        <?php if ( $content['content_image'] ) : ?>
                        <span class="rightImage">
                            <img src="<?php echo $content['content_image']; ?>" class="img-responsive" alt="">
                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-5 col-lg-offset-1 col-lg-pull-6 templateContent__center">
                        <?php if ( $content['content_heading'] ) : ?>
                        <h2><?php echo $content['content_heading']; ?></h2>
                        <?php endif; ?>
                        <?php echo $content['content_text']; ?>
                    </div>

                </div>
            </div>
        </section>
        <!--- Left Heading and Text, Right Image end --->

        <?php endforeach; ?>

        <?php
				// Feature blocks, following the features_loop section on Our Aim: three
				// across, every other one a red block with white text. All of the card
				// styling — the fixed card height, the skewed red shapes and their
				// corner triangles — comes from that section's existing classes.
				$featuresLoop   = CFS()->get( 'features_loop' );
				$featuresHeading = CFS()->get( 'section_3_heading' );

				if ( ! empty( $featuresLoop ) ) :
			?>

        <!--- Feature Blocks --->
        <section class="mB__160 mobile__mB-80 cisFeatures">

            <?php if ( $featuresHeading ) : ?>
            <div class="container mB__80 mobile__mB-40">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="cisHeading"><?php echo $featuresHeading; ?></h2>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="container mobile__scroll">
                <div class="row flex__box featuresFlexbox">

                    <?php
								// The red cards cycle through the four skew variants, the same
								// way Our Aim hands red1..red4 to its odd-numbered blocks.
								$redBlocks = [ 'featureSection__red1', 'featureSection__red2', 'featureSection__red3', 'featureSection__red4' ];
								$redIndex  = 0;

								foreach ( $featuresLoop as $curr => $feature ) :

									if ( 0 === $curr % 2 ) :
							?>

                    <div class="col-md-4 ">
                        <div class="feature__section-padding">
                            <div class="feature__section">
                                <span
                                    class="feature__heading font--red"><?php echo $feature['feature_heading']; ?></span>
                                <span class="feature__description"><?php echo $feature['feature_description']; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php
									else :
										$classBlock = $redBlocks[ $redIndex % 4 ];
										$redIndex++;
							?>

                    <div class="col-md-4 ">
                        <div class="feature__section-padding <?php echo $classBlock; ?>">

                            <span class="feature__leftTriangle"></span>
                            <span class="feature__topTriangle"></span>
                            <span class="feature__rightTriangle"></span>
                            <span class="feature__bottomTriangle"></span>

                            <div class="feature__section bgcolor__red">
                                <span
                                    class="feature__heading font--white"><?php echo $feature['feature_heading']; ?></span>
                                <span
                                    class="feature__description font--white"><?php echo $feature['feature_description']; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php
									endif;

								endforeach;
							?>

                </div>
            </div>
        </section>
        <!--- Feature Blocks end --->

        <?php endif; ?>

        <?php
				$commitmentImage   = CFS()->get( 'commitment_image' );
				$commitmentLead    = CFS()->get( 'commitment_lead' );
				$commitmentText    = CFS()->get( 'commitment_text' );
				$commitmentHeading = CFS()->get( 'section_4_heading' );

				if ( $commitmentImage || $commitmentLead || $commitmentText ) :
			?>

        <!--- Closing Statement --->
        <section class="cisCommitment mB__80">

            <?php if ( $commitmentHeading ) : ?>
            <div class="container mB__80 mobile__mB-40">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="cisHeading"><?php echo $commitmentHeading; ?></h2>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ( $commitmentImage ) : ?>
            <div class="container-fluid no-padding pos_relative">
                <img src="<?php echo $commitmentImage; ?>" class="img-responsive cisCommitment__image" alt="">
            </div>
            <?php endif; ?>

            <div class="our__commitment-footer <?php echo $commitmentImage ? '' : ' cisCommitment__block--noImage'; ?>">
                <div class="container">
                    <div class="our__aim-content">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <span class="aim__Heading-P">
                                    <span class="font--red"><?php echo $commitmentLead; ?></span>
                                    <?php echo $commitmentText; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!--- Closing Statement end --->

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>