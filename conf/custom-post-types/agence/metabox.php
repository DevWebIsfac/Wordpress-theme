<?php

function create_agence_box_content() {
	global $post;
	?>
	<label class="meta-box-item-title" for="gmaps">
		<h4>Lien Google Maps</h4>
	</label>
	<div class="meta-box-item-content">
		<textarea name="gmaps" id="gmaps" style="width:100%; height:120px;">
			<?php echo htmlspecialchars_decode(get_post_meta( $post->ID, 'wpg_annonce_gmaps', true )); ?>
		</textarea>
	</div>

	<input type="hidden" name="annonce_caracteristiques_nonce" id="projet_infos_nonce" value="<?php echo wp_create_nonce('agence'); ?>">
	<?php
}

function create_agence_box(){
	add_meta_box('agence_box','Informations', 'create_agence_box_content', array('agence'));
}

add_action( 'add_meta_boxes', 'create_agence_box' );




function save_agence_metas(){
	global $post;

	if($post==null){
		return false;
	}

	if ( $post->post_type != 'agence') {
		return false;
	}

	if (
		// On ne fait rien si c'est une sauvegarde automatique
		(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) ||
		(defined('DOING_AJAX') && DOING_AJAX)
	) {
		return false;
	}

	if ( !current_user_can( 'edit_post',$post->ID ) ) {
		// on ne fait rien sans permissions
		return false;
	}

	if ( isset($_POST) && !wp_verify_nonce( $_POST['annonce_caracteristiques_nonce'] ,'agence') ) {
		return false;
	}
	
	$id = $post->ID;
	
	$fields = array(
		array(
			'key' => 'gmaps',
			'meta' => 'wpg_annonce_gmaps',
		),
	);

	foreach ($fields as $field) {
		
		$key = $field['key'];
		$meta = $field['meta'];

		if ( isset($_POST[$key]) ) {

			$value = $_POST[$key];
			if ($value==='') {
				delete_post_meta( $id, $meta);
			}
			elseif ( get_post_meta( $id, $meta ) ) {
				update_post_meta($id, $meta, $value);
			}
			else {
				add_post_meta($id, $meta, $value);
			}
		}
	}
}
add_action('save_post', 'save_agence_metas');