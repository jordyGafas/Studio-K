<?php
/*
Template Name: About
 */
get_header();?>
		<div class="project-image">
			<div class="row">
				<div class="row">
					<div class="col sm-12">
						<div class="project-image__thumb i-ratio i-ratio--56 fit">
							<?php
								$image = get_field('about_banner');
								$video = get_field('about_banner_copy');
								$url = $image['url'];
								$alt = $image['alt'];
								$width = $image['width'];
								$height = $image['height'];
								$image_ratio = $image['width'] / $image['height'];

								$size_lg = 'thumb-large';
								$size_md = 'thumb-medium';
								$size_sm = 'thumb-small';

								$thumb_lg = $image['sizes'][ $size_lg ];
								$thumb_md = $image['sizes'][ $size_md ];
								$thumb_sm = $image['sizes'][ $size_sm ];

								$width_lg = $image['sizes'][ $size_lg . '-width' ];
								$width_md = $image['sizes'][ $size_md . '-width' ];
								$width_sm = $image['sizes'][ $size_sm . '-width' ];

							?>
							<?php if (get_field('about_header')=="foto"){?>
							    <img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url; ?>" sizes="100vw" data-srcset="<?php echo $url; ?> <?php echo $width; ?>w, <?php echo $thumb_lg; ?> <?php echo $width_lg; ?>w, <?php echo $thumb_md; ?> <?php echo $width_md; ?>w, <?php echo $thumb_sm; ?> <?php echo $width_sm; ?>w" width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="lazy u-full" alt="<?php echo $alt; ?>">
                            <?php } else {?>
                                <video data-src="<?php echo get_field('about_banner_copy');?>" muted loop autoplay sizes="100vw" width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="u-full" alt="<?php echo $alt; ?>">
                                    <source src="<?php echo get_field('about_banner_copy');?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="about-section">
            <div class="about-section-inner row block">
                <div><h1><?php echo get_field('about_titel'); ?></h1></div>
                <div class="about-section-flex">
                    <div class="column intro-text">
                        <p><?php echo get_field('about_intro'); ?></p>
                    </div>
                    <div class="column pluspoints">
                        <ul class="pluspoints-list">
                        <?php

                            // check if the repeater field has rows of data
                            if( have_rows('about_eigenschappen') ):
                                $count = 0;
                                // loop through the rows of data
                                while ( have_rows('about_eigenschappen') ) : the_row();
                                    $count++;
                                    // display a sub field value
                                    ?>
                                        <li><div>0<?php echo $count; ?>.</div><?php the_sub_field('about_eigenschap'); ?></li>
                                    <?php
                                endwhile;

                            else :

                                // no rows found

                            endif;

                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <div class="zaakvoerdster-section">
        <div class="zaakvoerdster-section-inner row block">
            <div class="column image">
                <div class="image-inner lazy" data-src="<?php echo get_field('about_zaakvoerster_image') ?>" style="background-image: url('')"></div>
            </div>
            <div class="column">
                <div class="description-inner">
                    <div class="title"><h2><?php echo get_field('about_zaakvoerster_titel');  ?></h2></div>
                    <div class="text"><?php echo get_field('about_zaakvoerster_text');  ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="team-section" style="background-color:<?php the_field('color'); ?>">
        <div class="team-section-inner block">
            <h2 class="row"><?php echo get_field('about_team_titel');  ?></h2>
            <div class="team-container row">
                <div class="team-container-inner">
                <?php

                    // check if the repeater field has rows of data
                    if( have_rows('about_team') ):

                        // loop through the rows of data
                        while ( have_rows('about_team') ) : the_row();

                            // display a sub field value
                        ?>
                            <div class="member-container">
                                <div class="member-container-inner" >
                                    <div class="member-image lazy" data-src="<?php the_sub_field('about_team_image'); ?>" style="background-image: url('')"></div>
                                    <div class="member-name"><?php the_sub_field('about_team_naam'); ?></div>
                                    <div class="member-function"><?php the_sub_field('about_team_functie'); ?></div>
                                </div>
                            </div>
                        <?php
                        endwhile;

                    else :

                        // no rows found

                    endif;

                    ?>
                    </div>
                </div>
            </div>
        </div>
    <div>

    <div class="expertise-section">
        <div class="expertise-section-inner block">
            <h2><?php echo get_field('about_expertises_titel');  ?></h2>
            <div class="expertises-container">
                <div class="expertises-container-inner">
                <?php

                    // check if the repeater field has rows of data
                    if( have_rows('about_expertises') ):
                        $count = 0;
                        // loop through the rows of data
                        while ( have_rows('about_expertises') ) : the_row();
                        $count++;
                            // display a sub field value
                        ?>
                            <a class="expertise-container" href="<?php the_sub_field('about_expertise_link'); ?>">
                                <div class="expertise-container-inner">
                                    <div class="cijfer">0<?php echo $count; ?>.</div>
                                    <div><?php echo the_sub_field('about_expertise_text'); ?></div>
                                </div>
                            </a>
                        <?php
                        endwhile;

                    else :

                        // no rows found

                    endif;

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="klanten-section">
        <div class="klanten-section-inner block">
            <h2><?php echo get_field('about_klanten_titel'); ?></h2>
            <div class="klanten-container">
                <div class="klanten-container-inner">
                    <?php

                    // check if the repeater field has rows of data
                    if( have_rows('about_klanten') ):

                        // loop through the rows of data
                        while ( have_rows('about_klanten') ) : the_row();

                            // display a sub field value
                        ?>
                            <div class="klant-container">
                                <a href="<?php the_sub_field('about_klant_link'); ?>">
                                <img class="lazy" data-src="<?php the_sub_field('about_klant'); ?>" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== />
                                </a>
                            </div>
                        <?php
                        endwhile;

                    else :

                        // no rows found

                    endif;

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-container" style="background-color:<?php the_field('color'); ?>">
        <a href="/contact">
            <div class="contact-container-inner">
            <div class="title"><?php echo get_field('about_contact_titel'); ?></div>
            <div class="text"><?php echo get_field('about_contact_text'); ?></div>
            <div class="subtitle"><?php echo get_field('about_contact_afspraak'); ?></div>
            </div>
        </a>
    </div>

<?php get_footer();?>