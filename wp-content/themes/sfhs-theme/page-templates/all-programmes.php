<?php
/* Template Name: All Programmes  */
?>

<?php
get_header();
?>

<div id="primary" class="content-area templatePage allProgrammesPage">
    <main id="main" class="site-main">

        <!--- Header with Video Or Image --->

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
								$triPos = '';
								$triPosArr = CFS()->get( 'header_image_triangle' );
								if ( ! empty( $triPosArr ) ) {
									foreach ( (array) $triPosArr as $key => $label ) {
										$triPos = $label;
									}
								}
							?>
                        <div class="header__img__cont <?php echo $triPos; ?>">

                            <?php
									$introVideo = CFS()->get('intro_video');
									if ($introVideo) {
										// video available
								?>
                            <div
                                class="pos_relative img-position playIcon__center inView customPlay mouseHover mobile__squareVideo">
                                <video class="static_video video-js vjs-16-9" preload="meta"
                                    data-setup='{ "controls": false, "autoplay": false }'>
                                    <source src="<?php echo $introVideo; ?>" type="video/mp4">
                                </video>
                                <button class="o-play-btn">
                                    <i class="o-play-btn__icon">
                                        <div class="o-play-btn__mask"></div>
                                    </i>
                                </button>
                            </div>

                            <?php
									} else {
										// no video
								?>
                            <img src="<?php echo CFS()->get('desktop_lead_image'); ?>" class="img-responsive hidden-xs"
                                alt="">
                            <img src="<?php echo CFS()->get('mobile_lead_image'); ?>"
                                class="m-fullwidth img-responsive hidden-sm hidden-lg hidden-md" />
                            <?php
									}
								?>

                            <span class="triangle__top--white hidden-xs hidden-sm"></span>
                            <span class="triangle__right--white hidden-xs hidden-sm"></span>
                            <span class="triangle__bottom--white hidden-xs hidden-sm"></span>
                            <span class="triangle__left--white hidden-xs hidden-sm"></span>
                        </div>

                    </div>
                </div>


            </div>
        </section>

        <!--- Header with Video Or Image end --->

        <?php
				// Content rows — odd rows put the media left, even rows put it right.
				$i = 0;
				$content_rows = CFS()->get( 'content' );
				foreach ( (array) $content_rows as $content ) {
					$i++;

						if ($i % 2 !== 0 ) {
							// left image right text
						?>

        <!--- Left Image Right Text --->
        <section class="mB__120 mobile__mB-100">
            <div class="container">
                <div class="row templateContent__Container">
                    <div class="col-lg-6 col-lg-offset-1 templateContent__center">
                        <span class="leftImage">
                            <?php
													if($content['content_video']){
												?>
                            <div class="play-btn first homeTestimonials ibdp-video">
                                <div class="playIcon__bottomLeft customPlay inView">
                                    <video class="video-js static_video" preload="none"
                                        data-setup='{ "controls": false, "autoplay": false  }'
                                        poster="<?php echo $content['video_thumb']; ?>" playsinline>
                                        <source src="<?php echo $content['content_video']; ?>" type="video/mp4">
                                    </video>
                                    <span class="homeVideo__caption"><?php echo $content['video_caption']; ?></span>

                                    <button aria-label="button" role="button" class="o-play-btn">
                                        <i class="o-play-btn__icon">
                                            <div class="o-play-btn__mask"></div>
                                        </i>
                                    </button>
                                    <div class="homeVideo__info">
                                        <span class="homeCarousel__name"><?php echo $content['student_name']; ?></span>
                                        <span
                                            class="homeCarousel__class"><?php echo $content['student_class']; ?></span>
                                    </div>
                                </div>


                            </div>
                            <?php
													} else {
														echo '<img src="'.$content['content_image'].'" class="img-responsive" alt="">';
													}
												?>
                        </span>
                    </div>
                    <div class="col-lg-4 templateContent__center">
                        <?php  echo $content['content_text']; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--- Left Image Right Text end --->

        <?php
						} else {
							// right image left text
						?>


        <!--- Right Image Left Text --->
        <section class="mB__120 mobile__mB-100">
            <div class="container">
                <div class="row templateContent__Container">
                    <div class="col-lg-6 col-lg-push-5 templateContent__center">
                        <span class="rightImage">
                            <?php
													if($content['content_video']){
												?>
                            <div class="play-btn first homeTestimonials ibdp-video">
                                <div class="playIcon__bottomLeft customPlay inView">
                                    <video class="video-js static_video" preload="none"
                                        data-setup='{ "controls": false, "autoplay": false  }'
                                        poster="<?php echo $content['video_thumb']; ?>" playsinline>
                                        <source src="<?php echo $content['content_video']; ?>" type="video/mp4">
                                    </video>
                                    <span class="homeVideo__caption"><?php echo $content['video_caption']; ?></span>

                                    <button aria-label="button" role="button" class="o-play-btn">
                                        <i class="o-play-btn__icon">
                                            <div class="o-play-btn__mask"></div>
                                        </i>
                                    </button>
                                    <div class="homeVideo__info">
                                        <span class="homeCarousel__name"><?php echo $content['student_name']; ?></span>
                                        <span
                                            class="homeCarousel__class"><?php echo $content['student_class']; ?></span>
                                    </div>
                                </div>


                            </div>
                            <?php
													} else {
														echo '<img src="'.$content['content_image'].'" class="img-responsive" alt="">';
													}
												?>
                        </span>
                    </div>

                    <div class="col-lg-4 col-lg-offset-1 col-lg-pull-6 templateContent__center">
                        <?php  echo $content['content_text']; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--- Right Image Left Text end --->

        <?php
						} // else end

				} // end foreach
			?>

        <?php
            // A Student's Journey — the timeline is supplied as a finished artwork rather
            // than built in markup, so the section is just heading + intro + image. Mobile
            // image is optional; without one the desktop artwork is used at both sizes.
            $journeyImage       = CFS()->get( 'journey_image' );
            $journeyImageMobile = CFS()->get( 'journey_image_mobile' );
            if ( $journeyImage ) :
        ?>

        <!--- A Student's Journey --->
        <section class="mB__120 mobile__mB-100 journey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h2 class="journey__heading"><?php echo CFS()->get( 'journey_heading' ); ?></h2>
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <div class="journey__intro"><?php echo CFS()->get( 'journey_intro' ); ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="journey__image">
                            <?php if ( $journeyImageMobile ) : ?>
                            <img src="<?php echo $journeyImage; ?>" class="img-responsive hidden-xs" alt="">
                            <img src="<?php echo $journeyImageMobile; ?>"
                                class="img-responsive hidden-sm hidden-md hidden-lg" alt="">
                            <?php else : ?>
                            <img src="<?php echo $journeyImage; ?>" class="img-responsive" alt="">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--- A Student's Journey end --->

        <?php endif; ?>

        <?php
            // Quick Comparison — a plain table so the copy stays editable. The number of
            // columns is driven by how many column labels exist (max 5, matching cell_1..5);
            // cells past that are ignored, so dropping a column is a backend-only change.
            $comparisonColumns = (array) CFS()->get( 'comparison_columns' );
            $comparisonRows    = (array) CFS()->get( 'comparison_rows' );
            $comparisonColSpan = min( count( $comparisonColumns ), 5 );
            if ( $comparisonColSpan && $comparisonRows ) :
        ?>

        <!--- Quick Comparison --->
        <section class="mB__220 mobile__mB-100 comparison">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="comparison__heading"><?php echo CFS()->get( 'comparison_heading' ); ?></h2>
                    </div>
                </div>

                <div class="row pos_relative">
                    <div class="col-lg-12">
                        <!-- .spaces__angle is the theme's red angled corner (Our Spaces,
                             school page). It anchors to the .pos_relative row, so keep both. -->
                        <div class="spaces__angle">
                            <div class="comparison__scroll">
                                <table class="comparison__table">
                                    <thead>
                                        <tr>
                                            <?php for ( $c = 0; $c < $comparisonColSpan; $c++ ) : ?>
                                            <th><?php echo $comparisonColumns[ $c ]['column_label']; ?></th>
                                            <?php endfor; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $comparisonRows as $row ) : ?>
                                        <tr>
                                            <?php for ( $c = 1; $c <= $comparisonColSpan; $c++ ) : ?>
                                            <td><?php echo $row[ 'cell_' . $c ]; ?></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--- Quick Comparison end --->

        <?php endif; ?>

        <?php
            // Distinctive Features — heading + copy on the left, numbered list on the
            // right. The list is a single rich-text field: author it as an <ol> and the
            // big red numerals come from CSS counters, so no per-item fields.
            $featuresList = CFS()->get( 'features_list' );
            $featuresText = CFS()->get( 'features_text' );
            if ( $featuresList || $featuresText ) :
        ?>

        <!--- Distinctive Features --->
        <section class="mB__180 mobile__mB-100 features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="features__heading"><?php echo CFS()->get( 'features_heading' ); ?></h2>
                        <div class="features__text"><?php echo $featuresText; ?></div>
                    </div>

                    <div class="">
                        <div class="features__list"><?php echo $featuresList; ?></div>
                    </div>
                </div>
            </div>
        </section>
        <!--- Distinctive Features end --->

        <?php endif; ?>

        <?php
				// Further programme components go here — add the matching fields to the
				// "All Programmes" field group (Custom Fields > All Programmes) first.
			?>

        <?php
            // Dive Into The Programmes — one heading, then a loop row per programme.
            // Odd rows put the image left, even rows put it right; the alternation is
            // driven by the row index, so the editor only orders the loop.
            $diveHeading    = CFS()->get( 'dive_heading' );
            $diveProgrammes = (array) CFS()->get( 'dive_programmes' );
            if ( $diveProgrammes ) :
        ?>

        <!--- Dive Into The Programmes --->
        <section class="mB__180 mobile__mB-100 dive">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="dive__heading"><?php echo $diveHeading; ?></h2>
                    </div>
                </div>

                <?php
                    $d = 0;
                    foreach ( $diveProgrammes as $programme ) :
                        $d++;
                        $imageLeft = ( $d % 2 !== 0 );
                        ob_start();
                ?>
                <div class="col-lg-7 col-lg-offset-1 <?php echo $imageLeft ? '' : ''; ?> templateContent__center">
                    <span class="<?php echo $imageLeft ? 'leftImage' : 'rightImage'; ?> dive__media">
                        <img src="<?php echo esc_url( $programme['programme_image'] ); ?>" class="img-responsive"
                            alt="<?php echo esc_attr( $programme['programme_title'] ); ?>">
                    </span>
                </div>
                <?php
                        $mediaCol = ob_get_clean();
                        ob_start();
                ?>
                <div class="col-lg-4 col-lg-offset-1  <?php echo $imageLeft ? '' : ''; ?> templateContent__center">
                    <h3 class="dive__title"><?php echo esc_html( $programme['programme_title'] ); ?></h3>
                    <div class="dive__text"><?php echo $programme['programme_text']; ?></div>
                    <?php if ( ! empty( $programme['programme_link'] ) ) : ?>
                    <a class="dive__link" href="<?php echo esc_url( $programme['programme_link'] ); ?>">
                        Details <span>&gt;</span>
                    </a>
                    <?php endif; ?>
                </div>
                <?php
                        $textCol = ob_get_clean();
                ?>

                <div class="row templateContent__Container dive__row">
                    <?php echo $imageLeft ? $mediaCol . $textCol : $textCol . $mediaCol; ?>
                </div>

                <?php endforeach; ?>
            </div>
        </section>
        <!--- Dive Into The Programmes end --->

        <?php endif; ?>

        <?php
            // FAQs — an accordion, one panel open at a time. The panels are plain
            // `display:none` divs toggled by assets/js/script.js; `aria-expanded` on the
            // button is both the a11y state and the CSS hook for the open styling.
            $faqs = (array) CFS()->get( 'faqs' );
            if ( $faqs ) :
        ?>

        <!--- FAQs --->
        <section class="mB__180 mobile__mB-100 faqs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="faqs__heading"><?php echo CFS()->get( 'faqs_heading' ); ?></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="faqs__list">
                            <?php $f = 0; foreach ( $faqs as $faq ) : $f++; ?>
                            <div class="faqs__item">
                                <button type="button" class="faqs__question" id="faq-question-<?php echo $f; ?>"
                                    aria-expanded="false" aria-controls="faq-answer-<?php echo $f; ?>">
                                    <span class="faqs__label"><?php echo esc_html( $faq['faq_question'] ); ?></span>
                                    <span class="faqs__icon" aria-hidden="true">
                                        <svg class="faqs__chevron" width="20" height="12" viewBox="0 0 20 12">
                                            <path d="M1 1l9 9 9-9" fill="none" stroke="currentColor"
                                                stroke-width="1.5" />
                                        </svg>
                                        <svg class="faqs__cross" width="18" height="18" viewBox="0 0 18 18">
                                            <path d="M1 1l16 16M17 1L1 17" fill="none" stroke="currentColor"
                                                stroke-width="1.5" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="faqs__answer" id="faq-answer-<?php echo $f; ?>" role="region"
                                    aria-labelledby="faq-question-<?php echo $f; ?>">
                                    <div class="faqs__answer-inner"><?php echo $faq['faq_answer']; ?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--- FAQs end --->

        <!-- Upcoming infrastructure
additions -->
        <!-- Upcoming infrastructure
additions End -->

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>