<?php get_header(); ?>

<main class="container-fluid bg-white">
	<div class="row">
		<div class="col-sm-8">
			<?php if ( have_posts() ): ?>
				<div class="row">
					<?php while ( have_posts() ): the_post(); ?>
						<div class="col-12 bg-white p-5">
							<?php get_template_part('partials/breadcrumb' ); ?>
							<div class="row">
								<div class="col-sm-12 mb-4">
									<?php the_post_thumbnail('annonce'); ?>
								</div>
								<div class="col-sm-5">
									<?php if ( !is_singular('agence')): ?>
										<div class="badge badge-secondary"><?php the_time( get_option( 'date_format' ) ); ?></div>
									<?php endif ?>

									<h1><?php the_title(); ?></h1>

									<?php foreach(get_the_category() as $cat): ?>
										<?php if ($cat->term_id != 1): ?>
											<a class="badge badge-primary" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
										<?php endif ?>
									<?php endforeach; ?>
								</div>
								<div class="col-sm-7">
									<?php the_content(); ?>
								</div>
								<div class="col-sm-12 mt-5">
									<?php echo get_post_meta( $post->ID, 'wpg_annonce_gmaps', true ); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif ?>
		</div>
		<div class="sidebar col-sm-4 bg-light px-3 py-5">
			<?php get_sidebar('actu'); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>