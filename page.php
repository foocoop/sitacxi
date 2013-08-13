<?php
/**
 * Single
 *
 * Loop container for single post content
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>

<!-- Main Content -->
<div class="large-9 columns" role="main">

  <?php
if(!empty($post->post_parent)) {
  
};
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();

      if( !empty($post->post_parent ) ) {
  $parent = $post -> post_parent;
  
        $pgs = get_pages( array('child_of'=>$parent ) );
      }
      else {
        $pgs = get_pages( array('child_of'=>$post->ID ) );
  }

  
  $submenu = "";
      foreach ( $pgs as $p ) {
        $ttl = foo_filter( $p->post_title, 'title');;
        $url = get_permalink( $p->ID );
        $submenu .= foo_li("","",$ttl,$url);
      }

  echo foo_div("submenu","",$submenu);

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
<!-- End Main Content -->


<?php get_footer(); ?>