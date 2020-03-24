<?php
/*
plugin name: Inpsyde Users List
Description: List the users from API and popuplate them on the page
Version: 0.0.1
Author: <a href="#" target="_blank">Users Demo</a>  | Waqar Ahmed
*/

global $wpdb;

/*Create Database Tables When Plugin is Activated START*/

function install_inpsyde_users() {

	// create users pages
    $users_page = array(
      'post_title'    => wp_strip_all_tags( 'Inpsyde Users List' ),
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => 1,
      'post_type'     => 'page',
    );

    // Insert the post into the database
    wp_insert_post( $users_page );
}


//Define admin sidebar link(s)
add_action('admin_menu','inpsyde_main_menu');


function inpsyde_main_menu(){	 

	add_menu_page( "Inpsyde Users", "Inpsyde Users", "manage_options", "inpsyde-users", "inpsyde_users", "", 118);
	add_submenu_page( "inpsyde-users", "Inpsyde Users", "Inpsyde Users", "manage_options", "inpsyde-users", "inpsyde_users");

}


function inpsyde_users(){
	include("inpsyde-users.php");	
}

function get_users_list(){
	include("users-list-page.php");
}
add_shortcode( 'list-users', 'get_users_list' );


register_activation_hook(__FILE__, 'install_inpsyde_users');
?>