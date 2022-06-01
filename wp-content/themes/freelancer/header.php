<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freelancer
 */
$theme = get_field( 'hero_theme' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'freelancer'); ?></a>

  <header id="masthead" class="site-header <?php echo 'header--' . $theme; ?>">
    <div class="site-header__container">
      <nav id="site-navigation" class="site-header__navigation">
        <div class="site-header__branding">
          <?php
          $company_branding  = get_field('globals_header_branding', 'option');
          $company_details  = get_field('globals_company_details', 'option');
          $company_logo = get_field( 'globals_company_logo', 'option' );
          ?>
          <div class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
              <?php if ( 'name' == $company_branding && $company_details['globals_company_name'] ) :
                echo $company_details['globals_company_name'];
              elseif( 'logo' == $company_branding && $company_logo) : ?>
                <a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
                  <?php if( 'white-black' == $theme ) : ?>
                    <img src="<?php echo esc_url($company_logo[ 'globals_header_logo_dark' ]['url']); ?>" alt="<?php echo esc_attr($company_logo[ 'globals_header_logo_dark' ]['alt']); ?>" />
                  <?php else : ?>
                    <img src="<?php echo esc_url($company_logo[ 'globals_header_logo_light' ]['url']); ?>" alt="<?php echo esc_attr($company_logo[ 'globals_header_logo_light' ]['alt']); ?>" />
                  <?php endif; ?>
                </a>
              <?php else :
                bloginfo('name');
                $freelancer_description = get_bloginfo('description', 'display');
                if( $freelancer_description || is_customize_preview() ) : ?>
                  <span class="site-description">
                    <?php echo $freelancer_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                  </span>
                <?php endif;
              endif; ?>
            </a>
          </div>
        </div><!-- .site-branding -->

        <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'header-1',
            'container_class' => 'header-menu',
            'menu_class'      => 'header-menu__menu',
            'menu_id'         => 'primary-menu'
          )
        );
        ?>

        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <span class="material-symbols-outlined icon">menu</span>
        </button>
      </nav><!-- #site-navigation -->
    </div>
  </header><!-- #masthead -->
