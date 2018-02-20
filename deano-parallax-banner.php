<?php
/*
Plugin Name: Deano Parallax Banner
Plugin URI: deano.me/plugins/
Description: Create parallax banner using background image.
Author: Deano
Author URI: http://www.deano.me/
Version: 1.0
*/

//[deano_parallax background="https://i.ytimg.com/vi/uIng8BqcfTo/maxresdefault.jpg"]

add_shortcode('deano_parallax', 'add_deano_parallax_background');

function add_deano_parallax_background ($atts, $content = null) {

	$GLOBALS['background'];

	$background = $atts['background'];

	return '<div class="parallax-window" data-parallax="scroll" data-image-src="'.$background.'"><div class="parallax-content-wrapper">'.$content.'</div></div>';
}

function myscript() {
?>
<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
<script type="text/javascript">
	jQuery('.parallax-window').parallax({imageSrc: 'https://i.ytimg.com/vi/uIng8BqcfTo/maxresdefault.jpg'});
</script>
<?php
}

add_action('wp_footer', 'myscript');

function shimify() {
	echo '<style>.parallax-window { min-height: 400px; background: transparent; } .parallax-mirror { z-index: 2 !important; } .parallax-window { width: 100%; }</style>';
}
add_filter('wp_head', 'shimify');

?>