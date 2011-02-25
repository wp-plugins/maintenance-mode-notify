<?php
/*
Plugin Name: Maintenance Mode Notifyer
Plugin URI: http://pixelalb.ro
Description: Shows a nice alert message to your users when your blog is in Maintenance Mode 
Version: 1.0
Author: PixelAlb
Author URI: http://pixelalb.ro
*/

activate_maintenance_mode();

function activate_maintenance_mode() {
	if (!is_admin()) {
		$mesaj = get_option('mesaj');
	if ($mesaj != "0") {
	echo "<div class='alertMaintenance'>";
	 echo	get_option('mesaj');  
	echo "</div>";
}
}
}

function my_css() {
	echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') .'/wp-content/plugins/maintenance-mode-notify/css/alert.css" />' . "\n";
}
	add_action('wp_head', 'my_css');



// create custom plugin settings menu
add_action('admin_menu', 'mm_create_menu');

function mm_create_menu() {

	//create new top-level menu
	add_menu_page('MMA Plugin Options', 'Maintenance', 'administrator', __FILE__, 'mma_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'mma-settings-group', 'mesaj' );
}

function mma_settings_page() {
?>
<div class="wrap">
<h2>Maintenance Mode</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'mma-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Mesajul</th>
        <td><input type="text" name="mesaj" value="<?php echo get_option('mesaj'); ?>" /></td>
        </tr>
         
       
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php } ?>
