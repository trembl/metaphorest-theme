				</div>
			</div>
		</div>
		<div id="footer">
			<div class="wrap">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => null,
						'menu_class' => 'footernav',
						'menu_id'=>null,
						'depth'=>1
					) ); ?>
				<p class="copyright">(C) Copyright 2011 metaphorest, All right reserved.</p>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>