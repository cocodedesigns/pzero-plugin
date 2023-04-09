<?php
add_action( 'add_meta_boxes_portfolio', 'myTheme_customMetabox' );

function myTheme_customMetabox() {

	add_meta_box(
		'mytheme_metabox', // metabox ID
		'Meta Box', // title
		'myTheme_metaboxCB', // callback function
		'portfolio', // add meta box to custom post type (or post types in array)
		'normal', // position (normal, side, advanced)
		'default', // priority (default, low, high, core)
    /* array(
      '__back_compat_meta_box'              => false,
      '__block_editor_compatible_meta_box'  => true
    ) */
	);

}

// it is a callback function which actually displays the content of the meta box
function myTheme_metaboxCB( $post ){

	$client_name = get_post_meta( $post->ID, 'client_name', true );
	$client_url = get_post_meta( $post->ID, 'client_url', true );
	$is_external = get_post_meta( $post->ID, 'is_external', true );
	$nofollow = get_post_meta( $post->ID, 'nofollow', true );
	$noindex = get_post_meta( $post->ID, 'noindex', true );

	wp_nonce_field( 'project_zero', '_zerononce' );

	echo '<table class="form-table">
		<tbody>
			<tr>
				<th><label for="client_name">Client name:</label></th>
				<td><input type="text" id="client_name" name="client_name" value="' . esc_attr( $client_name ) . '" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="client_url">Website URL:</label></th>
				<td><input type="text" id="client_url" name="client_url" value="' . esc_attr( $client_url ) . '" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="is_external">Open in new window/tab:</label></th>
				<td>
					<select id="is_external" name="is_external">
						<option value="_self" ' . selected( '_self', $is_external, false ) . '>Open in the current window/tab</option>
						<option value="_blank" ' . selected( '_blank', $is_external, false ) . '>Open in a new window/tab</option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="nofollow">Add nofollow:</label></th>
				<td><input type="checkbox" name="nofollow" value="1" ' . checked( $nofollow, 1, false ) . ' /></td>
			</tr>
			<tr>
				<th><label for="noindex">Add noindex:</label></th>
				<td><input type="checkbox" name="noindex" value="1" ' . checked( $noindex, 1, false ) . ' /></td>
			</tr>
		</tbody>
	</table>';

}

add_action( 'save_post_portfolio', 'myTheme_saveMetaData', 10, 2 );

function myTheme_saveMetaData( $post_id, $post ) {

	// nonce check
	if ( ! isset( $_POST[ '_zerononce' ] ) || ! wp_verify_nonce( $_POST[ '_zerononce' ], 'project_zero' ) ) {
		return $post_id;
	}

	// check current user permissions
	$post_type = get_post_type_object( $post->post_type );

	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;
	}

	// Do not save the data if autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if( isset( $_POST[ 'client_name' ] ) ) {
		update_post_meta( $post_id, 'client_name', sanitize_text_field( $_POST[ 'client_name' ] ) );
	} else {
		delete_post_meta( $post_id, 'client_name' );
	}
	if( isset( $_POST[ 'client_url' ] ) ) {
		update_post_meta( $post_id, 'client_url', sanitize_text_field( $_POST[ 'client_url' ] ) );
	} else {
		delete_post_meta( $post_id, 'client_url' );
	}
	if( isset( $_POST[ 'is_external' ] ) ) {
		update_post_meta( $post_id, 'is_external', $_POST[ 'is_external' ] );
	} else {
		delete_post_meta( $post_id, 'is_external' );
	}
	if( isset( $_POST[ 'nofollow' ] ) ) {
		update_post_meta( $post_id, 'nofollow', $_POST[ 'nofollow' ] );
	} else {
		delete_post_meta( $post_id, 'nofollow' );
	}
	if( isset( $_POST[ 'noindex' ] ) ) {
		update_post_meta( $post_id, 'noindex', $_POST[ 'noindex' ] );
	} else {
		delete_post_meta( $post_id, 'noindex' );
	}

	return $post_id;

}