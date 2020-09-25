<?php get_header(); ?>
<script src="js/jquery.easing.1.3.js"></script>
<script>
$(function(){
	var num = $("#top-visual li").css("display","none").length;
	var id = 0;
	$("#top-visual li").eq(id).css("display","block");
	setInterval(function(){
		var next = id+1;
		if(next == num) next = 0;
		$("#top-visual li").eq(next).fadeIn("slow");
		$("#top-visual li").eq(id).css("display","none");
		id++;
		if(next == 0) id=0;
	},5000);
});
</script>
<style>
#top-visual {
	background-color: #000;
}
#top-visual li {
	opacity: 0.9;
}
#top-visual li img {
	width: 800px;
        height: 480px;
}
#top-visual li span {
	position: absolute;
	display: block;
	right: 0px;
	top: 30px;
	background-color: #000;
	padding: 5px 15px;
	color: #fff;
}
#top-visual li span a {
	color: #fff;
}
</style>
					<ul id="top-visual">
						<?php
							query_posts(array(
								'category_name'=>'residents',
								'posts_per_page'=>-1,
								'orderby'=>'rand'
							));
							$thumbs = array();
							if ( have_posts() ) :
								while ( have_posts() ) :
									the_post();
									if(has_post_thumbnail()):
										array_push($thumbs, array(
											"post_id" => get_the_ID(),
											"link" => get_permalink(),
											"title" => get_the_title()
										));
									endif;
								endwhile;
							endif;
							
							foreach($thumbs as $thumb):
								print "<li>";
								print get_the_post_thumbnail($thumb["post_id"]);
								print '<span><a href="'.$thumb["link"].'">» '.$thumb["title"].'</a></span>';
								print "</li>";
							endforeach;
						?>
					</ul>
					
					
					<div id="contents" class="clearfix">
						<div class="col news">
							<h2 class="clearfix">
								<span class="blocktitle">NEWS</span>
								<span class="allnews"><a href="<?php print get_category_link(1); ?>">» all news</a></span>
							</h2>
							<ul>
							<?php
							query_posts(array(
								'category_name'=>'news',
								'posts_per_page'=>10
							));
							?>
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
								<li>
									<span><?php the_time('Y.m.d'); ?></span>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
								<?php endwhile; ?>
							<?php else : ?>
								<li>
									NO POST.
								</li>
							<?php endif; ?>
							</ul>
						</div>
						<div class="col about">
							<h2><span class="blocktitle">ABOUT</span></h2>
							<div class="edit">
							<?php
								query_posts(array(
									'page_id'=>31
								));
								the_post();
							?>
							<?php the_content(); ?>
							</div>
						</div>
						<div class="col last free">
							<h2><span class="blocktitle">FEATURE</span></h2>
							<div class="edit">
							<?php
								query_posts(array(
									'page_id'=>33
								));
								the_post();
							?>
							<?php the_content(); ?>
							</div>
						</div>
					</div>
<?php get_footer(); ?>