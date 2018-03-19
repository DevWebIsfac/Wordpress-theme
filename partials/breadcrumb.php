<nav aria-label="breadcrumb" class="mb-5">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo bloginfo('url'); ?>">Accueil</a></li>

		<?php if ( is_page() ): ?>
			<li class="breadcrumb-item active" aria-current="page">
				<?php the_title(); ?>
			</li>

		<?php elseif ( is_search() ): ?>
			<li class="breadcrumb-item active" aria-current="page">
				<?php _e( 'Résultats de recherche pour &laquo;&nbsp;'.get_search_query().'&nbsp;&raquo;', 'default' ); ?>
			</li>

		<?php elseif ( is_singular('post') ): ?>
			<li class="breadcrumb-item">
				<a href="<?php echo get_post_type_archive_link($post->post_type); ?>"><?php _e( 'Actualités', THEME_NAME_SPACE ); ?></a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php the_title(); ?>
			</li>

		<?php elseif ( is_singular() ): ?>
			<li class="breadcrumb-item">
				<a href="<?php echo get_post_type_archive_link($post->post_type); ?>"><?php echo get_post_type_object($post->post_type)->label; ?></a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php the_title(); ?>
			</li>

		<?php elseif ( is_post_type_archive('annonce') ): ?>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo get_post_type_object($post->post_type)->label; ?>
			</li>

		<?php elseif ( is_category() ): ?>
			<li class="breadcrumb-item">
				<a href="<?php echo get_post_type_archive_link($post->post_type); ?>"><?php _e( 'Actualités', THEME_NAME_SPACE ); ?></a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo get_queried_object()->name; ?>
			</li>

		<?php elseif ( is_tax() ): ?>
			<li class="breadcrumb-item">
				<a href="<?php echo get_post_type_archive_link($post->post_type); ?>"><?php echo get_post_type_object($post->post_type)->label; ?></a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo get_queried_object()->name; ?>
			</li>

		<?php elseif ( is_archive() ): ?>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo get_post_type_object($post->post_type)->label; ?>
			</li>

		<?php elseif ( is_home() ): ?>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo get_queried_object()->post_title; ?>
			</li>
		<?php endif ?>
	</ol>
</nav>