<?php


add_action('admin_init', 'foo_add_meta_boxes_articulo', 1);
function foo_add_meta_boxes_articulo() {
	add_meta_box( 'autorxs', 'Autorxs', 'foo_autorxs', 'articulo', 'normal', 'default');
}

function foo_autorxs() {
	global $post;

	$autorxs = get_post_meta($post->ID, 'autorxs', true);
	//~ $options = foo_get_sample_options();

	wp_nonce_field( 'foo_autorxs_nonce', 'foo_autorxs_nonce' );
	?>
  
	<table id="autorxs" width="100%">
	<thead>
		<tr>

			<th width="100%">Nombre(s) de lxs autorxs:</th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	if ( $autorxs ) :
	
	?>

	<tr>
		<td><input type="text" class="widefat" name="autorxs" value="<?php if($autorxs != '') echo esc_attr( $autorxs ); ?>" /></td>
	</tr>
	<?php
	else :
	// show a blank one
	?>
	<tr>
		<td><input type="text" class="widefat" name="autorxs" /></td>
	</tr>
	<?php endif; ?>
	
	</tbody>
	</table>
	
<?php
}

add_action('save_post', 'foo_autorxs_save');
function foo_autorxs_save($post_id) {
	if ( ! isset( $_POST['foo_autorxs_nonce'] ) ||
	! wp_verify_nonce( $_POST['foo_autorxs_nonce'], 'foo_autorxs_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'autorxs', true);
	
	$autorxs = $_POST['autorxs'];
	
	$count = count( $names );
	
	if ( $autorxs && $autorxs != $old )
		update_post_meta( $post_id, 'autorxs', $autorxs );
	elseif ( !$autorxs && $old )
		delete_post_meta( $post_id, 'autorxs', $old );
}
?>
