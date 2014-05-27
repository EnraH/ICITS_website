<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" >

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon" href="img/icon.png"/>
    <link rel="apple-touch-icon-precomposed" href="img/icon.png"/>
    <link rel="apple-touch-startup-image" href="img/apple_startup.jpg" />

<title>ICITS 2012</title>

<link href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" rel="stylesheet" /> 
<script src="http://code.jquery.com/jquery-1.6.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script> 
	
<style type="text/css">
	a {text-decoration: none;}

.img h3 {
	padding-top:8px;
}

.img2 h3 {
	padding-left:70px;
}

.ui-li-thumb{
	max-height: 50px; max-width: 72px; 
}

.picture{
	max-width: 290px; 
}

	#start .ui-bar-a {
		background-color:#FFFFFF; text-shadow: none; font-weight: normal;
		background-image: none;
		border: 0px;
	}
	#title {
		padding:5px; padding-left:15px;
		color:black;
		font-family:"Times New Roman",Georgia,Serif;
		background-image:url('img/downtown-mobile.jpg');
	}
	#title1 {font-size:36px; padding:5px; font-weight:normal;}
	#title1 a {color: black}
	#title2 {font-size:21px; padding:5px;}
	#title3 {font-size:20px; padding:5px;}

div.inactive{
	padding-top:2px; padding-bottom:2px; font-size:16px; color:gray;
}

.ui-content h2 {color:#880000;}
.ui-content h4 {font-size:18px; color:#880000;}

.ui-content ul.double {list-style-type:none; padding-left:15px;}
.ui-content li {padding-top:5px;}

p.indent{
	padding-left:15px;
	text-indent: -15px;
}

	#iqc { margin-bottom:8px;}
	#crm { margin-bottom:8px;}
	#intriq { margin-bottom:5px;}
	#udm { margin-left:10px; margin-bottom:5px;}
	#iacr { margin-left:10px; margin-bottom:40px;}


	.accepted {clear:right;margin-bottom:20pt;padding:4pt}
	.abstract {border-left: solid #bbbbbb 1px;border-right: solid #bbbbbb 1px;border-top: solid #bbbbbb 1px;padding:4pt}
	.paper {border-left: solid #bbbbbb 1px;border-right: solid #bbbbbb 1px;border-top: solid #bbbbbb 1px;padding:4pt}
	.abstract:last-child {border-bottom: solid #bbbbbb 1px;padding:4pt}
	.paper:last-child {border-bottom: solid #bbbbbb 1px;padding:4pt}

	table.program {
		width:100%; 
		border-spacing:0;
		border-right: solid #bbbbbb 1px; 
		border-bottom: solid #bbbbbb 1px;
	}
	table.program tr td {
		border-spacing:0;
		border-left: solid #bbbbbb 1px;
		border-top: solid #bbbbbb 1px;
		padding-left:4px;
		padding-right:4px;
	}

	table.program tr td.time_col{
		width:100px;
	}

</style>
</head>

<?php

$pages = array(
"home" => "Home", 
"call" => "Call for Papers", 
"submission" => "Submission", 
"invited" => "Invited Speakers", 
"papers" => "Accepted Papers", 
"program" => "Program", 
"venue" => "Venue", 
"registration" => "Registration", 
"accommodation" => "Accommodation", 
"contact" => "Contact");

//"tourist" => "Tourist Information", 

$activePages = array(
"home" => true, 
"call" => true, 
"submission" => true, 
"invited" => true, 
"papers" => true, 
"program" => true, 
"registration" => true,
"accommodation" => true,
"venue" => true, 
"contact" => true);

?>
<body>

<div data-role="page" data-theme="d" id="start">

  <div data-role="header" data-position="inline">
	<div id="title">
		<div id="title1">ICITS&nbsp;2012</div>
		<div id="title2">August 15-17, 2012</div>
		<div id="title3">Montreal, Canada</div>
	</div>
  </div>

  <div data-role="content"> 
    <ul data-role="listview" data-inset="true">

<?php
foreach ($pages as $id => $title) {
    if(isset($activePages[$id])){
	echo "<li><a href=\"#$id\" data-transition=\"slide\">$title</a></li>\n";
    }else{
	echo "<li><div class=\"inactive\">$title</div></li>\n";
    }	
}
?>
    </ul> 

<h4>Sponsors:</h4>
<a href="http://iqc.uwaterloo.ca/"><img alt="iqc" id="iqc" width="150" src="img/iqc-logo.jpg" /></a>
<br>
<a href="http://www.crm.umontreal.ca/"><img id="crm" width="150" src="http://www.crm.umontreal.ca/Logo/LOGO_CRM.jpg" /></a>
<br>
<a href="http://www.intriq.org/"><img id="intriq" width="150" src="img/intriq.jpg" /></a>
<br>
<a href="http://www.umontreal.ca/"><img id="udm" src="http://www.bcrp.umontreal.ca/images/iu/logo.gif" /></a>
<h4>In cooperation with:</h4>
		<a href="http://www.iacr.org/"><img alt="iacr" id="iacr" width="85" src="http://www.iacr.org/forms/logo/iacrlogo.gif" /></a>

<br>

    <a href="index.php?noMobile=true" rel="external">Normal ICITS-2012 website</a></li>
  </div>
  
</div>

<?php
foreach ($pages as $id => $title) {
?>

<div data-role="page" data-theme="d" id="<?php echo $id;?>">
  <div data-role="header" data-position="inline">
  	<a href="#start" data-role="button" data-icon="arrow-l" data-direction="reverse" data-theme="a">Back</a>
    <h1><?php echo $title;?></h1>
  </div>

  <div data-role="content"> 
	<?php readfile("$id.txt"); ?>
  </div>
</div>

<?php
	}
?>

<div data-role="page" data-theme="d" id="abstracts">
  <div data-role="header" data-position="inline">
  	<a href="#papers" data-role="button" data-icon="arrow-l" data-direction="reverse" data-theme="a">Back</a>
    <h1>Papers with Abstracts</h1>
  </div>

  <div data-role="content"> 
	<?php readfile("abstracts.txt"); ?>
  </div>
</div>

<div data-role="page" data-theme="d" id="invitedAbstracts">
  <div data-role="header" data-position="inline">
  	<a href="#invited" data-role="button" data-icon="arrow-l" data-direction="reverse" data-theme="a">Back</a>
    <h1>Abstracts</h1>
  </div>

  <div data-role="content"> 
	<?php readfile("invitedAbstracts.txt"); ?>
  </div>
</div>
<?php

$papers = array(
"qkd",
"optimum",
"mceliece",
"usercentric",
"unified",
"shannon",
"trading",
"quality",
"entropies",
"qextractors",
"nonmalleable",
"polar",
"timed",
"pir",
"physical",
"timing",
"everywhere",
"linear",
"reconstruction",
"david",
"guessing",
"fake",
"common",
"delegation",
"locking",
"privacy",
"passive",
"feasibility",
"amortized"
);

foreach ($papers as $id) {
?>

<div data-role="page" data-theme="d" id="<?php echo $id;?>">
  <div data-role="header" data-position="inline">
  	<a href="#program" data-role="button" data-icon="arrow-l" data-direction="reverse" data-theme="a">Back</a>
    <h1>Abstract</h1>
  </div>

  <div data-role="content"> 
	<?php readfile("$id.txt"); ?>
  </div>
</div>

<?php
}
?>
</body>
</html>
