<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wl-test-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('car'); ?>>
	
<div class="car-img">
	<?php wl_test_theme_post_thumbnail(); ?>
</div>
<div class="car-right">
    <h2><?php the_title(); ?></h2>

    <p class="car-content"><?php the_content(); ?></p>

    <h3>Characteristics:</h3>
    <div class="car-characteristics">
        <div class="car-characteristics__item">Price: <?php echo ' '. get_post_meta(get_the_ID(), 'car_price', true) . ' $';?></div>
        <div class="car-characteristics__item">Power:<?php echo ' '. get_post_meta(get_the_ID(), 'car_power', true) . ' hp'; ?></div>
        <div class="car-characteristics__item">Fuel:<?php echo' '. get_post_meta(get_the_ID(), 'car_fuel', true); ?></div>
        <?php
        $terms_brands = get_the_terms( get_the_ID(), 'brands' );
         
        if ( $terms_brands && ! is_wp_error( $terms_brands ) ) : 
            echo '<div class="car-characteristics__item">'; 
            foreach ( $terms_brands as $term ) {
                echo 'Brands: ' . esc_html( $term->name ); 
            }
            echo '</div>'; 
        endif;

        $terms_countries = get_the_terms( get_the_ID(), 'countries' );
         
        if ( $terms_countries && ! is_wp_error( $terms_countries ) ) : 
            echo '<div class="car-characteristics__item">'; 
            foreach ( $terms_countries as $term ) {
                echo 'Country: ' . esc_html( $term->name ); 
            }
            echo '</div>'; 
        endif;

        $terms_manufacturers = get_the_terms( get_the_ID(), 'manufacturers' );
         
        if ( $terms_manufacturers && ! is_wp_error( $terms_manufacturers ) ) : 
            echo '<div class="car-characteristics__item">'; 
            foreach ( $terms_manufacturers as $term ) {
                echo 'Producer: ' . esc_html( $term->name ); 
            }
            echo '</div>'; 
        endif;
        ?>
        <div class="car-characteristics__item car-characteristics__item--color" style="<?php echo 'background:' . get_post_meta(get_the_ID(), 'color', true) . ';'?>"></div>
       
    </div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
