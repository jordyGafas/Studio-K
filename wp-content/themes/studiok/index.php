<?php
/**
 * The index page
 *
 * @subpackage Master
 * @since Master 1.0
 */
get_header(); ?>
    <?php
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) : the_post(); ?>

        <div class="header_image" style='background-image:url(<?php the_field("banner") ?>);'>
        
        </div>
        <div class="row">
            <div class="title-block">
                <div class="dateContainer">
                    <div class="day"><?php the_time('d'); ?></div>
                    <div class="month"><?php echo substr(get_the_time('F'), 0, 4); ?></div>
                    <div class="year"><?php the_time('Y'); ?></div>
                </div>
                <div class="titlecontainer">
                <div class="subtitle"><h3><?php the_field("subtitle") ?></h3></div>
                <div class="title"><h1><?php the_title() ?></h1></div>
                </div>
            </div>
            
            <?php the_content() ?>
            
        </div>
        
        
           
<?php
    endwhile;

    endif;
    ?>

<?php get_footer(); ?>
