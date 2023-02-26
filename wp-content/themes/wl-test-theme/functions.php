<?php
/**
 * wl-test-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wl-test-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wl_test_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wl-test-theme, use a find and replace
		* to change 'wl-test-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wl-test-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wl-test-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wl_test_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wl_test_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wl_test_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wl_test_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wl_test_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wl_test_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wl-test-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wl-test-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wl_test_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wl_test_theme_scripts() {
	wp_enqueue_style( 'wl-test-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wl-test-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wl-test-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wl_test_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function wt_register_post_type(){
	$taxonomy_brands_labels = array(
		'name'              => esc_html_x( 'Brands', 'taxonomy general name', 'wl-test-theme' ),
		'singular_name'     => esc_html_x( 'Brand', 'taxonomy singular name', 'wl-test-theme' ),
		'search_items'      => esc_html__( 'Search Brands', 'wl-test-theme' ),
		'all_items'         => esc_html__( 'All Brands', 'wl-test-theme' ),
		'view_item'         => esc_html__( 'View Brand', 'wl-test-theme' ),
		'parent_item'       => esc_html__( 'Parent Brand', 'wl-test-theme' ),
		'parent_item_colon' => esc_html__( 'Parent Brand:', 'wl-test-theme' ),
		'edit_item'         => esc_html__( 'Edit Brand', 'wl-test-theme' ),
		'update_item'       => esc_html__( 'Update Brand', 'wl-test-theme' ),
		'add_new_item'      => esc_html__( 'Add New Brand', 'wl-test-theme' ),
		'new_item_name'     => esc_html__( 'New Brand Name', 'wl-test-theme' ),
		'not_found'         => esc_html__( 'No Brands Found', 'wl-test-theme' ),
		'back_to_items'     => esc_html__( 'Back to Brands', 'wl-test-theme' ),
		'menu_name'         => esc_html__( 'Brand', 'wl-test-theme' ),
	);

	$taxonomy_brands_args = array(
		'hierarchical' => true,
		'labels' => $taxonomy_brands_labels,
		'show_ui' => true,
		'rewrite' => array('slug' => 'brands'),
		'query_var' => true,
		'show_in_rest' => true
	);

	register_taxonomy('brands', array('cars'), $taxonomy_brands_args);

	$taxonomy_countries_labels = array(
		'name'              => esc_html_x( 'Countries', 'taxonomy general name', 'wl-test-theme' ),
		'singular_name'     => esc_html_x( 'Country', 'taxonomy singular name', 'wl-test-theme' ),
		'search_items'      => esc_html__( 'Search Countries', 'wl-test-theme' ),
		'all_items'         => esc_html__( 'All Countries', 'wl-test-theme' ),
		'view_item'         => esc_html__( 'View Country', 'wl-test-theme' ),
		'parent_item'       => esc_html__( 'Parent Country', 'wl-test-theme' ),
		'parent_item_colon' => esc_html__( 'Parent Country:', 'wl-test-theme' ),
		'edit_item'         => esc_html__( 'Edit Country', 'wl-test-theme' ),
		'update_item'       => esc_html__( 'Update Country', 'wl-test-theme' ),
		'add_new_item'      => esc_html__( 'Add New Country', 'wl-test-theme' ),
		'new_item_name'     => esc_html__( 'New Country Name', 'wl-test-theme' ),
		'not_found'         => esc_html__( 'No Countries Found', 'wl-test-theme' ),
		'back_to_items'     => esc_html__( 'Back to Countries', 'wl-test-theme' ),
		'menu_name'         => esc_html__( 'Country', 'wl-test-theme' ),
	);

	$taxonomy_countries_args = array(
		'hierarchical' => true,
		'labels' => $taxonomy_countries_labels,
		'show_ui' => true,
		'rewrite' => array('slug' => 'countries'),
		'query_var' => true,
		'show_in_rest' => true
	);

	register_taxonomy('countries', array('cars'), $taxonomy_countries_args);
	
	$taxonomy_manufacturers_labels = array(
		'name'              => esc_html_x( 'Manufacturers', 'taxonomy general name', 'wl-test-theme' ),
		'singular_name'     => esc_html_x( 'Manufacturer', 'taxonomy singular name', 'wl-test-theme' ),
		'search_items'      => esc_html__( 'Search Manufacturers', 'wl-test-theme' ),
		'all_items'         => esc_html__( 'All Manufacturers', 'wl-test-theme' ),
		'view_item'         => esc_html__( 'View Manufacturer', 'wl-test-theme' ),
		'parent_item'       => esc_html__( 'Parent Manufacturer', 'wl-test-theme' ),
		'parent_item_colon' => esc_html__( 'Parent Manufacturer:', 'wl-test-theme' ),
		'edit_item'         => esc_html__( 'Edit Manufacturer', 'wl-test-theme' ),
		'update_item'       => esc_html__( 'Update Manufacturer', 'wl-test-theme' ),
		'add_new_item'      => esc_html__( 'Add New Manufacturer', 'wl-test-theme' ),
		'new_item_name'     => esc_html__( 'New Manufacturer Name', 'wl-test-theme' ),
		'not_found'         => esc_html__( 'No Manufacturers Found', 'wl-test-theme' ),
		'back_to_items'     => esc_html__( 'Back to Manufacturers', 'wl-test-theme' ),
		'menu_name'         => esc_html__( 'Manufacturer', 'wl-test-theme' ),
	);

	$taxonomy_manufacturers_args = array(
		'hierarchical' => true,
		'labels' => $taxonomy_manufacturers_labels,
		'show_ui' => true,
		'rewrite' => array('slug' => 'manufacturers'),
		'query_var' => true,
		'show_in_rest' => true
	);

	register_taxonomy('manufacturers', array('cars'), $taxonomy_manufacturers_args);

	$labels = array(
		'name'                  => esc_html_x( 'Cars', 'Post type general name', 'wl-test-theme' ),
		'singular_name'         => esc_html_x( 'Cars', 'Post type singular name', 'wl-test-theme' ),
		'menu_name'             => esc_html_x( 'Cars', 'Admin Menu text', 'wl-test-theme' ),
		'name_admin_bar'        => esc_html_x( 'Cars', 'Add New on Toolbar', 'wl-test-theme' ),
		'add_new'               => esc_html__( 'Add Car', 'wl-test-theme' ),
		'add_new_item'          => esc_html__( 'Add New Cars', 'wl-test-theme' ),
		'new_item'              => esc_html__( 'New Cars', 'wl-test-theme' ),
		'edit_item'             => esc_html__( 'Edit Cars', 'wl-test-theme' ),
		'view_item'             => esc_html__( 'View Cars', 'wl-test-theme' ),
		'all_items'             => esc_html__( 'All Cars', 'wl-test-theme' ),
		'search_items'          => esc_html__( 'Search Cars', 'wl-test-theme' ),
		'parent_item_colon'     => esc_html__( 'Parent Cars:', 'wl-test-theme' ),
		'not_found'             => esc_html__( 'No Cars found.', 'wl-test-theme' ),
		'not_found_in_trash'    => esc_html__( 'No Cars found in Trash.', 'wl-test-theme' )
	);

	$args = array(
		'label' => esc_html__('Cars', 'wl-test-theme'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'page-attributes'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'has_archive'        => true,
		'menu_position'		 => 100,
		'hierarchical' 	 	 => true,
		'rewrite' 			 => array('slug' => 'cars'),
		'show_in_rest'       => true,

	);

	register_post_type('cars', $args);	
}
add_action('init', 'wt_register_post_type');

function wt_rewrite_rules(){
	wt_register_post_type();
	flush_rewrite_rules();
}
add_action('after_switch_theme','wt_rewrite_rules');


function wt_add_metabox(){
    add_meta_box('car_metabox', esc_html__('Cars Settings', 'wl-test-theme'), 'wt_cars_metabox_html', 'cars', 'normal', 'high');
}
add_action('add_meta_boxes', 'wt_add_metabox');

function wt_cars_metabox_html($post){

    $car_price = get_post_meta($post->ID, 'car_price', true);
    $car_power = get_post_meta($post->ID, 'car_power', true);
    $car_fuel = get_post_meta($post->ID, 'car_fuel', true);

    wp_nonce_field('wtrandomstring', '_carmetabox');

	wp_nonce_field( basename( __FILE__ ), 'color_picker_nonce' );

    $color = get_post_meta( $post->ID, 'color', true );

    ?>
	<p>
		<label for="color"><?php esc_html_e('Car Color', 'wl-test-theme') ?></label>
		<input id="color" type="color" name="color" class="color-picker" value="<?php echo esc_attr( $color ); ?>" />
	</p>
    <p>
        <label for="car_price"><?php esc_html_e('Car Price', 'wl-test-theme') ?></label>
        <input type="text" id="car_price" name="car_price" value="<?php echo esc_attr($car_price); ?>">
    </p>
	<p>
        <label for="car_power"><?php esc_html_e('Car Power', 'wl-test-theme') ?></label>
        <input type="text" id="car_power" name="car_power" value="<?php echo esc_attr($car_power); ?>">
    </p>

    <p>
        <label for="car_fuel"><?php esc_html_e('Car Fuel', 'wl-test-theme') ?></label>
        <select id="car_fuel" name="car_fuel">
            <option value=""> Select Fuel</option>
            <option value="95" <?php if($car_fuel === '95'){ echo 'selected'; }?> >95</option>
            <option value="92" <?php if($car_fuel === '92'){ echo 'selected'; }?>>92</option>
        </select>
    </p>
    <?php
}

function wt_save_metabox($post_id, $post){

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return $post_id;
    }

    if($post->post_type !='cars'){
        return $post_id;  
    }

    $post_type = get_post_type_object($post->post_type);
    if(!current_user_can($post_type->cap->edit_post, $post_id)){
        return $post_id; 
    }

    if(isset($_POST['color'])){
        update_post_meta($post_id, 'color', sanitize_text_field($_POST['color']));
    } else{
        delete_post_meta($post_id, 'color');
    }

	if(isset($_POST['car_price'])){
        update_post_meta($post_id, 'car_price', sanitize_text_field($_POST['car_price']));
    } else{
        delete_post_meta($post_id, 'car_price');
    }

	if(isset($_POST['car_power'])){
        update_post_meta($post_id, 'car_power', sanitize_text_field($_POST['car_power']));
    } else{
        delete_post_meta($post_id, 'car_power');
    }

    if(isset($_POST['car_fuel'])){
        update_post_meta($post_id, 'car_fuel', sanitize_text_field($_POST['car_fuel']));
    } else{
        delete_post_meta($post_id, 'car_fuel');
    }
    return $post_id;
}
add_action('save_post', 'wt_save_metabox', 10, 2);

function wt_customizer_add_new_field( $wp_customize ) {
	$wp_customize->add_section( 'telephone', array(
	   'title'       => __( 'Telephone', 'wl-test-theme' ),
	   'priority'    => 30,
	) );
 
	$wp_customize->add_setting( 'telephone', array(
	   'default'           => '',
	   'sanitize_callback' => 'sanitize_text_field',
	) );
 
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'telephone', array(
	   'label'    => __( 'Telephone', 'wl-test-theme' ),
	   'section'  => 'telephone',
	   'settings' => 'telephone',
	   'priority' => 10,
	   'type'     => 'text'
	) ) );
}
add_action( 'customize_register', 'wt_customizer_add_new_field' );


function wt_shortcode_function( $atts ) {
    $args = array(
		'post_type' => 'cars',
		'posts_per_page' => 10,
		'orderby' => 'date',
		'order' => 'DESC',
	);
	
	$query = new WP_Query( $args );
	
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'template-parts/content-cars', get_post_type() );
		}
	} else {
		get_template_part( 'template-parts/content', 'none' );
	}
	
	wp_reset_postdata();
}
add_shortcode( 'wt_shortcode', 'wt_shortcode_function' );