<?php
/*
Plugin Name: Easy Meta
Plugin URI: http://mr.hokya.com/easy-meta/
Description: Help you input meta tag information for claiming reason or other purposes. It will save time for claiming purpose and you don't need to recode for tag verification everytime you change the wordpress Theme
Version: 3.5.7
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/

if (!get_option("meta")) update_option("meta","google-site-verification===tHisIsJustAsampleOfMetaUsageForverification;;;blogcatalog===aNotherExampleOfMeta;;;hokya===ifYouNeedHelpPleaseFollowDocumentationLinkAbove;;;");

function easy_meta () {
	$option = explode(";;;",get_option("meta"));
	for ($i=0;$i<count($option)-1;$i++) {
		$meta = explode("===",$option[$i]);
		$name = $meta[0];
		$value = $meta[1];
		echo "\r\n<meta name='$name' content='$value' />";
	}
	echo "\n<!-- Meta Tag generated using Easy Meta WP Plugin -->\n";
}

function easy_meta_menu () {
	add_options_page('Easy Meta', 'Easy Meta', 'manage_options','easy-meta/options.php');
	add_posts_page('Meta Tags', 'Meta Tags', 'manage_options','easy-meta/options.php');
}


add_action('wp_head', 'easy_meta');
add_action('admin_menu', 'easy_meta_menu');

?>