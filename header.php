<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<base href="<?php bloginfo( 'template_directory' ); ?>/" />
		<meta name="description" content="metaPhorest is a practical platform for artistic researches on biological/biomedia art and bioaesthetics, located within a biological laboratory at Center for Advanced Biomedical Sciences, Waseda University. We provide relatively long-term (more than several months) artist-in-residence program for those who are interested in biology-inspired/aided/criticizing artistic activity, sharing biological facility, discussion, seminars with life scientists." />
		<title>
			<?php
				wp_title( ' - ', true, 'right' );
				bloginfo( 'name' );
			?>
		</title>
		<link href="<?php bloginfo( 'stylesheet_url' ); ?>" media="all" rel="stylesheet"  />
		<script src="js/jquery.min.js"></script>
		<?php wp_head(); ?>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-26215168-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	</head>
	<body>
		<div id="container">
			<div class="wrap clearfix">
				<div id="left-col">
					<div id="header">
						<h1><a href="<?php bloginfo("url");?>"><img src="http://metaphorest.net/wp-content/themes/metaphorest/images/logo.png" alt="metaphorest" /></a></h1>
					</div>
					<div class="i18n">
						<?php
            /*
							global $q_config;
							foreach($q_config["enabled_languages"] as $lang){
								print '<a href="http://metaphorest.net'.$_SERVER['REQUEST_URI']."?lang=".$lang;
								print '" >';
								if($lang=="ja") print "日本語";
								elseif($lang == "en") print "English";
								else print $lang;
								print '</a>';
							}
              */
						?>
					</div>
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => null,
						'menu_class' => 'nav',
						'menu_id'=>null,
						'depth'=>2
					) ); ?>
					<div class="social clearfix">
						<div class="item">
							<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
							<g:plusone size="tall" href="http://metaphorest.net"></g:plusone>
						</div>
						<div class="item">
							<a href="https://twitter.com/share" class="twitter-share-button" data-text="[metaPhorest -biological/biomedia art platform-]" data-count="vertical" data-via="metaphorest_net">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
						</div>
						<div class="item">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-like" data-href="https://www.facebook.com/metaphorest.net" data-send="false" data-layout="box_count" data-width="50" data-show-faces="false"></div>
						</div>
					</div>
					<?php get_search_form(); ?>
				</div>
				<div id="center-col">
