<?php
/**
 * Plugin Name: Custom Products
 * Plugin URI: www.ehb.be
 * Description: Custom product posts
 * Version: 1.0
 * Author: Robbe
 * Author URI: www.ehb.be
 **/

// Register the Custom Product Post Type

metabox();
function register_cpt_product() {

	// Dashboard stuff
	$labels = array(
		'name' => _x( 'Products', 'product' ),
		'singular_name' => _x( 'Product', 'product' ),
		'add_new' => _x( 'Add New', 'product' ),
		'add_new_item' => _x( 'Add New Product', 'product' ),
		'edit_item' => _x( 'Edit Product', 'product' ),
		'new_item' => _x( 'New Product', 'product' ),
		'view_item' => _x( 'View Product', 'product' ),
		'search_items' => _x( 'Search Product', 'product' ),
		'not_found' => _x( 'No products found', 'product' ),
		'not_found_in_trash' => _x( 'No products found in Trash', 'product' ),
		'parent_item_colon' => _x( 'Parent Product:', 'product' ),
		'menu_name' => _x( 'Products', 'product' ),
	);


	$args = array(
		'labels' => $labels,
		'description' => 'Products',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
		'public' => true,
		'menu_position' => 5, // Below posts
		'menu_icon' => 'dashicons-cart',
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true
	);

	register_post_type( 'products', $args );
}

add_action( 'init', 'register_cpt_product' );

function setup_plugin_menu() {
	add_submenu_page('edit.php?post_type=products',
		'Settings', 'Settings', 'manage_options',
		__FILE__, 'custom_products_settings');
}

function custom_products_settings() {
	?>
	<div id="theme-options-wrap">
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields('plugin_settings'); ?>
			<?php do_settings_sections(__FILE__);?>
			<p class="submit">
				<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
			</p>
		</form>
	</div>
	<?php
}
// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_plugin_menu");

add_action('admin_init', 'register_and_build_fields');

function register_and_build_fields() {
	register_setting('plugin_settings', 'plugin_settings', 'validate_setting');
	add_settings_section('main_section', 'Main Settings', 'section_cb', __FILE__);
	add_settings_field('banner_heading', 'Banner Heading:', 'banner_heading_setting', __FILE__, 'main_section');
	add_settings_field('plugin_description', 'Plugin Description:', 'plugin_description_setting', __FILE__, 'main_section');
	add_settings_field('plugin_author', 'Plugin Author:', 'plugin_author_setting', __FILE__, 'main_section');
}

function validate_setting($plugin_settings) {
	return $plugin_settings;
}

function section_cb() {

}
// Banner Heading
function banner_heading_setting() {
	$options = get_option('plugin_settings');
	echo "<input class='widefat' name='plugin_settings[banner_heading]' type='text' value='{$options['banner_heading']}' />";
}

// Description
function plugin_description_setting() {
	$options = get_option('plugin_settings');
	echo "<input class='widefat' name='plugin_settings[plugin_description]' type='text' value='{$options['plugin_description']}' />";
}

// Author
function plugin_author_setting() {
	$options = get_option('plugin_settings');
	echo "<input class='widefat' name='plugin_settings[plugin_author]' type='text' value='{$options['plugin_author']}' />";
}

// Metabox
function metabox() {
	function add_product_price() {
		add_meta_box('price', 'Product Price', 'meta_callback', 'products', 'side');
		/*<p>
			<label for="product_price">Product Price: </label>
			<input type="text" name="product_price" class="widefat" id="product_price" value="" />
		</p>*/
	}
}

function meta_callback() {
	?>
	<p>
			<label for="product_price">Product Price: </label>
			<input type="text" name="product_price" class="widefat" id="product_price" value="$" />
	</p>
<?php
}

add_action('add_meta_boxes', 'add_product_price');
?>
