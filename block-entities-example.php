<?php
/**
 * Plugin Name:     Block Entities Example
 * Plugin URI       https://github.com/Mamaduka/block-entities-example
 * Description:     Example block written with ESNext standard and JSX support – build step required.
 * Version:         0.1.0
 * Author:          George Mamadashvili
 * Author URI:      https://mamaduka.com/
 * License:         GPL-2.0-or-later
 *
 * @package         block-entities-example
 */

namespace Mamaduka\BlockEntitiesExample;

/**
 * Registers the block and required assets.
 *
 * @return void
 */
function register_block() {
	$asset_filepath = __DIR__ . '/build/index.asset.php';
	$asset_file     = file_exists( $asset_filepath ) ? include $asset_filepath : [
		'dependencies' => [],
		'version'      => false,
	];

	wp_register_script(
		'block-entities-example',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	register_block_type( 'mamaduka/block-entities-example', [
		'editor_script' => 'block-entities-example',
	] );
}
add_action( 'init', __NAMESPACE__ . '\\register_block' );

/**
 * Register API Key settings.
 *
 * @return void
 */
function register_settings() {
	register_setting(
		'quest_map',
		'quest_map_api_key',
		[
			'type'              => 'string',
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
}
add_action( 'rest_api_init', __NAMESPACE__ . '\\register_settings' );
add_action( 'admin_init', __NAMESPACE__ . '\\register_settings' );
