<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wl-test-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container">
<header class="header">
<?php
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
?>
<a class="header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
</a>
	<div class="header-tel">
	<?php
		$custom_field_value = get_theme_mod('telephone');
		echo esc_html($custom_field_value);
	?>
	</div>
</header>
</div>
