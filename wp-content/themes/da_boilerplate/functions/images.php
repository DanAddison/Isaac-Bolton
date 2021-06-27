<?php  
// Register image sizes and choose to crop (you can also pass parameters for where to crop from)
function da_boilerplate_register_image_sizes() {
  add_image_size( 'square', 300, 300, true );
 }

 add_action( 'after_setup_theme', 'da_boilerplate_register_image_sizes' );

 
// Add my custom image sizes to the drop-down in the Gutenberg image block
function da_boilerplate_custom_image_sizes_gb_block( $sizes ) {
  return array_merge( $sizes, array(
    
    //Add your custom sizes here
    'square' => __( 'Custom Square' ),
    ) );
  }
  add_filter( 'image_size_names_choose','da_boilerplate_custom_image_sizes_gb_block' );
    

// increase the image size threshold to 3000px
// (WP now scales down images that have either width or height greater than 2560px, so tall images can end up too small to satisfy the hero image width)
function da_boilerplate_big_image_size_threshold( $threshold ) {
  return 3000; // new threshold
}
add_filter('big_image_size_threshold', 'da_boilerplate_big_image_size_threshold', 999, 1);


// should I remove some default image sizes, now that WP creates 6 in total (or 7, for those that exceed the image threshold)?
// Or is it important to keep them all for src-set stuff?
// function da_boilerplate_disable_medium_large_images($sizes) {

// unset($sizes['medium_large']); // disable 768px size images
// unset($sizes['1536x1536']); // disable 2x medium-large size
// return $sizes;
	
// }
// add_filter('intermediate_image_sizes_advanced', 'da_boilerplate_disable_medium_large_images');