<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>

<div class="grtr_product_price_desktops">

    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    
        <p itemprop="price" class="price"><?php echo $product->get_price_html(); ?> 
          <p class="my-custom-counter"><?php echo do_shortcode('[otw_is sidebar=otw-sidebar-2]');?></p>
    
        <meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
        <link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
    
    </div>

</div>