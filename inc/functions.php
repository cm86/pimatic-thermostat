<?php
	if(count(get_included_files()) ==1) die("Not permitted");
	
	function getValue($var, $server = 'default') {
		global $pimatic;
		if($pimatic[$server]['ssl']){
		    $url = 'https://';
	    } else {
		    $url = 'http://';
	    }
	    $url .= $pimatic[$server]['user'] . ":" . $pimatic[$server]['pass'] . "@" . $pimatic[$server]['host'] . ":" . $pimatic[$server]['port'] . "/api/variables/" . $var;
	   
	    $curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec ($curl);// curl to a variable
		curl_close ($curl);
		
		$result = json_decode($result, true);// decode to associative array
		$result = $result['variable']['value']; //pick desired value
		return $result;
		
    }
    
    function setValue($var, $server = 'default'){
	    global $pimatic;
	    if($pimatic[$server]['ssl']){
		    $url = 'https://';
	    } else {
		    $url = 'http://';
	    }
	    $url .= $pimatic[$server]['user'] . ":" . $pimatic[$server]['pass'] . "@" . $pimatic[$server]['host'] . ":" . $pimatic[$server]['port'].'/api/device/'.$var;
	    file_get_contents($url);
    }
    
    function loggedIn(){
        global $app;
        if($_COOKIE['login'] == pass($app['password'])) {
            return true;
        } else {
            return false;
        }
    }
    
    function pass($string){
    	$salt = "Dc9ri12orRSDhNUd";
    	$pepper = "5%1vF3x5";
    	$string = md5($pepper.$string);
    	return hash("sha256", md5($salt.$string).sha1($string));
    }
    
    function cleanString($string){
        $string = str_replace('-', '_', $string); // Remove dashes
        $string = str_replace(' ', '_', $string); // Remove spaces
        return $string;
    }
    
?>