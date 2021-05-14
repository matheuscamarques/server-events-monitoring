<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
while(true){
    
    
    $time = date('H:i:s');
    echo "data: {$time}\n\n";
    if (ob_get_length()){
		ob_end_flush();
	}
    flush();            // Unless both are called !
    
    // Wait one second.
    sleep(1);
}

?>
