<?php

function testimonial_init() {
	register_post_type( 'testimonial', array(
		'labels'            => array(
			'name'                => __( 'Opiniones y Testimonios', 'kawai_custom_functionality' ),
			'singular_name'       => __( 'Opinión o Testimonio', 'kawai_custom_functionality' ),
			'all_items'           => __( 'Todas las opiniones y testimonios', 'kawai_custom_functionality' ),
			'new_item'            => __( 'Nueva opinión o testimonio', 'kawai_custom_functionality' ),
			'add_new'             => __( 'Añadir Nuevo', 'kawai_custom_functionality' ),
			'add_new_item'        => __( 'Añadir nueva opinión o testimonio', 'kawai_custom_functionality' ),
			'edit_item'           => __( 'Editar opinión o testimonio', 'kawai_custom_functionality' ),
			'view_item'           => __( 'Ver opinión o testimonio', 'kawai_custom_functionality' ),
			'search_items'        => __( 'Buscar opiniones y testimonios', 'kawai_custom_functionality' ),
			'not_found'           => __( 'No se ha encontrado ninguna opinión o testimonio', 'kawai_custom_functionality' ),
			'not_found_in_trash'  => __( 'No Opiniones y Testimonios found in trash', 'kawai_custom_functionality' ),
			'parent_item_colon'   => __( 'Parent Opiniones y Testimonios', 'kawai_custom_functionality' ),
			'menu_name'           => __( 'Opiniones y Testimonios', 'kawai_custom_functionality' ),
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
	) );

}
add_action( 'init', 'testimonial_init' );

function testimonial_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['testimonial'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Opiniones y Testimonios updated. <a target="_blank" href="%s">View Opiniones y Testimonios</a>', 'kawai_custom_functionality'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'kawai_custom_functionality'),
		3 => __('Custom field deleted.', 'kawai_custom_functionality'),
		4 => __('Opiniones y Testimonios updated.', 'kawai_custom_functionality'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Opiniones y Testimonios restored to revision from %s', 'kawai_custom_functionality'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Opiniones y Testimonios published. <a href="%s">View Opiniones y Testimonios</a>', 'kawai_custom_functionality'), esc_url( $permalink ) ),
		7 => __('Opiniones y Testimonios saved.', 'kawai_custom_functionality'),
		8 => sprintf( __('Opiniones y Testimonios submitted. <a target="_blank" href="%s">Preview Opiniones y Testimonios</a>', 'kawai_custom_functionality'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Opiniones y Testimonios scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Opiniones y Testimonios</a>', 'kawai_custom_functionality'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Opiniones y Testimonios draft updated. <a target="_blank" href="%s">Preview Opiniones y Testimonios</a>', 'kawai_custom_functionality'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'testimonial_updated_messages' );
