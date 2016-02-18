<?php	
	include('config.php');
	include('inc/functions.php');
	include('inc/pages.php');
	if($_POST['password'] == $app['password'] and $app['password'] != ''){
        setcookie('login', pass($app['password']), time()+3155692, "/");
        header('location: http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
    }
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="robots" content="noindex" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="apple-touch-icon" href="icon.png">
		<title><?php echo $app['title']; ?></title>
		<preference name="DisallowOverscroll" value="true" />	
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src='js/fastclick.js'></script>
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
		<link rel="stylesheet" href="css/animations.css" type="text/css" media="screen" charset="utf-8">
		<?php if(loggedIn()){ include('inc/script.php'); } ?>
	</head>
	<body class="fadeInn">
		<?php
    		if(!loggedIn()){
        		get_login();
    		} else {
        		get_thermostat();
    		}
		?>
	</body>
</html>