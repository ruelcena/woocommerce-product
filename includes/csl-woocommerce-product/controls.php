<?php

/**
 * Element Controls: Woocommerce Product
 */

//Get Woocommerce product
if ( $posts = get_posts( ['post_type' => 'product', 'post_status' => 'publish'] )) {
	foreach( $posts as $post ) {
	$products[] = [ 'value' => $post->ID, 'label' => __( $post->post_title, 'cs-wc-product' ) ];
	}
} else {
	$products[] = [ 'value' => 0, 'label' => __( 'No Products Lists', 'cs-wc-product' ) ];	
}

return array(

	// Product
	// Todo: change type into autocomplete to avoid product list overload
	'product_id' => array(
		'type'    => 'select',		
		'ui'      => array(
			'title'   => __( 'Products', 'cs-wc-product' )			
		),
		'options' => array(
			'choices' => $products
		),
	),	

	//Product Name Font size
	'name_font_size' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Product Name Font Size', 'cs-wc-product' ),
			'tooltip' => __( 'Set the font size of the product name.', 'cs-wc-product' ),
		)
	),	

	//Fontsize
	'price_font_size' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Product Price Font Size', 'cs-wc-product' ),
			'tooltip' => __( 'Set the font size of the product price.', 'cs-wc-product' ),
		)
	),

	//Button Font Color
	'button_font_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Button Font Color', 'cs-wc-product'),
        ),
        'suggest' => __('#ffffff', 'cs-wc-product'),
	),

	//Button Background Color
	'button_bg_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Button Background Color', 'cs-wc-product'),
        ),
        'suggest' => __('#96588a', 'cs-wc-product'),
	),	

	//Image Width
	'image_width' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __('Image Width', 'cs-wc-product'),
		)
	),	

	//Image Height
	'image_height' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __('Image Height', 'cs-wc-product'),
		)
	),
	
	//Product orientation display
	'orientation' => array(
		'type' => 'choose',
		'ui' => array(
		'title' => __( 'Orientation', 'cs-wc-product' ),
      	'tooltip' => __( 'Choose to display the heading vertically or horizonatally', 'cs-wc-product' ),
      	'divider' => true
		),
		'options' => array(
		'divider' => true,
      	'columns' => '2',
      	'choices' => array(
        array( 'value' => 'vertical',   'tooltip' => __( 'Vertical', 'cs-wc-product' ),   'icon' => fa_entity( 'arrows-v' ) ),
        array( 'value' => 'horizontal', 'tooltip' => __( 'Horizontal', 'cs-wc-product' ), 'icon' => fa_entity( 'arrows-h' ) ),
      )
    )
  ),

  //Box shadow style on/off
  'box_shadow' => array(
	'type'    => 'toggle',
	'ui' => array(
		'title'   => __( 'Box Shadow', 'cs-wc-product' ),
		'tooltip' => __( 'Box shadow style.', 'cs-wc-product' ),
	),
),
	

);
