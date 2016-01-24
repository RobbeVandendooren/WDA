<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area text-center">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found vcenter">
				<header class="page-header">
					<img src="<?php echo get_template_directory_uri(); ?>/images/the_company-logo.jpg" alt="">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'awd-werkstuk' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'awd-werkstuk' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->
</body>
</html>
