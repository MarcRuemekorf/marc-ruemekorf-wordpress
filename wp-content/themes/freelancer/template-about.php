<?php
/*
Template Name: About
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

    <?php
    /**
     * Content: Testimonials
     */
    ?>

  </div>
</div>

<?php get_footer(); ?>
