<?php
/**
 * Template part for displaying flexible content
 */

if (have_rows('flexible_content')):
  while (have_rows('flexible_content')) : the_row();

    // Services Layout
    if ( get_row_layout() == 'services_layout' ):
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
    elseif ( get_row_layout() == 'cases_layout' ):
      $heading        = get_sub_field('cases_layout_heading');
      $subheading     = get_sub_field('cases_layout_subheading');
      $manual_select  = get_sub_field('cases_layout_manual_select');
      $post_objects   = get_sub_field('cases_layout_post_objects');
      $theme          = get_sub_field( 'cases_layout_theme' );
      $margin         = get_sub_field( 'cases_layout_spacing' )['cases_layout_margin'];
      $padding        = get_sub_field( 'cases_layout_spacing' )['cases_layout_padding'];
      $spacing        = array();

      if($margin && in_array('top', $margin) ) :
        array_push($spacing, 'has-margin--top');
      endif;
      if($margin && in_array('bottom', $margin) ) :
        array_push($spacing, 'has-margin--bottom');
      endif;
      if($padding && in_array('top', $padding) ) :
        array_push($spacing, 'has-padding--top');
      endif;
      if($padding && in_array('bottom', $padding) ) :
        array_push($spacing, 'has-padding--bottom');
      endif;
      ?>

      <section class="cases <?php echo 'cases--' . $theme ?> <?php echo implode(' ', $spacing); ?>">
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
                        <?php the_post_thumbnail('full'); ?>
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
    elseif ( get_row_layout() == 'text_layout' ):
      $heading    = get_sub_field( 'text_layout_heading');
      $subheading = get_sub_field( 'text_layout_subheading' );
      $alignment  = get_sub_field( 'text_layout_alignment' );
      $theme      = get_sub_field( 'text_layout_theme' );
      $margin     = get_sub_field( 'text_layout_spacing' )['text_layout_margin'];
      $padding    = get_sub_field( 'text_layout_spacing' )['text_layout_padding'];
      $spacing    = array();

      if($margin && in_array('top', $margin) ) :
        array_push($spacing, 'has-margin--top');
      endif;
      if($margin && in_array('bottom', $margin) ) :
        array_push($spacing, 'has-margin--bottom');
      endif;
      if($padding && in_array('top', $padding) ) :
        array_push($spacing, 'has-padding--top');
      endif;
      if($padding && in_array('bottom', $padding) ) :
        array_push($spacing, 'has-padding--bottom');
      endif;
      ?>

      <section class="text <?php echo 'text--' . $theme ?> <?php echo implode(' ', $spacing); ?>">
        <div class="text__container">

          <?php if( $heading ) : ?>
            <h2 class="text__heading">
              <?php echo $heading; ?>
            </h2>
          <?php endif;

          if( $subheading ) : ?>
            <div class="text__subheading">
              <?php echo $subheading; ?>
            </div>
          <?php endif;

          if (have_rows('text_layout_repeater')) : ?>
            <div class="text__rows">
              <?php while (have_rows('text_layout_repeater')) : the_row();
                $columns = get_sub_field('text_repeater_columns');
                $divider = get_sub_field('text_repeater_divider');
                $class = get_sub_field('text_repeater_class');
                $content = get_sub_field('text_repeater_content');
                if (2 == $columns) : ?>
                  <div class="text__row cols--2<?php echo ' divider--' . $divider; echo ' align--' . $alignment; echo $class ? ' ' . $class : null; ?>">
                    <div class="col">
                      <?php echo $content['text_repeater_column_one'] ?>
                    </div>
                    <div class="col">
                      <?php echo $content['text_repeater_column_two'] ?>
                    </div>
                  </div>
                <?php else : ?>
                  <div class="text__row cols--1<?php echo ' divider--' . $divider; echo ' align--' . $alignment; echo $class ? ' ' . $class : null; ?>">
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
      $heading    = get_sub_field('faq_layout_heading');
      $subheading = get_sub_field('faq_layout_subheading');
      $theme      = get_sub_field( 'faq_layout_theme' );
      $margin     = get_sub_field( 'faq_layout_spacing' )['faq_layout_margin'];
      $padding    = get_sub_field( 'faq_layout_spacing' )['faq_layout_padding'];
      $spacing    = array();

      if($margin && in_array('top', $margin) ) :
        array_push($spacing, 'has-margin--top');
      endif;
      if($margin && in_array('bottom', $margin) ) :
        array_push($spacing, 'has-margin--bottom');
      endif;
      if($padding && in_array('top', $padding) ) :
        array_push($spacing, 'has-padding--top');
      endif;
      if($padding && in_array('bottom', $padding) ) :
        array_push($spacing, 'has-padding--bottom');
      endif;

      ?>

      <section class="faq <?php echo 'faq--' . $theme; ?> <?php echo implode(' ', $spacing); ?>">
        <div class="faq__container">
          <h2 class="faq__heading">
            <?php echo $heading; ?>
          </h2>
          <div class="faq__subheading">
            <?php echo $subheading; ?>
          </div>

          <?php if (have_rows('faq_layout_repeater')) : ?>
            <div class="faq__rows">
              <?php while (have_rows('faq_layout_repeater')) : the_row();
                $class = get_sub_field('faq_repeater_class');
                $question = get_sub_field('faq_repeater_question');
                $answer = get_sub_field('faq_repeater_answer');
                $status   = get_sub_field( 'faq_repeater_status' );
                if ( !empty($question) ) : ?>
                <div class="faq__row<?php echo $status ? ' ' . 'active' : null; ?>">
                  <div class="faq__header">
                    <p><?php echo $question; ?></p>
                    <span class="material-symbols-outlined icon">expand_more</span>
                  </div>
                  <div class="faq__body">
                    <?php echo $answer; ?>
                  </div>
                </div>
                <?php endif;
              endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>

    <?php
    // Steps Layout
    elseif (get_row_layout() == 'steps_layout'):
      $heading    = get_sub_field('steps_layout_heading');
      $subheading = get_sub_field('steps_layout_subheading');
      $count      = 0;
      $theme      = get_sub_field( 'steps_layout_theme' );
      $margin     = get_sub_field( 'steps_layout_spacing' )['steps_layout_margin'];
      $padding    = get_sub_field( 'steps_layout_spacing' )['steps_layout_padding'];
      $spacing    = array();

      if($margin && in_array('top', $margin) ) :
        array_push($spacing, 'has-margin--top');
      endif;
      if($margin && in_array('bottom', $margin) ) :
        array_push($spacing, 'has-margin--bottom');
      endif;
      if($padding && in_array('top', $padding) ) :
        array_push($spacing, 'has-padding--top');
      endif;
      if($padding && in_array('bottom', $padding) ) :
        array_push($spacing, 'has-padding--bottom');
      endif;
      ?>

      <section class="steps <?php echo 'steps--' . $theme; ?> <?php echo implode(' ', $spacing); ?>">
        <div class="steps__container">
          <h2 class="steps__heading">
            <?php echo $heading; ?>
          </h2>
          <div class="steps__subheading">
            <?php echo $subheading; ?>
          </div>

          <?php if (have_rows('steps_layout_repeater')) : ?>
            <ol class="steps__rows">
              <?php while (have_rows('steps_layout_repeater')) : the_row();
                $class = get_sub_field('steps_repeater_class');
                $text = get_sub_field('steps_repeater_text');
                $count++;
                if ( !empty($text) ) : ?>
                  <li class="steps__row">
                    <div class="steps__counter">
                      <span class="steps__count">
                        <?php echo '0' . $count; ?>
                      </span>
                    </div>
                    <div class="steps__body">
                      <?php echo $text; ?>
                    </div>
                  </li>
                <?php endif;
              endwhile; ?>
            </ol>
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