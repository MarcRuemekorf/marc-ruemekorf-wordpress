<?php
/*
Template Name: About
*/

get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">

    <?php
    /**
     * Content: Header
     */
    get_template_part( 'template-parts/content', 'header' );
    ?>

    <?php
    /**
     * Content: Services
     */
    get_template_part( 'template-parts/content', 'services' );
    ?>

    <?php
    /**
     * Content: Cases
     */
    ?>

    <?php
    /**
     * Content: Testimonials
     */
    ?>

  </div>
</div>

<?php get_footer(); ?>
