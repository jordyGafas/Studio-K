<?php
/**
 * Single custom post type
 *
 * @subpackage Master
 * @since Master 1.0
 */
get_header(); ?>
<?php   // Get terms for post
			$terms = get_the_terms( $post->ID , 'tax_categories' );
			$term = $terms[0];
		?>
<div class="a-trans a-trans--fi a-trans--dia">

	<div class="project-image">
		<div class="row">
			<div class="row">
				<div class="col sm-12">
					<div class="project-image__thumb i-ratio i-ratio--56 fit">
						<?php
								$image = get_field('project_image');
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
						<?php if ( ! empty( $image ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url; ?>"
						 sizes="100vw" data-srcset="<?php echo $url; ?> <?php echo $width; ?>w, <?php echo $thumb_lg; ?> <?php echo $width_lg; ?>w, <?php echo $thumb_md; ?> <?php echo $width_md; ?>w, <?php echo $thumb_sm; ?> <?php echo $width_sm; ?>w"
						 width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="lazy u-full"
						 alt="<?php echo $alt; ?>">
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="project-meta">
		<div class="row">
			<div class="row">
				<div class="col sm-12">
					<div class="meta-list__row">
						<ul class="meta-list">
							<li>
								<div class="meta-list__label">
									<?php the_field('project_locatie_label'); ?>:</div>
								<div class="meta-list__content">
									<?php the_field('project_locatie'); ?>
								</div>
							</li>
							<li>
								<div class="meta-list__label">
									<?php the_field('project_bouwjaar_label'); ?>:</div>
								<div class="meta-list__content">
									<?php the_field('project_bouwjaar'); ?>
								</div>
							</li>
							<li>
								<div class="meta-list__label">
									<?php the_field('project_categorie_label'); ?>:</div>
								<div class="meta-list__content">
									<?php the_field('project_categorie'); ?>
								</div>
							</li>
							<li>
								<div class="meta-list__label">
									<?php the_field('project_werk_vericht_label'); ?>:</div>
								<div class="meta-list__content">
									<?php the_field('project_werk_vericht'); ?>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="project-description">
		<div class="row">
			<div class="row">
				<div class="project-description__meta col sm-12 md-6 lg-6">
					<h2>
						<?php the_title(); ?>
					</h2>
					<p>
						<?php
							$terms = wp_get_post_terms( $post->ID, 'ovg_category' );
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
									foreach ( $terms as $term ) {
										echo '<span>'.$term->name.'</span>';
									}
							}
						?>
					</p>
				</div>
				<div class="project-description__text col sm-12 md-6 lg-6">
					<article class="js-project-description" data-rmore="<?php _e(" Show more", 'more_label' ) ?>" data-rless="
						<?php _e("Show less", 'less_label') ?>">
						<?php the_field('project_text'); ?>
					</article>
				</div>
			</div>
		</div>
	</div>

	<div class="project-grid js-project-grid">
		<?php $count = 1; ?>
		<?php if ( have_rows('project_grid') ): ?>
		<?php while ( have_rows('project_grid') ) : the_row(); ?>
		<?php if ( get_row_layout() == 'full_width' ): ?>
		<div class="row full-width" data-row="<?php echo $count; ?>">
			<div class="row">
				<div class="col sm-12">
					<figure class="full-width__image image-holder i-ratio i-ratio--56 fit">
						<?php if ( get_sub_field('full_width_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('full_width_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
											$image = get_sub_field('full_width_image');
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
						<?php if ( ! empty( $image ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url; ?>"
						 sizes="100vw" data-srcset="<?php echo $url; ?> <?php echo $width; ?>w, <?php echo $thumb_lg; ?> <?php echo $width_lg; ?>w, <?php echo $thumb_md; ?> <?php echo $width_md; ?>w, <?php echo $thumb_sm; ?> <?php echo $width_sm; ?>w"
						 width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="lazy u-full"
						 alt="<?php echo $alt; ?>">
						<?php endif; ?>
					</figure>
				</div>
			</div>
		</div>
		<?php $count++; ?>
		<?php elseif ( get_row_layout() == 'p_l' ): ?>
		<div class="row pl" data-row="<?php echo $count; ?>">
			<div class="row">
				<div class="col sm-12 md-4 lg-4">
					<figure class="pl-p__image image-holder i-ratio i-ratio--112 fit">
						<?php if ( get_sub_field('p_l_p_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('p_l_p_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image = get_sub_field('p_l_p_image');
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
						<?php if ( ! empty( $image ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url; ?>"
						 sizes="(max-width: 40em) 100vw, 50vw" data-srcset="<?php echo $url; ?> <?php echo $width; ?>w, <?php echo $thumb_lg; ?> <?php echo $width_lg; ?>w, <?php echo $thumb_md; ?> <?php echo $width_md; ?>w, <?php echo $thumb_sm; ?> <?php echo $width_sm; ?>w"
						 width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="lazy u-full"
						 alt="<?php echo $alt; ?>">
						<?php endif; ?>
					</figure>
				</div>
				<div class="col sm-12 md-8 lg-8">
					<figure class="pl-l__image image-holder i-ratio i-ratio--56 fit">
						<?php if ( get_sub_field('p_l_l_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('p_l_l_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image2 = get_sub_field('p_l_l_image');
												$alt2 = $image2['alt'];
												$url2 = $image2['url'];
												$width2 = $image2['width'];
												$height2 = $image2['height'];
												$image_ratio2 = $image2['width'] / $image2['height'];

												$size_lg2 = 'thumb-large';
												$size_md2 = 'thumb-medium';
												$size_sm2 = 'thumb-small';

												$thumb_lg2 = $image2['sizes'][ $size_lg2 ];
												$thumb_md2 = $image2['sizes'][ $size_md2 ];
												$thumb_sm2 = $image2['sizes'][ $size_sm2 ];

												$width_lg2 = $image2['sizes'][ $size_lg2 . '-width' ];
												$width_md2 = $image2['sizes'][ $size_md2 . '-width' ];
												$width_sm2 = $image2['sizes'][ $size_sm2 . '-width' ];

											?>
						<?php if ( ! empty( $image2 ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url2; ?>"
						 sizes="(max-width: 40em) 100vw, 50vw" data-srcset="<?php echo $url2; ?> <?php echo $width2; ?>w, <?php echo $thumb_lg2; ?> <?php echo $width_lg2; ?>w, <?php echo $thumb_md2; ?> <?php echo $width_md2; ?>w, <?php echo $thumb_sm2; ?> <?php echo $width_sm2; ?>w"
						 width="<?php echo $width2; ?>" height="<?php echo $height2; ?>" data-ratio="<?php echo $image_ratio2; ?>" class="lazy u-full"
						 alt="<?php echo $alt2; ?>">
						<?php endif; ?>
				</div>
				</figure>
			</div>
		</div>
		<?php $count++; ?>
		<?php elseif ( get_row_layout() == 'quote' ): ?>
		<div class="row full-width" data-row="<?php echo $count; ?>">
			<div class="row">
				<div class="col sm-12">
					<div class="grid-quote-inner">
						<?php echo get_sub_field('quote_text') ?>
					</div>
				</div>
			</div>
		</div>
		<?php $count++; ?>
		<?php elseif ( get_row_layout() == 'l_p' ): ?>
		<div class="row lp" data-row="<?php echo $count; ?>">
			<div class="row">
				<div class="col sm-12 md-8 lg-8">
					<figure class="lp_l__image image-holder i-ratio i-ratio--56 fit">
						<?php if ( get_sub_field('l_p_l_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('l_p_l_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image = get_sub_field('l_p_l_image');
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
						<?php if ( ! empty( $image ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url; ?>"
						 sizes="(max-width: 40em) 100vw, 50vw" data-srcset="<?php echo $url; ?> <?php echo $width; ?>w, <?php echo $thumb_lg; ?> <?php echo $width_lg; ?>w, <?php echo $thumb_md; ?> <?php echo $width_md; ?>w, <?php echo $thumb_sm; ?> <?php echo $width_sm; ?>w"
						 width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="lazy u-full"
						 alt="<?php echo $alt; ?>">
						<?php endif; ?>
					</figure>
				</div>
				<div class="col sm-12 md-4 lg-4">
					<figure class="lp_p__image image-holder i-ratio i-ratio--112 fit">
						<?php if ( get_sub_field('l_p_p_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('l_p_p_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image2 = get_sub_field('l_p_p_image');
												$url2 = $image2['url'];
												$alt2 = $image2['alt'];
												$width2 = $image2['width'];
												$height2 = $image2['height'];
												$image_ratio2 = $image2['width'] / $image2['height'];

												$size_lg2 = 'thumb-large';
												$size_md2 = 'thumb-medium';
												$size_sm2 = 'thumb-small';

												$thumb_lg2 = $image2['sizes'][ $size_lg2 ];
												$thumb_md2 = $image2['sizes'][ $size_md2 ];
												$thumb_sm2 = $image2['sizes'][ $size_sm2 ];

												$width_lg2 = $image2['sizes'][ $size_lg2 . '-width' ];
												$width_md2 = $image2['sizes'][ $size_md2 . '-width' ];
												$width_sm2 = $image2['sizes'][ $size_sm2 . '-width' ];

											?>
						<?php if ( ! empty( $image2 ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url2; ?>"
						 sizes="(max-width: 40em) 100vw, 50vw" data-srcset="<?php echo $url2; ?> <?php echo $width2; ?>w, <?php echo $thumb_lg2; ?> <?php echo $width_lg2; ?>w, <?php echo $thumb_md2; ?> <?php echo $width_md2; ?>w, <?php echo $thumb_sm2; ?> <?php echo $width_sm2; ?>w"
						 width="<?php echo $width2; ?>" height="<?php echo $height2; ?>" data-ratio="<?php echo $image_ratio2; ?>" class="lazy u-full"
						 alt="<?php echo $alt2; ?>">
						<?php endif; ?>
				</div>
				</figure>
			</div>
		</div>
		<?php $count++; ?>

		<?php elseif ( get_row_layout() == 'h_h' ): ?>
		<div class="row hh" data-row="<?php echo $count; ?>">
			<div class="row">
				<div class="col sm-12 md-6 lg-6">
					<figure class="h-h-1__image image-holder i-ratio i-ratio--100 fit">
						<?php if ( get_sub_field('h_h_1_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('h_h_1_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image = get_sub_field('h_h_1_image');
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
						<?php if ( ! empty( $image ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url; ?>"
						 sizes="(max-width: 40em) 100vw, 50vw" data-srcset="<?php echo $url; ?> <?php echo $width; ?>w, <?php echo $thumb_lg; ?> <?php echo $width_lg; ?>w, <?php echo $thumb_md; ?> <?php echo $width_md; ?>w, <?php echo $thumb_sm; ?> <?php echo $width_sm; ?>w"
						 width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="lazy u-full"
						 alt="<?php echo $alt; ?>">
						<?php endif; ?>
					</figure>
				</div>
				<div class="col sm-12 md-6 lg-6">
					<figure class="h-h-2__image image-holder i-ratio i-ratio--100 fit">
						<?php if ( get_sub_field('h_h_2_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('h_h_2_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image2 = get_sub_field('h_h_2_image');
												$url2 = $image2['url'];
												$alt2 = $image2['alt'];
												$width2 = $image2['width'];
												$height2 = $image2['height'];
												$image_ratio2 = $image2['width'] / $image2['height'];

												$size_lg2 = 'thumb-large';
												$size_md2 = 'thumb-medium';
												$size_sm2 = 'thumb-small';

												$thumb_lg2 = $image2['sizes'][ $size_lg2 ];
												$thumb_md2 = $image2['sizes'][ $size_md2 ];
												$thumb_sm2 = $image2['sizes'][ $size_sm2 ];

												$width_lg2 = $image2['sizes'][ $size_lg2 . '-width' ];
												$width_md2 = $image2['sizes'][ $size_md2 . '-width' ];
												$width_sm2 = $image2['sizes'][ $size_sm2 . '-width' ];

											?>
						<?php if ( ! empty( $image2 ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url2; ?>"
						 sizes="100vw" data-srcset="<?php echo $url2; ?> <?php echo $width2; ?>w, <?php echo $thumb_lg2; ?> <?php echo $width_lg2; ?>w, <?php echo $thumb_md2; ?> <?php echo $width_md2; ?>w, <?php echo $thumb_sm2; ?> <?php echo $width_sm2; ?>w"
						 width="<?php echo $width2; ?>" height="<?php echo $height2; ?>" data-ratio="<?php echo $image_ratio2; ?>" class="lazy u-full"
						 alt="<?php echo $alt2; ?>">
						<?php endif; ?>
					</figure>
				</div>
			</div>
		</div>

		<?php elseif ( get_row_layout() == 'h_h_l' ): ?>
		<div class="row hhl" data-row="<?php echo $count; ?>">
			<div class="row">
				<div class="col sm-12 md-6 lg-6">
					<figure class="h-h-l-1__image image-holder i-ratio i-ratio--56 fit">
						<?php if ( get_sub_field('h_h_l_1_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('h_h_l_1_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image = get_sub_field('h_h_l_1_image');
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
						<?php if ( ! empty( $image ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url; ?>"
						 sizes="(max-width: 40em) 100vw, 50vw" data-srcset="<?php echo $url; ?> <?php echo $width; ?>w, <?php echo $thumb_lg; ?> <?php echo $width_lg; ?>w, <?php echo $thumb_md; ?> <?php echo $width_md; ?>w, <?php echo $thumb_sm; ?> <?php echo $width_sm; ?>w"
						 width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-ratio="<?php echo $image_ratio; ?>" class="lazy u-full"
						 alt="<?php echo $alt; ?>">
						<?php endif; ?>
					</figure>
				</div>
				<div class="col sm-12 md-6 lg-6">
					<figure class="h-h-l-2__image image-holder i-ratio i-ratio--56 fit">
						<?php if ( get_sub_field('h_h_l_2_caption') ) { ?>
						<figcaption data-caption-id="" class="image-caption">
							<div class="image-caption__inner">
								<?php the_sub_field('h_h_l_2_caption'); ?>
							</div>
						</figcaption>
						<?php } ?>
						<?php
												$image2 = get_sub_field('h_h_l_2_image');
												$url2 = $image2['url'];
												$alt2 = $image2['alt'];
												$width2 = $image2['width'];
												$height2 = $image2['height'];
												$image_ratio2 = $image2['width'] / $image2['height'];

												$size_lg2 = 'thumb-large';
												$size_md2 = 'thumb-medium';
												$size_sm2 = 'thumb-small';

												$thumb_lg2 = $image2['sizes'][ $size_lg2 ];
												$thumb_md2 = $image2['sizes'][ $size_md2 ];
												$thumb_sm2 = $image2['sizes'][ $size_sm2 ];

												$width_lg2 = $image2['sizes'][ $size_lg2 . '-width' ];
												$width_md2 = $image2['sizes'][ $size_md2 . '-width' ];
												$width_sm2 = $image2['sizes'][ $size_sm2 . '-width' ];

											?>
						<?php if ( ! empty( $image2 ) ) : ?>
						<img src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php echo $url2; ?>"
						 sizes="100vw" data-srcset="<?php echo $url2; ?> <?php echo $width2; ?>w, <?php echo $thumb_lg2; ?> <?php echo $width_lg2; ?>w, <?php echo $thumb_md2; ?> <?php echo $width_md2; ?>w, <?php echo $thumb_sm2; ?> <?php echo $width_sm2; ?>w"
						 width="<?php echo $width2; ?>" height="<?php echo $height2; ?>" data-ratio="<?php echo $image_ratio2; ?>" class="lazy u-full"
						 alt="<?php echo $alt2; ?>">
						<?php endif; ?>
					</figure>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="row">
			<div class="row">
				<div class="col sm-12 project-photographer">
					<?php if ( get_field('project_photographer') ) { ?>
					<span class="timestamp">Credits</span>
					<p>
						<?php the_field('project_photographer'); ?> -
						<?php _e('Photographer', 'ovg'); ?>
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row single-post__nav">
		<div class="row">
			<div class="col sm-12 md-4 lg-4">
				<?php $previous_post = get_previous_post(); ?>
				<?php if ( ! empty ( $previous_post ) ): ?>
				<div class="article-link">

					<?php 
						if(ICL_LANGUAGE_CODE=='en'){
							previous_post_link('%link', "Previous project"); 
						}else{
							previous_post_link('%link', "Vorig project"); 
						}
						?>
				</div>
				<?php endif; ?>
			</div>
			<div class="col sm-12 md-4 lg-4">
				<?php if ( true ) { ?>
				<?php 
					?>
				<a href="<?php echo (get_term_link($term)) ?>"><svg width="32" height="20" viewBox="0 0 32 20" xmlns="http://www.w3.org/2000/svg"
					 xmlns:xlink="http://www.w3.org/1999/xlink">
						<title>Group</title>
						<defs>
							<path id="a" d="M0 12h8v8H0z" />
							<mask id="f" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#a" />
							</mask>
							<path id="b" d="M24 0h8v8h-8z" />
							<mask id="g" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#b" />
							</mask>
							<path id="c" d="M24 12h8v8h-8z" />
							<mask id="h" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#c" />
							</mask>
							<path id="d" d="M12 0h8v20h-8z" />
							<mask id="i" x="0" y="0" width="8" height="20" fill="#fff">
								<use xlink:href="#d" />
							</mask>
							<path id="e" d="M0 0h8v8H0z" />
							<mask id="j" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#e" />
							</mask>
						</defs>
						<g class="all-projects-icon" stroke="#000" stroke-width="2" fill="#FFF" fill-rule="evenodd">
							<use mask="url(#f)" xlink:href="#a" />
							<use mask="url(#g)" xlink:href="#b" />
							<use mask="url(#h)" xlink:href="#c" />
							<use mask="url(#i)" xlink:href="#d" />
							<use mask="url(#j)" xlink:href="#e" />
						</g>
					</svg></a>
				<?php } else { ?>
				<a href="<?php echo home_url(); ?>/projecten/"><svg width="32" height="20" viewBox="0 0 32 20" xmlns="http://www.w3.org/2000/svg"
					 xmlns:xlink="http://www.w3.org/1999/xlink">
						<title>Group</title>
						<defs>
							<path id="a" d="M0 12h8v8H0z" />
							<mask id="f" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#a" />
							</mask>
							<path id="b" d="M24 0h8v8h-8z" />
							<mask id="g" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#b" />
							</mask>
							<path id="c" d="M24 12h8v8h-8z" />
							<mask id="h" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#c" />
							</mask>
							<path id="d" d="M12 0h8v20h-8z" />
							<mask id="i" x="0" y="0" width="8" height="20" fill="#fff">
								<use xlink:href="#d" />
							</mask>
							<path id="e" d="M0 0h8v8H0z" />
							<mask id="j" x="0" y="0" width="8" height="8" fill="#fff">
								<use xlink:href="#e" />
							</mask>
						</defs>
						<g class="all-projects-icon" stroke="#000" stroke-width="2" fill="#FFF" fill-rule="evenodd">
							<use mask="url(#f)" xlink:href="#a" />
							<use mask="url(#g)" xlink:href="#b" />
							<use mask="url(#h)" xlink:href="#c" />
							<use mask="url(#i)" xlink:href="#d" />
							<use mask="url(#j)" xlink:href="#e" />
						</g>
					</svg></a>
				<?php } ?>
			</div>
			<div class="col sm-12 md-4 lg-4">
				<?php $next_post = get_next_post(); ?>
				<?php if ( ! empty ( $next_post ) ): ?>
				<div class="article-link">
					<?php 						if(ICL_LANGUAGE_CODE=='en'){
							previous_post_link('%link', "Next project"); 
						}else{
							previous_post_link('%link', "Volgend project"); 
						}?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="contact-container">
		<a href="/contact">
			<div class="contact-container-inner">
				<div class="title">
					<?php the_field("contact_titel") ?>
				</div>
				<div class="text">
					<?php the_field("contact_text") ?>
				</div>
				<div class="subtitle">
					<?php the_field("contact_afspraak") ?>
				</div>
			</div>
		</a>
	</div>

	<?php get_footer(); ?>