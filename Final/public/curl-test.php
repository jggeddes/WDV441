<?php	
	//$url = "https://dmacc.edu";

	$url = "http://api.weatherunlocked.com/api/forecast/41.619549,-93.598022?app_id=4d027a5f&app_key=180f2565ad758dc4d93995e8bdb37719";
	
	// create curl resource
	$ch = curl_init();

	// set url
	curl_setopt($ch, CURLOPT_URL, $url);

	// if redirected, follow it
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json',                                                                                
		)                                                                       
	);
	$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

	// $output contains the output string
	$output = curl_exec($ch);

	//echo(json_encode($output) );

	$jsonOutput = json_decode($output, true);

	// close curl resource to free up system resources
	curl_close($ch); 
	
	//var_dump($jsonOutput);

	//print_r( $jsonOutput);
	//echo $jsonOutput['Days'];
	
	// foreach($jsonOutput['Days'] as $day) {
	// 	foreach($day as $key => $value){
	// 		echo "{$key} {$value} <br>";
	// 	}    
	// }
	
?>