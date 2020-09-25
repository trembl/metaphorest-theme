<? get_header(); ?>
<?php the_post(); ?>
<?php 
	$cat = get_the_category();
	$cat = $cat[0];
?>
					<div id="visual">
						<?php if(in_category(13) || in_category(14) || in_category(25)): ?>
						<h2><?php the_title(); ?></h2>
						<?php else: ?>
						<h2><?php print $cat->cat_name; ?></h2>
						<?php endif; ?>
						<?php if(has_post_thumbnail()): ?>
						<div class="thumb">
						<?php the_post_thumbnail(); ?>
						</div>
						<?php else: ?>
						<div class="thumb" style="background-image:url(<?php header_image(); ?>)">
						</div>
						<?php endif; ?>
					</div>
					<div id="contents">
						<div class="bread">
						<?php
						if(function_exists('bcn_display'))
						{
						    bcn_display();
						}
						?>
						</div>
						<div class="edit clearfix">
							<?php the_content(); ?>
							<?php
								if($cat->slug == "research"):
							?>
							<h2>Tag</h2>
							<?php the_tags(); ?>
							<?php endif; ?>
						</div>
					</div>
<?php get_footer(); ?>