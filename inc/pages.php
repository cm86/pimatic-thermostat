<?php
    if(count(get_included_files()) ==1) die("Not permitted");
    
    function get_login(){
        global $app;
        ?>
        <div class="content">
            <div class="title slideDown">
				<?php echo $app['title']; ?>
			</div>
            <form class="fadeIn" method="post">
                <input class="password_input" placeholder="Password" type="password" name="password"/>
                <input class="password_submit" type="submit" value="Login"/>
            </form>
        </div>
   <?php 
        
    }
    
    function get_thermostat(){ 
        global $pimatic;
        global $therm;
        global $light;
        global $app;
    ?>
        <div class="nav">
            <?php
                $cnt = 0;
                foreach($therm as $device){
                    $cnt++;
                }
                $width = 100 / $cnt;
            ?>
            <script>
                function hideAll(){
                    $( ".thermostat_device" ).addClass( "hide" );
                    $( ".nav-btn" ).removeClass( "nav-active" );
                }
                $(document).ready(function() {
                    <?php foreach($therm as $device){ ?>
                    $('.btn_<?php echo $device['id']; ?>').click(function() {
                        hideAll();
                        $( this ).addClass( "nav-active" );
                        $( "#<?php echo $device['name']; ?>" ).removeClass( "hide" );
                     });
                    <?php } ?>
                });
            </script>
            <?php
                $first = true;
                foreach($therm as $device){
                    if($first){
                        echo '<div style="width: calc('.$width.'% - 20px);" class="nav-btn btn_'.$device['id'].' nav-active">'.$device['name'].'</div>'; 
                        $first = false;
                    } else {
                        echo '<div style="width: calc('.$width.'% - 20px);" class="nav-btn btn_'.$device['id'].' ">'.$device['name'].'</div>';
                    }
                }
            ?>
        </div>
    <?php
        $first = true;
        foreach($therm as $device){
    ?>
    <div class="thermostat_device <?php if($first){ $first = false; } else { echo 'hide'; } ?>" id="<?php echo $device['name']; ?>">
        <div style="display: none;" id="dump"></div> 
		<div class="content" unselectable="on" onselectstart="return false;" onmousedown="return false;">
    		<div class="contain">
    			<div class="title">
    				<?php echo $device['name']; ?>
    			</div>
    			
    			<div class="middle">
    				<div class="grad-border">
    					<div id="set_temp">
        					<span class="set">SET</span>
        					<span class="val-<?php echo $device['id']; ?>"></span>
        					<span class="deg">&deg;C</span>
    					</div>
    				</div>
    			</div>
    			<div class="left">
    				<div class="down-border">
    					<div class="down down_<?php echo $device['id']; ?>">
    						-
    					</div>
    				</div>
    			</div>
    			<div class="right">
    				<div class="up-border">
    					<div class="up up_<?php echo $device['id']; ?>">
    						+
    					</div>
    				</div>
    			</div>
    			<div class="clear"></div>
    		</div>
			<div class="bottom">
				<div class="eco eco_<?php echo $device['id']; ?>">
					Eco modus<br/><span class="glass"><?php echo("(".$device['eco']." &deg;C)"); ?></span>
				</div>
				<div class="comf comf_<?php echo $device['id']; ?>">
					Comfort<br/><span class="glass"><?php echo("(".$device['comf']." &deg;C)"); ?></span>
				</div>
				<div id="get_temp">
                    <span class="val-<?php echo $device['id']; ?>"></span>
                    &deg;C
				</div>
				<?php if($light['id']){ ?>
				<div class="lights">
					<div class="lights-off">
						<img src="images/light-off.png" alt=""/>
					</div>
					<div class="lights-on">
						<img src="images/light-on.png" alt=""/>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
    </div>
   <?php } 
     }
?>
