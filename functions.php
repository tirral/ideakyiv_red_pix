<?php
/**
 * ideakyiv functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ideakyiv
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ideakyiv_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ideakyiv_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ideakyiv, use a find and replace
		 * to change 'ideakyiv' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ideakyiv', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'ideakyiv' ),
				'menu-2' => esc_html__( 'Footer', 'ideakyiv' ),
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
				'ideakyiv_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'ideakyiv_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ideakyiv_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ideakyiv_content_width', 640 );
}
add_action( 'after_setup_theme', 'ideakyiv_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ideakyiv_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ideakyiv' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ideakyiv' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ideakyiv_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function ideakyiv_scripts() {
	wp_enqueue_style( 'ideakyiv-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ideakyiv-style', 'rtl', 'replace' );
	wp_enqueue_style('ideakyiv-bootstrapCSS', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.css', false, NULL, 'all');
  wp_enqueue_style('ideakyiv-swiperCSS', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.css', false, NULL, 'all');
  wp_enqueue_style('ideakyiv-slickCSS', get_template_directory_uri() . '/lib/slick/slick.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-animateCSS', get_template_directory_uri() . '/lib/animate-css/animate.min.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-headerCSS', get_template_directory_uri() . '/css/header.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-footerCSS', get_template_directory_uri() . '/css/footer.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-sitebarCSS', get_template_directory_uri() . '/css/sitebar.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-home_pageCSS', get_template_directory_uri() . '/css/home_page.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-product_cardCSS', get_template_directory_uri() . '/css/product_card.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-archive_productCSS', get_template_directory_uri() . '/css/archive_product.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-breadcrumbsCSS', get_template_directory_uri() . '/css/breadcrumbs.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-single_productCSS', get_template_directory_uri() . '/css/single_product.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-checkoutCSS', get_template_directory_uri() . '/css/checkout.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-about_usCSS', get_template_directory_uri() . '/css/about_us.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-stockCSS', get_template_directory_uri() . '/css/stock.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-warrantyCSS', get_template_directory_uri() . '/css/warranty.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-paymentCSS', get_template_directory_uri() . '/css/payment.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-contactsCSS', get_template_directory_uri() . '/css/contacts.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-favoritsCSS', get_template_directory_uri() . '/css/favorits.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-cabinet_orderCSS', get_template_directory_uri() . '/css/cabinet_order.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-cabinet_orderCSS', get_template_directory_uri() . '/css/cabinet_order.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-main_styleCSS', get_template_directory_uri() . '/css/main_style.css', false, NULL, 'all');
	wp_enqueue_style('ideakyiv-main_mobile_styleCSS', get_template_directory_uri() . '/css/main_mobile_style.css', false, NULL, 'all');



  wp_enqueue_script( 'ideakyiv-jquery-uiJS', get_template_directory_uri() . '/lib/jquery-ui/jquery-ui.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ideakyiv-modernizrJS', get_template_directory_uri() . '/lib/slick/modernizr.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ideakyiv-slickJS', get_template_directory_uri() . '/lib/slick/slick.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ideakyiv-wowJS', get_template_directory_uri() . '/lib/wow-js/wow.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'ideakyiv-swiperJS', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ideakyiv-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ideakyiv-bootstrapJS', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.js', array(), '20151215', true );
	wp_enqueue_script( 'ideakyiv-slim_notifierJS', get_template_directory_uri() . '/lib/slim_notifier/slim_notifier.js', array(), '20151215', true );
	wp_enqueue_script( 'ideakyiv-stocs-kinetikJS', get_template_directory_uri() . '/lib/stocs-timer/kinetic.js', array(), '20151215', true );
	wp_enqueue_script( 'ideakyiv-stocs-timerJS', get_template_directory_uri() . '/lib/stocs-timer/jquery.final-countdown.min.js', array(), '20151215', true );
	wp_enqueue_script( 'ideakyiv-cookieJS', get_template_directory_uri() . '/js/jquery.cookie.js', array(), 2010001, true );
	wp_enqueue_script( 'ideakyiv-warrantyJS', get_template_directory_uri() . '/js/warranty.js', array(), 2010001, true );
  wp_enqueue_script( 'ideakyiv-paymentJS', get_template_directory_uri() . '/js/payment.js', array(), 2010001, true );
	wp_enqueue_script( 'ideakyiv-checkoutJS', get_template_directory_uri() . '/js/checkout.js', array(), 2010001, true );

  $current_language = pll_current_language( 'slug' );
	if ($current_language == 'de'){
			wp_enqueue_script( 'ideakyiv-parse_geJS', get_template_directory_uri() . '/js/parse_de.js', array(), 2010001, true );
			wp_enqueue_script( 'ideakyiv-lang_de_fixJS', get_template_directory_uri() . '/js/lang_de_fix.js', array(), 2010001, true );
			wp_enqueue_script( 'ideakyiv-cabinetJS', get_template_directory_uri() . '/js/cabinet_de.js', array(), '20151215', true );
	}
	if ($current_language == 'en'){
			wp_enqueue_script( 'ideakyiv-parse_enJS', get_template_directory_uri() . '/js/parse_en.js', array(), 2010001, true );
			wp_enqueue_script( 'ideakyiv-lang_en_fixJS', get_template_directory_uri() . '/js/lang_en_fix.js', array(), 2010001, true );
		  wp_enqueue_script( 'ideakyiv-cabinetJS', get_template_directory_uri() . '/js/cabinet_en.js', array(), '20151215', true );
	}

  wp_enqueue_script( 'ideakyiv-stockJS', get_template_directory_uri() . '/js/stock.js', array(), 2010001, true );
  wp_enqueue_script( 'ideakyiv-footerJS', get_template_directory_uri() . '/js/footer.js', array(), 2010001, true );
	wp_enqueue_script( 'ideakyiv-single_productJS', get_template_directory_uri() . '/js/single_product.js', array(), 2010001, true );
	wp_enqueue_script( 'ideakyiv-archive_productJS', get_template_directory_uri() . '/js/archive_product.js', array(), 2010001, true );
	wp_enqueue_script( 'ideakyiv-mainJS', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );




	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ideakyiv_scripts' );



/**
 * Register custom post types
 */
require get_template_directory() . '/inc/custom-post-type/post-type-stock.php';

/**
 * Metaboxes for custom post types and pages
 */
require get_template_directory() . '/inc/metaboxes/homepage-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/about_us-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/warranty-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/payment-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/page_product-metaboxes.php';
require get_template_directory() . '/inc/metaboxes/stock-metaboxes.php';

/*
* Polileng strings translations
*/
	function ideakyiv_after_setup_theme(){
		if (function_exists('pll_register_string')) {
	  	pll_register_string('ideakyiv_string_1', 'Оформление заказа', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_2', 'Категории', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_3', 'Social network', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_4', 'Adress', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_5', 'Phone', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_7', 'ERROR', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_8', 'SORRY THE PAGE NOT FOUND', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_9', 'BACK TO HOME', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_10', 'Ваш заказ', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_11', 'на сумму', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_12', 'успешно оформлен.  Мы свяжемся с вами в ближайшее время для уточнения деталей оплаты и доставки', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_13', 'CATEGORIES', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_14', 'FILTER BY', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_15', 'Color', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_16', 'Price range', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_17', 'Finden Produkt', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_18', 'Suche', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_21', 'CONSULTATION', 'ideakyiv', false);
      pll_register_string('ideakyiv_string_22', 'Kabinett', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_23', 'Sales leaders', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_24', 'New items', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_25', 'REGISTRATION', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_26', 'LOGIN', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_27', 'Register', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_28', 'Enter your name', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_29', 'Enter password', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_30', 'Repeat password', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_31', 'Log in', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_32', 'Favorits', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_33', 'View', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_34', 'SORT BY', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_35', 'Personal Area', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_36', 'My orders', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_37', 'My coupons', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_38', 'Name', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_39', 'Date of Birth', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_40', 'Gender', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_41', 'Address', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_42', 'Telephone', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_43', 'Edit', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_44', 'Enter real name', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_45', 'Your picture', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_46', 'Date of birth', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_47', 'Your gender', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_48', 'female', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_49', 'Your address', 'ideakyiv', false);
			pll_register_string('ideakyiv_string_50', 'Edite data', 'ideakyiv', false);
		}
	}
add_action('after_setup_theme', 'ideakyiv_after_setup_theme');

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

// WOOCOMMERSE START
//  woocommerce init
add_theme_support( 'woocommerce' );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 4; // 3 products per row
	}
}

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 12;
  return $cols;
}



// add counter to basket
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start(); ?>
    <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
		<?php
    $fragments['.basket-btn__counter'] = ob_get_clean(); ?>
		<span class="basket-btn__total"><?php echo sprintf($woocommerce->cart->cart_contents_total); ?></span>
		 <?php
    $fragments['.basket-btn__total'] = ob_get_clean();
    return $fragments;
}

// Display  Max prices on page
add_filter( 'single_term_title', 'product_category_term_title_max', 10, 1 );
function product_category_term_title_max( $term_title ){
    if( ! (is_tax() && is_product_category() ) )
        return $term_title;
    $term = get_queried_object();
    global $wpdb;
    $results = $wpdb->get_col( "
        SELECT pm.meta_value
        FROM {$wpdb->prefix}term_relationships as tr
        INNER JOIN {$wpdb->prefix}term_taxonomy as tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        INNER JOIN {$wpdb->prefix}terms as t ON tr.term_taxonomy_id = t.term_id
        INNER JOIN {$wpdb->prefix}postmeta as pm ON tr.object_id = pm.post_id
        WHERE tt.taxonomy LIKE 'product_cat'
        AND t.term_id = {$term->term_id}
        AND pm.meta_key = '_price'
    ");
    sort($results, SORT_NUMERIC);
    $max = end($results);
    $price_range_max  =  wc_price( $max);
		return $price_range_max;
}

// Display  Min  prices on page
add_filter( 'single_term_title', 'product_category_term_title_min', 10, 1 );
function product_category_term_title_min( $term_title ){
    if( ! (is_tax() && is_product_category() ) )
    return $term_title;
    $term = get_queried_object();
    global $wpdb;
    $results = $wpdb->get_col( "
        SELECT pm.meta_value
        FROM {$wpdb->prefix}term_relationships as tr
        INNER JOIN {$wpdb->prefix}term_taxonomy as tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        INNER JOIN {$wpdb->prefix}terms as t ON tr.term_taxonomy_id = t.term_id
        INNER JOIN {$wpdb->prefix}postmeta as pm ON tr.object_id = pm.post_id
        WHERE tt.taxonomy LIKE 'product_cat'
        AND t.term_id = {$term->term_id}
        AND pm.meta_key = '_price'
    ");
    sort($results, SORT_NUMERIC);
    $min = current($results);
    $price_range_min  =  wc_price($min);
		return $price_range_min;
}







//remove WooCommerce breadcrumbs
add_action('template_redirect', 'remove_shop_breadcrumbs' );
function remove_shop_breadcrumbs(){
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}

// ADD CUSTOM HOOK
// add_action('woocommerce_single_product_summary',  'add_test_after_prise');
// function add_test_after_prise(){
// 	echo '<b> TEST TEST TEST TEST TEST</b>';
// }


// CHANGE STRUCTURE ACTION -- woocommerce_after_single_product_summary
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

// CHANGE STRUCTURE ACTION -- woocommerce_single_product_summary
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

add_action('woocommerce_single_product_summary',  'woocommerce_custom_wrapper_start' , 0);
function woocommerce_custom_wrapper_start(){

if($_COOKIE["cuctom_user_login"] == 'login'){
  global $product;
	global $wpdb;

	// GET ULIST FAVORITE PRODUCT ID START
	$cuctom_user_id =  $_COOKIE["cuctom_user_login_id"];
  $products_id = array();
  $results = $wpdb->get_results("SELECT *  FROM  custom_users_favourite WHERE user_id='$cuctom_user_id'");
	foreach ($results as $result) {
			array_push($products_id, $result->product_id);
	}
	// GET ULIST FAVORITE PRODUCT ID END

	echo '<div class="woocommerce_custom_wrapper_start">';
  echo '<ul class="single_product_btn"><li data-user_id="' . $_COOKIE["cuctom_user_login_id"] . '" data-product_id="'.$product->id.'">';
	// CHECK IF THE PRODUCT IS IN  FAVORITE AD WARIANT OF BUTTON START   -->
		if (in_array($product->id, $products_id)) {
			 echo '<div class="remowe_like_btn show_like_btn"></div>';
			 echo '<div class="like_btn hide_like_btn"></div>';
		} else {
			echo '<div class="like_btn show_like_btn"></div>';
			echo '<div class="remowe_like_btn hide_like_btn"></div>';
		}
  // CHECK IF THE PRODUCT IS IN  FAVORITE AD WARIANT OF BUTTON END  -->
echo '</li></ul>';

	} else {
			echo '<div class="woocommerce_custom_wrapper_start">';
	}
}

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15);

add_action('woocommerce_single_product_summary',  'woocommerce_product_tabs_header' , 15);
function woocommerce_product_tabs_header(){
	global $product;
	echo  '<span class="product_material">Material: ' . $product->get_attribute('pa_materials') . '</span>';
	echo '<span class="product_weight">Weight: ' . $product->weight . ' kg</span>';
}

add_action('woocommerce_single_product_summary',  'woocommerce_custom_wrapper_end' , 25);
function woocommerce_custom_wrapper_end(){
	echo '</div>';
}

add_action('woocommerce_single_product_summary',  'after_add_to_cart_new_content' , 35);
function after_add_to_cart_new_content(){
	echo '<div class="after_btn_info_wrapper">';
	echo '<div class="after_btn_info_element_1_container">';
	echo '<div class="after_btn_info_element_1_container_icon">';
	echo '</div>';
	echo '<div class="after_btn_info_element_1_container_text"> Von natürliche Materialien';
	echo '</div>';
	echo '</div>';
	echo '<div class="after_btn_info_element_2_container">';
	echo '<div class="after_btn_info_element_2_container_icon">';
	echo '</div>';
	echo '<div class="after_btn_info_element_2_container_text"> Versand kostenfrei';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

add_action('woocommerce_single_product_summary',  'after_add_to_cart_attribute_content' , 35);
function after_add_to_cart_attribute_content(){
	echo '<div class="attribute_content_wrapper">';
	echo '<div class="attribute_content_item_container">';

  global $product;
	$product_id = $product->id;

	echo '<h2 class="attribute_content_item_container_title">The weight</h2>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">The weight</div>';
	echo '<div class="attribute_content_item_container_single_content">'. $product->weight. 'kg</div>';
  echo '</div>';


	echo'<br>';

	echo '<h2 class="attribute_content_item_container_title">Product dimensions</h2>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">Product height</div>';
	echo '<div class="attribute_content_item_container_single_content">' . $product->height . 'cm</div>';
	echo '</div>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">Product width</div>';
	echo '<div class="attribute_content_item_container_single_content">' . $product->width . 'cm</div>';
	echo '</div>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">Product depth</div>';
	echo '<div class="attribute_content_item_container_single_content">' . $product->length . 'cm</div>';
	echo '</div>';

  echo'<br>';

	echo '<h2 class="attribute_content_item_container_title">Packing dimensions</h2>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">Packing height</div>';
	echo '<div class="attribute_content_item_container_single_content">' . get_post_meta( $product->id, 'product_packing_height', true ) . 'cm</div>';
  echo '</div>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">Packing width</div>';
	echo '<div class="attribute_content_item_container_single_content">' . get_post_meta( $product->id, 'product_packing_width', true ) . 'cm</div>';
	echo '</div>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">Packing depth</div>';
	echo '<div class="attribute_content_item_container_single_content">' . get_post_meta( $product->id, 'product_packing_depth', true ) . 'cm</div>';
	echo '</div>';



	echo'<br>';

	echo '<h2 class="attribute_content_item_container_title">Product packs number</h2>';
	echo '<div class="attribute_content_item_container_single">';
	echo '<div class="attribute_content_item_container_single_name">Product packs number</div>';
	echo '<div class="attribute_content_item_container_single_content">' . get_post_meta( $product->id, 'product_packs_number', true ) . '</div>';
	echo '</div>';

	echo '</div>';
	echo '</div>';
}


// ADD IMAGE THUMBNAIL FOR CUSTOM TABLE IN CUSTOM FOLDER START
function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){
  $target_path = $target_folder;
  $thumb_path = $thumb_folder;
  $filename_err = explode(".",$_FILES[$field_name]['name']);
  $filename_err_count = count($filename_err);
  $file_ext = $filename_err[$filename_err_count-1];
  if($file_name != ''){
      $fileName = $file_name.'.'.$file_ext;
  }else{
      $fileName = $_FILES[$field_name]['name'];
  }
  $upload_image = $target_path.$fileName;
  if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
  {
      if($thumb == TRUE)
      {
          $thumbnail = $thumb_path.$fileName;
          list($width,$height) = getimagesize($upload_image);
          $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
          switch($file_ext){
              case 'jpg':
                  $source = imagecreatefromjpeg($upload_image);
                  break;
              case 'jpeg':
                  $source = imagecreatefromjpeg($upload_image);
                  break;

              case 'png':
                  $source = imagecreatefrompng($upload_image);
                  break;
              case 'gif':
                  $source = imagecreatefromgif($upload_image);
                  break;
              default:
                  $source = imagecreatefromjpeg($upload_image);
          }
          imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
          switch($file_ext){
              case 'jpg' || 'jpeg':
                  imagejpeg($thumb_create,$thumbnail,100);
                  break;
              case 'png':
                  imagepng($thumb_create,$thumbnail,100);
                  break;

              case 'gif':
                  imagegif($thumb_create,$thumbnail,100);
                  break;
              default:
                  imagejpeg($thumb_create,$thumbnail,100);
          }
      }
      return $fileName;
  }
  else
  {
      return false;
  }
}
// ADD IMAGE THUMBNAIL FOR CUSTOM TABLE IN CUSTOM FOLDER END


// CHECK IF USER ALREADY ISSET START
function ajax_form_login_check_user(){
      global $wpdb;
			$user_login_name = $_POST['register_form_user_name'];
			$user_login_password= $_POST['register_form_user_pass'];

     	$results = $wpdb->get_results("SELECT id  FROM  custom_users WHERE user_name='$user_login_name' AND user_password='$user_login_password'");
			foreach ($results as $result) {
	        echo $result->id;
	    }
	    exit();
}
add_action( 'wp_ajax_ajax_form_login_check_user', 'ajax_form_login_check_user' );
add_action( 'wp_ajax_nopriv_ajax_form_login_check_user', 'ajax_form_login_check_user' );
// CHECK IF USER ALREADY ISSET END

// REGISTER FORM START INSERT TO TABLE START
function ajax_form_register_user(){
      global $wpdb;
      $wpdb->insert('custom_users' ,
          array(
						'user_name' => $_POST['register_form_user_name'],
						'user_password' => $_POST['register_form_user_pass'],
					),
          array( '%s')
      );
      // get new user id
			$new_user_id =  $wpdb->insert_id;
     // create new  empty user adittion table
			$wpdb->insert('custom_users_information' ,
          array(
						'information_user_id' => $new_user_id,
						'information_user_name' => 'unset',
						'information_user_date_of_birth' => 'unset',
						'information_user_img' => 'unset',
						'information_user_sex' => 'unset',
						'information_user_address' => 'unset',
						'information_user_telephone_1' => 'unset',
						'information_user_telephone_2' => 'unset',
						'information_user_email' => 'unset',
					),
          array( '%s')
      );
      exit(); //prevent 0 in the return
}
add_action( 'wp_ajax_ajax_form_register_user', 'ajax_form_register_user' );
add_action( 'wp_ajax_nopriv_ajax_form_register_user', 'ajax_form_register_user' );
// REGISTER FORM START INSERT TO TABLE END


// USER LOGIN TO ADMIN START
function ajax_form_login_user(){
      global $wpdb;
			$user_login_name = $_POST['login_form_user_name'];
			$user_login_password= $_POST['login_form_user_pass'];

     	$results = $wpdb->get_results("SELECT id  FROM  custom_users WHERE user_name='$user_login_name' AND user_password='$user_login_password'");
			foreach ($results as $result) {
	        echo $result->id;
	    }
	    exit();
}
add_action( 'wp_ajax_ajax_form_login_user', 'ajax_form_login_user' );
add_action( 'wp_ajax_nopriv_ajax_form_login_user', 'ajax_form_login_user' );
// USER LOGIN TO ADMIN STARTEND

// ADD TO FAVORITE START
function ajax_form_add_to_favourite(){
      global $wpdb;
      $wpdb->insert('custom_users_favourite' ,
          array(
						'user_id' => $_POST['add_to_favourite_user_id'],
						'product_id' => $_POST['add_to_favourite_product_id'],
					),
          array( '%s')
      );
      exit(); //prevent 0 in the return
}
add_action( 'wp_ajax_ajax_form_add_to_favourite', 'ajax_form_add_to_favourite' );
add_action( 'wp_ajax_nopriv_ajax_form_add_to_favourite', 'ajax_form_add_to_favourite' );
// ADD TO FAVORITE END

// REMOVE FROM FAVORITE START
function ajax_form_remove_from_favourite(){
      global $wpdb;
      $wpdb->delete('custom_users_favourite' ,
          array(
						'user_id' => $_POST['remove_from_favourite_user_id'],
						'product_id' => $_POST['remove_from_favourite_product_id'],
					),
          array( '%s')
      );
      exit(); //prevent 0 in the return
}
add_action( 'wp_ajax_ajax_form_remove_from_favourite', 'ajax_form_remove_from_favourite' );
add_action( 'wp_ajax_nopriv_ajax_form_remove_from_favourite', 'ajax_form_remove_from_favourite' );
// REMOVE FROM FAVORITE END

// ADD USER ORDER START
function ajax_form_add_user_order(){
      global $wpdb;
      $wpdb->insert('custom_users_orders' ,
          array(
						'order_user_id' => $_POST['add_order_user_id'],
						'order_order_id' => $_POST['add_order_order_id'],
					),
          array( '%s')
      );
      exit(); //prevent 0 in the return
}
add_action( 'wp_ajax_ajax_form_add_user_order', 'ajax_form_add_user_order' );
add_action( 'wp_ajax_nopriv_ajax_form_add_user_order', 'ajax_form_add_user_order' );
// ADD USER ORDER  END


// EDITE USER ADITION INFORMATION START
function profile_user_main_information(){
global $wpdb;
  if(isset($_POST['user_information_form_submite'])) {
		if(!empty($_FILES['user_information_form_user_img']['name'])){
			$uploadfile =  $_FILES['user_information_form_user_img']['name'];
			$uploadfile_filename =  preg_replace('/\\.[^.\\s]{3,4}$/', '', $uploadfile);
			$upload_img = cwUpload('user_information_form_user_img', dirname(__FILE__) . '/user-img/','',TRUE, dirname(__FILE__) . '/user-img/user-img-thumb/','200','200');
			$thumb_src = dirname(__FILE__) . '/user-img/user-img-thumb/'. $upload_img;
      } else {
        $thumb_src = '';
        $message = '';
    }

		$user_information_form_user_id = $_POST['user_information_form_user_id'];
		$user_information_form_user_name = $_POST['user_information_form_user_name'];
		$user_information_uploadfile =  $_FILES['user_information_form_user_img']['name'];
		$user_information_form_user_date_of_birth = $_POST['user_information_form_user_date_of_birth'];
		$user_information_form_user_sex = $_POST['user_information_form_user_sex'];
		$user_information_form_user_address = $_POST['user_information_form_user_address'];
		$user_information_form_user_telephone_1 = $_POST['user_information_form_user_telephone_1'];
		$user_information_form_user_telephone_2 = $_POST['user_information_form_user_telephone_2'];
		$user_information_form_user_email = $_POST['user_information_form_user_email'];
		$wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_name = %s  WHERE information_user_id = %s", $user_information_form_user_name, $user_information_form_user_id));

	  if(!empty($_FILES['user_information_form_user_img']['name'])) {
			$wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_img = %s  WHERE information_user_id = %s", $user_information_uploadfile, $user_information_form_user_id));
	  }

		$wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_date_of_birth = %s  WHERE information_user_id = %s", $user_information_form_user_date_of_birth, $user_information_form_user_id));
		$wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_sex = %s  WHERE information_user_id = %s", $user_information_form_user_sex, $user_information_form_user_id));
    $wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_address = %s  WHERE information_user_id = %s", $user_information_form_user_address, $user_information_form_user_id));
    $wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_telephone_1 = %s  WHERE information_user_id = %s", $user_information_form_user_telephone_1, $user_information_form_user_id));
    $wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_telephone_2 = %s  WHERE information_user_id = %s", $user_information_form_user_telephone_2, $user_information_form_user_id));
    $wpdb->query( $wpdb->prepare("UPDATE custom_users_information  SET information_user_email = %s  WHERE information_user_id = %s", $user_information_form_user_email, $user_information_form_user_id));
} ?>

<script type="text/javascript">
	document.location.href = 'http://tigall.red-pix.com/personal-area/?save_status=susses';
</script>

<?php
}
add_action( 'admin_post_nopriv_profile_user_main_information', 'profile_user_main_information' );
add_action( 'admin_post_profile_user_main_information', 'profile_user_main_information' );
// EDITE USER ADITION INFORMATION END


// CHANGE BUTTON NAME START
$current_language = pll_current_language( 'slug' );
	if ($current_language == 'de'){
		add_filter('woocommerce_product_single_add_to_cart_text','QL_customize_add_to_cart_button_woocommerce');
		function QL_customize_add_to_cart_button_woocommerce(){
			return __('Kaufen', 'woocommerce');
		}
		add_filter('woocommerce_product_add_to_cart_text','QL_customize_add_to_cart_button_woocommerce_2');
		function QL_customize_add_to_cart_button_woocommerce_2(){
			return __('Kaufen', 'woocommerce');
		}
	}
	if ($current_language == 'en'){
		add_filter('woocommerce_product_single_add_to_cart_text','QL_customize_add_to_cart_button_woocommerce');
		function QL_customize_add_to_cart_button_woocommerce(){
			return __('Buy', 'woocommerce');
		}
		add_filter('woocommerce_product_add_to_cart_text','QL_customize_add_to_cart_button_woocommerce_2');
		function QL_customize_add_to_cart_button_woocommerce_2(){
			return __('Buy', 'woocommerce');
		}
	}
 // CHANGE BUTTON NAME END




 // SHOW EMPTY RETING
 function ehi_woocommerce_template_single_excerpt() {
     echo '</a>';
     global $product;
     $rating = $product->get_average_rating();
     if ( $rating == 0 ) {
 			$rating_html  = '</a><a href="' . get_the_permalink() . '#respond"><div class="star-rating ehi-star-rating"><span style="width:' . (( $rating / 5 ) * 100) . '%"></span></div><span style="font-size: 0.857em;"><em><strong>' . $title . '</strong></em></span></a>';
 			echo $rating_html;
     }
     wc_get_template('single-product/short-description.php');
 }


 add_action('woocommerce_after_shop_loop_item_title','change_loop_ratings_location', 2 );
 function change_loop_ratings_location(){
     remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5 );
     add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 15 );
		 add_action('woocommerce_after_shop_loop_item_title','ehi_woocommerce_template_single_excerpt', 20 );
 }
