<?php 
/* Template Name: New Admission Template  */
?>

<?php
get_header();

?>

<div id="primary"
    class="content-area templatePage sidebarTemplate newadmission <?php echo (get_post_field('post_name', get_post()) === 'admission-sfhs-new-chandigarh') ? 'greentheme' : 'redtheme'; ?>">
    <main id="main" class="site-main">

        <!--- Header with Video Or Image --->
        <section class="mB__120">
            <div class="container">

                <div class="row admissionfirstComponent">
                    <div class="col-md-11  tabitem-wrapper">
                        <!-- <h1 class="head-nav sectionHeading templateHeading"> <?php echo get_the_title(); ?></h1> -->
                        <a class="tabitem <?php echo (get_post_field('post_name', get_post()) === 'admission-sfhs-chandigarh') ? 'activeTab' : ''; ?>"
                            href="./admission-sfhs-chandigarh">
                            SFHS, Chandigarh
                        </a>
                        <a class="tabitem <?php echo (get_post_field('post_name', get_post()) === 'admission-sfhs-new-chandigarh') ? 'activeTab' : ''; ?>"
                            href='./admission-sfhs-new-chandigarh'>SFHS, New Chandigarh</a>
                    </div>
                    <div
                        class='title <?php echo (get_post_field('post_name', get_post()) === 'admission-sfhs-new-chandigarh') ? 'greentitle' : 'redtitle'; ?>'>
                        Strawberry Fields High School
                        <strong>   <?php echo (get_post_field('post_name', get_post()) === 'admission-sfhs-new-chandigarh') ? 'New Chandigarh' : 'Chandigarh'; ?> </strong>
                    </div>

                </div>

                <div class="row admissionsecComponent">

                    <div class="col-md-7 columnone">
                        <?php echo CFS()->get('column_1');?>
                    </div>

                    <div class="col-md-4 columntwo">
                        <div class=""><?php echo CFS()->get('column_2');?></div>
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