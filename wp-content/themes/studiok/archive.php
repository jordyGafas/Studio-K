<?php
/**
 * The archive page
 *
 * @subpackage Master
 * @since Master 1.0
 */
get_header(); ?>


<div class="hero">
	<div class="hero__inner">
		<div class="hero__meta">
			<h1 class="hero__title"><?php the_archive_title(); ?></h1>
		</div>
	</div>
</div>

<div class="articles-container">
	<div class="articles-filter">
		<button class="button button--dark u-pill js-blog-filter"><?php the_field('filter_label', 27); ?></button>
		<div class="articles-filter__cats">
			<?php
			$taxonomy     = 'category';
			$orderby      = 'name';
			$show_count   = false;
			$pad_counts   = false;
			$hierarchical = true;
			$title        = '';

			$args = array(
				'taxonomy'     => $taxonomy,
				'orderby'      => $orderby,
				'show_count'   => $show_count,
				'pad_counts'   => $pad_counts,
				'hierarchical' => $hierarchical,
				'title_li'     => $title
			);
			?>
			<ul>
				<li<?php if ( is_page_template( 'templates/tpl-blog.php' ) ) { ?> class="current-cat"<?php } ?>><a href="<?php the_field('blog_link', 27); ?>">All</a></li>
				<?php wp_list_categories( $args ); ?>
			</ul>
		</div>
	</div>
	<div class="articles row">
	<?php	while ( have_posts() ) : the_post(); ?>
		<a href="<?php the_permalink(); ?>" class="article-card">
			<?php
				global $post;
				$attachment_id = get_post_thumbnail_id();
				$image_lg = wp_get_attachment_image_src( $attachment_id, "img-lg" );
			?>
			<div class="article-card__image">
				<div data-src="<?php echo $image_lg[0]; ?>" class="u-full u-cover u-cover--center lazy"></div>
			</div>
			<div class="article-card__content">
				<?php $categories = get_the_terms( $post->ID, 'category' ); ?>
				<div class="article-card__category label">
					<ul>
					<?php
					foreach( $categories as $category ) {
						echo '<li>' . $category->name . '</li>';
					}
					?>
					</ul>
				</div>
				<h6 class="article-card__title"><?php the_title(); ?></h6>
				<p class="article-card__text"><?php the_field('intro'); ?></p>
			</div>
			<div class="article-card__author author">
				<div class="author__avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?></div>
				<div class="author__meta">
					<div class="author__name"><?php the_author(); ?></div>
					<div class="author__date"><?php the_date('d M Y'); ?></div>
				</div>
			</div>
		</a>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	</div>
</div>

<?php get_footer(); ?>
