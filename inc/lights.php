<?php	
	include('../config.php');
	include('functions.php');
	if($_GET['turn'] == 'on'){
		setValue($light['id'].'/turnOn');
	} elseif($_GET['turn'] == 'off'){
		setValue($light['id'].'/turnOff');
	}
?>