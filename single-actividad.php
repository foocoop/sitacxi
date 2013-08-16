<?php

get_header(); ?>


<div class="large-12 columns" role="main">

  <?php
  $programaID = 15;
  $pgs = get_pages( array('child_of'=>$programaID, 'sort_order' => 'ASC',
                          'sort_column' => 'menu_order' ) );
  $submenu = "";

  if( qtrans_getLanguage() == "es" ) $titulo = "Presentación";
  else if( strtolower(qtrans_getLanguage()) == "en" ) $titulo = "Presentation";
  $link = site_url();//get_permalink( $post->ID );
  $submenu .= foo_li("","dia", foo_link( $titulo, $link ) );
  
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
      $titulo = foo_h( foo_filter( get_the_title(), 'title'), 2);
      $contenido = foo_filter( get_the_content(), 'content');
      $participantes = get_post_meta(get_the_ID(),'participantes');     
      $participantes = $participantes[0];
      $fecha = get_post_meta($post->ID,'fecha');
      $fecha = $fecha[0];
      $fecha = date_i18n( "F d", strtotime($fecha) );
      $hora_inicio = get_post_meta($post->ID,'hora_inicio');
      $hora_inicio = $hora_inicio[0];
      $hora_final = get_post_meta($post->ID,'hora_final');
      $hora_final = $hora_final[0];
      $pstr = "";
      $i=0;
      $l = count($participantes);
      foreach( $participantes as $p ) {
        $i++;
        
        $qtrans = '<!--:en-->'.$p.'<!--:--><!--:es-->'.$p.'<!--:-->';
        $link_participante = get_permalink( get_page_by_title( $qtrans , OBJECT, 'invitado' ) -> ID );

        if( $l <= 2 ) {
          $pstr .= foo_link( $p, $link_participante );
          if ( $i < $l - 1 ) {
            $pstr .= ", ";
          }
        }
        else if( $l > 2  && $i < $l ) {
          
          $pstr .= foo_link( $p, $link_participante );
          if ( $i < $l - 1 ) {
            $pstr .= ", ";
          }
        }
        else if ( $l > 2 && $i == $l - 1 ) {
          if( qtrans_getLanguage == "es" ) {
            $txt_modera = "Modera";

          }
          else if( qtrans_getLanguage() == "en" ) {
            $txt_modera = "Moderator";            
          }
          $modera = foo_div("","modera",$txt_modera . ": " . $link_participante );
        }
        
        
        
      }
      $pstr = foo_h( $pstr, 4 );

      echo foo_div("","actividad",
                   foo_div("","titulo",$titulo)
                          . foo_div("","participantes",$pstr)
                                   . foo_div("","fecha",$fecha)
                                            . foo_div("","hora",$hora_inicio . " - " . $hora_final )
                                                     . foo_div("","contenido",$contenido)
                   );
                   
    }
    
  }



  
  ?>
</div>
<?php get_footer(); ?>