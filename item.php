<?php
if(isset($_GET['id'])){
	// Point to where you downloaded the phar
	include('./httpful.phar');
	date_default_timezone_set('Asia/Jakarta');
	 
	// And you're ready to go!
	$response = \Httpful\Request::get('https://hacktivcash-api.herokuapp.com/api/products/'.$_GET['id'])->send();
	$response = json_decode($response, true);

	echo $response[0]['title'].'<br>';
	echo $response[0]['description'].'<br>';
	
}
?>