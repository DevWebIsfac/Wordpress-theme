<?php get_header(); ?>

<main class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-md-3 py-5 px-4 bg-light">
			<?php get_sidebar('annonce'); ?>
		</div>
		<div class="col-sm-8 col-md-9 p-5 bg-white">
			<?php get_template_part('partials/breadcrumb' ); ?>

			<?php if ( is_post_type_archive('annonce') || is_archive() ): ?>
				<div class="filters bg-light p-2 rounded text-right mb-5">
					Trier par :
					<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
						<div class="btn-group" role="group">
							<button id="btnGroupDrop1" type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Prix
							</button>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
								<a class="dropdown-item" href="<?php echo add_query_arg( array('orderBy' => 'prix', 'order' => 'ASC')); ?>">Croissant</a>
								<a class="dropdown-item" href="<?php echo add_query_arg( array('orderBy' => 'prix', 'order' => 'DESC')); ?>">Décroissant</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>

			<?php if ( have_posts() ): ?>
				<div class="row">
					<?php while ( have_posts() ): the_post(); ?>
						<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
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