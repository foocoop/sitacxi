<?php
get_header();
$echo = "";
while(have_posts()){
  the_post();
  $contenido = get_the_content();
  $echo .= foo_div("","title",foo_filter($titulo,'title'));
  $echo .= foo_div("","contenido",foo_filter($contenido,"content"));
}


$lecturasPagID = 17;
$submenu = "";
$pgs = get_pages( array('child_of'=>$lecturasPagID ) );

foreach ( $pgs as $p ) {
  $ttl = foo_filter( $p->post_title, 'title');;
  $url = get_permalink( $p->ID );
  $submenu .= foo_li("","",$ttl,$url);
}

$submenu = foo_div("submenu", "", $submenu);


$query = new WP_Query(array( 'post_type'=>'lectura','posts_per_page'=>-1 ) );
if( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    $titulo = get_the_title();
    $link = get_permalink($post->ID);
    $autor = get_post_meta($post->ID,'autor');
    $autor = $autor[0];
    
    $lecturas .= foo_li("","lectura",
                        foo_div("","autor", $autor ) .
                                foo_div("","titulo", $titulo ),
                        $link);
    
  }
}


echo $submenu;

echo foo_div("lectura","",$echo);

echo foo_div("lecturas","",$lecturas);


echo foo_div("","contenido", foo_filter( $contenido, 'content' )); 

?>


<script type="text/javascript">

 jQuery(document).ready(function($) {
   var link = $('.contenido a');
   var reader = $("#reader #reader");
   var imgs = $('#lectura .contenido img');
   imgs.each(
     function(){
       var parent = $(this).parent();
       if( parent.is('a') ) {
         
         parent.remove();
       }
       $(this).remove();
     }
   );
   

   // revisar si es pdf:
   var href = link.attr('href');
   var ext = href.substr(href.lastIndexOf('.') + 1);
   
   if( ext == 'pdf' ) {     
     var newlink = link.detach();
     reader.html( newlink );
     newlink.gdocsViewer();
   }
   /* $('reader').PDFDoc( { source : '/home/furenku/chamba/web/proyectos/SITAC/SITAC12.pdf' } ); */
 });


 //var $j = jQuery.noConflict();


</script>


<?php get_footer(); ?>