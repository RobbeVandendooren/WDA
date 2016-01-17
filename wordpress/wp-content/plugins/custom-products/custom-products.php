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


// Post meta box
/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setup' );

/* Meta box setup function. */
function smashing_post_meta_boxes_setup() {
	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxes' );
	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function smashing_add_post_meta_boxes() {

	add_meta_box(
		'smashing-post-class',      // Unique ID
		esc_html__( 'Post Class', 'example' ),    // Title
		'smashing_post_class_meta_box',   // Callback function
		'post',         // Admin page (or post type)
		'side',         // Context
		'default'         // Priority
	);
}

/* Display the post meta box. */
function smashing_post_class_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

	<p>
		<label for="smashing-post-class"><?php _e( "Add a custom CSS class, which will be applied to WordPress' post class.", 'example' ); ?></label>
		<br />
		<input class="widefat" type="text" name="smashing-post-class" id="smashing-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_class', true ) ); ?>" size="30" />
	</p>
<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = ( isset( $_POST['smashing-post-class'] ) ? sanitize_html_class( $_POST['smashing-post-class'] ) : '' );

	/* Get the meta key. */
	$meta_key = 'smashing_post_class';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
}


/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_class' );

function smashing_post_class( $classes ) {

	/* Get the current post ID. */
	$post_id = get_the_ID();

	/* If we have a post ID, proceed. */
	if ( !empty( $post_id ) ) {

		/* Get the custom post class. */
		$post_class = get_post_meta( $post_id, 'smashing_post_class', true );

		/* If a post class was input, sanitize it and add it to the post class array. */
		if ( !empty( $post_class ) )
			$classes[] = sanitize_html_class( $post_class );
	}

	echo $classes;
	return $classes;
}
