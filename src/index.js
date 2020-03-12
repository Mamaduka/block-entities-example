/**
 * Internal dependencies
 */
import metadata from './block.json';
import edit from './edit';

/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';

const { name, category, attributes } = metadata;

registerBlockType( name, {
	title: 'Quest Map',
	description: 'Example block using `useEntityProp`',
	icon: 'location',
	keywords: [ 'embed' ],
	supports: {
		html: false,
	},
	category,
	attributes,
	edit,
} );
