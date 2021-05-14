<?php




header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
while(true){
    
    
    $time = date('H:i:s');
    $value = json_encode(getSystemMemInfo());
    echo "data: {$value}\n\n";
    if (ob_get_length()){
		ob_end_flush();
	}
    flush();            // Unless both are called !
    
    // Wait one second.
    sleep(1);
}



function getSystemMemInfo() 
{       
    $data = explode("\n", file_get_contents("/proc/meminfo"));
    $meminfo = array();
    foreach ($data as $line) {
        list($key, $val) = explode(":", $line);
        $meminfo[strtolower($key)] = trim($val);
    }
    return $meminfo;
}
