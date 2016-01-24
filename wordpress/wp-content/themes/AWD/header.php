<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>The Company</title>
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
	<link href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/scss/style.css" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<script>
		$(document).ready(function() {
			console.log($("img"));
			$("img").attr("class", "center-block").removeAttr("width").removeAttr("height").removeAttr("sizes").removeAttr("srcset");
		});
	</script>
	<?php wp_head(); ?>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
			        data-target="#bs-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="nav-logo navbar-brand" href="http://iwtsl.ehb.be/~robbe.vandendooren/WDA/wordpress/">
				<img src="<?php echo get_template_directory_uri(); ?>/images/the_company-logo.jpg" alt="">
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="http://iwtsl.ehb.be/~robbe.vandendooren/WDA/wordpress/about/">About</a>
				</li>
				<li>
					<a href="http://iwtsl.ehb.be/~robbe.vandendooren/WDA/wordpress/contact/">Contact</a>
				</li>
				<li>
					<a href="http://iwtsl.ehb.be/~robbe.vandendooren/WDA/wordpress/posts/">Posts</a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>