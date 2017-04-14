<?php
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyA9W7edof9waZH0IK_66REnoY7ZgocxsIE';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function bici_widgets_init() {
	register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'bici' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
			'name'          => __( 'Secondary Sidebar', 'bici' ),
			'id'            => 'sidebar-2',
			'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li></ul>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bici_widgets_init' );
?>

