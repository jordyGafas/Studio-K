<?php
/**
 * The default template for a 404-error page.
 *
 * @subpackage Master
 * @since Master 1.0
 */
get_header(); ?>

<div class="error-container">
	<div class="error-container__inner">
		<h1><?php echo 'It looks like nothing was found at this location.'; ?></h1>
	</div>
	<div class="error-container__image u-full u-cover--center lazy" data-src="<?php the_field('404_image', 'option'); ?>"></div>
	<div class="single-article__back">
		<div class="back-row">
			<a href="<?php echo get_site_url();?>"><div>Back to home</div></a>
		</div>
	</div>
</div>
</div>

<?php get_footer(); ?>
