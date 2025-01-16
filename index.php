<?php 
/*
Plugin Name: Noir Chopper
Plugin URI:  https://github.com/
Description: For Jim Groom to assist with chopping noir. **Make sure you set the FWP settings to allow formatting filters!!
Version:     1.0
Author:      Tom Woodward
Author URI:  https://bionicteaching.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



function ds_noir_chopper($content){
   // Only run filter on single posts in main query

   if (has_category('Tech Noir') && is_archive()) {      
      $content = get_the_excerpt();
      return $content;
   }
   else {
      return $content;
   }
}

// Add our filter with a later priority (20) to ensure it runs after theme filters
remove_filter('the_content', 'ds_noir_chopper'); // Remove if exists
add_filter('the_content', 'ds_noir_chopper', 200);
