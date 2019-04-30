<?php
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{

    $parent_style = 'storefront';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('StoreFrontChild',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

// Retirer les badge de vente
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash()
{
    return false;
}

// Ajouter une side bar instagram

function insta_sidebar()
{
    register_sidebar(
        array(
            'name' => __('Custom', 'your-theme-domain'),
            'id' => 'insta-side-bar',
            'description' => __('Custom Sidebar', 'your-theme-domain'),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}

add_action('widgets_init', 'insta_sidebar');

// Retirer ajouter au panier de l'accueil
add_action('woocommerce_after_shop_loop_item', 'remove_loop_add_to_cart_on_home', 1);

function remove_loop_add_to_cart_on_home()
{
    if (is_front_page()) {
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    }
}

// Loop produits populaires de la page d'accueil
function storefront_popular_products($args)
{
    $args = apply_filters(
        'storefront_popular_products_args', array(
            'limit' => 5,
            'columns' => 5,
            'orderby' => 'rating',
            'order' => 'desc',
            'title' => __('Nos découvertes populaires', 'storefront'),
        )
    );

    $shortcode_content = storefront_do_shortcode(
        'products', apply_filters(
            'storefront_popular_products_shortcode_args', array(
                'per_page' => intval($args['limit']),
                'columns' => intval($args['columns']),
                'orderby' => esc_attr($args['orderby']),
                'order' => esc_attr($args['order']),
            )
        )
    );

    /**
     * Only display the section if the shortcode returns products
     */
    if (false !== strpos($shortcode_content, 'product')) {
        echo '<section class="storefront-product-section storefront-popular-products" aria-label="' . esc_attr__('Popular Products', 'storefront') . '">';

        do_action('storefront_homepage_before_popular_products');

        echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';

        do_action('storefront_homepage_after_popular_products_title');

        echo $shortcode_content; // WPCS: XSS ok.

        do_action('storefront_homepage_after_popular_products');

        echo '</section>';
    }
}

function storefront_product_categories($args)
{
    $args = apply_filters(
        'storefront_product_categories_args', array(
            'limit' => 2,
            'columns' => 2,
            'child_categories' => 0,
            'orderby' => 'name',
            'title' => __('', 'storefront'),
        )
    );

    $shortcode_content = storefront_do_shortcode(
        'product_categories', apply_filters(
            'storefront_product_categories_shortcode_args', array(
                'number' => intval($args['limit']),
                'columns' => intval($args['columns']),
                'orderby' => esc_attr($args['orderby']),
                'parent' => esc_attr($args['child_categories']),
            )
        )
    );

    /**
     * Only display the section if the shortcode returns product categories
     */
    if (false !== strpos($shortcode_content, 'product-category')) {
        echo '<section class="storefront-product-section storefront-product-categories" aria-label="' . esc_attr__('Product Categories', 'storefront') . '">';

        do_action('storefront_homepage_before_product_categories');

        echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';

        do_action('storefront_homepage_after_product_categories_title');

        echo $shortcode_content; // WPCS: XSS ok.

        do_action('storefront_homepage_after_product_categories');

        echo '</section>';
    }
}

add_action('wp_head', 'initialisation');

function initialisation() {
    remove_action('storefront_header', 'storefront_site_branding', 20);
    remove_action('storefront_header', 'storefront_product_search', 40);
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper', 42);
    remove_action('storefront_header', 'storefront_primary_navigation', 50);
    remove_action('storefront_header', 'storefront_header_cart', 60);
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper_close', 68);
    remove_action('storefront_loop_post', 'storefront_post_header', 10);
	remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action('storefront_header', 'storefront_primary_navigation', 20);
    add_action('storefront_header', 'storefront_site_branding', 21);
	add_action('storefront_header', 'connect_button', 22);
}

// afficher un lien de connection dans le menu

function connect_button() {
    if (is_user_logged_in()) {
        echo '
		<ul class="custom-nav flex">
		<li>
				<a id="btnMenu" href="#">
				<i class="fas fa-bars icons"></i>
				</a>
			</li>
			<li>
				<a href="./?page_id=451">
				<i class="fas fa-user-circle icons"></i>
				Mon compte</a>
			</li>
			<li>
				<a href="./?page_id=79">
					<i class="fas fa-shopping-cart icons"></i>
				</a>
            </li>
            <li>
				<a id="btnRechercher" href="#">
					<i class="fas fa-search icons"></i>
				</a>
			</li>
		</ul>';
    } else {
        echo '
		<ul class="custom-nav flex">
		<li>
				<a id="btnMenu" href="#">
				<i class="fas fa-bars icons"></i>
				</a>
			</li>
			<li>
				<a href="./?page_id=451">
				<i class="fas fa-user-circle icons"></i>
				Se connecter</a>
			</li>
			<li>
				<a href="./?page_id=79">
					<i class="fas fa-shopping-cart icons"></i>
				</a>
            </li>
            <li>
				<a id="btnRechercher" href="#">
					<i class="fas fa-search icons"></i>
				</a>
			</li>
		</ul>';
    }
}

// cacher le drop down cart

add_filter('woocommerce_widget_cart_is_hidden', '__return_true');

// retirer information complémentaires

add_filter('woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 98);

function bbloomer_remove_product_tabs($tabs)
{
    unset($tabs['additional_information']);
    return $tabs;
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

//  retirer les produits apparenté

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// aimerez aussi

add_filter('woocommerce_upsell_display_args', 'custom_woocommerce_upsell_display_args');

function custom_woocommerce_upsell_display_args($args)
{
    $args['columns'] = 5;
    return $args;
}

// Change le nombre d'item par row à 5

function loop_columns()
{
    return 5; // 5 products per row
}

add_filter('loop_shop_columns', 'loop_columns', 999);

// function du modal de la size chart

function sizechart()
{
    echo
        '<a id="size_guide" href="#link-to-size-guide" title="Size Guide">Guide des tailles</a><div id="myModal" class="modal">
		  <div class="modal-content">
			<span class="close">&times;</span>
			<div><img src="http://34.66.133.45/wp-content/uploads/size-chart.jpg" alt="size-chart"></img></div>
		  </div>
		</div>';
}

// function du modal de connection


function connection()
{
    echo '<a id="connect" href="#link-to-connect" title="Connection>Se connecter</a>';
}

// function du modal d'inscription

add_action('woocommerce_after_add_to_cart_form', 'sizechart');

// thumbnail size

add_theme_support('post-thumbnails');

if (has_post_thumbnail()) {
    the_post_thumbnail('photo');
}

add_image_size('photo', 200, 250, true);

// En stock / Rupture 
 
add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
   global $product;
 
   // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('En stock', 'woocommerce');
    }
 
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
    	$availability['availability'] = __('Rupture de stock', 'woocommerce');
    }
 
    return $availability;
}

// remove the custom wpbakery edit link in the front-end editor

function vc_remove_wp_admin_bar_button() {
  remove_action( 'admin_bar_menu', array( vc_frontend_editor(), 'adminBarEditLink' ), 1000 );
}
function vc_remove_frontend_links() {
  vc_disable_frontend(); // this will disable frontend editor
}
add_action( 'vc_after_init', 'vc_remove_frontend_links' );
add_action( 'vc_after_init', 'vc_remove_frontend_links' );
add_action( 'vc_after_init', 'vc_remove_wp_admin_bar_button' );


if ( ! function_exists( 'rechercher' ) ) {
	function rechercher() {
		echo '
		<div id="rechercher" style="display: none">
			<div class="widget woocommerce widget_product_search">
				<form role="search" method="get" class="woocommerce-product-search" action="http://34.66.133.45/">
					<input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Recherche de produits…" value="" name="s">
					<button type="submit" value="Recherche">Recherche</button>
					<input type="hidden" name="post_type" value="product">
				</form>
				</div>			
			</div>';
	}
}

add_action( 'recherche','rechercher' );