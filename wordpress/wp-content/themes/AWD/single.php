<?php
get_header(); ?>

<!-- Page Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center">We do stuff</h1>
		</div>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-lg-12 post-container">
				<div class="post">
					<a href="<?php the_permalink()?>">
						<h3 class="post-title text-center"><?php the_title(); ?></h3>
						<p class="post-description"><?php the_content(); ?><small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small></p>
				</div>
			</div>
			</a>
		</div>
	<?php endwhile; endif; ?>
</div>
<!-- /.container -->
</body>
</html>