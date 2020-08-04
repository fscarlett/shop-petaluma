<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shop_Petaluma
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165959171-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-165959171-1');
	</script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shop-petaluma' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="topbar">
			<div class="topbar-container container">

				<div class="socials">
					<!-- <ul>
						<li><a href="https://www.facebook.com" target="_blank" rel="noreferrer"><i class="fa fa-facebook-square"></i></a></li>
						<li><a href="https://www.twitter.com" target="_blank" rel="noreferrer"><i class="fa fa-twitter-square"></i></a></li>
						<li><a href="https://www.instagram.com" target="_blank" rel="noreferrer"><i class="fa fa-instagram"></i></a></li>
					</ul> -->
					<!-- <a href="https://www.facebook.com" target="_blank" rel="noreferrer"><i class="fa fa-facebook-square"></i></a> -->
					<!-- <a href="https://www.twitter.com" target="_blank" rel="noreferrer"><i class="fa fa-twitter-square"></i></a> -->
					<a href="https://www.instagram.com/shoppetaluma/" target="_blank" rel="noreferrer"><i class="fa fa-instagram"></i></a>
				</div>

			</div>
		</div>

		<div class="main-header container">

			<div class="site-branding">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/ShopPetaluma_Logo_M3.svg" alt="Shop Petaluma logo" class="manual-logo">
				</a>

				<!-- <?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$shop_petaluma_description = get_bloginfo( 'description', 'display' );
				if ( $shop_petaluma_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $shop_petaluma_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?> -->
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i><?php // esc_html_e( 'Menu', 'shop-petaluma' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>

			<?php get_search_form(); ?>

			</nav><!-- #site-navigation -->

		</div>

		<div class="search-wrapper">
			<?php get_search_form(); ?>
			
		</div>
	</header><!-- #masthead -->
