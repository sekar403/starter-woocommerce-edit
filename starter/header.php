<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'starter' ); ?></a>

	<header id="masthead" class="site-header">




<div class="sz-logo">
                  <a href="<?php echo home_url(); ?>" >
                  <?php $custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
if (has_custom_logo())
{
    the_custom_logo();
}
else
{
    echo '<h1>' . get_bloginfo('name') . '</h1>';
    echo '<h5>' . bloginfo('description') . '</h5>';
}
?></a>
               </div>
		</header><!-- #masthead -->
		</div><!-- .site-branding -->
        <div class="sz-layer1">   
		<button class="brd-col navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContentXL" aria-controls="navbarSupportedContentXL" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars" aria-hidden="true"></i>
		</button>

		               <div class="container d-flex justify-content-between">
			   <div class="search-box">
                  <?php // sz_ajax_product_search(); ?>
               </div>
			<div class="sz-menu">
               <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="#"></a>
					
                  <?php
$args = array(
    'menu_class' => 'navbar-nav mr-auto',
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'navbarSupportedContentXL',
    'theme_location' => 'primary'
);
wp_nav_menu($args); ?>
               </nav>
			   
			</div>
			<div class="cartval">
       		<?php sz_store_cart_link(); ?>
			</div>
            </div>
						   </div>
