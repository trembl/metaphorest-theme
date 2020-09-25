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
							<?php
								wp_list_bookmarks(array(
									'orderby' => 'name',
									'order' => 'ASC',
									'limit' => -1,
									'category' => '',
									'category_name' => '',
									'hide_invisible' => 1,
									'show_updated' => 0,
									'show_description' => 1,
									'echo' => 1,
									'categorize' => 1,
									'title_li' => __('Bookmarks'),
									'title_before' => '<h2>',
									'title_after' => '</h2>',
									'category_orderby' => 'name',
									'category_order' => 'ASC',
									'class' => 'linkcat',
									'category_before' => '',
									'category_after' => ''
								));
							?>
						</div>
					</div>
<?php get_footer(); ?>