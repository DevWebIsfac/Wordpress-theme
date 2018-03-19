<?php get_header(); ?>

<main class="container-fluid">
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
</main>

<?php get_footer(); ?>