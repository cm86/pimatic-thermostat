<?php if(count(get_included_files()) ==1) die("Not permitted"); ?>
<script>
			
	$(function() {
	    FastClick.attach(document.body);
	});
	<?php foreach($therm as $device){ ?>
	var setTemp_<?php echo cleanString($device['id']); ?> = <?php echo getValue($device['id'].'.temperatureSetpoint'); ?>;
	var timer_<?php echo cleanString($device['id']); ?>;
	<?php } ?>
	
	var wait = false;
	$(document).ready(function() {
    	poll();
	<?php foreach($therm as $device){ ?>	
		

		$(".up_<?php echo cleanString($device['id']); ?>").click(function() {	
			setTemp_<?php echo cleanString($device['id']); ?> = setTemp_<?php echo cleanString($device['id']); ?> + .5;
			updateTemp();
		});
		$(".down_<?php echo cleanString($device['id']); ?>").click(function() {		
			setTemp_<?php echo cleanString($device['id']); ?> = setTemp_<?php echo cleanString($device['id']); ?> - .5;
			updateTemp();
		});
		
		// MODES
		$(".eco_<?php echo cleanString($device['id']); ?>").click(function() {
			setTemp_<?php echo cleanString($device['id']); ?> = <?php echo $device['eco']; ?>;		
			updateTemp();
		});
		$(".comf_<?php echo cleanString($device['id']); ?>").click(function() {		
			setTemp_<?php echo cleanString($device['id']); ?> = <?php echo $device['comf']; ?>;		
			updateTemp();
		});
		
		// LIGHTS
		$(".lights-on img").click(function() {		
			$( "#dump" ).load( "inc/lights.php?turn=on" );
		});
		
		$(".lights-off img").click(function() {		
			$( "#dump" ).load( "inc/lights.php?turn=off" );
		});
		<?php } ?>
	});
	
	function updateTemp(){
    	<?php foreach($therm as $device){ ?>
		wait = true;
		if(setTemp_<?php echo cleanString($device['id']); ?> > 30) {
			setTemp_<?php echo cleanString($device['id']); ?> = 30;
		}
		if(setTemp_<?php echo cleanString($device['id']); ?> < 5) {
			setTemp_<?php echo cleanString($device['id']); ?> = 5;
		}
		
		$("#set_temp .val-<?php echo cleanString($device['id']); ?>").html(showTemp_<?php echo cleanString($device['id']); ?>());   			
		clearTimeout(timer_<?php echo cleanString($device['id']); ?>);
		timer_<?php echo cleanString($device['id']); ?> = setTimeout(function(){
    		
            $("#dump").load( "inc/set_temp.php?id=<?php echo cleanString($device['id']); ?>&temp=" + setTemp_<?php echo cleanString($device['id']); ?> );
            wait = false;
        }, 1500);
        <?php } ?>
        
	}
	<?php foreach($therm as $device){ ?>
	function showTemp_<?php echo cleanString($device['id']); ?>(){
    	
        return Math.floor(setTemp_<?php echo cleanString($device['id']); ?>) + '<small>' + String(setTemp_<?php echo cleanString($device['id']); ?>.toFixed(1)).replace(Math.floor(setTemp_<?php echo cleanString($device['id']); ?>), '') + '</small>';
       
	}
	 <?php } ?>
	function poll(){
		if(!wait){
    		<?php foreach($therm as $device){ ?>
		    $("#get_temp .val-<?php echo cleanString($device['id']); ?>").load( "inc/get_temp.php?id=<?php echo $device['sensor']; ?>&sensor" );
		    $.get( "inc/get_temp.php?id=<?php echo cleanString($device['id']); ?>&setPoint", function( data ) {
              setTemp_<?php echo cleanString($device['id']); ?> = parseFloat(data);
            });
		    $("#set_temp .val-<?php echo cleanString($device['id']); ?>").html(showTemp_<?php echo cleanString($device['id']); ?>());
		    <?php } ?>
	    }
	}
	
	setInterval(function(){ poll(); }, <?php echo $pimatic['poll']; ?>);

</script>