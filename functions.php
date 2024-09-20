<?php
/**
 * Interfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Interfolio
 */

if ( ! function_exists( 'interfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function interfolio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Interfolio, use a find and replace
		 * to change 'interfolio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'interfolio', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'interfolio' ),
			'menu-2' => esc_html__( 'Main Footer', 'interfolio'),
			'menu-3' => esc_html__( 'Secondary Footer', 'interfolio'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'interfolio_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Adds custom palette for block editor
		 */
		add_theme_support('editor-color-palette', [
			[
				'name' => __('Interfolio Red', 'interfolio'),
				'slug' => 'interfolio-red',
				'color' => '#FF6C00'
			],
			[
				'name' => __('Interfolio Dark Blue', 'interfolio'),
				'slug' => 'interfolio-dark-blue',
				'color' => '#032B43'
			],
			[
				'name' => __('Interfolio Light Blue', 'interfolio'),
				'slug' => 'interfolio-light-blue',
				'color' => '#4791C5'
			],
			[
				'name' => __('Interfolio Gray', 'interfolio'),
				'slug' => 'interfolio-gray',
				'color' => '#D6D6D6'
			],
			[
				'name' => __('Interfolio Yellow', 'interfolio'),
				'slug' => 'interfolio-yellow',
				'color' => '#FFBA08'
			],
			[
				'name' => __('Interfolio Black', 'interfolio'),
				'slug' => 'interfolio-black',
				'color' => '#181716'
			],
			[
				'name' => __('Interfolio White', 'interfolio'),
				'slug' => 'interfolio-white',
				'color' => '#FFFFFF'
			]
		]);

		/**
		 * Wide and Full Width Blocks
		 */
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'interfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function interfolio_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'interfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'interfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function interfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'interfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'interfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'interfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function interfolio_scripts() {
	// wp_enqueue_style( 'interfolio-style', get_stylesheet_uri() );
	// wp_enqueue_script( 'interfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'interfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style( 'interfolio-stylesheet', get_theme_file_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'interfolio-scripts', get_theme_file_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true );
	$number_of_params = get_option('number_of_marketo_params', 0);
	$marketoFieldsToPopulate = [];
	for($i = 0; $i < $number_of_params; $i++){
		$marketoFieldsToPopulate[] = [
			'utm_parameter' => get_option('utm_param_' . $i, ''),
			'marketo_field_name' => get_option('marketo_field_name_' . $i, '')
		];
	}
	wp_localize_script( 'interfolio-scripts', 'marketoFieldsToPopulate', $marketoFieldsToPopulate );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'interfolio_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function interfolio_admin_scripts() {
	wp_enqueue_script('font_awesome', 'https://kit.fontawesome.com/7425b7652a.js');
}
add_action( 'admin_enqueue_scripts', 'interfolio_admin_scripts' );

/**
 * Register Custom Nav Walker
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Filter Nav Menu for Custom Classes
 */
require get_template_directory() . '/inc/nav-menu-filter.php';

/**
 * Excerpt Length Filter
 */
require get_template_directory() . '/inc/excerpt-filter.php';

/**
 * Related Posts Filter
 */
require get_template_directory() . '/inc/related-post-filter.php';

/**
 * Social Media Sharing
 */
require get_template_directory() . '/inc/social-media-sharing.php';

/**
 * Register custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Register custom taxonomies
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Custom admin table columns
 */
require get_template_directory() . '/inc/admin-columns.php';

/**
 * Custom search response
 */
require get_template_directory() . '/inc/search-endpoint.php';

/**
 * Get post types and taxonomies for search filtering
 */
require get_template_directory() . '/inc/post-type-endpoint.php';

/**
 * Custom admin menu order
 */
require get_template_directory() . '/inc/custom-admin-menu-order.php';

/**
 * Custom options pages
 */
require get_template_directory() . '/inc/custom-option-pages.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/underscores/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/underscores/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/underscores/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/underscores/inc/jetpack.php';
}

function interfolio_get_navbar_actions(){
	return [
		'button' => '<a href="/demo/"><button class="interfolio-button has-interfolio-red-background-color">Get a Demo</button></a>',
		'login' => '<a href="https://account.interfolio.com/login">Log In</a>',
    'search' => '<button class="interfolio-search-button"><span><i class="fal fa-search" style="margin-right: 5px"></i>Search<span></button>'

	];
}

/**
 * Error Log function for Development, to be removed before production release
 */

if (!function_exists('write_log')) {
    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }
}

add_action('rest_api_init', 'register_rest_images' );
function register_rest_images(){
    register_rest_field(
		array(
			'post',
			'inf_open_position',
			'inf_team_member',
			'inf_resource_single',
			'inf_client_single',
			'inf_product_single',
			'inf_milestone',
			'inf_news_and_events'
		),
        'fimg_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}

function get_author_image($uid){
	$image_url = get_field('user_author_image', 'user_' . $uid);
	if($image_url){
		return $image_url;
	} else {
		return get_avatar_url($uid);
	}
}

function rest_get_custom_fields( $data, $post, $request ) {
	$taxonomy = $request->get_param('tax');
	$_data = $data->data;
	$fields = get_fields($post->ID);
	$_data['custom_fields'] = $fields;
	$_data['excerpt'] = get_the_excerpt($post->ID);
	$terms = $taxonomy ? get_the_terms($post->ID, $taxonomy) : [];
	$_data['term'] = !empty($terms) ? $terms[0]->name : '';
	$data->data = $_data;
	return $data;
  }
add_filter( 'rest_prepare_inf_team_member', 'rest_get_custom_fields', 10, 3 );
add_filter( 'rest_prepare_inf_open_position', 'rest_get_custom_fields', 10, 3 );
add_filter( 'rest_prepare_inf_resource_single', 'rest_get_custom_fields', 10, 3 );
add_filter( 'rest_prepare_inf_news_and_events', 'rest_get_custom_fields', 10, 3 );
add_filter( 'rest_prepare_inf_client_single', 'rest_get_custom_fields', 10, 3 );
add_filter( 'rest_prepare_inf_product_single', 'rest_get_custom_fields', 10, 3 );
add_filter( 'rest_prepare_inf_milestone', 'rest_get_custom_fields', 10, 3 );

function post_featured_orderby($vars, $req){
	$get_featured = $req->has_param('get_featured');
    if ($get_featured) {
		$vars["orderby"] = array(
			'meta_value_num' => 'DESC',
			'date' => 'DESC');
        $vars["meta_key"] = "is_featured";
	}
    return $vars;
}
add_filter( 'rest_inf_resource_single_query', 'post_featured_orderby', 10, 2);
add_filter( 'rest_inf_news_and_events_query', 'post_featured_orderby', 10, 2);

// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

add_filter('nav_menu_item_title', 'interfolio_add_menu_icon', 10, 4);

function interfolio_add_menu_icon($title, $item, $args, $depth){
	$icon = get_field('menu_item_icon', $item);
	if( $icon ) {
		$image = '<img class="menu-icon" src="' . $icon . '" />';
		return $image . $title;

	}else {
		return $title;
	}
}

add_action('save_post', function ($post_ID) {
    if((get_post_type($post_ID) == 'inf_resource_single' || get_post_type($post_ID) == 'inf_news_and_events' ) && !get_field('is_featured', $post_ID)){
		update_field('is_featured', 0, $post_ID);
	}
});

// Add Shortcode
function pardot_custom_form( $atts ) {

	// Attributes
	$atts = shortcode_atts( array(
		'url' => '',
	), $atts, 'form');

	$output = '';
	$output .='<noscript>';
	$output .= '<iframe src="' . $atts['url'] . '" width="100%" height="600" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>';
	$output .='</noscript>';

	$output .= '<script type="text/javascript">';
	$output .= 'var form = "' . $atts['url'] . '";';
	$output .= 'var params = window.location.search;';
	$output .= 'var thisScript = document.scripts[document.scripts.length - 1];';
	$output .= 'var iframe = document.createElement("iframe");';

	$output .= 'iframe.setAttribute("src", form + params);';
	$output .= 'iframe.setAttribute("width", "100%");';
	$output .= 'iframe.setAttribute("height", "600");';
	$output .= 'iframe.setAttribute("type", "text/html");';
	$output .= 'iframe.setAttribute("frameborder", 0);';
	$output .= 'iframe.setAttribute("allowTransparency", "true");';
	$output .= 'iframe.style.border = "0";';

	$output .= 'thisScript.parentElement.replaceChild(iframe, thisScript);';
	$output .= '</script>';

	return $output;

}

add_shortcode( 'form', 'pardot_custom_form' );

/**
 * Removing Default Post from admin menu
 */

add_action( 'admin_menu', 'remove_default_post_type' );
function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );
function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );
function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

/**
 * Removing Comments Support
 */

// Removes from admin menu
add_action( 'admin_menu', 'interfolio_remove_comment_page' );
function interfolio_remove_comment_page() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'interfolio_remove_comment_support', 100);
function interfolio_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

// Removes from admin bar
add_action( 'wp_before_admin_bar_render', 'interfolio_admin_bar_render' );
function interfolio_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

add_filter('pre_get_posts', 'filter_hidden_posts');
function filter_hidden_posts($query){
	if(!$query->is_admin && !$query->is_singular){
		$meta_query = [
			'relation' => 'OR',
			[
				'key' => 'is_hidden',
				'compare' => 'NOT EXISTS'
			],
			[
				'key' => 'is_hidden',
				'compare' => '!=',
				'value' => 1,
			],
		];
		$query->set('meta_query', $meta_query);
	}
}

function theme_pto_posts_orderby($ignore, $orderBy, $query)
	{
		if((! is_array($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'inf_news_and_events') || (! is_array($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'inf_resource_single')) {
			$ignore = TRUE;
			return $ignore;
		}else {
			return;
		}
	}
add_filter('pto/posts_orderby/ignore', 'theme_pto_posts_orderby', 10, 3);


add_filter( 'do_rocket_generate_caching_files', '__return_false', PHP_INT_MAX );
add_filter( 'rocket_set_wp_cache_constant', '__return_false', PHP_INT_MAX );
add_filter( 'rocket_generate_advanced_cache_file', '__return_false', PHP_INT_MAX );
