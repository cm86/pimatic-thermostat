<?php	
    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    	include('../config.php');
    	include('functions.php');
    	$value = 0;
    	
    	if(isset($_GET['sensor'])){
        	$value = getValue($_GET['id']); 	
        	if(!$value){
        		$value = "- ";
        	}
    	}
    	
    	if(isset($_GET['setPoint'])){
        	$value = getValue($_GET['id']);
        	
    	}
    	
    	echo $value;
	}
?>
