<?php
/**
 * Shortcode: Woocommerce Product
 */

//Check woocommerce if loaded
if ( defined( 'WC_PLUGIN_FILE') ) {

//Get product
//$product_id = 13;//testing
$productFactory = new WC_Product_Factory;
$product = $productFactory->get_product($product_id);

//Set a product url
$product_slug = site_url( 'shop/' . $product->get_slug() );

//Add to cart url
$add_to_cart_url = $product->add_to_cart_url();

//Add to cart text
$add_to_cart_text = $product->add_to_cart_text();

//Get currency symbol
$currency = get_woocommerce_currency_symbol();

//Product image
$product_image = wp_get_attachment_url( $product->get_image_id() );

//Added css class
$class = "csl-wc-product csl-wc-$orientation " . $class;

?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class ) ); ?>>

  <div class="csl-wc-entry-featured">
    
    <a href="<?php echo $product_slug;?>">

      <img height="300" style="width:<?php echo $image_width;?>px" src="<?php echo $product_image;?>" class="wp-post-image" alt="">

    </a>

    <div class="csl-view-more">
      <a href="<?php echo $product_slug;?>">View More</a>
    </div>

  </div>

  <div class="csl-wc-entry-wrap">
    
  <header class="csl-wc-entry-header">
    
    <h3 class="csl-wc-title"><a href="<?php echo $product_slug;?>"><?php echo $product->get_name();;?></a></h3>

    <div class="csl-wc-price" style="font-size: <?php echo $price_font_size;?>px;">
      <ins><span class="csl-wc-amount"><span class="csl-wc-current-symbol"><?php echo $currency;?></span><?php echo $product->get_price();?></span></ins>    
    </div>

    <div class="csl-wc-cart-button">
    <a rel="nofollow" href="<?php echo $add_to_cart_url;?>" data-quantity="1" data-product_id="<?php echo $product_id;?>" data-product_sku="" class="csl-wc-button csl-wc-addtocart" style="color: <?php echo $button_font_color;?>"><?php echo $add_to_cart_text;?></a>
    </div>
    

  </header>

  </div>

</div>

<?php
  } else {
?>
<div class="csl-wc-product">No Woocommerce is activated.</div>
<?php } ?>