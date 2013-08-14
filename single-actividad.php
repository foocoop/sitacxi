<?php

get_header(); ?>


<div class="large-9 columns" role="main">

  <?php
  $submenu = "";
  $invitados = new WP_Query(array( 'post_type'=>'invitado','posts_per_page'=>-1 ) );
  if( $invitados->have_posts() ) {
    while ( $invitados->have_posts() ) {
      $invitados->the_post();
      $ttl = foo_filter( $post->post_title, 'title');;
      $url = get_permalink( $post->ID );
      $submenu .= foo_li("","",$ttl,$url);
    }
  }

  $submenu = foo_div("submenu", "", foo_ul("","large-block-grid-3", $submenu));
  
  echo $submenu;

  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
      $titulo = foo_h( get_the_title(), 2);
      $contenido = get_the_content();
      $participantes = get_post_meta(get_the_ID(),'participantes');     
      $participantes = $participantes[0];
      $pstr = "";
      $i=0;
      $l = count($participantes);
      foreach( $participantes as $p ) {
        $i++;        
        $pstr .= $p;
        if ( $i < $l ) {
          $pstr .= ", ";
        }
      }
      $pstr = foo_h( $pstr, 4 );

      echo foo_div("","titulo",$titulo)
                  . foo_div("","participantes",$pstr)
                           . foo_div("","contenido",$contenido);
      
    }
    
  }



  
  ?>
</div>
<?php get_footer(); ?>