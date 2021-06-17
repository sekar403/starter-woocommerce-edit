<?php
/**
 * starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starter
 */
 
 
 // ------------------------------------------------------------------------------------------------
//----------------------------------------- Sekar Edit --------------------------------------------
//-------------------------------------------------------------------------------------------------
function sz_theme_scripts() {
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), true);
}
add_action( 'wp_enqueue_scripts', 'sz_theme_scripts' );

//menu creation
add_action( 'after_setup_theme', 'primary_setup' );
function primary_setup() {
	// Registering Navigation Menu
	register_nav_menus( array(
		'primary' => 'Primary Menu',
	) );
	// Add featured image support
	add_theme_support( 'post-thumbnails' );
}
/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );	

//woocommerce support
function sztheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' ); 
	add_theme_support( 'wc-product-gallery-lightbox' ); 
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'sztheme_add_woocommerce_support' );

// ------------------------------------------------------------------------------------------------
//-----------------------------------------End - Sekar Edit --------------------------------------------
//-------------------------------------------------------------------
 
 
 
 

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'starter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function starter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on starter, use a find and replace
		 * to change 'starter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'starter', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'starter' ),
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
				'starter_custom_background_args',
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
add_action( 'after_setup_theme', 'starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'starter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'starter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function starter_scripts() {
	wp_enqueue_style( 'starter-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'starter-style', 'rtl', 'replace' );

	wp_enqueue_script( 'starter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

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
// ------------------------------------------------------------------------------------------------
//----------------------------------------- Sekar Edit --------------------------------------------
//-------------------------------------------------------------------------------------------------


// Begin - Set Expert Length
function wp_example_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');


function custom_logo_setup() {
 $defaults = array(
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'custom_logo_setup' );


// -------------------- Begin HomePage  Section - 3-------------------------------------------
	class category_post_widget_four extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_post_widget_four() {
        parent::WP_Widget(false, $name = 'HomePage Section - 3');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
 
		$args = array(
			'number' 	=> $number,
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div class="widget-d1">
						<?php 
						// the query
						$the_query = new WP_Query( array( 'posts_per_page' => '3',
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="widget-link">
								<div class="home-img">
									<?php
									if ( has_post_thumbnail() ) {
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php 		
                                            }
									?>
								</div>
								<div class="home-m-title">
								<h5><?php the_title(); ?></h5>
								<p><?php echo the_excerpt(); ?></p>
								</div>
								</a>

							<?php endwhile; ?>
							<!-- end of the loop -->						 						 
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php
    }
} // end class category_post_widget_four
add_action('widgets_init', create_function('', 'return register_widget("category_post_widget_four");'));
// ----------------------------- End HomePage  Section - 3 -------------------------------------------

//========================= Begin product disp by category Widget =======================================
class WCPBC_Product_By_Category_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'wcpbc_products_by_category',
			__('Display New Products for WooCommerce', 'woo-products-by-category') ,
			array(
				'description' => __('List all products by a specific store category.', 'woo-products-by-category')
			));
		}

		function form($instance) {
			$posts = (isset($instance[ 'posts' ])) ? $instance['posts'] : '';
			$orderby = (isset($instance[ 'orderby' ])) ? $instance['orderby'] : '';
			$order = (isset($instance[ 'order' ])) ? $instance['order'] : '';
			$thumbs = (isset($instance[ 'thumbs' ])) ? $instance['thumbs'] : '';
			$hidden_p = (isset($instance[ 'hidden_p' ])) ? $instance['hidden_p'] : '';
			$oos_p = (isset($instance[ 'oos_p' ])) ? $instance['oos_p'] : '';

			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			}
			else {
				$title = __( 'Recent Products', 'woo-products-by-category' );
			}
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'woo-products-by-category' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e( 'Products Shown', 'woo-products-by-category' ) ?></label>
			<br/><small><?php _e( 'Leave blank to show all products.', 'woo-products-by-category' ) ?></small>
			<input class="widefat" type="number" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($posts); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e( 'Order By', 'woo-products-by-category' ) ?></label>
			<select class='widefat' id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
				<option value='post_title' <?php echo ($orderby == 'post_title') ? 'selected' : ''; ?>><?php _e( 'Product Name', 'woo-products-by-category' ) ?></option>
				<option value='id' <?php echo ($orderby == 'id') ? 'selected' : ''; ?>><?php _e( 'Product ID', 'woo-products-by-category' ) ?></option>
				<option value='date' <?php echo ($orderby == 'date') ? 'selected' : ''; ?>><?php _e( 'Date Published', 'woo-products-by-category' ) ?></option>
				<option value='modified' <?php echo ($orderby == 'modified') ? 'selected' : ''; ?>><?php _e( 'Last Modified', 'woo-products-by-category' ) ?></option>
				<option value='rand' <?php echo ($orderby == 'rand') ? 'selected' : ''; ?>><?php _e( 'Random', 'woo-products-by-category' ) ?></option>
				<option value='none' <?php echo ($orderby == 'none') ? 'selected' : ''; ?>><?php _e( 'None', 'woo-products-by-category' ) ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e( 'Order', 'woo-products-by-category' ) ?></label>
			<select class='widefat' id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>">
				<option value='ASC' <?php echo ($order == 'ASC') ? 'selected' : ''; ?>><?php _e( 'Ascending (A to Z)', 'woo-products-by-category' ) ?></option>
				<option value='DESC' <?php echo ($order == 'DESC') ? 'selected' : ''; ?>><?php _e( 'Descending (Z to A)', 'woo-products-by-category' ) ?></option>
			</select>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id( 'thumbs' ); ?>" name="<?php echo $this->get_field_name( 'thumbs' ); ?>" type="checkbox" value="1" <?php checked( $thumbs, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'thumbs' ); ?>"><?php _e( 'Show product thumbnails?', 'woo-products-by-category' ) ?></label>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id( 'hidden_p' ); ?>" name="<?php echo $this->get_field_name( 'hidden_p' ); ?>" type="checkbox" value="1" <?php checked( $hidden_p, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'hidden_p' ); ?>"><?php _e( 'Show Hidden products?', 'woo-products-by-category' ) ?></label>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id( 'oos_p' ); ?>" name="<?php echo $this->get_field_name( 'oos_p' ); ?>" type="checkbox" value="1" <?php checked( $oos_p, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'oos_p' ); ?>"><?php _e( 'Show Out Of Stock products?', 'woo-products-by-category' ) ?></label>
		</p>

		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posts'] = strip_tags($new_instance['posts']);
		$instance['orderby'] = strip_tags($new_instance['orderby']);
		$instance['order'] = strip_tags($new_instance['order']);
		$instance['thumbs'] = isset( $new_instance['thumbs'] ) ? 1 : false;
		$instance['hidden_p'] = isset( $new_instance['hidden_p'] ) ? 1 : false;
		$instance['oos_p'] = isset( $new_instance['oos_p'] ) ? 1 : false;

		return $instance;
	}

	function widget($args, $instance) {
		$title = apply_filters( 'widget_title', $instance['title'] );
?>
		<div class="widget woocommerce widget_products">
<?php		if ( !empty( $title )) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$defaults = array(
			'cat' => '',
			'posts' => '-1',
			'orderby' => 'date',
			'order' => 'DESC',
			'thumbs' => '',
			'hidden_p' => '',
			'oos_p' => '',
		);
		if (empty($instance['posts'])) {
			$instance['posts'] = $defaults['posts'];
		}

		if (empty($instance['orderby'])) {
			$instance['orderby'] = $defaults['orderby'];
		}

		if (empty($instance['order'])) {
			$instance['order'] = $defaults['order'];
		}

		?>
		<ul class="product_list_widget d-flex flex-wrap">
			<?php
			$arggs = array(
				'post_type' => 'product',
				'posts_per_page' => $instance['posts'],
				'orderby' => $instance['orderby'],
				'order' => $instance['order'],
			);
			$loop = new WP_Query($arggs);
			$show_hidden = ($instance['hidden_p'] == '1') ? true : false;
			$show_oos = ($instance['oos_p'] == '1') ? true : false;

			while ($loop->have_posts()):
				$loop->the_post();
				global $product;
				$show_hidden_product = true;
				$show_oos_product = true;

				if ( $show_hidden ) {
					if ( ! $product->is_visible()) {
						$show_hidden_product = true;
					}
				} else {
					if ( ! $product->is_visible()) {
						$show_hidden_product = false;
					}
				}

				if ( $show_oos ) {
					if ( ! $product->managing_stock() && ! $product->is_in_stock()) {
						$show_oos_product = true;
					}
				} else {
					if ( ! $product->managing_stock() && ! $product->is_in_stock()) {
						$show_oos_product = false;
					}
				}

				$output = '';
				if ($show_hidden_product && $show_oos_product) {
					$output .= wc_get_template( 'content-widget-product.php', $template_args );
				}
				echo $output;

			endwhile;
			wp_reset_query();
			?>
		</ul>
		<?php
		echo $args['after_widget'];
	}
}

function product_by_category_widget() {
	register_widget('WCPBC_Product_By_Category_Widget');
}

add_action('widgets_init', 'product_by_category_widget');
// ============================ End - product disp by category widget ===============================================
//========================= Begin product disp most sold by category Widget =======================================
class WCPBC_Product_By_sale_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'wcpbc_products_by_sale',
			__('Display Best selling Products for WooCommerce', 'woo-products-by-sale') ,
			array(
				'description' => __('List all best selling products.', 'woo-products-by-sale')
			));
		}

		function form($instance) {
			$posts = (isset($instance[ 'posts' ])) ? $instance['posts'] : '';
			$thumbs = (isset($instance[ 'thumbs' ])) ? $instance['thumbs'] : '';
			$hidden_p = (isset($instance[ 'hidden_p' ])) ? $instance['hidden_p'] : '';
			$oos_p = (isset($instance[ 'oos_p' ])) ? $instance['oos_p'] : '';

			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			}
			else {
				$title = __( 'Recent Products', 'woo-products-by-category' );
			}
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'woo-products-by-category' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e( 'Products Shown', 'woo-products-by-category' ) ?></label>
			<br/><small><?php _e( 'Leave blank to show all products.', 'woo-products-by-category' ) ?></small>
			<input class="widefat" type="number" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($posts); ?>">
		</p>
		<p>
			<input id="<?php echo $this->get_field_id( 'thumbs' ); ?>" name="<?php echo $this->get_field_name( 'thumbs' ); ?>" type="checkbox" value="1" <?php checked( $thumbs, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'thumbs' ); ?>"><?php _e( 'Show product thumbnails?', 'woo-products-by-category' ) ?></label>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id( 'hidden_p' ); ?>" name="<?php echo $this->get_field_name( 'hidden_p' ); ?>" type="checkbox" value="1" <?php checked( $hidden_p, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'hidden_p' ); ?>"><?php _e( 'Show Hidden products?', 'woo-products-by-category' ) ?></label>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id( 'oos_p' ); ?>" name="<?php echo $this->get_field_name( 'oos_p' ); ?>" type="checkbox" value="1" <?php checked( $oos_p, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'oos_p' ); ?>"><?php _e( 'Show Out Of Stock products?', 'woo-products-by-category' ) ?></label>
		</p>

		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posts'] = strip_tags($new_instance['posts']);
		$instance['thumbs'] = isset( $new_instance['thumbs'] ) ? 1 : false;
		$instance['hidden_p'] = isset( $new_instance['hidden_p'] ) ? 1 : false;
		$instance['oos_p'] = isset( $new_instance['oos_p'] ) ? 1 : false;

		return $instance;
	}

	function widget($args, $instance) {
		$title = apply_filters( 'widget_title', $instance['title'] );
?>
		<div class="widget woocommerce widget_products">
<?php		if ( !empty( $title )) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$defaults = array(
			'cat' => '',
			'posts' => '-1',
			'meta_key'       => 'total_sales',
			'orderby'        => 'meta_value_num',
			'order' => 'DESC',
			'thumbs' => '',
			'hidden_p' => '',
			'oos_p' => '',
		);
		if (empty($instance['posts'])) {
			$instance['posts'] = $defaults['posts'];
		}


		?>
		<ul class="product_list_widget d-flex flex-wrap">
			<?php
			$arggs = array(
				'post_type' => 'product',
				'posts_per_page' => $instance['posts'],
			);
			$loop = new WP_Query($arggs);
			$show_hidden = ($instance['hidden_p'] == '1') ? true : false;
			$show_oos = ($instance['oos_p'] == '1') ? true : false;

			while ($loop->have_posts()):
				$loop->the_post();
				global $product;
				$show_hidden_product = true;
				$show_oos_product = true;

				if ( $show_hidden ) {
					if ( ! $product->is_visible()) {
						$show_hidden_product = true;
					}
				} else {
					if ( ! $product->is_visible()) {
						$show_hidden_product = false;
					}
				}

				if ( $show_oos ) {
					if ( ! $product->managing_stock() && ! $product->is_in_stock()) {
						$show_oos_product = true;
					}
				} else {
					if ( ! $product->managing_stock() && ! $product->is_in_stock()) {
						$show_oos_product = false;
					}
				}

				$output = '';
				if ($show_hidden_product && $show_oos_product) {
					$output .= wc_get_template( 'content-widget-product.php', $template_args );
				}
				echo $output;

			endwhile;
			wp_reset_query();
			?>
		</ul>
		<?php
		echo $args['after_widget'];
	}
}

function product_by_sale_widget() {
	register_widget('WCPBC_Product_By_sale_Widget');
}

add_action('widgets_init', 'product_by_sale_widget');
// ============================ End - product disp best selling widget ===============================================

// ================================== Begin - Cart icon with count and total =============================================================


		if ( ! function_exists( 'sz_store_cart_link' ) ) {
		function sz_store_cart_link() { ?>			
				<a class="cart-contents wcmenucart-contents header_cart_main" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'sz-store' ); ?>">

<i class="fa fa-shopping-basket" aria-hidden="true"></i>

<div class="header_cart">
<div class="header-cart-txt">My cart</div>
<div class="cart-amt-sec"><span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span><span class="cart-quantity-1"><?php echo wp_kses_data( sprintf(  WC()->cart->get_cart_contents_count() ) ); ?></span></div>
</div>
				
					<!--<i class="fa fa-shopping-cart"></i> [ <?php// echo wp_kses_data( sprintf(  WC()->cart->get_cart_contents_count() ) ); ?> / <span class="amount"><?php //echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> ]-->
</a> 
			<?php
		}
	}

	if ( ! function_exists( 'sz_store_cart_link_fragment' ) ) {

		function sz_store_cart_link_fragment( $fragments ) {
			global $woocommerce;

			ob_start();
			sz_store_cart_link();
			$fragments['a.cart-contents'] = ob_get_clean();

			return $fragments;
		}
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'sz_store_cart_link_fragment' );
	
// ================================== End - Cart icon with count and total =============================================================
// Add Theme widgets	
function add_theme_widget() {
	register_sidebar( array(
        'name'          => __( 'Homepage Top Promo Widget Area - 1'),
        'id'            => 'sidebar-6',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle"><span>',
        'after_title'   => '</span></h2>',
    ) );

	register_sidebar( array(
        'name'          => __( 'Footer 1'),
        'id'            => 'sidebar-9',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle"><span>',
        'after_title'   => '</span></h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 4'),
        'id'            => 'sidebar-16',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle"><span>',
        'after_title'   => '</span></h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer - 2'),
        'id'            => 'sidebar-11',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle"><span>',
        'after_title'   => '</span></h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer - 3'),
        'id'            => 'sidebar-12',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle"><span>',
        'after_title'   => '</span></h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Home Full'),
        'id'            => 'sidebar-10',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle"><span>',
        'after_title'   => '</span></h2>',
    ) );	
}
add_action( 'widgets_init', 'add_theme_widget' );	