<?php get_header(); ?>

<main class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-md-3 py-5 px-4 bg-light">
			<?php get_sidebar('annonce'); ?>
		</div>
		<div class="col-sm-8 col-md-9 p-5 bg-white">

			<h1 class="mb-5">
				<?php _e( 'Recherche : ', THEME_NAME_SPACE ); ?>
				&laquo;&nbsp;<?php the_search_query(); ?>&nbsp;&raquo;
			</h1>

			<?php get_template_part('partials/breadcrumb' ); ?>

			<?php if ( have_posts() ): ?>
				<div class="row">
					<?php while ( have_posts() ): the_post(); ?>
						<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
							<?php get_template_part( '/partials/card' ); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<div class="row">
					<div class="col-sm-12">Désolé, aucun résultats pour cette recherche. Essayez autre chose.</div>
				</div>
			<?php endif ?>
			<?php get_template_part('partials/pagination' ); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>