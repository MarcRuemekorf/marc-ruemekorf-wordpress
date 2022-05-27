<?php
/**
 * Template part for displaying the content hero
 */

$title        = get_field( 'hero_title' );
$description  = get_field( 'hero_description' );
$media        = get_field( 'hero_media_options' );
$image        = get_field( 'hero_image' );
$theme        = get_field( 'hero_theme' );
?>
<header class="hero <?php echo 'hero--' . $theme ?>">
  <div class="hero__container">
    <div class="hero__title">
      <?php echo $title; ?>
    </div>
    <div class="hero__intro">
      <?php echo $description; ?>
    </div>
    <?php
    if( $media == 'image' ): ?>
    <div class="hero__image">
      <img src="<?php echo $image[ 'src' ]; ?>" alt="<?php echo $image[ 'alt' ]; ?>">
    </div>
    <?php endif;

    if( $media == 'slider' ): ?>
      <div class="hero__slider">
      </div>
    <?php endif;
    ?>
  </div>
</header>
