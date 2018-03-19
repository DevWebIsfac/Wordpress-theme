<?php 
	$p = get_queried_object();
	if (isset($p->term_id)) {
		$termID = $p->term_id;
	}
?>

<?php 
	// On fait une requête des 3 derniers articles (les actualités)
	$last_news_q = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 10
	));
?>
<?php if ( $last_news_q->have_posts() ): ?>
	<div class="actualites row">
		<h2 class="col-sm-12">Dernières actualités</h2>
		<?php while ( $last_news_q->have_posts() ): $last_news_q->the_post(); ?>
			<div class="actualites-item col-4">
				<h4 class="actu-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h4>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php endif ?>