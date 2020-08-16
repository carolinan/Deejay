<?php
/**
 * The template for the shop, used by the WooCommerce plugin.
 *
 * @package Deejay
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php woocommerce_content(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
