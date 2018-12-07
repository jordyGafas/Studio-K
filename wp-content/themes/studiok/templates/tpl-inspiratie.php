<?php
/*
Template Name: Inspiration
 */
get_header();?>
		<div class="inspiratie-section row">
    <div class="inspiratie-section-inner">
        <h1 class=""><?php the_title(); ?></h1>
        <div class="inspiratie-container">
            <div class="inspiratie-container-inner">
            <div class="grid">
                <div class="grid-sizer"></div>
                <?php 
                    query_posts(array( 
                        'post_per_page' => '50',
                        'post_type' => 'cpt_inspirations',
                    ));  
                ?> 
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="grid-item">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                <?php endwhile;?>
               
            </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>