<?php
/**
 * Plugin Name:       WP test plugin
 * Plugin URI:        https://github.com/alenxmedia/wp-test-plugin
 * Description:       Learning to develop WP plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

  function test_plugin_example_function()
  {
	  $information = "This is a test plugin.";
	  return $information;
	}
  add_shortcode( "test_plugin_shorcode", 'test_plugin_example_function' );
?>