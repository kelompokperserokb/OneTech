<?php
session_start();

if(!isset($_SESSION['lang'])) {
	$_SESSION['lang'] = "en";
} else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
	if($_GET['lang'] == "en"){
		$_SESSION['lang'] = "en";
	} else if ($_GET['lang'] == "id") {
		$_SESSION['lang'] = "id";
	}
}

require_once base_url("Asset/language/" . $_SESSION['lang'] . ".php");
