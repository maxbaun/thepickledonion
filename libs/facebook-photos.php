<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('America/New_York');
require_once("facebook.php");

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '409416482513248',
  'secret' => 'df012044a3b3003e0814ad2f03fed7ed',
));

$albumid = $_GET['albumid'];

$d = $facebook->api($albumid . "/photos?fields=id,images,link,album");
$data = $d['data'];
$photos = Array();
foreach($data as $photo)
{
	$id = $photo['id'];
	$name = $photo['album']['name'];
	$source = $photo['images'][3]['source'];
	$link = $photo['link'];

	$photos[] = Array("id"=>$id,"name"=>$name,"source"=>$source,"link"=>$link);
}

echo json_encode($photos);
?>
