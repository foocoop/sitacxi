<?php
/*
Template Name: Programa
 */
get_header();

/* if( have_posts ) {
while( have_posts ) { */
the_post();


$presentacion = "<span><h3>estar-los-unos-con-los-otros</h3></span>";
$presentacion .= "29, 30 y 31 de agosto, 2013.</br>Polyforum Siqueiros Ciudad de México";
$contenido = get_the_content();

$submenu = "";
if( qtrans_getLanguage() == "es" ) $titulo = "Presentación";
else if( strtolower(qtrans_getLanguage()) == "en" ) $titulo = "Statement";
$link = get_permalink( $post->ID );
$submenu .= foo_li("","dia", foo_link( $titulo, $link ) );
$pgs = get_pages( array('child_of'=>$post->ID ) );

foreach ( $pgs as $p ) {
  $ttl = foo_filter( $p->post_title, 'title');;
  $url = get_permalink( $p->ID );
  $submenu .= foo_li("","",$ttl,$url);
}
$submenu = foo_div("submenu", "", foo_ul("","", $submenu ) );

$presentacion = foo_div("presentacion", "", $presentacion);
$contenido = foo_div("contenido", "", $contenido);

/* }
} */
echo $submenu . $presentacion . $contenido; 
get_footer();

?>
