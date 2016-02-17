<?php
    
    // App
    $app['title']    = 'Thermostat';        // App title
    $app['password'] = 'password';          // App password
    
	// Pimatic
	$pimatic['user'] = 'admin';			    // Pimatic username
	$pimatic['pass'] = 'password';		    // Pimatic password
	$pimatic['host'] = '192.168.1.5';	    // Pimatic IP address
	$pimatic['port'] = 80;				    // Pimatic port
	$pimatic['ssl']  = false;			    // Use https (SSL)
	$pimatic['poll'] = 5000;                // Polling interval
	
	//Thermostaat
	$therm[0]['name']     = 'Woonkamer';
	$therm[0]['id']     = 'livingroom-thermostat';              // ID of the thermostat device
	$therm[0]['sensor']   = 'livingroom-temp.temperature';      // Temperature sensor variable
	$therm[0]['eco']    = 10;					                // Eco temperature
	$therm[0]['comf']   = 20;				                    // Comfort temperature
	
	$therm[1]['name']     = 'Keuken';
	$therm[1]['id']     = 'kitchen-thermostat';                 // ID of the thermostat device
	$therm[1]['sensor']   = 'kitchen-temp.temperature';         // Temperature sensor variable
	$therm[1]['eco']    = 10;					                // Eco temperature
	$therm[1]['comf']   = 19;				                    // Comfort temperature
	
	//Lights
	$light['id']     = 'woonkamer';			// ID of the light switch
	//$light['id']   = '';                  // Make empty if lights are not used
	
?>