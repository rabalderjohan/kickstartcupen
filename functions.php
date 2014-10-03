<?php

function get_ksc_header_items() {
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

	$args = array(
		"public" => true,
		"label" => "BasicItem",
		"supports" => array("title")
	);
	register_post_type( "basicitem", $args );

}

/*AJAX Setup*/
add_action("wp_ajax_nopriv_ksc_vote", "ksc_vote");
add_action("wp_ajax_ksc_vote", "ksc_vote");
/*
function ksc_ajaxer()
{
  wp_localize_script( 'function', 'my_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
*/
/*AJAX*/
function ksc_vote(){
	$id = $_REQUEST[id];
	$arr = '';
	$test = false;
	if ($test) {
		$arr = array(
			"status" => "failed"
		);
	} else {
		$votes = get_field('votes',$id);
		$votes +=1;
		update_field('votes', $votes, $id);
		$arr = array(
			"status" => "success"
		);
	}
	//print_r($arr);
	echo json_encode($arr);
	die();
}
?>
