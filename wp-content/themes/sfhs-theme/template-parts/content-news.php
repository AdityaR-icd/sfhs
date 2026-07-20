<?php 
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SFS
 */
?>

<div class="newslist__container grid-item">

        <div class="newsImg__container">
		<a href="<?php echo esc_url(get_the_permalink()); ?>">
	            <?php echo get_the_post_thumbnail(); ?>
		</a>
        </div>
        <span class="publish__date"><?php echo get_the_date(); ?></span>
	<a href="<?php echo esc_url(get_the_permalink()); ?>">
        	<span class="news__title"><?php echo get_the_title(); ?></span>
	</a>
        <span class="news__meta"><?php echo get_the_content();?></span>
    <a href="<?php echo esc_url(get_the_permalink()); ?>">
        <span class="read__more">Read More</span>
    </a>
</div>
