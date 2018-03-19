<?php get_header(); ?>

<main class="container-fluid">
	<div class="row">
		<div class="col-sm-7">
			<?php if ( have_posts() ): ?>
				<div class="row">
					<?php while ( have_posts() ): the_post(); ?>
						<div class="col-12 bg-white p-5">
							<?php get_template_part('partials/breadcrumb' ); ?>
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif ?>
		</div>
		<div class="col-sm-5 bg-light px-4 py-5">
			<?php get_sidebar('contact'); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>