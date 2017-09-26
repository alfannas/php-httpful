<style>
textarea{width: 500px; height: 200px;}
input{width:500px;}
</style>
<?php
include('./httpful.phar');

if(isset($_POST['title'])){

	$url =  "https://hacktivcash-api.herokuapp.com/api/products/".$_GET['id'];

	$data =  array(
            'title'         => utf8_encode($_POST['title']),//'masukin dari php',
            'description'   => utf8_encode($_POST['desc'])//'ini description dari php',
            
        );

	$data = json_encode($data);

    $response = \Httpful\Request::put($url)
    	->body($data)
        ->sendsJson()
    	->send();     

    //var_dump($response);
    echo $response->body->info;
}

if(isset($_GET['id'])){ 

    $item = \Httpful\Request::get('https://hacktivcash-api.herokuapp.com/api/products/'.$_GET['id'])->send();
	$item = json_decode($item, true);

	$title = $item[0]['title'];
	$desc = $item[0]['description'];

	//echo $title;
	//var_dump($item);



?>
<html>
	<form method="POST" action="">
		<input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>" /> <br/>
		<textarea name="desc" placeholder="Description" ><?php echo $desc; ?></textarea> <br/>
		<input type="submit" value="submit">
	</form>
</html>

<?php

}else{
	echo 'error id';
}

?>