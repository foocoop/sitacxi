<?php


add_action('admin_init', 'foo_add_meta_boxes', 1);
function foo_add_meta_boxes() {
  add_meta_box( 'fecha', 'Fecha', 'foo_fecha_meta_box', 'actividad', 'normal', 'default');
  add_meta_box( 'url', 'URL', 'foo_url_meta_box', 'invitado', 'normal', 'default');
  add_meta_box( 'autor', 'Autor(a)', 'foo_autor_meta_box', 'lectura', 'normal', 'default');
  add_meta_box( 'participantes', 'Participantes', 'foo_participantes_meta_box', 'actividad', 'normal', 'default');
}



function foo_fecha_meta_box() {
  global $post;
  // Enqueue Datepicker + jQuery UI CSS
  wp_enqueue_script( 'jquery-ui-datepicker' );
  wp_enqueue_style( 'jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);

  wp_nonce_field( 'foo_fecha_nonce', 'foo_fecha_nonce' );

  // Retrieve current fecha for cookie
  $fecha = get_post_meta( $post->ID, 'fecha', true  );
  
?>


<script>
 jQuery(document).ready(function(){
   jQuery('#post_fecha').datepicker({
     fechaFormat : 'dd/m - yy'
   });
 });
</script>

<table>
  <tr>
    <td style="width: 100%">until:</td>
    <td>
      <input type="text" name="fecha" id="post_fecha" value="<?php echo $fecha; ?>" /></td>
  </tr>
</table>
<?php


}
add_action('save_post', 'foo_fecha_save');
function foo_fecha_save($post_id) {
  if ( ! isset( $_POST['foo_fecha_nonce'] ) ||
      ! wp_verify_nonce( $_POST['foo_fecha_nonce'], 'foo_fecha_nonce' ) )
  return;
  
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
  return;
  
  if (!current_user_can('edit_post', $post_id))
  return;
  
  $old = get_post_meta($post_id, 'fecha', true);
  
  $fecha = $_POST['fecha'];
  
  $count = count( $participantes );
  
  if ( $fecha && $fecha != $old )
  update_post_meta( $post_id, 'fecha', $fecha );
  elseif ( !$fecha && $old )
  delete_post_meta( $post_id, 'fecha', $old );
}












function foo_autor_meta_box() {
  global $post;

  wp_nonce_field( 'foo_autor_nonce', 'foo_autor_nonce' );

  $autor = get_post_meta( $post->ID, 'autorfecha', true  );
  
?>
 <table>
  <tr>
    <td style="width: 100%">until:</td>
    <td>
      <input type="text" name="autor" class="autor" value="<?php echo autor; ?>" /></td>
  </tr>
</table>
<?php
}
add_action('save_post', 'foo_autor_save');
function foo_autor_save($post_id) {
  if ( ! isset( $_POST['foo_autor_nonce'] ) ||
      ! wp_verify_nonce( $_POST['foo_autor_nonce'], 'foo_autor_nonce' ) )
  return;
  
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
  return;
  
  if (!current_user_can('edit_post', $post_id))
  return;
  
  $old = get_post_meta($post_id, 'autor', true);
  
  $autor = $_POST['autor'];
  
  $count = count( $participantes );
  
  if ( $autor && $autor != $old )
  update_post_meta( $post_id, 'autor', $autor );
  elseif ( !$autor && $old )
  delete_post_meta( $post_id, 'autor', $old );
}


















function foo_url_meta_box() {
  global $post;

  wp_nonce_field( 'foo_url_nonce', 'foo_url_nonce' );

  $url = get_post_meta( $post->ID, 'urlfecha', true  );
  
?>
<table>
  <tr>
    <td style="width: 100%">until:</td>
    <td>
      <input type="text" name="url" class="url" value="<?php echo url; ?>" /></td>
  </tr>
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
  
  $count = count( $participantes );
  
  if ( $url && $url != $old )
  update_post_meta( $post_id, 'url', $url );
  elseif ( !$url && $old )
  delete_post_meta( $post_id, 'url', $old );
}














function foo_participantes_meta_box() {
  global $post;

  
  $participantes = get_post_meta($post->ID, 'participantes', true);
  
  $arr = array();
  $invitados = new WP_Query(array( 'post_type'=>'invitado','posts_per_page'=>-1 ) );
  if( $invitados->have_posts() ) {
    while ( $invitados->have_posts() ) {
      $invitados->the_post();

      array_push( $arr, foo_filter( $post->post_title, 'title' ) );

    }
  }

  wp_nonce_field( 'foo_participantes_nonce', 'foo_participantes_nonce' );
?>
<script type="text/javascript">
jQuery(document).ready(function( $ ){
  $( '#add-row' ).on('click', function() {
    var row = $( '.empty-row.screen-reader-text' ).clone(true);
    row.removeClass( 'empty-row screen-reader-text' );
    row.insertBefore( '#participantes-one tbody>tr:last' );
    return false;
  });
  
  $( '.remove-row' ).on('click', function() {
    $(this).parents('tr').remove();
    return false;
  });
});
</script>

<table id="participantes-one" width="100%">
<thead>
<tr>
<th width="82%">Participante</th>
<!--
<th width="12%">Select</th>
-->
<th width="8%"></th>
</tr>
</thead>
<tbody>
  <?php
  
  if ( $participantes ) {
    
    foreach ( $participantes as $field ) {
      
      $options = '<option value="" ></option>';
      
      foreach( $arr as $t ) {
        $options .= '<option value="'.$t.'" '.selected($field,$t,0).'> '.$t.'</option>';
      }
      
      $select = '<select name="participantes[]">'.$options.'</select>';

  ?>
  <tr>
    <td>
      <?php
      echo $select;
      ?>
    </td>
    <td><a class="button remove-row" href="#">Quitar</a></td>
  </tr>
  <?php
  }

  }
  else {
    // show a blank one
  ?>
  
  <tr>
    <td>
      <?php
      $options = '<option value="" ></option>';
      foreach( $arr as $t ) {
        $options .= '<option value="'.$t.'">'.$t.'</option>';
      }
      $select = '<select name="participantes[]">'.$options.'</select>';
      echo $select;
      ?>
    </td>
  <td><a class="button remove-row" href="#">Quitar</a></td>
  </tr>

  <?php } ?>

<!-- empty hidden one for jQuery -->
<tr class="empty-row screen-reader-text">
  <td>

    <?php
    
    $options = '<option value=""></option>';
    foreach( $arr as $t ) {
      $options .= '<option value="'.$t.'">'.$t.'</option>';
    }
    $select = '<select name="participantes[]">'.$options.'</select>';

    echo $select;
    ?>
    </td>
    <td><a class="button remove-row" href="#">Quitar</a></td>

</tr>
</tbody>
</table>

<p><a id="add-row" class="button" href="#">Añadir</a></p>
<?php
}

add_action('save_post', 'foo_participantes_save');
function foo_participantes_save($post_id) {
  if ( ! isset( $_POST['foo_participantes_nonce'] ) ||
      ! wp_verify_nonce( $_POST['foo_participantes_nonce'], 'foo_participantes_nonce' ) )
  return;
  
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
  return;
  
  if (!current_user_can('edit_post', $post_id))
  return;

  
  
  $old = get_post_meta($post_id, 'participantes', true);
  $new = array();
  //~ $options = foo_get_sample_options();
  
  $participantes = $_POST['participantes'];
  
  $count = count( $participantes );
  
  for ( $i = 0; $i < $count; $i++ ) {
    if ( $participantes[$i] != '' ) {
      $new[$i] = stripslashes( strip_tags( $participantes[$i] ) );
    }
  }

  if ( !empty( $new ) && $new != $old )
  update_post_meta( $post_id, 'participantes', $new );
  elseif ( empty($new) && $old )
  delete_post_meta( $post_id, 'participantes', $old );
}



?>