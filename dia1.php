<?php
//Template Name: Dia 1
$fecha_dia = "08/29/2013";
get_header();


$contenido = get_the_content();

$submenu = "";

if( qtrans_getLanguage() == "es" ) $titulo = "Presentación";
else if( strtolower(qtrans_getLanguage()) == "en" ) $titulo = "Presentation";
$link = site_url();//get_permalink( $post->ID );
$submenu .= foo_li("","dia", foo_link( $titulo, $link ) );

$pgs = get_pages( array('child_of'=>$post->post_parent, 'sort_order' => 'ASC',
                        'sort_column' => 'post_title' ) );

foreach ( $pgs as $p ) {
  $ttl = foo_filter( $p->post_title, 'title');;
  $url = get_permalink( $p->ID );
  $submenu .= foo_li("","",$ttl,$url);
}

$submenu = foo_div("submenu", "", $submenu);


$query = new WP_Query(array( 'post_type'=>'actividad','posts_per_page'=>-1, 'order'=>'ASC' ) );
if( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    $titulo = foo_filter( get_the_title(), 'title');
    $link = get_permalink($post->ID);
    $fecha = get_post_meta($post->ID,'fecha');
    $fecha = $fecha[0];
    $hora_inicio = get_post_meta($post->ID,'hora_inicio');
    $hora_inicio = $hora_inicio[0];
    $hora_final = get_post_meta($post->ID,'hora_final');
    $hora_final = $hora_final[0];
    $participantes = get_post_meta($post->ID,'participantes');

    $participantes = $participantes[0];
    $participantesStr="";
    $i = 0;
    $l = count($participantes);
    foreach($participantes as $p ){
      $i++;
      $participantesStr .= $p;
      if( $i < $l ) $participantesStr .= ", " ;
      $link_participante = get_page_by_title($p, OBJECT, 'invitado');
      
    }

    if( strtotime($fecha) == strtotime($fecha_dia) ) {

      $actividades .=
      foo_li("","actividad",
             foo_div("","hora", $hora_inicio . " - " . $hora_final )
                    . foo_div("","titulo", $titulo )
             . foo_div("","participantes", $participantesStr)
             , $link);
    }
  }
}


echo $submenu;

echo foo_div("fecha","", date_i18n( "F d", strtotime($fecha_dia) ) );
echo foo_div("actividades","",$actividades);

get_footer();

?>