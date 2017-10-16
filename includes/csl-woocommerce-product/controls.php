<?php

/**
 * Element Controls: Woocommerce Product
 */

$args = array(		
	'post_type'        => 'product',	
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts = get_posts( $args );

$_products = [];
foreach( $posts as $post ) {
	$_products[] = [ 'value' => $post->ID, 'label' => __( $post->post_title, 'cs-wc-product' ) ];
}


return array(

	// Name
	'product_id' => array(
		'type'    => 'select',
		'ui'      => array(
			'title'   => __( 'Products', 'cs-wc-product' )
		),
		'options' => array(
			'choices' => $_products
		),
	),	

	//Fontsize
	'price_font_size' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Price Font Size', 'cs-wc-product' ),
			'tooltip' => __( 'Set the font size of the product name (e.g. 12px or 1em).', 'cs-wc-product' ),
		)
	),

	'button_font_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Button Font Color', 'cs-wc-product'),
        ),
        'suggest' => __('#ffffff', 'cs-wc-product'),
	),
	
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

  'image_width' => array(
	'type' => 'text',
	'ui' => array(
		'title' => __('Image Width', 'cs-wc-product'),
	)
	),
	

);
