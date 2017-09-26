<?php

// Point to where you downloaded the phar
include('./httpful.phar');
date_default_timezone_set('Asia/Jakarta');
 
// And you're ready to go!
$response = \Httpful\Request::get('https://hacktivcash-api.herokuapp.com/api/products')->send();
$response = json_decode($response, true);

foreach($response as $row){

    echo '<img style="width:200px" src="'.$row['image_url'].'"><br>';
    echo '<h3>'.$row['title'].'</h3>';
    echo $row['description'].'<br>';
    echo $row['price'].'<br>';
    echo $row['stock'].'<br>';
    echo isset($row['created'])? date('d M Y H:i',$row['created']) : '' ;
    echo '<br><a href="item.php?id='.$row['_id'].'">view</a> | <a href="edit.php?id='.$row['_id'].'">edit</a> | <a href="delete.php?id='.$row['_id'].'">delete</a><br>';
    echo '<br><hr>';
}

//var_dump($response);
//echo $response;

?>