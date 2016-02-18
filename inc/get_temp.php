<?php	
    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    	include('../config.php');
    	include('functions.php');
    	$value = 0;
    	$server = 'default';
    	if($_GET['server']){
        	$server = $_GET['server'];
    	}
    	if(isset($_GET['sensor'])){
        	$value = getValue($_GET['id'].'.temperature',$server); 	
        	if(!$value){
        		$value = "- ";
        	}
    	}
    	
    	if(isset($_GET['setPoint'])){
        	$value = getValue($_GET['id'].'.temperatureSetpoint',$server);
        	
    	}
    	
    	echo $value;
	}
?>
