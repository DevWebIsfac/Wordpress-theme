<?php get_header(); ?>

<main class="container-fluid">
	<?php if ( have_posts() ): ?>
		<div class="row">
			<?php while ( have_posts() ): the_post(); ?>
				<div id="poster" class="carousel slide" data-ride="carousel" data-interval="2500" data-pause="false">
					<div class="carousel-inner">
						<?php for ($i=1; $i < 5 ; $i++) : ?>
							<?php if(get_post_meta($post->ID,'wpg_img_'.$i, true)){
								$attachment_id = get_post_meta($post->ID,'wpg_img_'.$i, true);
								$attachment = wp_get_attachment_image_src( $attachment_id, 'hero' );
								$attachment_url = $attachment[0];
								?>
								<div class="carousel-item <?php if($i==1){echo 'active'; } ?>">
									<img class="d-block img_fluid" id="img_<?php echo $i; ?>" src="<?php echo $attachment_url; ?>" alt="">
								</div>
							<?php } ?>
						<?php endfor; ?>
					</div>
				</div>
				<div class="col-sm-12 bg-white p-5">

					<h1><?php the_title(); ?></h1>

					<div class="row">
						<div class="col-sm-9">
							<?php the_content(); ?>
						</div>
						<div class="col-sm-3">
							<?php 
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$image = wp_get_attachment_image_src( $custom_logo_id , 'medium' );
							?>
							<img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 mt-5">
							<h2>Dernières annonces</h2>
							<?php 
								$same_type_q = new WP_Query(array(
									'post_type' => 'annonce',
									'posts_per_page' => 4,
								));
							?>
							<?php if ( $same_type_q->have_posts() ): ?>
								<div class="row">
									<?php while ( $same_type_q->have_posts() ): $same_type_q->the_post(); ?>
										<div class="col-sm-6 col-md-3 mb-4">
											<?php get_template_part( '/partials/card' ); ?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif ?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>

				</div>
				<div class="col-sm-12 bg-light p-5">
					<?php 
						// On fait une requête des 3 derniers articles (les actualités)
						$last_news_q = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 3
						));
					?>
					<?php if ( $last_news_q->have_posts() ): ?>
						<div class="actualites row">
							<h2 class="col-sm-12">Dernières actualités</h2>
							<?php while ( $last_news_q->have_posts() ): $last_news_q->the_post(); ?>
								<div class="actualites-item col-md-6 col-lg-4">
									<h3>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-annonce'); ?></a>
									<?php the_excerpt(); ?>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php endif ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif ?>
</main>

<?php get_footer(); ?>