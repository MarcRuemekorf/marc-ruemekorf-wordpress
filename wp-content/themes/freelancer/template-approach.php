<?php
/*
Template Name: Approach
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
     * Content: Process (steps)
     */
    ?>

    <?php
    /**
     * Content: Flexible Content
     */
    get_template_part( 'template-parts/content', 'body' );
    ?>

  </div>
</div>

<?php get_footer(); ?>
