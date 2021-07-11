<?php

require_once("../class/Authenticate.php");
Authenticate::Authentication(array("admin"));

	require('mapdata.php');
	$map = new mapdata;
	$map->setId($_REQUEST['points']['id']);
	$map->setLat($_REQUEST['points']['lat']);
	$map->setLng($_REQUEST['points']['lng']);
	$status = $map->updatelatlng();
	if($status == true){
		echo  "updated..";
	}else{
		echo "Failed..";
	}
?>