<?php
/*
 * Template Name: Invitados
 * */
get_header(); ?>


<div class="large-12 columns" role="main">

  <?php
  $submenu = "";
  $preOrden = array();
  $invitados = new WP_Query(array( 'post_type'=>'invitado','posts_per_page'=>-1 ) );
  if( $invitados->have_posts() ) {
    while ( $invitados->have_posts() ) {
      $invitados->the_post();
      $ttl = foo_filter( $post->post_title, 'title');;
      $url = get_permalink( $post->ID );
      $nombre = explode( " ", $ttl );
      $apellido = $nombre[ count($nombre)- 1 ];
      $preOrden[$apellido] = foo_li("","",$ttl,$url);     
    }
  }

  ksort($preOrden);
  
  foreach($preOrden as $pO => $li ) {
    $submenu .= $li;
    
  }
  $submenu = foo_div("submenu", "", foo_ul("","large-block-grid-3", $submenu));
  
  echo $submenu;
  
  ?>
</div>
<?php get_footer(); ?>