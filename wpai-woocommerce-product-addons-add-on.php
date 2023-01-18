<?php
/**
 * Plugin Name: WP All Import - WooCommerce Product Add-ons Add-On
 * Plugin URI: https://wordpress.org/plugins/wpai-woocommerce-product-addons-add-on/
 * Description: Import to WooCommerce Product Add-ons. Adds a section to WP All Import that looks just like WooCommerce. Requires WP All Import.
 * Author: Naiche
 * Author URI: https://profiles.wordpress.org/naiches/
 * Text Domain: wpai-woocommerce-product-addons-add-on
 * Version: 1.0.0
 */

include "rapid-addon.php";

$wpai_woocommerce_product_addons_addon = new RapidAddon('WooCommerce Product Add-ons Add-On', 'woocommerce_variations');


/**
 * Debugged serialized array
 */
// array(
//   'name' => '',                 // string - Title - `open input`
//   'title_format' => '',         // string - Format title - label,heading,hide
//   'description_enable' => '',   // int - Add description - 0,1
//   'description' => '',          // string - Description - `open input`
//   'type' => '',                 // string - Type - multiple_choice,checkbox,custom_text,custom_textarea,file_upload,custom_price,input_multiplier,heading
//   'description' => '',          // string - Description - `open input`
//   'display' => '',              // string - Display as - select,radiobutton,images
//   'position' => '',             // int - ??? - 0,1,2,3,etc
//   'required' => '',             // int - 	Required field - 0,1
//   'restrictions' => '',         // int - ??? - 0,1
//   'restrictions_type' => '',    // string - ??? - any_text,???
//   'adjust_price' => '',         // int - Adjust price - 0,1
//   'price_type' => '',           // string - Adjust price Expanded - flat_fee,quantity_based,percentage_based
//   'price' => '',                // string - ??? - ''
//   'min' => '',                  // decimal - ??? - 0
//   'max' => '',                  // decimal - ??? - 0
//   'id' => '',                   // int - ??? - random 10 ints
//   'options' => array(           // array - Options - array
//     array(
//       'label' => '',            // string - Label - `open input`
//       'price' => '',            // string - Price - `open input`
//       'image' => '',            // string - Image - `open input`
//       'price_type' => '',       // string - Price Type - flat_fee,quantity_based,percentage_based
//     )
//   )
// )




/**
 * Create fields
 * TODO: Make dynamic
 */
$wpai_woocommerce_product_addons_addon->add_options(
  $wpai_woocommerce_product_addons_addon->add_field('field_1_name', 'Field 1 Name', 'text', null, 'string - Title - `open input`'),
  'Options',
  array(
    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_1_label', 'Option 1 Label', 'text', null, 'string - Label - `open input`'),
    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_1_price', 'Option 1 Price', 'text', null, 'string - Price - `open input`'),
    
    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_2_label', 'Option 2 Label', 'text', null, 'string - Label - `open input`'),
    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_2_price', 'Option 2 Price', 'text', null, 'string - Price - `open input`'),

    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_3_label', 'Option 3 Label', 'text', null, 'string - Label - `open input`'),
    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_3_price', 'Option 3 Price', 'text', null, 'string - Price - `open input`'),

    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_4_label', 'Option 4 Label', 'text', null, 'string - Label - `open input`'),
    $wpai_woocommerce_product_addons_addon->add_field('field_1_option_4_price', 'Option 4 Price', 'text', null, 'string - Price - `open input`'),
  )
);



// Set import function
$wpai_woocommerce_product_addons_addon->set_import_function('woocommerce_variations_import_function');



// Import fucntion
function woocommerce_variations_import_function( $post_id, $data, $import_options ) {
  global $wpai_woocommerce_product_addons_addon;


  /**
   * Create random 10 integer string
   * https://stackoverflow.com/questions/4356289/php-random-string-generator
   */
  function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
  }


	// Complete array
	$product_product_addons = array();

  array_push($product_product_addons, 
    array(
      'name' => $data['field_1_name'],      // string - Title - `open input`
      'title_format' => 'label',            // string - Format title - label,heading,hide
      'description_enable' => 0,            // int - Add description - 0,1
      'description' => '',                  // string - Description - `open input`
      'type' => 'multiple_choice',          // string - Type - multiple_choice,checkbox,custom_text,custom_textarea,file_upload,custom_price,input_multiplier,heading
      'description' => '',                  // string - Description - `open input`
      'display' => 'select',                // string - Display as - select,radiobutton,images
      'position' => 0,                      // int - ??? - 0,1,2,3,etc
      'required' => 1,                      // int - 	Required field - 0,1
      'restrictions' => 0,                  // int - ??? - 0,1
      'restrictions_type' => 'any_text',    // string - ??? - any_text,???
      'adjust_price' => 0,                  // int - Adjust price - 0,1
      'price_type' => 'flat_fee',           // string - Adjust price Expanded - flat_fee,quantity_based,percentage_based
      'price' => '',                        // string - ??? - ''
      'min' => '',                          // decimal - ??? - 0
      'max' => '',                          // decimal - ??? - 0
      'id' => generateRandomString(),       // int - ??? - random 10 ints
      'options' => array(                   // array - Options - array
        array(
          'label' => $data['field_1_option_1_label'],     // string - Label - `open input`
          'price' => $data['field_1_option_1_price'],     // string - Price - `open input`
          'image' => '',                                  // string - Image - `open input`
          'price_type' => 'flat_fee',                     // string - Price Type - flat_fee,quantity_based,percentage_based
        ),
        array(
          'label' => $data['field_1_option_2_label'],     // string - Label - `open input`
          'price' => $data['field_1_option_2_price'],     // string - Price - `open input`
          'image' => '',                                  // string - Image - `open input`
          'price_type' => 'flat_fee',                     // string - Price Type - flat_fee,quantity_based,percentage_based
        ),
        array(
          'label' => $data['field_1_option_3_label'],     // string - Label - `open input`
          'price' => $data['field_1_option_3_price'],     // string - Price - `open input`
          'image' => '',                                  // string - Image - `open input`
          'price_type' => 'flat_fee',                     // string - Price Type - flat_fee,quantity_based,percentage_based
        ),
        array(
          'label' => $data['field_1_option_4_label'],     // string - Label - `open input`
          'price' => $data['field_1_option_4_price'],     // string - Price - `open input`
          'image' => '',                                  // string - Image - `open input`
          'price_type' => 'flat_fee',                     // string - Price Type - flat_fee,quantity_based,percentage_based
        ),
      )
    )
  );



	if ($wpai_woocommerce_product_addons_addon->can_update_meta('_pricing_rules', $import_options)) {
		update_post_meta($post_id, '_product_addons', $product_product_addons);
	}
  if ($wpai_woocommerce_product_addons_addon->can_update_meta('_product_addons', $import_options)) {
		update_post_meta($post_id, '_product_addons_exclude_global', '0');
	}
}

// Run the import function
$wpai_woocommerce_product_addons_addon->run();
