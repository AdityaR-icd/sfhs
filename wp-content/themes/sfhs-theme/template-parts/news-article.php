<?php 
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SFS
 */
?>

    <section class="mB__120 newsArticle__page mobile__mB-40">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2><?php echo get_the_title(); ?></h2>
                    <h3><?php echo get_the_date(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </div>
            
            <!-- Image Loop -->
            <?php 
                if(CFS()->get( 'news_images' )){
            
            ?>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="newsArticle__carousel">
                                <?php 
                                    $loop = CFS()->get( 'news_images' ); 
                                    foreach ( $loop as $images ) {
                                ?>
                                        <div><img data-lazy="<?php echo $images['image'];?>" class="img-responsive" alt=""></div>	

                                <?php    
                                    }
                                ?>
                                
                            </div>
                            <div class="newsArticle__carouselNav">
                                <?php 
                                    $loop = CFS()->get( 'news_images' ); 
                                    foreach ( $loop as $images ) {
                                ?>
                                        <div><img data-lazy="<?php echo $images['image'];?>" class="img-responsive" alt=""></div>	

                                <?php    
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
            <!-- End of Image Loop -->

        </div>
    </section>
    <?php 
        $prev_post = get_previous_post(); 
        $next_post = get_next_post();
        $curr_post = get_the_ID();
    ?>

    <section class="mB__80">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6 col-md-offset-1">
                    <?php if ($prev_post->ID != ''){ ?>
                        <a href="<?php echo get_post_permalink($prev_post->ID); ?>">
                            <span class="news__single-post">PREVIOUS ARTICLE</span>
                            <span class="news__single-date"><?php echo mysql2date('d F Y', $prev_post->post_date, false) ?></span>
                            <span class="news__single-title"><?php echo apply_filters( 'the_title', $prev_post->post_title ); ?></span>
                        </a>
                    <?php } else { }?>
                </div>
                <div class="col-md-3 col-md-offset-4 col-xs-6 alignRight">
                    <?php if ($next_post->ID != '') { ?>
                        <a href="<?php echo get_post_permalink($next_post->ID); ?>">
                            <span class="news__single-post">NEXT ARTICLE</span>
                            <span class="news__single-date"><?php echo mysql2date('d F Y', $next_post->post_date, false) ?></span>
                            <span class="news__single-title"><?php echo apply_filters( 'the_title', $next_post->post_title ); ?></span>
                        </a>
                    <?php } else { } ?>
                </div>
            </div>
        </div>
    </section>
			
	


<script>


$('.newsArticle__carousel').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.newsArticle__carouselNav'
});
$('.newsArticle__carouselNav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.newsArticle__carousel',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});


</script>
