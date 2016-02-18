<?php	
    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    	include('../config.php');
    	include('functions.php');
    	$server = 'default';

    	if($_GET['server']){
        	$server = $_GET['server'];
    	}
    	;
    	if(isset($_GET['temp'])){
        	setValue($_GET['id'].'/changeTemperatureTo?temperatureSetpoint='.$_GET['temp'],$server);				
    	}
	}
?>