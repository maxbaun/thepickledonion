<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<?php
		$title = "Beverly Night Life, Sports Bar, and Restaurant | The Pickled Onion";
		$keywords = "beverly, trivia, sports, nightlife, karaoke, restaurant, bar, irish pub, sports bar, djs, music";
		$metadescription = "Beverly, MA nightlife, pub, sports bar, and restaurant. The Pickled Onion features the best in live music and DJs on the North Shore.";
		$version = 1.1;
		$dev = true;
	?>
	<!-- Basic Page Needs
  ================================================== -->

  	<!-- Charset -->
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $title; ?></title>

	<meta name="title" content="<?php echo $title; ?>">
	<meta name="description" content="<?php echo $metadescription; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<!-- Google will often use this as its description of your page/site. Make it good. -->

	<meta name="google-site-verification" content="">

	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="<?php echo $title; ?>">
	<meta name="DC.subject" content="<?php echo $metadescription; ?>">

	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- CSS
    ================================================== -->

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <?php
    if( $dev )
    {
    ?>
		<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
		<link rel="stylesheet" href="css/eventCalendar.css?v=<?php echo $version; ?>">

		<!-- Theme CSS file: it makes eventCalendar nicer -->
		<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css?v=<?php echo $version; ?>">

		<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo $version; ?>">
		<link rel="stylesheet" href="css/colorbox.css?v=<?php echo $version; ?>">
		<link rel="stylesheet" href="css/flexslider.css?v=<?php echo $version; ?>">
		<link rel="stylesheet" href="css/styles.css?v=<?php echo $version; ?>">
		<link rel="stylesheet" href="css/landing.css?v=<?php echo $version; ?>">

		<!-- Custom Theme -->
		<link rel="stylesheet" href="css/green.css?v=<?php echo $version; ?>" id="color">
    <?php }
    else {
	?>
		<link rel="stylesheet" href="css/styles.min.css?v=<?php echo $version; ?>">
	<?php } ?>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

	<!--[if IE]>
	<script src="assets/javascripts/placeholders.min.js"></script>
	<![endif]-->

	<!--[if IE lte 8]>
	<script src="assets/javascripts/respond.min.js"></script>
	<![endif]-->

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>
  <!-- HERO -->
  <div class="hero">
    <div class="vertical-center-wrapper">
      <div class="vertical-center">
        <div id="logo">
          <h3>The Pickled Onion</h3>
        </div>
        <div class="content">
					<h3><a href="https://www.facebook.com/pages/The-Pickled-Onion-Inc/115280791823812">Please visit us on Facebook for more info!</a></h3>
          <ul class="social">
						<li><a href="https://www.facebook.com/pages/The-Pickled-Onion-Inc/115280791823812">Join us on Facebook!</a></li>
					</ul>
					<?php include("inc/address.inc"); ?>
        </div>
      </div>
    </div>
  </div>


	<!-- Javascript
	================================================== -->

	<!-- jQuery via CDN with local Fallback- remove 'http:' if you're using ssl somewhere on your site
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src='assets/javascripts/jquery-1.9.1.min.js'>\x3C/script>")</script>
	-->

	<!-- jQuery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<!-- Google Maps API -->
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

	<!-- ALl the scripts -->



    <?php
    if( $dev )
    {
    ?>
    	<script src="js/all.js?v=<?php echo $version; ?>"></script>
    	<script src="js/global.js"></script>
    	<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>

    <?php }
    else {
	?>
		<script src="js/scripts.min.js?v=<?php echo $version; ?>"></script>
	<?php } ?>

	<script>
		$(document).ready(function() {
			$("#eventCalendar").eventCalendar({
				eventsjson: 'libs/facebook-events.php',
				jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
			});
		});
	</script>

	<?php include_once("inc/analyticstracking.php"); ?>
</body>
</html>
