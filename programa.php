<?php
/*
Template Name: Programa
*/

get_header();

// submenú compuesto de días:


// obtener todos los eventos
//$eventos = array();
$dias = array("Día 1", "Día 2", "Día 3");

//foreach($eventos as $evento) {
  // encontrar su día
  // si ya hay un arreglo para ese día, añadir evento a arreglo
  // si no, crear arreglo por día y añadir evento
//}

for($int = 0; $i < 10; $i++) {
  $fecha = "29 de agosto";
  $tituloautor = "Título de Evento | <em>Nombre Autor</em>";
  $recinto = "Nombre Recinto";

  $fecha = foo_div("","fecha",$fecha);
  $tituloautor = foo_div("","tituloautor",$tituloautor);
  $recinto = foo_div("","recinto",$recinto);

  $masinfo = foo_div("","masinfo","más info");

  $link  = "http://localhost";

  $evento = foo_div("", "evento", $fecha . $tituloautor . $recinto . $masinfo, $link );
  $eventos .= $evento;
}

$eventos = foo_div("","eventos",$eventos);

foreach($dias as $dia) {
  $link = "http://localhost";
  $diaslis .= foo_li("","dia", foo_link( $dia, $link ) );
}


$submenu = foo_ul("submenu","",$diaslis);
$presentacion = "<span><h3>estar-los-unos-con-los-otros</h3></span>";
$presentacion .= "29, 30 y 31 de agosto, 2013. Polyforum Siqueiros Ciudad de México";
$contenido = "...";


$pgs = get_pages( array('child_of'=>$post->ID ) );
$submenu = "";
foreach ( $pgs as $p ) {
  $ttl = foo_filter( $p->post_title, 'title');;
  $url = get_permalink( $p->ID );
  $submenu .= foo_li("","",$ttl,$url);
}


$submenu = foo_div("submenu", "", $submenu);
$presentacion = foo_div("presentacion", "", $presentacion);
$contenido = foo_div("contenido", "", $eventos);

//~ $principal = $submenu . $presentacion . $contenido; 
//~ 
//~ $echo .= foo_div("","", $principal);

//~ echo $echo;

echo $submenu . $presentacion . $contenido; 

get_footer();


?>
