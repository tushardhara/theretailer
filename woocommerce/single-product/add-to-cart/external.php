<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

global $theretailer_theme_options;

$my_regular_price = get_post_meta(get_the_ID(), '_regular_price', true);

$my_sale_price = get_post_meta(get_the_ID(), '_sale_price', true);

$my_curency = get_woocommerce_currency_symbol();

$my_percentage = round(( ( $my_regular_price - $my_sale_price ) / $my_regular_price ) * 100);
?>

<?php if ((!$theretailer_theme_options['catalog_mode']) || ($theretailer_theme_options['catalog_mode'] == 0)) { ?>

    <?php do_action('woocommerce_before_add_to_cart_button'); ?>

    <p class="cart">
        <input alt="#TB_inline?height=350&amp;width=400&amp;inlineId=examplePopup1" title="Secure Checkout..." class="thickbox single_add_to_cart_button button alt" type="button" value="<?php echo $button_text; ?>" />
    </p>

    <div id="examplePopup1" style="display:none">
        <h1><?php the_title(); ?></h1>
        <div style="float:left;padding:10px;">
            <?php if (has_post_thumbnail()) : ?>
                <div class="button"><div itemprop="image"><?php echo get_the_post_thumbnail($post->ID, 'shop_thumbnail') ?></div></div>
            <?php endif; ?>
        </div>
        <div class="my-modal-description">
            <p class="my-discount-percentage"><del><span class="my-amount"><?php echo $my_curency . $my_regular_price; ?></span></del><span class="prev-text-part">With</span><span class="percentage-part"><?php echo $my_percentage . '%'; ?></span><span class="next-part">OFF</span></p>
            <p class="deals-price"><span class="my-sale-price"><?php echo $my_sale_price . $my_curency ; ?></span></p>
            <div class="convinved-para">
                <p>You will be redirected to Secure Payment Gateway to carry out Transaction </p>
            </div>
        </div>
        <div class="my-modal-button">
          <p><span class="verisign-secured"><img src="/wp-content/uploads/2014/05/verisign-secured.jpg" title="Secure Payment Gateway" alt="secured payment gateway"/></span><span class="click-here-button"><a href="<?php echo esc_url($product_url); ?>" rel="nofollow" class="my-click-here-button">Buy Now</a></span></p>
      </div>
    </div>

    <?php do_action('woocommerce_after_add_to_cart_button'); ?>

<?php } ?>