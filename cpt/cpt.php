<?php

function cpt() { 
	register_post_type( 'articulo',
		array('labels' => array(
			'name' => __('Artículos', 'Artículo general name'),
			'singular_name' => __('Artículo', 'Artículo singular name'),
			'add_new' => __('Nuevo', 'articulo type item'),
			'add_new_item' => __('Añadir Artículo'),
			'edit' => __( 'Editar' ),
			'edit_item' => __('Editar Artículos'),
			'new_item' => __('Artículo Nuevo'),
			'view_item' => __('Ver Artículo'),
			'search_items' => __('Buscar Artículo'),
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
	register_taxonomy_for_object_type('numero', 'articulo');
	register_taxonomy_for_object_type('seccion', 'articulo');

	
	register_post_type( 'numero',
		array('labels' => array(
			'name' => __('Números', 'Número general name'),
			'singular_name' => __('Número', 'Número singular name'),
			'add_new' => __('Nuevo', 'numero type item'),
			'add_new_item' => __('Añadir Número'),
			'edit' => __( 'Editar' ),
			'edit_item' => __('Editar Números'),
			'new_item' => __('Número Nuevo'),
			'view_item' => __('Ver Número'),
			'search_items' => __('Buscar Número'),
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
	
	register_post_type( 'numero_anterior',
		array('labels' => array(
			'name' => __('Números anteriores', 'Número anterior general name'),
			'singular_name' => __('Número anterior', 'Número anterior singular name'),
			'add_new' => __('Nuevo', 'numero_anterior type item'),
			'add_new_item' => __('Añadir Número anterior'),
			'edit' => __( 'Editar' ),
			'edit_item' => __('Editar Números anteriores'),
			'new_item' => __('Número anterior Nuevo'),
			'view_item' => __('Ver Número anterior'),
			'search_items' => __('Buscar Número anterior'),
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
	
	register_post_type( 'seccion',
		array('labels' => array(
			'name' => __('Secciones', 'Sección general name'),
			'singular_name' => __('Sección', 'Sección singular name'),
			'add_new' => __('Nuevo', 'seccion type item'),
			'add_new_item' => __('Añadir Sección'),
			'edit' => __( 'Editar' ),
			'edit_item' => __('Editar Secciones'),
			'new_item' => __('Sección Nueva'),
			'view_item' => __('Ver Sección'),
			'search_items' => __('Buscar Sección'),
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
	register_taxonomy_for_object_type('numero', 'seccion');

	
} 

	add_action( 'init', 'cpt');




    register_taxonomy( 'numero', 
    	array('articulo'),
    	array('hierarchical' => true,
    		'labels' => array(
    			'name' => __( 'Número ' ),
    			'singular_name' => __( 'Número' ),
    			'search_items' =>  __( 'Buscar número' ),
    			'all_items' => __( 'Todos los números' ),
    			'parent_item' => __( 'Número superior' ),
    			'parent_item_colon' => __( 'Número superior:' ),
    			'edit_item' => __( 'Editar número ' ),
    			'update_item' => __( 'Actualizar número' ),
    			'add_new_item' => __( 'Añadir números' ),
    			'new_item_name' => __( 'Nombre de número nuevo' )
    		),
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );   
		
    register_taxonomy( 'seccion', 
    	array('articulo'),
    	array('hierarchical' => true,
    		'labels' => array(
    			'name' => __( 'Sección ' ),
    			'singular_name' => __( 'Sección' ),
    			'search_items' =>  __( 'Buscar sección' ),
    			'all_items' => __( 'Todos los secciones' ),
    			'parent_item' => __( 'Sección superior' ),
    			'parent_item_colon' => __( 'Sección superior:' ),
    			'edit_item' => __( 'Editar sección ' ),
    			'update_item' => __( 'Actualizar sección' ),
    			'add_new_item' => __( 'Añadir secciones' ),
    			'new_item_name' => __( 'Nombre de sección nuevo' )
    		),
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );   

?>
