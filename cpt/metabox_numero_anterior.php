<?php


add_action('admin_init', 'foo_add_meta_boxes_numero_anterior', 1);
function foo_add_meta_boxes_numero_anterior() {
	add_meta_box( 'url', 'URL', 'foo_url', 'numero_anterior', 'normal', 'default');
}

function foo_url() {
	global $post;

	$url = get_post_meta($post->ID, 'url', true);
	//~ $options = foo_get_sample_options();

	wp_nonce_field( 'foo_url_nonce', 'foo_url_nonce' );
	?>
  
	<table id="url" width="100%">
	<thead>
		<tr>

			<th width="100%">URL:</th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	if ( $url ) :
	
	?>

	<tr>
		<td><input type="text" class="widefat" name="url" value="<?php if($url != '') echo esc_attr( $url ); ?>" /></td>
	</tr>
	<?php
	else :
	// show a blank one
	?>
	<tr>
		<td><input type="text" class="widefat" name="url" /></td>
	</tr>
	<?php endif; ?>
	
	</tbody>
	</table>
	
<?php
}

add_action('save_post', 'foo_url_save');
function foo_url_save($post_id) {
	if ( ! isset( $_POST['foo_url_nonce'] ) ||
	! wp_verify_nonce( $_POST['foo_url_nonce'], 'foo_url_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'url', true);
	
	$url = $_POST['url'];
	
	$count = count( $names );
	
	if ( $url && $url != $old )
		update_post_meta( $post_id, 'url', $url );
	elseif ( !$url && $old )
		delete_post_meta( $post_id, 'url', $old );
}
?>
