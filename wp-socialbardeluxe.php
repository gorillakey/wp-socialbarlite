<?php
/* 
Plugin Name: Social Bar Deluxe
Plugin URI: http://gorillakey.com/wp-socialbardeluxe/
Description: A floating bar plugin that allows your visitors connect them to your social networks in a fast, secure and instant way. Make Follow on Twitter or Pinterest, Like on your Facebook page, add your Google+ profile to their circles, all in one single tool. SocialBarDeluxe lets you choose your preferred language (English and Spanish), validate an URL, minimize or close the bar, enable or disable social networks, with just one click.
Version: 1.0.0
Author: Gorilla Fart
Author URI: http://gorillakey.com/
License: GPLv2 or later
*/

define("ROOT_DIR", plugin_dir_path( __FILE__ ));
define("STATIC_URL",plugins_url( 'statics/' , __FILE__ ));
define("ROOT_VIEWS", ROOT_DIR.'views/');
define("DEBUG", false);
define("PLUGIN_NAME", "SocialBarDeluxe");
define("PLUGIN_NAME_VAR", "socialbardeluxe");
define("FORM_URL","pro_plugin_settings");

/*Directories that contain classes*/
$classesDir = array (
    ROOT_DIR.'libs/',
    ROOT_DIR.'models/',
    ROOT_DIR.'controllers/',
);
function __autoload($class_name) {
    global $classesDir;

    foreach ($classesDir as $directory) {    	
    	foreach ( glob( $directory."*.php" ) as $file )
    	{
    		include_once $file;

    		if(DEBUG){ echo $file."<br/>";}
    	}
    }
}


/* -------- Pr ---------- */

function pr($array){

    echo '<pre>';
    print_r($array);
    echo  '</pre>';

}


function pro_plugin_activation() {
}


function pro_plugin_deactivation() {
}

/* ------ Load Controller------ */
function loadController($option){

	$optionexplode = explode(".", $option);
	$controller_name= $optionexplode[0].'Controller';
	$controller_action = $optionexplode[1];

	$controller = new $controller_name;
	$controller->$controller_action();

}


function pro_plugin_display_settings() {

	//pr($_REQUEST);

	if ( current_user_can( 'administrator' ) ) {

		if($_REQUEST["option"]){
			$option =$_REQUEST["option"];
		}else{
			$option = 'masterPlugin.init';
		}

		loadController($option);
		


	}


}

function showBar() {

         $option='masterPlugin.showBar';
         loadController($option);
}


function pro_plugin_settings() {
    add_menu_page(PLUGIN_NAME.' Settings', PLUGIN_NAME, 'manage_options', FORM_URL, 'pro_plugin_display_settings');
    //add_submenu_page( 'pro_plugin_settings', 'About Us', 'About Us', 'manage_options', 'pro_plugin_aboutus', 'pro_plugin_display_settings');
}


register_activation_hook(__FILE__, 'pro_plugin_activation');
register_deactivation_hook(__FILE__, 'pro_plugin_deactivation');
add_action('admin_menu', 'pro_plugin_settings');
add_filter('wp_footer', 'showBar');




?>