<?php

if ( ! function_exists( 'mint_scripts ' ) ) {
	function mint_enqueue_scripts() {
		if ( ! is_admin() ) {

			$jtime = filemtime( get_template_directory() . '/dist/app.bundle.js' );

			wp_deregister_script( 'jquery' );

			wp_register_script( 'app', get_template_directory_uri() . "/dist/app.bundle.js", false, $jtime, true );

			wp_enqueue_script( 'app' );

		}
	}
}
add_action('wp_enqueue_scripts', 'mint_enqueue_scripts');

?>
