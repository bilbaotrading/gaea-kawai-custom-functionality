<?php

function technology_init() {
	register_post_type( 'tecnologia', array(
		'labels'            => array(
			'name'                => __( 'Materiales o Tecnologías', 'kawai_custom_functionality' ),
			'singular_name'       => __( 'Material o Tecnología', 'kawai_custom_functionality' ),
			'all_items'           => __( 'Todos los materiales y tecnologías', 'kawai_custom_functionality' ),
			'new_item'            => __( 'Nuevo Material o Tecnología', 'kawai_custom_functionality' ),
			'add_new'             => __( 'Añadir Nuevo', 'kawai_custom_functionality' ),
			'add_new_item'        => __( 'Añadir Nuevo Material o Tecnología', 'kawai_custom_functionality' ),
			'edit_item'           => __( 'Editar Material o Tecnología', 'kawai_custom_functionality' ),
			'view_item'           => __( 'Ver Material o Tecnología', 'kawai_custom_functionality' ),
			'search_items'        => __( 'Buscar Material o Tecnologías', 'kawai_custom_functionality' ),
			'not_found'           => __( 'No se ha encontrado ningún material o tecnología', 'kawai_custom_functionality' ),
			'not_found_in_trash'  => __( 'No Material o Tecnologías found in trash', 'kawai_custom_functionality' ),
			'parent_item_colon'   => __( 'Parent Material o Tecnología', 'kawai_custom_functionality' ),
			'menu_name'           => __( 'Materiales o Tecnologías', 'kawai_custom_functionality' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'taxonomies'        => array( 'category' ),
	) );

}
add_action( 'init', 'technology_init' );

function technology_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['tecnologia'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Material o Tecnología updated. <a target="_blank" href="%s">View Material o Tecnología</a>', 'kawai_custom_functionality'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'kawai_custom_functionality'),
		3 => __('Custom field deleted.', 'kawai_custom_functionality'),
		4 => __('Material o Tecnología updated.', 'kawai_custom_functionality'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Material o Tecnología restored to revision from %s', 'kawai_custom_functionality'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Material o Tecnología published. <a href="%s">View Material o Tecnología</a>', 'kawai_custom_functionality'), esc_url( $permalink ) ),
		7 => __('Material o Tecnología saved.', 'kawai_custom_functionality'),
		8 => sprintf( __('Material o Tecnología submitted. <a target="_blank" href="%s">Preview Material o Tecnología</a>', 'kawai_custom_functionality'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Material o Tecnología scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Material o Tecnología</a>', 'kawai_custom_functionality'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Material o Tecnología draft updated. <a target="_blank" href="%s">Preview Material o Tecnología</a>', 'kawai_custom_functionality'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'technology_updated_messages' );

/**
 * Enables the featured image meta box in technology edit screen.
 */
function technology_add_features_support() {
	add_post_type_support( 'tecnologia', 'thumbnail' );
}

add_action( 'init', 'technology_add_features_support' );
