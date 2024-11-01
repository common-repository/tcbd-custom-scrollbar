<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit; 

//register admin menu
function tcbd_custom_scrollbar_admin_menu() {  
	add_options_page('TCBD Custom Scrollbar', 'TCBD Custom Scrollbar', 'manage_options', 'tcbd-custom-scrollbar-settings', 'tcbd_scrollbar_settings');
	add_action( 'admin_init', 'tcbd_custom_scrollbar_register_settings' );
}

//register settings
function tcbd_custom_scrollbar_register_settings() { 
    register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_show');
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_width');
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_bgcolor' );
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_border_color' );
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_border_radius' );
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_speed' );
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_opacity' );
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_autohide' );
	register_setting( 'tcbd-custom-scrollbar-settings', 'tcbd_custom_scrollbar_hidecursordelay' );
}

//add default setting values on activation
function tcbd_custom_scrollbar_activate() { 
    add_option( 'tcbd_custom_scrollbar_show', 'show', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_width', '8', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_bgcolor', '#E6E6E6', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_border_color', '#46B3E6', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_border_radius', '0', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_speed', '100', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_opacity', '1', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_autohide', 'false', '', 'yes' );
	add_option( 'tcbd_custom_scrollbar_hidecursordelay', '400', '', 'yes' );
}

//delete setting and values on deactivation
function tcbd_custom_scrollbar_deactivate() { 
    delete_option( 'tcbd_custom_scrollbar_show');
	delete_option( 'tcbd_custom_scrollbar_width');
	delete_option( 'tcbd_custom_scrollbar_border_radius');
	delete_option( 'tcbd_custom_scrollbar_bgcolor');
	delete_option( 'tcbd_custom_scrollbar_border_color');
	delete_option( 'tcbd_custom_scrollbar_speed' );
	delete_option( 'tcbd_custom_scrollbar_opacity' );
	delete_option( 'tcbd_custom_scrollbar_autohide' );
	delete_option( 'tcbd_custom_scrollbar_hidecursordelay' );
}

function tcbd_scrollbar_settings(){ //add settings page
?>
	<div class="wrap">
	<h2>TCBD Custom Scrollbar - WordPress</h2>
	<p class="description">The `TCBD Custom Scrollbar - WordPress` plugin provides you to customize scrollbar for your website.</p>
	<h3>Display Settings</h3>
	<form method="post" action="options.php">
	
		<?php settings_fields('tcbd-custom-scrollbar-settings'); ?>
		
		<?php do_settings_sections('tcbd-custom-scrollbar-settings'); ?>
		
		<table class="form-table">
		
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_show">Show</label></th>
				<td><fieldset><label title="Show"><input type="radio" name="tcbd_custom_scrollbar_show" value="show" <?php
			if ('show' == get_option('tcbd_custom_scrollbar_show'))
				echo 'checked="checked"';
			?>>Show</label><br /><label title="Hide"><input type="radio" name="tcbd_custom_scrollbar_show" value="hide" <?php
			if ('hide' == get_option('tcbd_custom_scrollbar_show'))
				echo 'checked="checked"';
			?>>Hide</label><br /></fieldset>
					<p class="description">Change to enable or desable custom scrollbar!</p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_width">Scrollbar Width</label></th>
				<td>
					<input type="range" name="tcbd_custom_scrollbar_width"  id="tcbd_custom_scrollbar_width" value="<?php echo get_option('tcbd_custom_scrollbar_width'); ?>" min="1" max="20" data-rangeslider/>
					<span class="output"><output></output>px</span>
					<p class="description">Cursor width in pixel, default is 8px (you can write "8px" too)</p>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_border_radius">Scrollbar Radius</label></th>
				<td>
					<input type="range" name="tcbd_custom_scrollbar_border_radius"  id="tcbd_custom_scrollbar_border_radius" value="<?php echo get_option('tcbd_custom_scrollbar_border_radius'); ?>" min="0" max="30" data-rangeslider/>
					<span class="output"><output></output>px</span>
					<p class="description">Border radius in pixel for cursor, default is "0px"</p>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_bgcolor">Background Color</label></th>
				<td>
					<input type="text" name="tcbd_custom_scrollbar_bgcolor"  id="tcbd_custom_scrollbar_bgcolor" value="<?php echo stripslashes(get_option('tcbd_custom_scrollbar_bgcolor')); ?>"  />
					<p class="description">Change your scrollbar background color. Default color is #E6E6E6</p>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_border_color">Border Color</label></th>
				<td>
					<input type="text" name="tcbd_custom_scrollbar_border_color"  id="tcbd_custom_scrollbar_border_color" value="<?php echo stripslashes(get_option('tcbd_custom_scrollbar_border_color')); ?>" />
					<p class="description">Change your scrollbar border color. Default color is #46B3E6</p>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_speed">Scroll Speed</label></th>
				<td>
					<input type="range" name="tcbd_custom_scrollbar_speed"  id="tcbd_custom_scrollbar_speed" value="<?php echo get_option('tcbd_custom_scrollbar_speed'); ?>" step="5" min="0" max="1000" data-rangeslider/>
					<span class="output"><output></output></span>
					<p class="description">Change scrolling speed, default value is 100</p>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_opacity">Scrollbar Opacity</label></th>
				<td>
					<input type="range" name="tcbd_custom_scrollbar_opacity"  id="tcbd_custom_scrollbar_opacity" value="<?php echo get_option('tcbd_custom_scrollbar_opacity'); ?>" step="0.1" min="0" max="1" data-rangeslider/>
					<span class="output"><output></output></span>
					<p class="description">Change opacity very cursor is active (scrollabar "visible" state), range from 1 to 0, default is 1 (full opacity)</p>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_autohide">Autohide</label></th>
				<td><fieldset><label title="enable"><input type="radio" name="tcbd_custom_scrollbar_autohide" value="true" <?php
			if ('true' == get_option('tcbd_custom_scrollbar_autohide'))
				echo 'checked="checked"';
			?>>Enable</label><br /><label title="disable"><input type="radio" name="tcbd_custom_scrollbar_autohide" value="false" <?php
			if ('false' == get_option('tcbd_custom_scrollbar_autohide'))
				echo 'checked="checked"';
			?>>Disable</label><br /></fieldset>
					<p class="description"> Hide the scrollbar works, default value is Disable</p>
				</td>
			</tr>
			
			<tr>
				<th scope="row"><label for="tcbd_custom_scrollbar_hidecursordelay">Hide Cursor Delay</label></th>
				<td>
					<input type="range" name="tcbd_custom_scrollbar_hidecursordelay"  id="tcbd_custom_scrollbar_hidecursordelay" value="<?php echo get_option('tcbd_custom_scrollbar_hidecursordelay'); ?>" step="10" min="0" max="10000" data-rangeslider/>
					<span class="output"><output></output></span>
					<p class="description">Set the delay in microseconds to fading out scrollbars (default:400)</p>
				</td>
			</tr>
			
			<tr valign="top" align="left">
				<td colspan="2"><?php submit_button(); ?></td>
			</tr>
		
		</table>
	</form>
	
	
	</div>
	
	<?php
}


?>