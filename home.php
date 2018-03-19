<?php get_header(); ?>

<main class="container-fluid bg-white p-5">
	<?php get_template_part('partials/breadcrumb' ); ?>
	<h1 class="mb-5"><?php echo get_queried_object()->post_title; ?></h1>
	<?php if ( have_posts() ): ?>
		<div class="row">
			<?php while ( have_posts() ): the_post(); ?>
				<div class="col-12 mb-5">
					<div class="row">
						<div class="col-sm-4">
							<?php the_post_thumbnail('small-annonce'); ?>
						</div>
						<div class="col-sm-8">
							<div class="badge badge-secondary"><?php the_time( get_option( 'date_format' ) ); ?></div>
							<?php foreach(get_the_category() as $cat): ?>
								<?php if ($cat->term_id != 1): ?>
									<a class="badge badge-primary" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
								<?php endif ?>
							<?php endforeach; ?>
							<h2 class="actu-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<?php the_excerpt(); ?>
							<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e( 'Lire l\'actu', THEME_NAME_SPACE ); ?></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif ?>
</main>

<?php get_footer(); ?>