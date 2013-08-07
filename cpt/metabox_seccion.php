<?php


add_action('admin_init', 'foo_add_meta_boxes_seccion', 1);
function foo_add_meta_boxes_seccion() {
	add_meta_box( 'editorxs', 'Editorxs', 'foo_editorxs', 'seccion', 'normal', 'default');
}

function foo_editorxs() {
	global $post;

	$editorxs = get_post_meta($post->ID, 'editorxs', true);
	//~ $options = foo_get_sample_options();

	wp_nonce_field( 'foo_editorxs_nonce', 'foo_editorxs_nonce' );
	?>
  
	<table id="editorxs" width="100%">
	<thead>
		<tr>

			<th width="100%">Nombre(s) de lxs editorxs:</th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	if ( $editorxs ) :
	
	?>

	<tr>
		<td><input type="text" class="widefat" name="editorxs" value="<?php if($editorxs != '') echo esc_attr( $editorxs ); ?>" /></td>
	</tr>
	<?php
	else :
	// show a blank one
	?>
	<tr>
		<td><input type="text" class="widefat" name="editorxs" /></td>
	</tr>
	<?php endif; ?>
	
	</tbody>
	</table>
	
<?php
}

add_action('save_post', 'foo_editorxs_save');
function foo_editorxs_save($post_id) {
	if ( ! isset( $_POST['foo_editorxs_nonce'] ) ||
	! wp_verify_nonce( $_POST['foo_editorxs_nonce'], 'foo_editorxs_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'editorxs', true);
	
	$editorxs = $_POST['editorxs'];
	
	$count = count( $names );
	
	if ( $editorxs && $editorxs != $old )
		update_post_meta( $post_id, 'editorxs', $editorxs );
	elseif ( !$editorxs && $old )
		delete_post_meta( $post_id, 'editorxs', $old );
}
?>
