<?php
date_default_timezone_set('America/New_York');  
require_once("facebook.php");

$config = array();
$config['appId'] = '409416482513248';
$config['secret'] = 'df012044a3b3003e0814ad2f03fed7ed';

$facebook = new Facebook($config);

$d = $facebook->api("115280791823812/albums?fields=cover_photo,link,name,id");
//$d = $facebook->api("637938886216768/events?fields=cover,end_time,name,id");


$data = $d['data'];
$albums = Array();
foreach($data as $album)
{
	$id = $album['id'];
	$name = $album['name'];
	if(!isset($album['cover_photo']))
	{
		$cover = "";
		continue;
	}
	else
	{
		$coverdata = $facebook->api($album['cover_photo']);
		// debugging
		// var_dump($coverdata['images']);
		// echo '<br/><br/>';
		if(!isset($coverdata['images'][3])){
			$cover = $coverdata['images'][1]['source'];	// if the regular image is not avail, use the first one			
		}
		else
			$cover = $coverdata['images'][3]['source'];
	}
	$link = $album['link'];
	
	$albums[] = Array("id"=>$id,"name"=>$name,"cover"=>$cover,"link"=>$link);
}

echo json_encode($albums);
?>