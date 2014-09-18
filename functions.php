<?php

add_action("init", "site_init");
function site_init() {

	$args = array(
		"public" => true,
		"label" => "CustomHeader"
	);
	register_post_type( "customheader", $args );

	$args = array(
		"public" => true,
		"label" => "CustomFooter"
	);
	register_post_type( "customfooter", $args );
}
?>
