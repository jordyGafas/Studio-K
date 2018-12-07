<?php
$blog_id = get_current_blog_id();
?>
<div class="c-page-back row">
	<?php if ( $blog_id == 1 ) { ?>
	<a href="<?php echo get_site_url(1); ?>" class="c-button c-button--back">
		<div class="c-button__icon"><svg width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg"><path d="M8.286 12.785L7 14.071-.071 7 7-.071l1.286 1.286L2.5 7l5.786 5.785z" fill="#ffb511" fill-rule="evenodd"/></svg></div>
		<div class="c-button__label"><?php the_field('label_back', 'option'); ?></div>
	</a>
	<?php } ?>
	<?php if ( $blog_id == 2 ) { ?>
	<a href="<?php echo get_site_url(2); ?>" class="c-button c-button--back">
		<div class="c-button__icon"><svg width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg"><path d="M8.286 12.785L7 14.071-.071 7 7-.071l1.286 1.286L2.5 7l5.786 5.785z" fill="#ffb511" fill-rule="evenodd"/></svg></div>
		<div class="c-button__label"><?php the_field('label_back', 'option'); ?></div>
	</a>
	<?php } ?>
</div>
