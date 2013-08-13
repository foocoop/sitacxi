<?php
//Template Name: Dia 1


get_header();



$contenido = get_the_content();

$submenu = "";
if( qtrans_getLanguage() == "es" ) $titulo = "Presentación";
else if( strtolower(qtrans_getLanguage()) == "en" ) $titulo = "Statement";

$link = get_permalink( $post->ID );
$submenu .= foo_li("","dia", foo_link( $titulo, $link ) );
$pgs = get_pages( array('child_of'=>$post->post_parent ) );

foreach ( $pgs as $p ) {
  $ttl = foo_filter( $p->post_title, 'title');;
  $url = get_permalink( $p->ID );
  $submenu .= foo_li("","",$ttl,$url);
}

$submenu = foo_div("submenu", "", $submenu);


$query = new WP_Query(array( 'post_type'=>'actividad','posts_per_page'=>-1 ) );
if( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    $titulo = get_the_title();
    $link = get_permalink($post->ID);
    $fecha = get_post_meta($post->ID,'fecha');
    $fecha = $fecha[0];
    $hora_inicio = get_post_meta($post->ID,'hora_inicio');
    $hora_inicio = $hora_inicio[0];

    $participantes = get_post_meta($post->ID,'participantes');

    $participantes = $participantes[0];
    $participantesStr="";
    foreach($participantes as $p ){
      $participantesStr .= $p . " " ;
      $link = get_page_by_title($p, 'OBJECT', 'invitado');
      
    }
    $hora_final = get_post_meta($post->ID,'hora_final');
    $hora_final = $hora_final[0];
    
    if($fecha == "08/29/2013") {
      setlocale(LC_ALL,"es_ES");
      $actividades .= foo_li("","actividad",
                             foo_div("","fecha", date( "F d", strtotime($fecha) ) ." ". $hora_inicio. " - " . $hora_final ) .
                                                                        foo_div("","titulo", $titulo . " | <em>" . $participantesStr .'</em>') .
                                                                                foo_div("","sede", "Cultural del Bosque" ),
                             $link);
    }
  }
}


echo $submenu;

echo foo_div("actividades","",$actividades);

get_footer();

?>