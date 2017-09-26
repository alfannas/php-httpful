<?php
if(isset($_GET['id'])){
	include('./httpful.phar');

	$url =  "https://hacktivcash-api.herokuapp.com/api/products/".$_GET['id'];

    $response = \Httpful\Request::delete($url)->send();     

    echo $response->body->info;
    if($response->body->info == 'Product removed'){
    	header('Location: http://localhost/dev/phpapi');
    }
    die();
}


?>