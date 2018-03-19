<?php 
	$p = get_queried_object();
	if (isset($p->term_id)) {
		$termID = $p->term_id;
	}
?>
<div class="sidebar-annonce">
	<h3 class="mb-3"><span class="ion-android-options mr-3"></span><?php _e( 'Types', THEME_NAME_SPACE ); ?></h3>
	<ul class="list-group">
		<?php foreach ( get_terms('type',array('orderby'=>'name','order'=>'ASC')) as $type ) { ?>
			<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if($termID==$type->term_id){ echo 'active';} ?>" href="<?php echo get_term_link( $type->term_id); ?>">
				<?php echo $type->name; ?>
				<span class="badge badge-secondary badge-pill"><?php echo $type->count; ?></span>
			</a>
		<?php } ?>
	</ul>

	<h3 class="mt-4 mb-3"><span class="ion-android-options mr-3"></span><?php _e( 'Marques', THEME_NAME_SPACE ); ?></h3>
	<ul class="list-group">
		<?php foreach ( get_terms('marque',array('orderby'=>'name','order'=>'ASC')) as $type ) { ?>
			<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if($termID==$type->term_id){ echo 'active';} ?>" href="<?php echo get_term_link( $type->term_id); ?>">
				<?php echo $type->name; ?>
				<span class="badge badge-secondary badge-pill"><?php echo $type->count; ?></span>
			</a>
		<?php } ?>
	</ul>
</div>