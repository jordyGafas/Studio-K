
<?php $term = get_queried_object(); ?>
<?php get_header() ?>
<div class="header-hero-container">
    <div class="header-hero-background lazy" data-src="<?php the_field('hero_image', $term); ?>" style='background-image: url("");'></div>
    <div class="header-hero-container-inner">
        <div class="hero-quote-container">
            <div class="hero-quote-text">
               <?php echo get_field('quote_text', $term); ?>
            </div>
            <div class="hero-quote-author">
            <?php echo get_field('quote_author', $term); ?>
            </div>
        </div>
    </div>
    <div class="hero-menu visible">
        <ul>
        <?php
            $currentTerm = $term;
            $post_type = 'cpt_projects';
            // Get all the taxonomies for this post type
            $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );
            $count = 0;
            foreach( $taxonomies as $taxonomy ){
                
                // Gets every "category" (term) in this taxonomy to get the respective posts
                $terms = get_terms( $taxonomy );
                foreach( $terms as $term ){
                    $count++;
                    ?>
                    <li class="<?php if($term==$currentTerm){echo "active";} ?>">
                        <a href="../<?php echo $term->slug ?>">
                            <div class="number-category">0<?php echo $count; ?>.</div>
                            <div class="category-title"><?php echo $term->name ?></div>
                            <div class="active-arrow-down <?php if($term==$currentTerm){echo "active";} ?>"><svg height="13" viewBox="0 0 10 13" width="10" xmlns="http://www.w3.org/2000/svg"><path d="m102.166626 10.4997847c-.009028-.1045334-.051901-.2440913-.120366-.3223685l-3.6111112-4.17544646c-.1575215-.21818389-.4822977-.21746179-.6821871-.03901826-.1998895.17844354-.2151284.49550428-.0400376.68375518l2.9114609 3.36184984h-10.9762816c-.2658981 0-.4814815.2199229-.4814815.4912282s.2155834.4912281.4814815.4912281h10.9762816l-2.9114585 3.3618425c-.1910519.1882386-.1373234.5110738.0625685.6895124.1998895.1784386.5021347.1657158.6596562-.0447755l3.6111118-4.1754391c.096515-.1066702.114929-.2224281.120363-.3223684z" fill="#fff" transform="matrix(0 1 -1 0 15.166626 -89.166622)"/></svg></div>
                        </a>
                    </li>
                    <?php
                    
                }
            }
            //wp_set_object_terms( 42, $currentTerm, 'category' );
        ?>
        </ul>
    </div>
</div>

<div class="hero-menu hero-menu-sticky">
        <ul>
        <?php
            $post_type = 'cpt_projects';
            // Get all the taxonomies for this post type
            $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );
            $count = 0;
            foreach( $taxonomies as $taxonomy ){
                
                // Gets every "category" (term) in this taxonomy to get the respective posts
                $terms = get_terms( $taxonomy );
                foreach( $terms as $term ){
                    $count++;
                    ?>
                    <li class="<?php if($term==$currentTerm){echo "active";} ?>">
                        <a href="../<?php echo $term->slug ?>">
                            <div class="number-category">0<?php echo $count; ?>.</div>
                            <div class="category-title"><?php echo $term->name ?></div>
                            <div class="active-arrow-down <?php if($term==$currentTerm){echo "active";} ?>"><svg height="13" viewBox="0 0 10 13" width="10" xmlns="http://www.w3.org/2000/svg"><path d="m102.166626 10.4997847c-.009028-.1045334-.051901-.2440913-.120366-.3223685l-3.6111112-4.17544646c-.1575215-.21818389-.4822977-.21746179-.6821871-.03901826-.1998895.17844354-.2151284.49550428-.0400376.68375518l2.9114609 3.36184984h-10.9762816c-.2658981 0-.4814815.2199229-.4814815.4912282s.2155834.4912281.4814815.4912281h10.9762816l-2.9114585 3.3618425c-.1910519.1882386-.1373234.5110738.0625685.6895124.1998895.1784386.5021347.1657158.6596562-.0447755l3.6111118-4.1754391c.096515-.1066702.114929-.2224281.120363-.3223684z" fill="#fff" transform="matrix(0 1 -1 0 15.166626 -89.166622)"/></svg></div>
                        </a>
                    </li>
                    <?php
                    
                }
            }
            //wp_set_object_terms( 42, $currentTerm, 'category' );
        ?>
        </ul>
</div>

<div class="intro-container">
    <div class="intro-container-inner row">
        <div class="intro-title"><?php echo get_field('intro_title', $currentTerm); ?></div>
        <div class="intro-text">
        <?php echo get_field('intro_text', $currentTerm); ?>
        </div>
        <a href="<?php echo get_page_link(68); ?>" class="intro-subtitle"><?php echo get_field('intro_lees_meer', $currentTerm); ?></a>
    </div>
</div>


<div class="slider-awards-container">
    <div class="slider-awards-container-inner row">
        <div class="column">
            <!-- Slider main container -->
            <div class="swiper-awards-image swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                        query_posts(array( 
                            'post_per_page' => '-1',
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'name',
                                    'terms' => array( 'Publicaties', 'Awards' )
                                )
                        )) );  
                    ?> 
                        <?php while (have_posts()) : the_post(); ?>

                            <div class="swiper-slide swiper-lazy" style='background-image: url("<?php the_field('banner') ?>");'>
                    
                            </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
        <div class="column">
            <!-- Slider main container -->
            <div class="swiper-title">
                <?php echo get_field('slider_title', $currentTerm); ?>
            </div>
            <div class="swiper-awards-text swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                        query_posts(array( 
                            'post_per_page' => '-1',
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms' => array( 'publicaties', 'awards', "publications" )
                                )
                        )) );  
                    ?> 
                        <?php while (have_posts()) : the_post(); ?>

                        <div class="swiper-slide">
                            <div class="swiper-slide-inner">
                                <div class="slide-title">
                                   <?php the_title() ?>
                                </div>
                                <div class="slide-subtitle">
                                    <?php  echo substr(get_the_content(), 0, 100)."..."; ?>
                                </div>
                                <a href="<?php the_permalink() ?>" class="slide-read-more">
                                    lees meer
                                </a>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"><svg height="50" viewBox="0 0 50 50" width="50" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" transform="matrix(-1 0 0 -1 50 50)"><rect fill="none" height="49" rx="24.5" stroke="#dedcd4" width="49" x=".5" y=".5"/><path d="m31.000004 24.6664066c-.0090278-.1045334-.0519013-.2440913-.1203656-.3223685l-3.6111115-4.1754465c-.1575215-.2181838-.4822977-.2174617-.6821871-.0390182-.1998895.1784435-.2151284.4955043-.0400376.6837552l2.9114611 3.3618499h-10.9762818c-.2658981 0-.4814815.2199228-.4814815.4912281s.2155834.4912281.4814815.4912281h10.9762818l-2.9114587 3.3618425c-.1910519.1882386-.1373234.5110738.0625685.6895124.1998895.1784386.5021347.1657158.6596562-.0447755l3.6111115-4.1754391c.0965154-.1066701.1149297-.2224281.1203632-.3223684z" fill="#000" fill-rule="nonzero"/></g></svg></div>
                <div class="swiper-button-next"><svg height="50" viewBox="0 0 50 50" width="50" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><rect fill="none" height="49" rx="24.5" stroke="#dedcd4" width="49" x=".5" y=".5"/><path d="m31.000004 24.6664066c-.0090278-.1045334-.0519013-.2440913-.1203656-.3223685l-3.6111115-4.1754465c-.1575215-.2181838-.4822977-.2174617-.6821871-.0390182-.1998895.1784435-.2151284.4955043-.0400376.6837552l2.9114611 3.3618499h-10.9762818c-.2658981 0-.4814815.2199228-.4814815.4912281s.2155834.4912281.4814815.4912281h10.9762818l-2.9114587 3.3618425c-.1910519.1882386-.1373234.5110738.0625685.6895124.1998895.1784386.5021347.1657158.6596562-.0447755l3.6111115-4.1754391c.0965154-.1066701.1149297-.2224281.1203632-.3223684z" fill="#000" fill-rule="nonzero"/></g></svg></div>
            </div>
        </div>
    </div>
</div>

<div class="projects-section-container <?php echo wp_count_posts('cpt_projects')->publish; if(wp_count_posts('cpt_projects')->publish%2==0){echo ' even';} ?>" style="background-color:<?php the_field('color', $currentTerm); ?>">
    <a href="<?php echo get_page_link(72); ?>" class="float-square"><div class="float-square-inner"><?php echo get_field('project_float_text', $currentTerm); ?>
        </div>
        <svg height="13" viewBox="0 0 10 13" width="10" xmlns="http://www.w3.org/2000/svg"><path d="m102.166626 10.4997847c-.009028-.1045334-.051901-.2440913-.120366-.3223685l-3.6111112-4.17544646c-.1575215-.21818389-.4822977-.21746179-.6821871-.03901826-.1998895.17844354-.2151284.49550428-.0400376.68375518l2.9114609 3.36184984h-10.9762816c-.2658981 0-.4814815.2199229-.4814815.4912282s.2155834.4912281.4814815.4912281h10.9762816l-2.9114585 3.3618425c-.1910519.1882386-.1373234.5110738.0625685.6895124.1998895.1784386.5021347.1657158.6596562-.0447755l3.6111118-4.1754391c.096515-.1066702.114929-.2224281.120363-.3223684z" fill="black" transform="matrix(0 1 -1 0 15.166626 -89.166622)"/></svg>
    </a>
    <div class="projects-section-container-inner row">
        <h2 class=""><?php echo get_field('projecten_title', $currentTerm); ?></h2>
        <div class="projects-container">
            <div class="projects-container-inner">
                <?php 
                    query_posts(array( 
                        'post_type' => 'cpt_projects',
                    ) );  
                ?> 
                    <?php while (have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink() ?>" class="project-container">
                            <div class="project-container-inner">
                                <div class="project-image lazy" data-src="<?php echo get_field('project_image')['url'] ?>" style='background-image: url("");'>
                                    
                                </div>
                                <div class="project-description">
                                    <h3 class="project-title">
                                        <div class="title"><?php the_title() ?></div>
                                        <div class="arrow-icon">
                                            <svg height="6" viewBox="0 0 9 6" width="9" xmlns="http://www.w3.org/2000/svg"><path d="m18.6000024 14.7998439c-.0054167-.06272-.0311408-.1464547-.0722193-.193421l-2.166667-2.5052679c-.0945129-.1309103-.2893786-.1304771-.4093122-.023411-.1199337.1070662-.1290771.2973026-.0240226.4102531l1.7468767 2.01711h-6.5857691c-.1595389 0-.2888889.1319537-.2888889.2947368 0 .1627832.12935.2947369.2888889.2947369h6.5857691l-1.7468753 2.0171055c-.1146311.1129432-.082394.3066443.0375412.4137075.1199336.1070631.3012808.0994294.3957937-.0268653l2.1666669-2.5052635c.0579092-.0640021.0689578-.1334568.0722179-.1934211z" transform="translate(-10 -12)"/></svg>
                                        </div>
                                    </h3>
                                    <div class="project-meta"><?php the_field('project_werk_vericht') ?></div>
                                </div>
                            </div>
                        </a>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</div>

<div class="inspiratie-section row">
    <div class="inspiratie-section-inner">
        <h2 class=""><?php echo get_field('inspiration_title', $currentTerm); ?></h2>
        <div class="inspiratie-container">
            <div class="inspiratie-container-inner">
            <div class="grid">
                <div class="grid-sizer"></div>
                <?php 
                    query_posts(array( 
                        'post_per_page' => '-1',
                        'post_type' => 'cpt_inspirations',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tax_categories_inspirations',
                                'field'    => 'slug',
                                'terms' => $currentTerm->name
                            )
                    )) );  
                ?> 
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="grid-item">
                            <img class="lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="<?php the_post_thumbnail_url( 'full' ); ?>">
                        </div>
                <?php endwhile;?>
            </div>
            </div>
        </div>
    </div>
</div>

    <div class="contact-container" style="background-color:<?php the_field('color', $currentTerm); ?>">
        <a href="<?php echo get_page_link(72); ?>">
            <div class="contact-container-inner row">
            <div class="title"><?php echo get_field('contact_us_title', $currentTerm); ?></div>
            <div class="text"><?php echo get_field('contact_us_text', $currentTerm); ?></div>
            <div class="subtitle"><?php echo get_field('contact_afspraak', $currentTerm); ?></div>
            </div>
        </a>
    </div>

<?php get_footer() ?>