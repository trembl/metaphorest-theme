<? get_header(); ?>
					<?php the_post(); ?>
					<div id="visual">
						<h2><?php the_title(); ?></h2>
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
						<div class="edit">
						<?php the_content(); ?>
						</div>
					</div>
<?php get_footer(); ?>