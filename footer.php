<?php

echo foo_close();
echo foo_close();

$reader .= foo_div("estar", "", foo_img( themeDir()."/img/reader/estar.png") );
$reader .= foo_div("losunos","", foo_img( themeDir()."/img/reader/losunos.png"));
$reader .= foo_div("con","",foo_img( themeDir()."/img/reader/con.png"));
$reader .= foo_div("losotros","",foo_img( themeDir()."/img/reader/losotros.png"));
$reader .= foo_div("centro","",foo_img( themeDir()."/img/reader/centro.png"));
$reader .= foo_div("reader","","");

echo foo_div("reader", "large-6 columns", $reader );

echo foo_close(); // #contenedor

?>



<footer id="footer" class="row">
<?php 
	$logos = foo_img( themeDir()."/img/logos.png");
	$logos = foo_div("logos","",$logos);		
	echo $logos;
?>
</footer>


<?php wp_footer(); ?>

</body>


<script type="text/javascript">

 jQuery(document).ready(function($) {

   setup_scroll();
   
   var titulo = $('.campo .titulo');

   
   titulo.click(function(){
     var contenido = $(this).next();
     var visible = contenido.is(':visible');
     if( ! visible )
     contenido.fadeIn();
     else
     contenido.fadeOut();

     $(this).parent().siblings().find('.contenido').fadeOut();


     
   });
 });

 var setup_scroll = function(){   
   var principal = $('.principal');
   var header = $('.principal #headerfijo');
   var scroller = $('.principal #scroller');

   var newH = principal.height() - header.height();
   newH *= 0.95;

   scroller.height(newH);

 }
 var resizeTimer;
 $(window).resize(function() {
   clearTimeout(resizeTimer);
   resizeTimer = setTimeout( setup_scroll, 50);
 });

 


</script>

</html>
