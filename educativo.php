<?php
/*
Template Name: Educativo
 */

get_header(); ?>


<div class="large-9 columns" role="main">

  <?php

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
      
    }
  }
  ?>

  
</div>

<?php get_footer(); ?>