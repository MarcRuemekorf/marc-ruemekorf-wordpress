<?php
/**
 * Template part for displaying flexible content
 */

if (have_rows('flexible_content')):
  while (have_rows('flexible_content')) : the_row();

    // Services Layout
    if (get_row_layout() == 'services_layout'):
      $heading        = get_sub_field('services_layout_heading');
      $subheading     = get_sub_field('services_layout_subheading');
      $manual_select  = get_sub_field('services_layout_manual_select');
      $post_objects   = get_sub_field('services_layout_post_objects');
      ?>

      <section class="services">
        <div class="services__container">

          <h2 class="services__heading">
            <?php echo $heading; ?>
          </h2>
          <div class="services__subheading">
            <?php echo $subheading; ?>
          </div>
          <?php if ($manual_select): ?>
            <ul class="services__posts">
              <?php foreach ($post_objects as $post) : setup_postdata($post); ?>
                <li class="services__post">
                  <?php if (has_post_thumbnail()) : ?>
                    <div class="services__image">
                      <figure class="services__image-wrapper">
                        <?php the_post_thumbnail('large'); ?>
                      </figure>
                    </div>
                  <?php endif; ?>
                  <div class="services__text">
                    <?php the_title('<h4 class="services__post-title"><a class="button--link" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
                    <div class="services__post-excerpt">
                      <?php the_excerpt(); ?>
                    </div>
                  </div>
                </li>
              <?php endforeach;
              wp_reset_postdata(); ?>
            </ul>
          <?php else :
            $args = array(
              'post_type' => 'services',
              'orderby' => 'date',
              'order' => 'DESC'
            );
            $services_query = new WP_Query($args);
            ?>
            <ul class="services__posts">
              <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                <li class="services__post">
                  <?php if (has_post_thumbnail()) : ?>
                    <div class="services__image">
                      <figure class="services__image-wrapper">
                        <?php the_post_thumbnail('large'); ?>
                      </figure>
                    </div>
                  <?php endif; ?>
                  <div class="services__text">
                    <?php the_title('<h4 class="services__post-title"><a class="button--link" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
                    <div class="services__excerpt">
                      <?php the_excerpt(); ?>
                    </div>
                  </div>
                </li>
              <?php endwhile;
              wp_reset_postdata(); ?>
            </ul>
          <?php endif; ?>
        </div>
      </section>

    <?php
    // Cases Layout
    elseif (get_row_layout() == 'cases_layout'):
      $heading        = get_sub_field('cases_layout_heading');
      $subheading     = get_sub_field('cases_layout_subheading');
      $manual_select  = get_sub_field('cases_layout_manual_select');
      $post_objects   = get_sub_field('cases_layout_post_objects');
      $theme          = get_sub_field( 'cases_layout_theme' );
      ?>

      <section class="cases <?php echo 'cases--' . $theme ?>">
        <div class="cases__container">
          <h2 class="cases__heading">
            <?php echo $heading; ?>
          </h2>
          <div class="cases__subheading">
            <?php echo $subheading; ?>
          </div>
          <?php if ($manual_select): ?>
            <ul class="cases__slider">
              <?php foreach ($post_objects as $post) : setup_postdata($post); ?>
                <li class="cases__slide">
                  <?php if (has_post_thumbnail()) : ?>
                    <div class="cases__image">
                      <figure class="cases__image-wrapper">
                        <?php the_post_thumbnail('full'); ?>
                      </figure>
                    </div>
                  <?php endif; ?>
                  <?php the_title('<h4 class="cases__post-title"><a class="button--link" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
                </li>
              <?php endforeach;
              wp_reset_postdata(); ?>
            </ul>
          <?php else :
            $args = array(
              'post_type' => 'cases',
              'orderby' => 'date',
              'order' => 'DESC'
            );
            $services_query = new WP_Query($args);
            ?>
            <ul class="cases__slider">
              <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                <li class="cases__slide">
                  <?php if (has_post_thumbnail()) : ?>
                    <div class="cases__image">
                      <a href="<?php echo esc_url(get_permalink()); ?>">
                        <?php the_post_thumbnail('large'); ?>
                      </a>
                    </div>
                  <?php endif; ?>
                  <?php the_title('<h4 class="cases__post-title"><a class="button--link" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
                </li>
              <?php endwhile;
              wp_reset_postdata(); ?>
            </ul>
          <?php endif; ?>
        </div>
      </section>

    <?php
    // Text Layout
    elseif (get_row_layout() == 'text_layout'):
      $heading = get_sub_field('text_layout_heading');
      $subheading = get_sub_field('text_layout_subheading');
      ?>

      <section class="text">
        <div class="text__container">
          <h2 class="text__heading">
            <?php echo $heading; ?>
          </h2>
          <div class="text__subheading">
            <?php echo $subheading; ?>
          </div>

          <?php if (have_rows('text_layout_repeater')) : ?>
            <div class="text__rows">
              <?php while (have_rows('text_layout_repeater')) : the_row();
                $columns = get_sub_field('text_repeater_columns');
                $divider = get_sub_field('text_repeater_divider');
                $class = get_sub_field('text_repeater_class');
                $content = get_sub_field('text_repeater_content');
                if (2 == $columns) : ?>
                  <div class="text__row cols--2<?php echo ' divider--' . $divider; echo $class ? ' ' . $class : null; ?>">
                    <div class="col">
                      <?php echo $content['text_repeater_column_one'] ?>
                    </div>
                    <div class="col">
                      <?php echo $content['text_repeater_column_two'] ?>
                    </div>
                  </div>
                <?php else : ?>
                  <div class="text__row cols--1">
                    <div class="col">
                      <?php echo $content['text_repeater_column_one'] ?>
                    </div>
                  </div>
                <?php endif;
              endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>

    <?php
    // FAQ Layout
    elseif (get_row_layout() == 'faq_layout'):
      $heading = get_sub_field('faq_layout_heading');
      $subheading = get_sub_field('faq_layout_subheading');
      ?>

      <section class="text">
        <div class="text__container">
          <h2 class="text__heading">
            <?php echo $heading; ?>
          </h2>
          <div class="text__subheading">
            <?php echo $subheading; ?>
          </div>

          <?php if (have_rows('faq_layout_repeater')) : ?>
            <div class="text__rows">
              <?php while (have_rows('faq_layout_repeater')) : the_row();
                $class = get_sub_field('text_repeater_class');
                $question = get_sub_field('faq_repeater_question');
                $answer = get_sub_field('faq_repeater_answer');
                if ( !empty($question) ) : ?>

                <?php endif;
              endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>

    <?php
    endif;

    // End loop.
  endwhile;

// No value.
else :
  // Do something...
endif;
?>