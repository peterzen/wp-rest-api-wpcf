<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.prioritylane.com
 * @since             0.0.1
 * @package           Wp_Rest_Api_Wpcf
 *
 * @wordpress-plugin
 * Plugin Name:       WP REST Custom Fields
 * Plugin URI:        https://github.com/peterzen/wp-rest-api-wpcf
 * Description:       Expose custom post fields via the WP REST API.
 * Version:           1.0.0
 * Author:            Peter Banik
 * Author URI:        http://www.prioritylane.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-rest-api-wpcf
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


function _add_custom_post_data() {
    register_api_field('post',
        'wpcf',
        array(
            'get_callback' => '_get_custom_field_value',
            'schema' => array(
                                'description' => 'Custom post fields',
                                'type' => 'string',
                                'context' => array('view')
                            )
        )
    );
}

 
add_action('rest_api_init', '_add_custom_post_data');
 
function _get_custom_field_value($post, $field_name, $request) {
	$all_post_custom = get_post_custom($post->id);
	$post_custom = array();
	foreach($all_post_custom as $key => $value){
		if(strpos($key, '_') !== 0){
			$field = str_replace('wpcf-', '', $key);
		  $post_custom[$field] = (count($value) == 1 ? $value[0] : $value);
		}
	}
	return  $post_custom;
}



