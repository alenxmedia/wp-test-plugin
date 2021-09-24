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
	  $information = "<p>This is a test plugin.</p>";
	  $information .= "<div>Content in a div.</div>";
	  return $information;
	}

  add_shortcode( "test_plugin_shorcode", 'test_plugin_example_function' );

  function test_plugin_admin_menu_option()
  {
	  add_menu_page("Header & Footer Scripts","Site Scripts","manage_options","test-plugin-admin-menu","test_plugin_scripts_page","",200);
  }

  add_action("admin_menu", "test_plugin_admin_menu_option");

  function test_plugin_scripts_page()
  {
	if(array_key_exists('submit_scripts_update',$_POST))
	{
		update_option('test_plugin_header_scripts',$_POST['header_scripts']);
		update_option('test_plugin_footer_scripts',$_POST['footer_script']);

		?>
		<div id="setting-error-settings-updated" class="updated settings-error notice is-dismissible"><strong>Settings have been saved.</strong></div>
		<?php

	}

	$header_scripts = get_option('test_plugin_header_scripts','none');
	$footer_scripts = get_option('test_plugin_footer_scripts','none');

	?>
		<div class="wrap">
		<h2>Update Scripts</h2>
			<form method="post" action="">
			<label for="header_scripts">Header Scripts</label>
			<textarea name="header_scripts" class="large-text"><?php print $header_scripts; ?></textarea>
			<label for="footer_scripts">Footer Scripts</label>
			<textarea name="footer_script" class="large-text"><?php print $footer_scripts; ?></textarea>
			<input type="submit" name="submit_scripts_update" class="button button-primary" value="UPDATE SCRIPTS">
			</form>
		</div>
	<?php
  }

  function test_plugin_display_header_scripts()
  {
	$header_scripts = get_option('test_plugin_header_scripts','none');
	print $header_scripts;
  }

  function test_plugin_display_footer_scripts()
  {
	$footer_scripts = get_option('test_plugin_footer_scripts','none');
	print $footer_scripts;
  }

  add_action("wp_head","test_plugin_display_header_scripts");
  add_action("wp_footer","test_plugin_display_footer_scripts");

?>