<?php
date_default_timezone_set('America/Los_Angeles');  
require_once("facebook.php");

$config = array();
$config['appId'] = '409416482513248';
$config['secret'] = 'df012044a3b3003e0814ad2f03fed7ed';

$facebook = new Facebook($config);

$ret = $facebook->api("115280791823812/events?fields=cover,end_time,name,id&limit=100");

$events = Array();

foreach($ret['data'] as $event)
{
	
	$name = $event['name'];
	$cover = $event['cover']['source'];
	$id = $event['id'];
	$url = "https://facebook.com/events/" . $event['id'];
	$start_date = strtotime($event['start_time']);
	$start =  date("Y-m-d H:i:s", $start_date); //2013-04-01 17:30:00
	//echo $start;
	$start_month_long = date("F", $start_date);
	$start_month = date("m", $start_date);//substr($start_month_long, 0, 3);
	$start_day = date("j", $start_date);
	$start_year = date("Y", $start_date);
	$end_date = strtotime($event['start_time']);
//	$end = date("F j, Y, g:i a", $end);

	
	// with image
	$html = '<div class="event-info" id="'.$id.'"><ul class="what-when"><li><strong>'. $name .'</strong></li><li><p>'.$start_month.'/'.$start_day.'/'.$start_year.'</p></li><li><a href="'.$url.'"><img alt="" src="'.$cover.'"></a></li></ul><a href="'.$url.'" class="btn btn-primary" target="_blank">View Event</a></div>';
	
	// no image	
	//$html = '<div class="event-info"><ul class="what-when"><li><strong>'. $name .'</strong></li><li><p>'.$start_month.'/'.$start_day.'/'.$start_year.'</p></li><li><a href="'.$url.'"></ul><a href="'.$url.'" class="btn btn-primary" target="_blank">View Event</a></div>';

	// no image	& date
	//$html = '<div class="event-info" id="'.$id.'"><ul class="what-when"><li><strong>'. $name .'</strong></li><li><a href="'.$url.'"></ul><a href="'.$url.'" class="btn btn-primary" target="_blank">View Event</a></div>';


// 	if($start_year == $_GET['year'] && $start_month == $_GET['month']) 
// 	{
		$events[] = Array("date"=>$start, "title"=> $name, "url"=>$url);
//	}
	

}

echo json_encode($events);

?>