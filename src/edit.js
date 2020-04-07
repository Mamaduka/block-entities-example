/**
 * WordPress dependencies
 */
import { useDispatch } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { useState } from '@wordpress/element';
import { Button, Placeholder, TextControl } from '@wordpress/components';

const KEY = 'quest_map_api_key';

export default function QuestMapEdit() {
	const [ value, onChange ] = useState( '' );
	const [ apiKey, setApiKey ] = useEntityProp( 'root', 'site', KEY );
	const { saveEditedEntityRecord } = useDispatch( 'core' );

	return (
		<>
			{ apiKey ? (
				<p>Your API Key: { apiKey }</p>
			) : (
				<Placeholder instructions="Quest Map API">
					<TextControl
						value={ value }
						className="components-placeholder__input"
						placeholder="Enter Quest Map API Key..."
						onChange={ onChange }
					/>
					<Button
						isPrimary
						onClick={ () => {
							setApiKey( value );
							saveEditedEntityRecord( 'root', 'site', KEY );
						} }
					>
						{ 'Save Key' }
					</Button>
				</Placeholder>
			) }
		</>
	);
}
