<?php
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title><?php wp_title(" - ",true,"right"); ?></title>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>

  <?php
  /* wp_enqueue_script("jquery"); */
  wp_enqueue_script( 'jquery-ui-datepicker' );
  wp_enqueue_style( 'jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);
  wp_head(); 
  ?>


</head>
<script type="text/javascript" src="<?php
                                    echo themeDir();
                                    ?>/scripts/gdocsviewer/jquery.gdocsviewer.js"></script>
<!-- <script type="text/javascript" src="<?php
echo themeDir();
?>/scripts/jquery-pdfdoc/jquery-pdfdoc.js"></script> -->

<body <?php body_class(); ?>>
  <?php
  // global $template; echo $template;
  ?>
<?php

	

echo foo_open("contenedor","row");

echo foo_open("","large-6 columns principal");

?>

<header class="site-header" <?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) : ?> style="background:url('<?php echo esc_url( $header_image ); ?>');" <?php endif; ?>>

<?php

$logo = foo_link( foo_img( themeDir()."/img/logo_sitac.png"), site_url() );
$header = foo_div("logo", "half", $logo);
$header = foo_div("logo", "half", $logo);
$header .=	foo_div("descripcion", "half vwhole",
				foo_div("subtitulo", "vhalf", "estar-los-unos-con-los-otros")
				. foo_div("subsubtitulo", "vhalf", "onceavo simposio internacional de teoría sobre arte contemporáneo")
			);

$header = foo_div("header", "", $header);

echo $header;
qtrans_generateLanguageSelectCode('text');

?>

</header>



<nav id="menu" class="top-bar">
  <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'left', 'container' => '', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) ); ?>
</nav>

