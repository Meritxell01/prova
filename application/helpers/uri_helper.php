<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function uri_assoc($var, $segment = 3) {

	$CI =& get_instance();

	$uri_assoc = $CI->uri->uri_to_assoc($segment);
	
	//echo "<br/><br/>uri_associative array in uri_assoc function: " . print_r($uri_assoc) . "<br/>";
	//echo "<br>var:" . $var . "<br/>";
	if (isset($uri_assoc[$var])) {
		//echo "<br/>isset!";
		return $uri_assoc[$var];
	}

	else {

		return NULL;

	}

}

?>
