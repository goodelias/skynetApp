<?php 
	$json = file_get_contents('https://www.sknt.ru/job/frontend/data.json');
	$ARRAY = json_decode($json, true);
 ?>