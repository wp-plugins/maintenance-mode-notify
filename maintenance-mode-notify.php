<?php
/*
Plugin Name: Maintenance Mode Notifyer
Plugin URI: http://pixelalb.ro
Description: Shows a nice alert message to your users when your blog is in Maintenance Mode 
Version: 2.1
Author: PixelAlb
Author URI: http://pixelalb.ro
*/


// add_action('wp_head', 'my_css');
// add_action('wp_head', 'bar_behavior');

function activate_maintenance_mode() {
	if (!is_admin()) {
		$mesaj = get_option('mesaj');
		$theme = get_option('theme');
		$blink = get_option('blink');
		if ($blink == "on") {$blinkval = "checked='checked'"; $blinkclass = "blink";}
	if ($mesaj != "0") {
	echo "<div class='alertMaintenance ". $theme ." ". $blinkclass ."'><span>";
	 echo	get_option('mesaj');  
	echo "<span></div>";
		echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') .'/wp-content/plugins/maintenance-mode-notify/css/alert.css" />' . "\n";
			echo "<script type='text/javascript' src='" . get_bloginfo('wpurl') ."/wp-content/plugins/maintenance-mode-notify/js/functions.js'></script>" . "\n";
}
}
}

function my_css() {
	echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') .'/wp-content/plugins/maintenance-mode-notify/css/alert.css" />' . "\n";
}
function bar_behavior() {
	echo "<script type='text/javascript' src='" . get_bloginfo('wpurl') ."/wp-content/plugins/maintenance-mode-notify/js/functions.js'></script>" . "\n";
}




// create custom plugin settings menu
add_action('admin_menu', 'mm_create_menu');

function mm_create_menu() {

	//create new top-level menu
	add_menu_page('MMA Plugin Options', 'Maintenance', 'administrator', __FILE__, 'mma_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_settings_mmn' );
}


function register_settings_mmn() {
	//register our settings
	register_setting( 'mma-settings-group', 'mesaj' );
	register_setting( 'mma-settings-group', 'theme' );
	register_setting( 'mma-settings-group', 'blink' );
}

function mma_settings_page() {
?>
<div class="wrap">
<h2>Maintenance Mode</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'mma-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Message</th>
        <td><textarea type="text" name="mesaj" style="width:300px; height:80px; overflow:auto"><?php echo get_option('mesaj'); ?></textarea></td>
        </tr>
		<tr valign="top">
        <th scope="row">Look</th>
        <td>
			<select name="theme" style="width:300px;">
        		<option value="<?php echo get_option('theme'); ?>"><?php echo get_option('theme'); ?></option>
        		<option value="topYellowBar">topYellowBar</option>
        		<option value="bottomYellowBar">bottomYellowBarr</option>
        		<option value="fullScreenYellowBar">fullScreenYellowBar</option>
        	</select>
		</td>
        </tr>
         <tr valign="top">
        <th scope="row">Should it blink?</th>
        <td>
	<?php if (get_option('blink') == "on") {echo '<input type="checkbox" checked="checked" name="blink"  />'; } else {echo '<input type="checkbox"  name="blink"  />';} ?>
        </td>
        </tr>
       
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php } ?>
