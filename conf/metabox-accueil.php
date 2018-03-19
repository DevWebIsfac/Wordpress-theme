<?php

function create_accueil_box_content() {
	global $post;
	?>
	<div class="meta-box-item-title"><h4>Diaporama</h4></div>
	<div style="display: flex; flex-wrap: wrap;">
		<?php for ($i=1; $i < 5 ; $i++) : ?>
			<div class="meta-box-item-content" style="box-sizing: border-box; flex-basis:25%; min-width:140px; padding: 0.5rem;">
				<label for="img_<?php echo $i; ?>" style="display:block;">Image <?php echo $i; ?></label>
				<?php if(get_post_meta($post->ID,'wpg_img_'.$i, true)){
					$attachment_id = get_post_meta($post->ID,'wpg_img_'.$i, true);
					$attachment_url = wp_get_attachment_url( $attachment_id ); ?>
					<img id="img_<?php echo $i; ?>" src="<?php echo $attachment_url; ?>" alt="" style="max-width: 140px; max-height: 140px; vertical-align: middle; display: block; margin-bottom: 0.5rem;">
				<?php } ?>
				<input type="hidden" name="img_<?php echo $i; ?>" id="img_<?php echo $i; ?>" value="<?php if(get_post_meta($post->ID,'wpg_img_'.$i, true)){ echo get_post_meta($post->ID,'wpg_img_'.$i, true);}?>" style="width:100%;">
				<a href="#" class="button js-uploader" data-id="img_<?php echo $i; ?>" style="margin-bottom: 1rem;">Choisir un fichier</a>
			</div>
		<?php endfor; ?>
	</div>
	

	<input type="hidden" name="annonce_caracteristiques_nonce" id="projet_infos_nonce" value="<?php echo wp_create_nonce('caracteristiques_nonce'); ?>">
	<?php
}

function create_accueil_box(){
	global $post;
	if($post->ID == 2 ){
		add_meta_box('diapo_accueil','Diaporama', 'create_accueil_box_content', array('page'));
	}
}

add_action( 'add_meta_boxes', 'create_accueil_box' );




function save_metas_accueil(){
	global $post;

	if($post==null){
		return false;
	}

	if ( $post->ID != 2) {
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

	if ( isset($_POST) && !wp_verify_nonce( $_POST['annonce_caracteristiques_nonce'] ,'caracteristiques_nonce') ) {
		return false;
	}
	
	$id = $post->ID;
	
	$fields = array(
		array(
			'key' => 'img_1',
			'meta' => 'wpg_img_1',
		),
		array(
			'key' => 'img_2',
			'meta' => 'wpg_img_2',
		),
		array(
			'key' => 'img_3',
			'meta' => 'wpg_img_3',
		),
		array(
			'key' => 'img_4',
			'meta' => 'wpg_img_4',
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
add_action('save_post', 'save_metas_accueil');