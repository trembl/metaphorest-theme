<?php

// update_option('siteurl','http://dev.trembl.org/metaphorest');
// update_option('home','http://dev.trembl.org/metaphorest');

function mp_init(){

	$locale = get_locale();

	register_nav_menu( 'primary','Primary Menu' );

	add_theme_support( 'post-thumbnails' );

	define('HEADER_TEXTCOLOR', 'ffffff');
	define( 'NO_HEADER_TEXT', true );
	define('HEADER_IMAGE', '%s/images/default_header.jpg');
	define('HEADER_IMAGE_WIDTH', 500);
	define('HEADER_IMAGE_HEIGHT', 300);

	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	add_image_size( 'large', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	add_theme_support( 'custom-header', array( 'random-default' => true ) );

	// add_custom_image_header();

	// remove wp_head()
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'feed_links_extra',3,0);
	//remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	//remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link');
	remove_action('wp_head', 'start_post_rel_link');
	//remove_action('wp_head', 'rel_canonical');

}
add_action('after_setup_theme','mp_init');

function post_facebook($post_ID){

	$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post_ID ));
	$thumbnail = $thumbnail[0];

	$permalink = get_permalink($post_ID);

	$title = get_the_title($post_ID);

	$ch = curl_init("https://graph.facebook.com/metaphorest.net/feed");
	$params = array(
		"access_token"=>"AAADoerbWOesBAHn2SFJDd1VyuLeybgZCoF3smDRx27cfIBsrjtLcm9jrXZAhSSvPSZBekNdyFFrXyEiA17T1sO5JZAaMJT4wDHsyRiilPdLQUZBeCZBpFs",
		"message" => "[update] ".$title,
		"link" => $permalink,
		"picture" => $thumbnail,
		"name" => $title,
		"caption" => "update metaphorest.net",
	);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params );

	$data = curl_exec($ch);
	$info = curl_getinfo($ch);

	curl_close($ch);

	return $post_ID;
}
//add_action('publish_post','post_facebook');
?>
