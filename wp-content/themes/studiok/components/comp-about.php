<?php $page_home = get_field('page_home', 'option'); ?>
<div class="about-block row u-flex u-flex-wrap u-align-v-center">
  <div class="about-block__content">
    <div class="swiper-container js-about-slider-content">
      <div class="swiper-wrapper">
        <?php $rows_count = count(get_field('about_block_slider', $page_home)); ?>
        <?php if ( have_rows('about_block_slider', $page_home) ): ?>
        <?php while ( have_rows('about_block_slider', $page_home) ): the_row(); ?>
          <div class="swiper-slide">
            <div class="about-block__label" role="label"><?php the_sub_field('label'); ?></div>
            <div class="about-block__title" role="title"><?php the_sub_field('title'); ?></div>
            <a href="<?php the_sub_field('link_url'); ?>" class="about-block__link inline-link"><?php the_sub_field('link_label'); ?></a>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="about-block__slider">
    <div class="slider-counter u-flex u-column u-align-v-center u-align-h-center">
      <div class="slider-counter__inner">
        <span class="slider-counter__current">1</span>
        <span class="slider-counter__total">/ <?php echo $rows_count; ?></span>
      </div>
    </div>
    <div class="about-block__media">
      <div class="swiper-container js-about-slider-media">
        <div class="swiper-wrapper">
          <?php if ( have_rows('about_block_slider', $page_home) ): ?>
          <?php while ( have_rows('about_block_slider', $page_home) ): the_row(); ?>
            <?php if ( get_sub_field('image_or_video') == 'image' ) { ?>
            <?php
              $image = 	get_sub_field('image');
              $url = $image['url'];
            ?>
            <div class="swiper-slide is-image">
              <div class="u-full swiper-lazy u-cover u-cover--center" data-background="<?php echo $url; ?>"></div>
            </div>
            <?php } else { ?>
            <div class="swiper-slide is-video">
              <video controls preload="metadata" playsinline>
                <source src="<?php the_sub_field('video'); ?>" type="video/mp4">
              </video>
            </div>
            <?php } ?>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="swiper-pagination about-slider-pagination"></div>
  </div>
</div>