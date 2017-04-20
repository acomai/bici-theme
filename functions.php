<?php
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyA9W7edof9waZH0IK_66REnoY7ZgocxsIE';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


?>

