<?php

function cpt() {
  register_post_type( 'invitado',
		     array('labels' => array(
      'name' => __('Invitados', 'Invitado general name'),
      'singular_name' => __('Invitado', 'Invitado singular name'),
      'add_new' => __('Nuevo', 'invitado type item'),
      'add_new_item' => __('Añadir Invitado'),
      'edit' => __( 'Editar' ),
      'edit_item' => __('Editar Invitados'),
      'new_item' => __('Invitado Nuevo'),
      'view_item' => __('Ver Invitado'),
      'search_items' => __('Buscar Invitado'),
      'not_found' =>  __('Nothing found in the Database.'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
    ),
			   'description' => __( '' ),
			   'public' => true,
			   'publicly_queryable' => true,
			   'exclude_from_search' => false,
			   'show_ui' => true,
			   'menu_position' => 8,
			   'query_var' => true,
			   'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			   'rewrite' => true,
			   'capability_type' => 'post',
			   'hierarchical' => false,
			   'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'sticky'),
			   'has_archive' => true	 	)
	             );


  register_post_type( 'actividad',
                     array('labels' => array(
      'name' => __('Actividades', 'Actividad general name'),
      'singular_name' => __('Actividad', 'Actividad singular name'),
      'add_new' => __('Nuevo', 'actividad type item'),
      'add_new_item' => __('Añadir Actividad'),
      'edit' => __( 'Editar' ),
      'edit_item' => __('Editar Actividades'),
      'new_item' => __('Actividad Nueva'),
      'view_item' => __('Ver Actividad'),
      'search_items' => __('Buscar Actividad'),
      'not_found' =>  __('Nothing found in the Database.'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
    ),
                           'description' => __( '' ),
                           'public' => true,
                           'publicly_queryable' => true,
                           'exclude_from_search' => false,
                           'show_ui' => true,
                           'menu_position' => 8,
                           'query_var' => true,
                           'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
                           'rewrite' => true,
                           'capability_type' => 'post',
                           'hierarchical' => false,
                           'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'sticky'),
                           'has_archive' => true                )
                     ); 

  register_post_type( 'lectura',
                     array('labels' => array(
      'name' => __('Lecturas', 'Lectura general name'),
      'singular_name' => __('Lectura', 'Lectura singular name'),
      'add_new' => __('Nuevo', 'lectura type item'),
      'add_new_item' => __('Añadir Lectura'),
      'edit' => __( 'Editar' ),
      'edit_item' => __('Editar Lecturas'),
      'new_item' => __('Lectura Nuevo'),
      'view_item' => __('Ver Lectura'),
      'search_items' => __('Buscar Lectura'),
      'not_found' =>  __('Nothing found in the Database.'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
    ),
                           'description' => __( '' ),
                           'public' => true,
                           'publicly_queryable' => true,
                           'exclude_from_search' => false,
                           'show_ui' => true,
                           'menu_position' => 8,
                           'query_var' => true,
                           'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
                           'rewrite' => true,
                           'capability_type' => 'post',
                           'hierarchical' => false,
                           'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'sticky'),
                           'has_archive' => true                )
                     ); 

}
                
add_action( 'init', 'cpt');


?>
