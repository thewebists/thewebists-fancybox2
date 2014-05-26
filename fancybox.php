<?php
/*
Plugin Name: FancyBox2 (fork by The Webists)
Plugin URI: https://github.com/thewebists/thewebists-fancybox2/
Description: Enables <a href="http://fancybox.net/">fancybox 2.1.5</a> on all image links including BMP, GIF, JPG, JPEG, and PNG links. Fork of Fancybox2 plugin by Span (orignally based on Fancybox plugin by Kevin Sylvestre).
Version: 2.1.5
Author: The Webists
Author URI: http://www.thewebists.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function fancybox() {
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		var select = $('a[href$=".bmp"],a[href$=".gif"],a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"],a[href$=".BMP"],a[href$=".GIF"],a[href$=".JPG"],a[href$=".JPEG"],a[href$=".PNG"]');
		select.attr('rel', 'fancybox');
		select.fancybox();
	});
</script>
<?php
}

if (!is_admin()) {
	wp_enqueue_script('jquery');
	// wp_enqueue_script('jquery.fancybox', WP_PLUGIN_URL.'/fancybox2/jquery.fancybox.js', array('jquery'), '2.1.5'); // Non-minified version of the Fancybox JS file
	wp_enqueue_script('jquery.fancybox', WP_PLUGIN_URL.'/fancybox2/jquery.fancybox.pack.js', array('jquery'), '2.1.5'); // Minified version of the Fancybox JS file
	wp_enqueue_script('jquery.easing', WP_PLUGIN_URL.'/fancybox2/jquery.easing.js', array('jquery'), '1.6');
	wp_enqueue_style('jquery.fancybox', WP_PLUGIN_URL.'/fancybox2/jquery.fancybox.css', false, '2.1.5');
	add_action('wp_head', 'fancybox');
}
?>