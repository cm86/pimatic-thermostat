<?php
    
    // App
    $app['title']    = 'Thermostat';        // App title
    $app['password'] = 'password';          // App password
    $app['poll'] = 5000;                // Polling interval
    
	// Pimatic servers
	$pimatic['default']['user'] = 'admin';			    // Pimatic username
	$pimatic['default']['pass'] = 'password';		    // Pimatic password
	$pimatic['default']['host'] = '192.168.1.5';	    // Pimatic IP address
	$pimatic['default']['port'] = 80;				    // Pimatic port
	$pimatic['default']['ssl']  = false;			    // Use https (SSL)
	
	$pimatic['adhoc']['user'] = 'admin';			    // Pimatic username
	$pimatic['adhoc']['pass'] = 'password';		    // Pimatic password
	$pimatic['adhoc']['host'] = '192.168.1.10';	    // Pimatic IP address
	$pimatic['adhoc']['port'] = 80;				    // Pimatic port
	$pimatic['adhoc']['ssl']  = false;			    // Use https (SSL)
	                
	
	//Thermostats
	$therm[0]['name']     = 'Woonkamer';
	$therm[0]['id']     = 'thermostaat';       // ID of the thermostat device
	$therm[0]['sensor']   = 'woonkamer-temp';
	$therm[0]['eco']    = 10;					// Eco temperature
	$therm[0]['comf']   = 20;				    // Comfort temperature
	$therm[0]['server'] = 'default';
	
	$therm[1]['name']     = 'Keuken';
	$therm[1]['id']     = 'kantoor-studio';       // ID of the thermostat device
	$therm[1]['sensor']   = 'sensor1';
	$therm[1]['eco']    = 10;					// Eco temperature
	$therm[1]['comf']   = 19;				    // Comfort temperature
	$therm[1]['server'] = 'adhoc';
	
	
	//Temperature sensor
	//$temp['id']      = 'woonkamer-temp';	// ID of the temperature sensor
	
	//Lights
	//$light['id']     = 'woonkamer'			// ID of the light switch
	$light['id']     = ''                 // Remove string to disable th light switch
	
?>