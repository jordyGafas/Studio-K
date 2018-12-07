<?php
/*
Template Name: Contact
 */
get_header();?>
		
    <div class="contact-page-container">
        <div class="contact-page-container-inner">
            <div class="column contact-info">
                <div class="text"><?php the_field('text') ?></div>
                <div class="contact-row">
                    <div class="email">
                        <a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a>
                    </div>
                    <div class="phone">
                        <a href="tel:<?php the_field('nummer') ?>"><?php the_field('nummer') ?></a>
                    </div>
                </div>
                <div class="contact-row">
                    <div class="straat">
                        <?php the_field('straat_+_nr') ?>
                    </div>
                    <div class="city">
                        <?php the_field('postcode_+_stad') ?>
                    </div>
                </div>
            </div>
            <div class="column contact-image">
                <div class="contact-image-inner" style="background-image:url(<?php the_field('image'); ?>)">
                
                </div>
            </div>
        </div>
    </div>

<?php get_footer();?>