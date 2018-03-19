<?php 
	$p = get_queried_object();
	if (isset($p->term_id)) {
		$termID = $p->term_id;
	}
?>

<?php 
	// On fait une requête des 3 derniers articles (les actualités)
	$agences_q = new WP_Query(array(
		'post_type' => 'agence',
	));
?>
<?php if ( $agences_q->have_posts() ): ?>
	<div class="actualites row">
		<h3 class=" col-12 mb-3"><?php _e( 'Nos agences', THEME_NAME_SPACE ); ?></h3>
		<?php while ( $agences_q->have_posts() ): $agences_q->the_post(); ?>
			<div class="actualites-item col-lg-6 mb-4">
				<?php get_template_part( '/partials/card' ); ?>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php endif ?>