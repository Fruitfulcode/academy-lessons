<?php
/*
Plugin Name: My WordPress Plugin
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: Basic WordPress Plugin Header Comment
Version:     1.0
Author:      WordPress.org
Author URI:  https://developer.wordpress.org/
Text Domain: my-plugin-textdomain
Domain Path: /languages
License:     GPL2
 
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

register_activation_hook( __FILE__, 'myplugin_activate' );
function myplugin_activate() {
	// activate actions without echo
}

register_deactivation_hook( __FILE__, 'myplugin_deactivate' );
function myplugin_deactivate(){
	// deactivate actions
}

register_uninstall_hook(__FILE__, 'myplugin_uninstall');
function myplugin_uninstall() {
	//uninstall actions, for example delete_option("option_name"); - your options should not litter the database
}


//Add button to post
add_filter( 'the_content', array($this, 'mfp_add_button' ));

//Add button to post
function mfp_add_button($content){
	global $post;
	
	$user_id = get_current_user_id();

	if (!$user_id) {
		$message = '<p class="my-plugin-message">' . __( 'Please, Sign In to Add to Favorite', 'my-plugin-textdomain' ) . '</p>';
		$content .= $message;
		return $content;
	}

	if ($post->post_type == 'post') {
		
		$mfp_button = '<form action="" method="post" enctype="multipart/form-data">'.
		$mfp_button .= '<input type="hidden" name="mfp_post_id" value="'.$post->ID.'">';
		$mfp_button .= '<input type="hidden" name="mfp_action" value="add">';
		$mfp_button .='<input type="submit" id="mfp_button" value="'.__( 'Add to favorite', 'my-plugin-textdomain' ).'">';
		$mfp_button .= '</form>';
		
		$content .= $mfp_button;
		
	}
	return $content;
}