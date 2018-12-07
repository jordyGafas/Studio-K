<?php
/*
	Template Name: Policy
*/
get_header(); ?>
<div class="header">
<div class="single-article__back">
		<div class="row">
			<a href="<?php echo home_url() ?>"><div>
			<svg width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg"><path d="M8.286 12.785L7 14.071-.071 7 7-.071l1.286 1.286L2.5 7l5.786 5.785z" fill="black" fill-rule="evenodd"></path></svg>
			</div><div><?php the_field('homepage_link_title', 'option'); ?></div></a>
		</div>
	</div>
</div>
<h1 class="row1 marginBottom"><?php the_title() ?></h1>
<div class="row1">
<a href="https://www.mercedes-benz.be/" class="mercedes-logo-top" target="_blank">
	<img src="/mercedes/wp-content/themes/mercedes/src/img/brand/mercedes-logo.png" class="mercedes-logo">
</a>
    <?php the_content() ?>
</div>

<?php get_footer(); ?>