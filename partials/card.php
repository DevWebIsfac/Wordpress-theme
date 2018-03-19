<div class="card">
	<a href="<?php the_permalink(); ?>" class="card-img-link">
		<?php the_post_thumbnail('small-annonce', array(
			'class' => 'card-img-top',
			'alt' => get_the_title()
		)); ?>
	</a>
	<?php if ( $post->post_type == 'annonce'): ?>
		<div class="badge badge-primary prix">
			<?php echo number_format(get_post_meta($post->ID,'wpg_annonce_prix', true), 0, ',', ' '); ?>&nbsp;&euro;
		</div>
	<?php endif ?>
	<div class="card-body">
		<div class="card-title">
			<?php if ( $post->post_type == 'annonce'): ?>
				<?php foreach (get_the_terms($post->ID,'marque') as $marque): ?>
					<a class="badge badge-primary mb-2" href="<?php echo get_term_link($marque->term_id); ?>"><?php echo $marque->name; ?></a>
				<?php endforeach; ?>
			<?php endif ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		</div>
		<div class="card-text">
			<?php if ( !is_singular( 'annonce' ) && !is_front_page() ) {
				the_excerpt();
			} ?>

			<?php if ( $post->post_type == 'annonce'): ?>
				<?php foreach (get_the_terms($post->ID,'type') as $type): ?>
					<a class="badge badge-secondary" href="<?php echo get_term_link($type->term_id); ?>"><?php echo $type->name; ?></a>
				<?php endforeach; ?>
			<?php endif ?>
		</div>
	</div>
</div>