<?php
/* -------------------------------------------------------------------------- */
/*  Load the good stuff
/* -------------------------------------------------------------------------- */
get_template_part('lib/clean');
get_template_part('lib/enqueue-style');
get_template_part('lib/enqueue-scripts');
get_template_part('lib/walker-nav');
get_template_part('inc/dashboard/widget');
/* -------------------------------------------------------------------------- */
/*  Load everything
/* -------------------------------------------------------------------------- */
if ( ! function_exists( 'mint_load' ) ) {

	function mint_load() {

		add_theme_support('post-thumbnails');
  	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    add_theme_support( 'title-tag' );

    add_image_size( 'thumb-small', 400 ); // small size
		add_image_size( 'thumb-medium', 800 ); // medium size
		add_image_size( 'thumb-large', 1400 ); // large size

    register_nav_menus( array(
      'header' => 'Header',
			'header_second' => 'Header second',
      'home' => 'Home',
			'about' => 'About'
    ));

		add_post_type_support( 'post', 'page-attributes' );
		add_filter( 'widget_text', 'do_shortcode' );
		add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

	}

}
add_action( 'after_setup_theme', 'mint_load' );
add_action( 'widgets_init', 'theme_slug_widgets_init' );

if ( ! function_exists( 'my_image_sizes' ) ) {

    function my_image_sizes($sizes) {
        $addsizes = array(
             "img-md" => __( "Medium")
         );
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
    }

}
//add_filter('image_size_names_choose', 'my_image_sizes');

function theme_slug_widgets_init() {
    register_sidebar( array(
      'name' => __( 'Search', 'vdp' ),
      'id' => 'search',
      'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'vdp' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
    ) );
}
/* -------------------------------------------------------------------------- */
/*  Custom post types & taxonomies
/* -------------------------------------------------------------------------- */
get_template_part('inc/custom-post-type/custom-post-type'); // CUSTOM POST TYPES
get_template_part('inc/custom-post-type/custom-taxonomy'); // CUSTOM POST TAXONOMIES
/* -------------------------------------------------------------------------- */
/*  ARCHIVE TITLE
/* -------------------------------------------------------------------------- */
function my_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax('tax_faq') ) {
		$title = single_term_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
/* -------------------------------------------------------------------------- */
/*  Remove admin menu items
/* -------------------------------------------------------------------------- */
function remove_menus() {
	remove_menu_page( 'edit-comments.php' ); // Comments
}
add_action( 'admin_menu', 'remove_menus' );
/* -------------------------------------------------------------------------- */
/*  Dashboard widgets
/* -------------------------------------------------------------------------- */
if ( ! function_exists( 'mint_remove_dashboard_widgets' ) ) {
	function mint_remove_dashboard_widgets() {
		$widgets = array(
			'dashboard_incoming_links' => 'normal',
			'dashboard_right_now' => 'normal',
			'dashboard_plugins' => 'normal',
			'dashboard_recent_comments' => 'normal',
			'dashboard_activity' => 'normal',
			'dashboard_quick_press' => 'side',
			'dashboard_primary' => 'side',
			'dashboard_secondary' => 'side',
			'dashboard_recent_drafts' => 'side',
		);
		foreach ($widgets as $id => $context) {
			remove_meta_box($id, 'dashboard', $context);
		}
	}
}
add_action('wp_dashboard_setup', 'mint_remove_dashboard_widgets');
/* -------------------------------------------------------------------------- */
/*  Custom excerpts functions
/* -------------------------------------------------------------------------- */
if ( ! function_exists( 'custom_excerpt_length' ) ) {
	function custom_excerpt_length( $length ) {
		return 20;
	}
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if ( ! function_exists( 'custom_excerpt_more' ) ) {
	function custom_excerpt_more($more) {
		global $post;
		return ''. __('...', 'themify') .'';
	}
}
add_filter('excerpt_more', 'custom_excerpt_more');
/* -------------------------------------------------------------------------- */
/*  Custom CSS for Admin, login & editor
/* -------------------------------------------------------------------------- */
if ( ! function_exists( 'custom_admin_css' ) ) {
	function custom_admin_css() {
		wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/src/css/wp/admin.css' );
	}
}
add_action('admin_print_styles', 'custom_admin_css' );

if ( ! function_exists( 'custom_login_stylesheet' ) ) {
	function custom_login_stylesheet() { ?>
		<link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/src/css/wp/login.css'; ?>" type="text/css" media="all" />
	<?php }
}
add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );
/* -------------------------------------------------------------------------- */
/*  Body Class
/* -------------------------------------------------------------------------- */
add_action( 'body_class', 'mint_body_class' );
if ( ! function_exists( 'mint_body_class' ) ) {
	function mint_body_class($classes) {
		if ( ! is_404() && ! is_admin() ) {
			global $post;
			$id = $post->ID;
			$format = get_post_format( $post->ID );
			// Page Name
			if ( is_page() ) {
				$pn = $post->post_name;
				$classes[] = "page--".$pn."";
			}
			// Page Parent Name
			$post_parent = get_post($post->post_parent);
			$parentSlug = $post_parent->post_name;
			if ( is_page() && $post->post_parent ) {
				$classes[] = "parent-".$parentSlug;
			}
			// Post Category Name
			foreach ( ( get_the_category( $post->ID ) ) as $category ) {
				$classes[] = 'category-' .$category->category_nicename;
			}
			// Page Template Name
			$temp = get_page_template();
			if ( $temp != null ) {
				$path = pathinfo($temp);
				$tmp = $path['filename'] . "." . $path['extension'];
				$tn= str_replace(".php", "", $tmp);
				$classes[] = $tn;
			}
			foreach ( $classes as $key => $value ) {
				//if ( $value == 'home' ) unset( $classes[ $key ] );
				if ( $value == 'blog' ) unset( $classes[ $key ] );
				if ( $value == 'logged-in' ) unset( $classes[ $key ] );
				if ( $value == 'page-template-default' ) unset( $classes[ $key ] );
				if ( $value == 'page-template-templates' ) unset( $classes[ $key ] );
				if ( $value == 'page-template' ) unset( $classes[ $key ] );
				if ( $value == 'page-template-'.$tn.'' ) unset( $classes[ $key ] );
				if ( $value == 'page-template-templates'.$tn.'-php' ) unset( $classes[ $key ] );
				if ( $value == 'template-page' ) unset( $classes[ $key ] );
				//if ( $value == 'page-id-'.$id.'' ) unset( $classes[ $key ] );
				//if ( $value == 'postid-'.$id.'' ) unset( $classes[ $key ] );
				if ( $value == 'single-format-standard' ) unset( $classes[ $key ] );
				if ( $value == 'single-format-'.$format.'' ) unset( $classes[ $key ] );
				if ( $value == 'category-geen-categorie' ) unset( $classes[ $key ] );
				if ( $value == 'category-no-category' ) unset( $classes[ $key ] );
			}
			return $classes;
		} else {
			return $classes;
		}
	}
}

/* -------------------------------------------------------------------------- */
/*  Deregister scripts
/* -------------------------------------------------------------------------- */
if ( ! function_exists( 'wp_deregister_scripts' ) ) {
	function wp_deregister_scripts() {
		wp_deregister_script( 'wp-embed' );
	}
}
add_action( 'wp_footer', 'wp_deregister_scripts' );
/* -------------------------------------------------------------------------- */
/*  ACF - options page
/* -------------------------------------------------------------------------- */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Website',
		'menu_title'	=> 'Website',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
/* -------------------------------------------------------------------------- */
/*  Upload SVG files
/* -------------------------------------------------------------------------- */
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
/* -------------------------------------------------------------------------- */
/*	Shortcodes
/* -------------------------------------------------------------------------- */
function contact_form_shortcode( $atts, $content = null ) {
	return '<button class="c-button c-button--pill js-contact-form-open">' . $content . '</button>';
}
add_shortcode( 'contact-form', 'contact_form_shortcode' );
add_action( 'pre_get_posts', 'bavotasan_custom_pre_get_posts' );
function bavotasan_custom_pre_get_posts( $query ) {
	if ( ! $query->is_home() || ! $query->is_main_query() )
		return;

	global $withcomments;
	$withcomments = true;
	$query->set( 'posts_per_page', '1' );
	$query->set( 'ignore_sticky_posts', '1' );
}
?>