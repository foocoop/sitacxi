<?php
get_header();
?>

<div class="large-9 columns" role="main">

  <?php

  $submenu = "";
  $lecturas = new WP_Query(array( 'post_type'=>'lectura','posts_per_page'=>-1 ) );
  if( $lecturas->have_posts() ) {
    while ( $lecturas->have_posts() ) {
      $lecturas->the_post();
      $ttl = foo_filter( $post->post_title, 'title');;
      $url = get_permalink( $post->ID );
      $submenu .= foo_li("","",$ttl,$url);


      echo foo_div("submenu","", foo_ul("","large-block-grid-3",$submenu) );
    }
  }
  wp_reset_query();

  if(have_posts()) {
    while(have_posts()) {
      the_post();

  ?>
  

  <article id="lectura-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
    
    <?php echo foo_div("","contenido", foo_filter( get_the_content(), 'content' )); ?>

  </article>
  
  <?php
    }
  }
  ?>

</div>

<script type="text/javascript">

 jQuery(document).ready(function($) {
   var link = $('article .contenido a');
   var reader = $("#reader");
   var newlink = link.clone();
   reader.html( newlink );
   newlink.gdocsViewer();
   /* $('reader').PDFDoc( { source : '/home/furenku/chamba/web/proyectos/SITAC/SITAC12.pdf' } ); */
 });


 //var $j = jQuery.noConflict();


</script>


<?php get_footer(); ?>