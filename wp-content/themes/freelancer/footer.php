<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freelancer
 */
$cta_override         = get_field( 'footer_call_to_action_override_text');
$cta_override_link    = get_field( 'footer_call_to_action_override_link');
$cta_global           = get_field( 'globals_footer_call_to_action', 'option');
$cta_global_link      = $cta_global[ 'globals_footer_call_to_action_link' ];
$contact_information  = get_field('globals_contact_information', 'option');
$company_details      = get_field('globals_company_details', 'option');
?>

<footer id="colophon" class="site-footer">
  <div class="site-footer__container">
    <?php if( $cta_global || $cta_override ): ?>
      <div class="site-footer__cta">
        <?php if( $cta_override ) : ?>
          <h2 class="cta__text"><?php echo $cta_override; ?></h2>
          <?php if( $cta_override_link ):
            $link_url = $cta_override_link['url'];
            $link_title = $cta_override_link['title'];
            $link_target = $cta_override_link['target'] ? $cta_override_link['target'] : '_self';
            ?>
            <a class="cta__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
              <?php echo esc_html( $link_title ); ?>
            </a>
          <?php endif; ?>
        <?php elseif( $cta_global ) : ?>
          <h2 class="cta__text"><?php echo $cta_global[ 'globals_footer_call_to_action_text' ]; ?></h2>
          <?php if( $cta_global_link ):
            $link_url = $cta_global_link['url'];
            $link_title = $cta_global_link['title'];
            $link_target = $cta_global_link['target'] ? $cta_global_link['target'] : '_self';
            ?>
            <a class="cta__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
              <?php echo esc_html( $link_title ); ?>
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="site-footer__info">
      <ul class="site-footer__legal">
        <li>
          Copyright <?php the_time('Y'); ?> Marc Ruemekorf
        </li>
        <li>
          KVK: <?php echo $company_details['globals_kvk']; ?>
        </li>
        <li>
          BTW: <?php echo $company_details['globals_btw']; ?>
        </li>
      </ul><!-- .site-info -->
      <div class="site-footer__branding">
        <span class="material-symbols-outlined icon">translate</span>
        <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'footer-language',
            'menu_id'         => 'language-menu',
            'menu_class'      => 'language-switcher',
          )
        );

        $logo = get_field('globals_company_logo', 'option');
        if( !empty( $logo[ 'globals_header_logo_light' ] ) ): ?>
          <a class="site-footer__logo" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($logo[ 'globals_header_logo_light' ]['url']); ?>" alt="<?php echo esc_attr($logo[ 'globals_header_logo_light' ]['alt']); ?>" />
          </a>

        <?php else : ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
