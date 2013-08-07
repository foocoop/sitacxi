<?php


add_action('admin_init', 'foo_add_meta_boxes', 1);
function foo_add_meta_boxes() {
	add_meta_box( 'plantilla', 'Plantilla', 'foo_plantilla', 'numero', 'normal', 'default');
	add_meta_box( 'plantilla', 'Plantilla', 'foo_plantilla', 'numero', 'normal', 'default');
	add_meta_box( 'plantilla', 'Plantilla', 'foo_plantilla', 'numero', 'normal', 'default');
	add_meta_box( 'plantilla', 'Plantilla', 'foo_plantilla', 'numero', 'normal', 'default');
}

function foo_plantilla() {
	global $post;

	$plantilla = get_post_meta($post->ID, 'plantilla', true);
	//~ $options = foo_get_sample_options();

	wp_nonce_field( 'foo_plantilla_nonce', 'foo_plantilla_nonce' );
	?>
  
	<table id="plantilla" width="100%">
	<thead>
		<tr>

			<th width="100%">ruta y nombre de archivo:</th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	if ( $plantilla ) :
	
	?>

	<tr>
		<td><input type="text" class="widefat" name="plantilla" value="<?php if($plantilla != '') echo esc_attr( $plantilla ); ?>" /></td>
	</tr>
	<?php
	else :
	// show a blank one
	?>
	<tr>
		<td><input type="text" class="widefat" name="plantilla" /></td>
	</tr>
	<?php endif; ?>
	
	</tbody>
	</table>
	
<?php
}

add_action('save_post', 'foo_plantilla_save');
function foo_plantilla_save($post_id) {
	if ( ! isset( $_POST['foo_plantilla_nonce'] ) ||
	! wp_verify_nonce( $_POST['foo_plantilla_nonce'], 'foo_plantilla_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'plantilla', true);
	
	$plantilla = $_POST['plantilla'];
	
	$count = count( $names );
	
	if ( $plantilla && $plantilla != $old )
		update_post_meta( $post_id, 'plantilla', $plantilla );
	elseif ( !$plantilla && $old )
		delete_post_meta( $post_id, 'plantilla', $old );
}
?>
