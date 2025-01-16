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

   if (has_category('Tech Noir') || has_category('tech-noir') && is_archive()) {      
      preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $image);
      if($image){
         $image = $image[0];
      } else {
         $image = '';
      }
      $content = $image . get_the_excerpt();

      return $content;
   }
   else {
      return $content;
   }
}


add_filter('the_content', 'ds_noir_chopper', 200);
