<?php

function get_ksc_header_items() {
	/*
	<li class="first active">
		<a href="#instuctions" du-smooth-scroll>Hur tävlar man?</a>
	</li>
	<li class="collapsed">
		<a href="#tags" du-smooth-scroll>Se alla bidrag</a>
	</li>
	<li>
		<a href="http://www.ungforetagsamhet.se/" target="_blank">ungforetagsamhet.se</a>
	</li>
	<li class="last">
		<a href="#">Kontakt</a>
	</li>
	----
	<li class="first active">
		<a href="#instuctions" du-smooth-scroll>Hur tävlar man?</a>
	</li>
	<li class="collapsed">
		<a href="#tags" du-smooth-scroll>Se alla bidrag</a>
	</li>
	<li>
		<a href="http://www.ungforetagsamhet.se/" target="_blank">ungforetagsamhet.se</a>
	</li>
	<li class="last">
		<a href="#">Kontakt</a>
	</li>
	*/
	$items = ''.
	$items .= '<li class="first">
							<a href="#instuctions" du-smooth-scroll>Hur tävlar man?</a>
						</li>';
	$items .= '<li class="collapsed">
							<a href="#page" du-smooth-scroll>Se alla bidrag</a>
						</li>';
	$items .= '<li class="collapsed">
							<a href="#about" du-smooth-scroll>Om oss</a>
						</li>';
	$items .= '<li>
							<a href="http://www.ungforetagsamhet.se/" target="_blank">ungforetagsamhet.se</a>
						</li>';
	$items .= '<li class="last">
							<a href="mailto:lina.johnson@ungforetagsamhet.se">Kontakt</a>
						</li>';
	echo $items;
}
function shit() {
	echo hej;
}

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
