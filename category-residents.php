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
						if(function_exists('bcn_display')){
							bcn_display();
						}
						?>
						</div>
						<h2 style="color: #007E00;">Current Members</h2>
						<div class="residentlist clearfix">
							<ul>
								<?php
									query_posts(array(
										'category_name'=>'currentmembers',
										'orderby'=>'date',
										'order'=>'ASC',
										'posts_per_page'=> -1
									));
									if(have_posts()):
									$i = 0;
									while ( have_posts() ) :
										the_post();
										$i++;
								?>
								<li <?php if($i%3==0):?>class="last"<?php endif; ?>>
									<h3>
										<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
										</a>
									</h3>
									<div class="thumb">
										<a href="<?php the_permalink(); ?>">
										<?php
											if(has_post_thumbnail()){
												the_post_thumbnail();
											}else{
												print "<img src='images/postdefault.png' />";
											}
										?>
										</a>
									</div>
								</li>
								<?php endwhile; ?>
							<?php else: ?>
								<li>NO POST.</li>
							<?php endif; ?>
							</ul>
						</div>

						<h2 style="color: #007E00;">Past Members</h2>
						<div class="residentlist clearfix">
							<ul>
								<?php
									query_posts(array(
										'category_name'=>'pastmembers',
										'orderby'=>'date',
										'order'=>'ASC',
										'posts_per_page'=> -1
									));
									if(have_posts()):
									$i = 0;
									while ( have_posts() ) :
										the_post();
										$i++;
								?>
								<li <?php if($i%3==0):?>class="last"<?php endif; ?>>
									<h3>
										<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
										</a>
									</h3>
									<div class="thumb">
										<a href="<?php the_permalink(); ?>">
										<?php
											if(has_post_thumbnail()){
												the_post_thumbnail();
											}else{
												print "<img src='images/postdefault.png' />";
											}
										?>
										</a>
									</div>
								</li>
								<?php endwhile; ?>
							<?php else: ?>
								<li>NO MEMBER.</li>
							<?php endif; ?>
							</ul>
						</div>
					</div>
<?php get_footer(); ?>
