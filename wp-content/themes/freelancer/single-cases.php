<?php
/**
 * The template for displaying case details
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Freelancer
 */

get_header();
?>

  <main id="primary" class="site-main">

    <?php
    while (have_posts()) :
      the_post();
      /**
       * Content: Hero
       */
      get_template_part('template-parts/content', 'hero');

      /**
       * Content: Body
       */
      get_template_part('template-parts/content', 'body');

//      the_post_navigation(
//        array(
//          'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'freelancer') . '</span> <span class="nav-title">%title</span>',
//          'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'freelancer') . '</span> <span class="nav-title">%title</span>',
//        )
//      );

      // If comments are open or we have at least one comment, load up the comment template.
      if (comments_open() || get_comments_number()) :
        comments_template();
      endif;

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->

<?php
get_footer();
