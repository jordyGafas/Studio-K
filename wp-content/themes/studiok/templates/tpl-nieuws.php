<?php
/*
Template Name: Nieuws
 */
get_header();?>
		

<div class="berichten-container">
    <div class="berichten-container-inner">
        <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
            'posts_per_page' => 4,
            'paged' => $paged
            );
            $custom_query = new WP_Query( $args );
            ?>

            <?php
            while($custom_query->have_posts()) :
                $custom_query->the_post();
                $categories = get_the_category();
            ?>
                <?php if(esc_html( $categories[0]->name ) == "Vacatures"){ ?>
                <a href="<?php the_permalink() ?>" class="project-container <?php echo esc_html( $categories[0]->name ); ?>">
                    <div class="project-container-inner">
                        <div class="project-image" style='background-image: url("<?php the_field("banner") ?>");'>
                            <div class="vacature-description">
                                <div class="vacature-description-inner">
                                    <div class="vacature-title"><?php  the_title() ?></div>
                                    <div class="vacature-intro"><?php  the_field("vacature_intro") ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="project-description">
                            <h3 class="project-title">
                                <div class="title"><div><?php  ?></div>
                                </div>
                                <div class="arrow-icon">
                                    <svg height="6" viewBox="0 0 9 6" width="9" xmlns="http://www.w3.org/2000/svg"><path d="m18.6000024 14.7998439c-.0054167-.06272-.0311408-.1464547-.0722193-.193421l-2.166667-2.5052679c-.0945129-.1309103-.2893786-.1304771-.4093122-.023411-.1199337.1070662-.1290771.2973026-.0240226.4102531l1.7468767 2.01711h-6.5857691c-.1595389 0-.2888889.1319537-.2888889.2947368 0 .1627832.12935.2947369.2888889.2947369h6.5857691l-1.7468753 2.0171055c-.1146311.1129432-.082394.3066443.0375412.4137075.1199336.1070631.3012808.0994294.3957937-.0268653l2.1666669-2.5052635c.0579092-.0640021.0689578-.1334568.0722179-.1934211z" transform="translate(-10 -12)"/></svg>
                                </div>
                            </h3>

                        </div>
                    </div>
                </a>
                <?php } else { ?>
                <a href="<?php the_permalink() ?>" class="project-container <?php echo esc_html( $categories[0]->name ); ?>">
                    <div class="project-container-inner">
                        <div class="project-image" style='background-image: url("<?php the_field("banner") ?>");'>
                            
                        </div>
                        <div class="project-description">
                            <h3 class="project-title">
                                <div class="title"><div><?php the_title() ?></div>
                                    <div class="project-intro"><?php  echo substr(get_the_content(), 0, 100)."..."; ?></div>
                                    <div class="project-meta"><?php  echo get_the_date( 'd.m.Y' ); ?></div>
                                </div>
                                <div class="arrow-icon">
                                    <svg height="6" viewBox="0 0 9 6" width="9" xmlns="http://www.w3.org/2000/svg"><path d="m18.6000024 14.7998439c-.0054167-.06272-.0311408-.1464547-.0722193-.193421l-2.166667-2.5052679c-.0945129-.1309103-.2893786-.1304771-.4093122-.023411-.1199337.1070662-.1290771.2973026-.0240226.4102531l1.7468767 2.01711h-6.5857691c-.1595389 0-.2888889.1319537-.2888889.2947368 0 .1627832.12935.2947369.2888889.2947369h6.5857691l-1.7468753 2.0171055c-.1146311.1129432-.082394.3066443.0375412.4137075.1199336.1070631.3012808.0994294.3957937-.0268653l2.1666669-2.5052635c.0579092-.0640021.0689578-.1334568.0722179-.1934211z" transform="translate(-10 -12)"/></svg>
                                </div>
                            </h3>

                        </div>
                    </div>
                </a>
                
            <?php } 
        endwhile; ?>
    </div>
</div>

        <div class="row single-post__nav">
			<div class="row">
				<div class="col sm-12 md-4 lg-4">
					<?php $previous_post = true ?>
					<?php if ( ! empty ( $previous_post ) ): ?>
					<div class="article-link">
                        <?php 
						if(ICL_LANGUAGE_CODE=='en'){
							previous_posts_link( 'Previous page', $custom_query->max_num_pages);
						}else{
							previous_posts_link( 'Vorige pagina', $custom_query->max_num_pages);
						}
						?>
					</div>
					<?php endif; ?>
				</div>
                <div class="col sm-12 md-4 lg-4">
					<?php if ( true ) { ?>
	  				<a href=""></a>
	  			<?php } else { ?>
	  				<a href="<?php echo home_url(); ?>/projecten/"><svg width="32" height="20" viewBox="0 0 32 20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Group</title><defs><path id="a" d="M0 12h8v8H0z"/><mask id="f" x="0" y="0" width="8" height="8" fill="#fff"><use xlink:href="#a"/></mask><path id="b" d="M24 0h8v8h-8z"/><mask id="g" x="0" y="0" width="8" height="8" fill="#fff"><use xlink:href="#b"/></mask><path id="c" d="M24 12h8v8h-8z"/><mask id="h" x="0" y="0" width="8" height="8" fill="#fff"><use xlink:href="#c"/></mask><path id="d" d="M12 0h8v20h-8z"/><mask id="i" x="0" y="0" width="8" height="20" fill="#fff"><use xlink:href="#d"/></mask><path id="e" d="M0 0h8v8H0z"/><mask id="j" x="0" y="0" width="8" height="8" fill="#fff"><use xlink:href="#e"/></mask></defs><g class="all-projects-icon" stroke="#000" stroke-width="2" fill="#FFF" fill-rule="evenodd"><use mask="url(#f)" xlink:href="#a"/><use mask="url(#g)" xlink:href="#b"/><use mask="url(#h)" xlink:href="#c"/><use mask="url(#i)" xlink:href="#d"/><use mask="url(#j)" xlink:href="#e"/></g></svg></a>
	  			<?php } ?>
				</div>
				<div class="col sm-12 md-4 lg-4">
					<?php $next_post = true ?>
					<?php if ( ! empty ( $next_post ) ): ?>
					<div class="article-link">
                        <?php 
						if(ICL_LANGUAGE_CODE=='en'){
							next_posts_link( 'Next page', $custom_query->max_num_pages);
						}else{
							next_posts_link( 'Volgende pagina', $custom_query->max_num_pages);
						}
						?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>