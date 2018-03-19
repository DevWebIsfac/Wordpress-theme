<?php get_header(); ?>

<main class="container-fluid">
	<div class="row">
		<div class="col-12 p-5 mb-5 bg-white">
			<?php get_template_part('partials/breadcrumb' ); ?>
			<?php if ( have_posts() ): ?>
				<div class="row">
					<?php while ( have_posts() ): the_post(); ?>
						<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
							<?php get_template_part( '/partials/card' ); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif ?>
			<?php get_template_part('partials/pagination' ); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>