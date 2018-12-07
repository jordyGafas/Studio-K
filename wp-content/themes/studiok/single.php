<?php get_header(); ?>
<div class="single-article__back">
	<div class="back-row">
		<a href="<?php echo get_page_link(70); ?>">
			<div>
				<svg height="30" viewBox="0 0 30 30" width="30" xmlns="http://www.w3.org/2000/svg">
					<g fill="none" fill-rule="evenodd" transform="matrix(-1 0 0 -1 30 30)">
						<rect fill="none" height="29" rx="14.5" stroke="#222120" width="29" x=".5" y=".5" />
						<path d="m21.000004 14.6664066c-.0090278-.1045334-.0519013-.2440913-.1203656-.3223685l-3.6111115-4.1754465c-.1575215-.21818384-.4822977-.21746174-.6821871-.0390182-.1998895.1784435-.2151284.4955043-.0400376.6837552l2.9114611 3.3618499h-10.97628176c-.26589818 0-.48148154.2199228-.48148154.4912281s.21558336.4912281.48148154.4912281h10.97628176l-2.9114587 3.3618425c-.1910519.1882386-.1373234.5110738.0625685.6895124.1998895.1784386.5021347.1657158.6596562-.0447755l3.6111115-4.1754391c.0965154-.1066701.1149297-.2224281.1203632-.3223684z"
						 fill="#000" fill-rule="nonzero" />
					</g>
				</svg>
			</div>
			<div>alle nieuws</div>
		</a>
	</div>
</div>
<?php $categories = get_the_category(); ?>
<div class="row">
	<div class="title-block <?php echo esc_html( $categories[0]->name ); ?>">
		<div class="titlecontainer">
			<div class="date-container">
				<?php echo get_the_date( 'd.m.Y' ); ?>
			</div>
			<div class="title">
				<h1>
					<?php the_title() ?>
				</h1>
			</div>
		</div>
	</div>
</div>

<div class="header_image <?php echo esc_html( $categories[0]->name ); ?>" style='background-image:url(<?php the_field("banner") ?>);'>

</div>


<?php the_content() ?>

<div class="row single-post__nav">
	<div class="row">
		<div class="col sm-12 md-4 lg-4">
			<?php $previous_post = get_previous_post(); ?>
			<?php if ( ! empty ( $previous_post ) ): ?>
			<div class="article-link">
				<?php 
						if(ICL_LANGUAGE_CODE=='en'){
							previous_post_link('%link', "Previous post"); 
						}else{
							previous_post_link('%link', "Vorig bericht"); 
						}
						?>
			</div>
			<?php endif; ?>
		</div>
		<div class="col sm-12 md-4 lg-4">
			<?php if ( true ) { ?>
			<a href="<?php echo home_url(); ?>/nieuws"><svg width="32" height="20" viewBox="0 0 32 20" xmlns="http://www.w3.org/2000/svg"
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
				<?php 
						if(ICL_LANGUAGE_CODE=='en'){
							next_post_link('%link', "Next post"); 
						}else{
							next_post_link('%link', "Volgend bericht"); 
						}
						?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>

<?php get_footer(); ?>