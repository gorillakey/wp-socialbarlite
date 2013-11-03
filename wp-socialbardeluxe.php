<?php
/* 
Plugin Name: Social Bar Deluxe
Plugin URI: http://gorillafart.net/wp-socialbardeluxe/
Description: Plugin de una barra flotante que permite a tus visitantes conectarse a tus redes sociales de una forma rápida, segura e inmediata. Hacer Follow en Twitter y Pinterest, Like en tu página de Facebook, añadir tu perfil de Google+ a sus círculos, todo en una sola herramienta. SocialBarDeluxe te permite elegir el idioma de tu preferencia (Inglés y Español), validar una URL, minimizar o cerrar la barra, activar o desactivar redes sociales con tan sólo un click.
Version: 1.0
Author: Gorilla Fart
Author URI: http://gorillafart.net/
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