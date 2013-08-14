<?php

get_header(); ?>


<div class="large-9 columns" role="main">

  <?php
  $programaID = 15;
  $pgs = get_pages( array('child_of'=>$programaID ) );
  
  $submenu = "";
  foreach ( $pgs as $p ) {
    $ttl = foo_filter( $p->post_title, 'title');;
    $url = get_permalink( $p->ID );
    $submenu .= foo_li("","",$ttl,$url);
  }

  $submenu = foo_div("submenu", "", foo_ul("","", $submenu));
  
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