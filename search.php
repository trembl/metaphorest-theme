<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<?php
	$cat = $wp_query->queried_object;
?>
					<div id="visual">
						<h2><?php print $cat->name; ?></h2>
						<div class="thumb" style="background-image:url(<?php header_image(); ?>)">
						</div>
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
						<div class="list">
							<ul>
							<?php if(have_posts()): ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<li class="clearfix">
										<h3>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<span><?php the_time("Y.m.d"); ?></span>
										</h3>
										<p>
											<?php
												if(has_post_thumbnail()){
													the_post_thumbnail();
												}else{
													print "<img src='images/postdefault.png' />";
												}
											?>
											<?php print get_the_excerpt(); ?>
										</p>
									</li>
								<?php endwhile; ?>
							<?php else: ?>
								<li>NO POST.</li>
							<?php endif; ?>
							</ul>
						</div>
					</div>
<?php get_footer(); ?>
