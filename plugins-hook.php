<?php 
/*
Plugin Name: TCBD Custom Scrollbar - WordPress
Plugin URI: http://demos.tcoderbd.com/wordpress_plugin
Description: TCBD Custom Scrollbar - WordPress is a jQuery custom scrollbar for your wordpress website. This plugin will enable awesome custom scrollbar. You can change scrollbar color, border radius, scroll speed, width, hide delay & other settings.
Author: tCoderBD     
Version: 1.0    
Author URI: http://www.tcoderbd.com/      
*/ 


// Exit if accessed directly
defined( 'ABSPATH' ) || exit; 


// Include Settings page
include( plugin_dir_path(__FILE__).'/settings.php' );


// Add scripts to head
function tcbd_custom_scrollbar_scripts() { 
	wp_enqueue_script('jquery'); // Latest jQuery 
    wp_enqueue_script( 'script', plugins_url('js/jquery.nicescroll.min.js', __FILE__), array( 'jquery' ), '3.2.0' ); // Add nicescroll js
}

// Add Admin Scripts
function tcbd_admin_scripts( $hook_suffix ) {
	wp_enqueue_script( 'wp-color-picker' ); // WP Color Picker 
	wp_enqueue_script( 'active-scripts', plugins_url( 'js/scripts.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), false, true ); // Acrive jQuery Scripts
	wp_enqueue_script( 'rangeslider', plugins_url( 'js/rangeslider.min.js', __FILE__ ), array( 'jquery' ), false, true ); // Add Rangeslider js
	wp_enqueue_style( 'wp-color-picker' ); // Add Color Picker CSS
	wp_register_style('rangeslider', plugins_url( 'css/rangeslider.css', __FILE__ ) ); // Register Rangeslider CSS
    wp_enqueue_style('rangeslider'); // Add Rangeslider CSS
}	

// Add Active Scripts For custom Scrollbar
function tcbd_custom_scrollbar_add_scripts_to_head() {
	if(get_option('tcbd_custom_scrollbar_show')=="show"){ 
	?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var nice = $("html").niceScroll({
					cursorcolor: "<?php echo get_option('tcbd_custom_scrollbar_border_color'); ?>",
					cursorwidth: "<?php echo get_option('tcbd_custom_scrollbar_width'); ?>px",
					cursorborder:"none",
					cursorborderradius:"<?php echo get_option('tcbd_custom_scrollbar_border_radius'); ?>px",
					background:"<?php echo get_option('tcbd_custom_scrollbar_bgcolor'); ?>",
					scrollspeed :"<?php echo get_option('tcbd_custom_scrollbar_speed'); ?>",
					autohidemode :<?php echo get_option('tcbd_custom_scrollbar_autohide'); ?>,
					cursoropacitymax:<?php echo get_option('tcbd_custom_scrollbar_opacity'); ?>,
					bouncescroll: true,
					smoothscroll: true
				});
			});
		</script>
	<?php
	}
}


// Add settings page link in before activate/deactivate links.
function tcbd_custom_scrollbar_plugin_action_links( $actions, $plugin_file ){
	static $plugin;
	if ( !isset($plugin) ){
		$plugin = plugin_basename(__FILE__);
	}
	if ($plugin == $plugin_file) {
		if ( is_ssl() ) {
			$settings_link = '<a href="'.admin_url( 'options-general.php?page=tcbd-custom-scrollbar-settings', 'https' ).'">Settings</a>';
		}else{
			$settings_link = '<a href="'.admin_url( 'options-general.php?page=tcbd-custom-scrollbar-settings', 'http' ).'">Settings</a>';
		}
		$settings = array($settings_link);
		$actions = array_merge($settings, $actions);	
	}
	return $actions;
}



add_filter( 'plugin_action_links', 'tcbd_custom_scrollbar_plugin_action_links', 10, 5 );// Add settings page link in before activate/deactivate links
add_action('wp_enqueue_scripts', 'tcbd_custom_scrollbar_scripts'); // Add scripts to head
add_action( 'admin_enqueue_scripts', 'tcbd_admin_scripts' ); // Add scripts to admin
add_action('wp_head', 'tcbd_custom_scrollbar_add_scripts_to_head'); // Add scripts to head
add_action('admin_menu', 'tcbd_custom_scrollbar_admin_menu'); // Add settings admin menu
register_activation_hook( __FILE__, 'tcbd_custom_scrollbar_activate' ); // Register activation hook
register_deactivation_hook( __FILE__, 'tcbd_custom_scrollbar_deactivate' ); // Register deactivation hook


?>