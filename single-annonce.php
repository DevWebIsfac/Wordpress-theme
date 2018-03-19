<?php get_header(); ?>

<main class="container-fluid">
	<div class="row">
		<div class="col-md-3 bg-light py-5 px-4 order-2 order-md-1">
			<?php get_sidebar('annonce'); ?>
		</div>
		<div class="col-md-9 bg-white p-5 order-1 order-md-2">
			<?php if ( have_posts() ): ?>
				<div class="row">
					<?php while ( have_posts() ): the_post(); ?>
						<div class="col-12">

							<?php get_template_part('partials/breadcrumb' ); ?>

							<div class="row">
								<h1 class="col"><?php the_title(); ?></h1>
								<div class="col text-right">
									<div class="badge badge-primary prix">
										<?php echo number_format(get_post_meta($post->ID,'wpg_annonce_prix', true), 0, ',', ' '); ?>&nbsp;&euro;
									</div>
								</div>
							</div>

							<div class="row bg-light no-gutters">
								<div class="col-sm-8">
									<?php the_post_thumbnail('annonce'); ?>
								</div>
								<div class="col-sm-4 p-3">
									<ul class="cats cats-annonce">
										<?php 
											$taxs = array (
												array (
													'slug' => 'marque',
													'name' => 'Marque'
												),
												array (
													'slug' => 'type',
													'name' => 'Type'
												),
												array (
													'slug' => 'couleur',
													'name' => 'Couleur'
												),
												array (
													'slug' => 'options',
													'name' => 'Options'
												)
											);
										?>

										<?php foreach ($taxs as $tax) : ?>
											<?php if ( has_term('',$tax['slug']) ): ?>
												<li>
													<?php _e( $tax['name'].' : ', THEME_NAME_SPACE ) ?>
													<?php foreach ( get_the_terms( $post, $tax['slug'] ) as $term) : ?>
														<a href="<?php echo get_term_link( $term->slug, $tax['slug'] ); ?>" class="badge badge-secondary"><?php echo $term->name ?></a>
													<?php endforeach ?>
												</li>
											<?php endif ?>
										<?php endforeach ?>

										
									</ul>
									<ul class="caracteristiques cats-caracteristiques">
										<li>
											<?php if ( get_post_meta($post->ID,'wpg_annonce_genre', true) == 'occasion' ) {
												echo 'Occasion';
											} else {
												echo 'Neuf';
											} ?>
										</li>
										<?php if ( get_post_meta($post->ID,'wpg_annonce_genre', true)=='occasion' ): ?>
											<li><?php echo number_format(get_post_meta($post->ID,'wpg_annonce_kilo', true),0,',',' ') ?> kms</li>
										<?php endif ?>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 pt-5">
									<?php the_content(); ?>
								</div>
								<div class="col-sm-12">
									<div id="diapoAnnonce" class="carousel slide bg-dark mt-4" data-ride="carousel" data-interval="3500" data-pause="false">
										<div class="carousel-inner">
											<?php for ($i=1; $i < 5 ; $i++) : ?>
												<?php if(get_post_meta($post->ID,'wpg_annonce_img_'.$i, true)){
													$attachment_id = get_post_meta($post->ID,'wpg_annonce_img_'.$i, true);
													$attachment = wp_get_attachment_image_src( $attachment_id, 'diapo' );
													$attachment_url = $attachment[0];
													?>
													<div class="carousel-item <?php if($i==1){echo 'active'; } ?>">
														<img class="d-block img_fluid" id="img_<?php echo $i; ?>" src="<?php echo $attachment_url; ?>" alt="">
													</div>
												<?php } ?>
											<?php endfor; ?>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$same_type_q = new WP_Query(array(
									'post_type' => 'annonce',
									'posts_per_page' => 3,
									'post__not_in' => array($post->ID),
									'tax_query' => array(
										array(
											'taxonomy' => 'type',
											'field'    => 'slug',
											'terms'    => get_the_term_list( $post->ID, 'type'),
										),
									),
								));
							?>
							<?php if ( $same_type_q->have_posts() ): ?>
								<div class="row">
									<div class="col-sm-12 mt-5 mb-3">
										<h3>Ces annonces pourraient vous intéresser</h3>
									</div>
									<?php while ( $same_type_q->have_posts() ): $same_type_q->the_post(); ?>
										<div class="col-6 col-md-4 mb-4">
											<?php get_template_part( '/partials/card' ); ?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif ?>
							<?php wp_reset_postdata(); ?>
							

						</div>
					<?php endwhile; ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>