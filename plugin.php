<?php
/*
Plugin Name: Easy Meta
Plugin URI: http://mr.hokya.com/easy-icon/
Description: Help you input meta tag information for claiming reason or other purposes.
Version: 2.3.1
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/


function easy_meta () {
	$option = explode(";",get_option("meta"));
	for ($i=0;$i<count($option)-1;$i++) {
		$meta = explode("=",$option[$i]);
		$name = $meta[0];
		$value = $meta[1];
		echo '<meta name="'.$name.'" content="'.$value.'" />';
	}
}

function easy_meta_menu () {
	add_options_page('Easy Meta', 'Easy Meta', 'manage_options','easy-meta/options.php');
}


add_action('wp_head', 'easy_meta');
add_action('admin_menu', 'easy_meta_menu');

?>