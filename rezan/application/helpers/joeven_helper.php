<?php

function library_link($date=""){
	return base_url('resources/styles/');

}

function joeven_date($date){
	return date("F d, Y",strtotime($date));
}

?>