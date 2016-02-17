<?php	
    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    	include('../config.php');
    	include('functions.php');
    	if(isset($_GET['temp'])){
        	setValue($_GET['id'].'/changeTemperatureTo?temperatureSetpoint='.$_GET['temp']);				
    	}
	}
?>