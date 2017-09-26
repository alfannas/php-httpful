<?php
if(isset($_POST['title'])){
	// Point to where you downloaded the phar
	include('./httpful.phar');

	$url =  "https://hacktivcash-api.herokuapp.com/api/products";

    $data =  array(
        'title'         => utf8_encode($_POST['title']),//'masukin dari php',
        'description'   => utf8_encode($_POST['desc']),//'ini description dari php',
        'image_url'		=> 'https://i.ytimg.com/vi/qgAZ_aHSG64/maxresdefault.jpg',
        'price' 		=> 'Rp.20000',
        'stock' 	 	=>  456,
        'created'		=> time()
        
    );

    $data = json_encode($data);

    $response = \Httpful\Request::post($url)

		->body($data)
        ->sendsJson()
        ->send();

    //var_dump($response);
    echo $response->body->info;
    die();
}

?>
<style>
textarea{width: 500px; height: 200px;}
input{width:500px;}
</style>
<html>
	<form method="POST" action="">
		<input type="text" name="title" placeholder="Title" /> <br/>
		<textarea name="desc" placeholder="Description"></textarea> <br/>
		<input type="submit" value="submit">
	</form>
</html>