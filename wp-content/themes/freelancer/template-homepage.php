<?php
/*
Template Name: Homepage
*/

get_header(); ?>

  <div id="primary" class="site-content">
    <div id="content" role="main">

      <?php
      /**
       * Content: Hero
       */
      get_template_part( 'template-parts/content', 'hero' );
      ?>

      <?php
      /**
       * Content: Body
       */
      get_template_part( 'template-parts/content', 'body' );
      ?>

    </div>
  </div>

<?php get_footer(); ?>