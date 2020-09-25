<?php
	header("Content-Type: text/javascript; charset=utf-8");
	
	query_posts(array(
		'category_name'=>'residents',
		'orderby'=>'date',
		'order'=>'ASC',
		'posts_per_page'=>-1
	));
	if(have_posts()):
		$artists = array();
		while ( have_posts() ) :
			the_post();
			$artist = array();
			$artist["url"] = get_permalink();
			$artist["name"] = get_the_title();
			if(has_post_thumbnail()){
				//$src = wp_get_attachment_image_src(get_post_thumbnail_id(), array( 500,300 ), false, '');
				$src = wp_get_attachment_image_src(get_post_thumbnail_id());
				$artist["thumb"] = $src[0];
			}else{
				$artist["thumb"] = "http://metaphorest.net/wp-content/themes/metaphorest/images/postdefault.png";
			}
			array_push($artists,$artist);
		endwhile;
	endif;
	
	print json_encode($artists);
?>