<?php
  global $post;
  if ( $post ) {
    $post_id = $post->ID;
  }
  $blog_id = get_current_blog_id();
?>
<div class="c-overlay js-c-overlay">
  <div class="c-overlay__inner">
    <div class="c-overlay__close">
      <button class="c-button c-button--close js-c-overlay-close">
        <div class="c-button__icon">
          <div class="c-button__burger burger">
            <div class="burger__bar"></div>
            <div class="burger__bar"></div>
          </div>
        </div>
      </button>
    </div>
    <ul class="c-overlay__lang lang-list">
      <li<?php if ( $blog_id == 1 ) { ?> class="active"<?php } ?>><a href="<?php echo get_site_url(1); ?>" class="no-barba">NL</a></li>
      <li<?php if ( $blog_id == 2 ) { ?> class="active"<?php } ?>><a href="<?php echo get_site_url(2); ?>" class="no-barba">FR</a></li>
    </ul>
    <div class="c-overlay__legal">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'legal',
        'container' => false,
        'depth' => 0,
        'menu_id' => 'legal',
        'menu_class' => 'legal',
        'items_wrap' => '<ul>%3$s</ul>',
        'walker' => new mint_walker()
      ));
      ?>
    </div>
    <div class="c-overlay__row">
      <div class="c-overlay__header js-c-overlay-header">
        <div class="row">
          <h3><?php the_field('label_discover_more_stories', 'option'); ?></h3>
        </div>
      </div>
      <div class="c-overlay__slider js-c-overlay-slider-container">
        <div class="swiper-container js-c-overlay-slider">
          <div class="swiper-wrapper">
            <?php $args = array(
              'post_type' => 'post',
              'posts_per_page' => -1
            );
            ?>
            <?php $count = 0; ?>
            <?php $loop = new WP_Query( $args ); ?>
            <?php	while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php
            $attachment_id = get_post_thumbnail_id();
            $image = get_field('case_banner', $post->ID);
            if ( ! empty( $image ) ):
              $url = $image['url'];
              $size = 'img-md';
              $thumb = $image['sizes'][ $size ];
            endif;
            ?>
            <div class="swiper-slide swiper-slide-case">
              <div class="case-tile<?php if ( $post_id == get_the_ID() ) { ?> is-active<?php } ?>" id="case-tile-<?php echo $count; ?>">
                <a href="<?php the_permalink(); ?>" class="u-full case-tile__link">
                  <div class="case-tile__meta u-full">
                    <div class="case-tile__title">
                      <div class="case-tile__label"><?php the_title(); ?></div>
                      <div class="case-tile__icon">
                        <svg width="50" height="53" viewBox="0 0 50 53" xmlns="http://www.w3.org/2000/svg"><g fill="#F7F5F0" fill-rule="evenodd"><path d="M.624 41h2.434c4.46 6.064 11.645 10 19.75 10 13.531 0 24.5-10.969 24.5-24.5S36.34 2 22.808 2C14.266 2 6.745 6.372 2.36 13H0C4.616 5.217 13.103 0 22.808 0c14.636 0 26.5 11.864 26.5 26.5S37.444 53 22.808 53C13.525 53 5.356 48.226.624 41z"/><path d="M19 20l10 7-10 7z"/></g></svg>
                      </div>
                    </div>
                  </div>
                  <div class="case-tile__image u-full u-cover overlay-lazy" data-src="<?php echo $thumb; ?>"></div>
                  <?php if ( get_field('case_video_webm') || get_field('case_video_mp4') ) { ?>
                  <video class="case-tile__video u-full video-lazy" autoplay loop muted playsinline>
                    <?php if ( get_field('case_video_webm') ) { ?>
                    <source data-src="<?php the_field('case_video_webm'); ?>" type="video/webm">
                    <?php } ?>
                    <?php if ( get_field('case_video_mp4') ) { ?>
                    <source data-src="<?php the_field('case_video_mp4'); ?>" type="video/mp4">
                    <?php } ?>
                  </video>
                  <?php } ?>
                </a>
              </div>
            </div>
            <?php $count++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
			<div class="c-overlay__drag js-c-overlay-drag">
	      <div class="slider-drag">
	        <div class="slider-tools">
	          <button class="c-button c-button--next overlay-prev"><svg width="11" height="17" viewBox="0 0 11 17" xmlns="http://www.w3.org/2000/svg"><path d="M10.111 14.667L8.5 16.278.722 8.5 8.5.722l1.611 1.611L3.944 8.5l6.167 6.167z" fill="#FFF" fill-rule="evenodd"/></svg></button>
	          <div class="drag"></div>
	          <button class="c-button c-button--next overlay-next"><svg width="11" height="17" viewBox="0 0 11 17" xmlns="http://www.w3.org/2000/svg"><path d="M10.111 14.667L8.5 16.278.722 8.5 8.5.722l1.611 1.611L3.944 8.5l6.167 6.167z" fill="#FFF" fill-rule="evenodd"/></svg></button>
	        </div>
	      </div>
			</div>
    </div>
  </div>
	<div class="c-overlay__shade js-c-overlay-shade"></div>
</div>
