=== Maintenance Mode Notify ===
Contributors: PixelAlb
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HFJR5YCMDJAVL
Tags: maintenance, notify, alert, popup
Requires at least: 2.8
Tested up to: 3.0.4
Stable tag: trunk

Notify your visitors when you're updating your blog by showing a nice message in the page.

== Description ==

**Notifies** your visitors about you updating the blog.



[Support](http://pixelalb.ro/) |

Some features:

* Displays a nice message at the top of your blog pages
* Looks good on different browsers


Follow me on Twitter to keep up with the latest updates [Stegaru Victor](http://twitter.com/pixelalb/)

== Installation ==

You can use the built in installer and upgrader, or you can install the plugin
manually.

1. You can either use the automatic plugin installer or your FTP program to upload it to your wp-content/plugins directory
the top-level folder. Don't just upload all the php files and put them in `/wp-content/plugins/`.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add this code in your footer.php file, just before the </body> tag
		
	<?php
	if (function_exists("activate_maintenance_mode")) {
		activate_maintenance_mode();
	}
	?>


4. Go to Maintenance page and update the message you want to display when in maintenance mode
5. To disable maintenance mode, just set the "Mesajul" field to 0 (zero)
6. That's it!

== Frequently Asked Questions ==
= Will it work in IE browsers? =
Absolutely YES


== Changelog ==
= 1.0 =
* Yellow bar at the top of the page



== Upgrade Notice ==
= 1.0 =
This is the very first version of the plugin. More to follow!.


== Screenshots ==
1. No screenshots at this moment