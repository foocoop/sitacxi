<?php
get_header();
?>

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



  echo foo_div("submenu","", foo_ul("","large-block-grid-3",$submenu) );


  $arr = array();

  
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      $nombre = $post->post_title;
      $actividades = new WP_Query(array( 'post_type'=>'actividad','posts_per_page'=>-1 ) );
      if( $actividades->have_posts() ) {
        while ( $actividades->have_posts() ) {
          $actividades->the_post();
          $actividad = $post->post_title;
          $link = get_permalink($post->ID);
          $participantes = get_post_meta($post->ID,'participantes');
          $link = get          foreach($participantes[0] as $p){
            if($p == $nombre){
              array_push( $arr, $actividad, $link );
            }
          }
        }
      }
      wp_reset_query();
      $lis = "";
      foreach($arr as $a) {
        $lis .= foo_li("","invitado_actividad",$a, $actividad_link);
      }

      echo foo_ul("","invitado_actividades",$lis);

  ?>
  

  <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header>
      <h2><?php the_title(); ?></h2>
    </header>

    <?php if ( has_post_thumbnail()) : ?>
      <a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></a>
    <?php endif; ?>
    
    <?php echo foo_div("","contenido", foo_filter( get_the_content(), 'content' )); ?>

  </article>
  
  <?php } ?>
  
  <?php } ?>

</div>


<?php get_footer(); ?>