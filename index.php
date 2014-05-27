<?php

if(isset($_SERVER) && isset($_SERVER["HTTP_USER_AGENT"])){
	$agent = $_SERVER["HTTP_USER_AGENT"];
}else if(isset($HTTP_USER_AGENT)){
	$agent = $HTTP_USER_AGENT;
}else{
	$agent = "no agent";
}
$agent = strtolower($agent);

if(isset($_GET["noMobile"]) && $_GET["noMobile"]){
	$noMobile = true;
	$params['noMobile'] = "true";
}else{
	//if mobile browser, redirect to the mobile version
	if( 
	   is_int(strpos($agent, 'iphone'))
	  || is_int(strpos($agent, 'ipod')) 
	  // || is_int(strpos($agent, 'ipad')) //disabled. show ipad it as normal page on ipad.
	  || is_int(strpos($agent, 'android')) 
	  || is_int(strpos($agent, 'smartphone')) 
	  || is_int(strpos($agent, 'windows phone')) ){
		#user is on a mobile device.
		echo "<html><head>";
		echo "<meta http-equiv=\"refresh\" content=\"0; URL=mobile.php\">";
		echo "</head><body></body></html>";
		exit(0);
	}

}

$activePages = array(
"home" => true, 
"call" => true, 
"submission" => true, 
"invited" => true, 
"venue" => true, 
"papers" => true, 
"abstracts" => true, 
"invited-abstracts" => true, 
"registration" => true, 
"accommodation" => true, 
"contact" => true);


?>
<!DOCTYPE HTML>
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
	<?php
		if(is_int(strpos($agent, 'ipad'))){
			echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" >\n";
		}
	?>
	<title>ICITS 2015</title>

	<style type="text/css">
	a {text-decoration: none;}
	a:link {color: #14346f;}
	a:visited {color: #14346f;}
	a:active {color: #003B6F;}
	a img { border: none; }

	img {padding:1px;}
	

	p {margin-top:1em; margin-bottom:1em}

	#title {
		padding:5px; 
		position:absolute;
		left:170px;
		top:40px;
		color:black;

		font-family:"Times New Roman",Georgia,Serif;
	}
	#titlebox {
		position:absolute;
		left:170px;
		top:40px;
		width:200px;
		height:130px;
		background-color:white;
		opacity:0.7;
		filter:alpha(opacity=70);
	}

	#title1 {font-size:36px; padding:5px;}
	#title1 a {color: black}
	#title2 {font-size:21px; padding:5px;}
	#title3 {font-size:20px; padding:5px;}

	#sponsors {
		font:14px arial,sans-serif;
		position:absolute;
		left:8px;
		top:564px;
		width: 170px;
		border:1px solid #eeeeee; 
		padding-left:10px;
	}

	#iqc { margin-bottom:8px;}
	#crm { margin-bottom:8px;}
	#intriq { margin-left:10px; margin-bottom:5px;}
	#udm { margin-left:14px; margin-bottom:15px;}


	#iacr { margin-left:30px; margin-bottom:10px;}


	#menu {
		font:14px arial,sans-serif;
		position:absolute;
		left:8px;
		top:228px;
		border:1px solid #eeeeee; 
	}


	#menu ul {
		margin:0px;
		padding:0px;
		width:180px; 
		list-style-type: none;
	}

	#menu ul li{
		border-bottom:1px solid white; /*because of some stupid error in IE6 */
	}


	#menu ul li div {
		display:block;
		padding:8px;
		padding-top:7px;
		padding-left:12px;
		font-family:arial,sans-serif;
		color:gray;
	}
	#menu ul li a {
		display:block;
		padding:8px;
		padding-top:7px;
		padding-left:12px;
		font-family:arial,sans-serif;
	}
	#menu ul li a:hover {
		padding:8px;
		padding-top:7px;
		padding-left:12px;
		background-color: #eeeeee;
	}

	ul.single{
		margin-top: -0.5em; 
	}

	ul.double{
		padding-left:20px; width:700px;
		margin-bottom:20px;
		overflow:hidden;
	}
	ul.double li{
		line-height:1.5em;
		float:left;
		display:inline;
		width:350px;
	}

	#content {
		padding:10px; padding-left:20px;
		margin:10px; margin-left:192px;  margin-right:0px;
		border:1px solid #eeeeee;
		font:14px arial,sans-serif;
		min-width:340px;
		max-width:800px;
	}

	#content h2 {font-size:22px; color:#880000;}
	#content h4 {font-size:16px; color:#880000;margin-bottom:10px;}


	p.indent{
		padding-left:25px;
		text-indent: -25px;
	}

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
		padding-left:10px;
		padding-right:8px;
	}
	table.program tr td.time_col{
		width:160px;
		vertical-align:top;
		padding-top:15px;
	}

	@media (max-width: 880px) {
		ul.double{
			width:340px;
		}
	}

	@media (max-width: 800px) {
		table.program tr td.time_col{
			width:120px;
		}
	}
	@media (max-width: 600px) {
		table.program tr td.time_col{
			width:100px;
		}
	}
	</style>

	<link rel="Stylesheet" type="text/css" href="css/smoothDivScroll.css" />
	<style type="text/css">
		#makeMeScrollable{
			width:100%;
			height: 210px;
			position: relative;
		}
		
		#makeMeScrollable div.scrollableArea img{
			position: relative;
			float: left;
			margin: 0;
			padding: 0;
		}
	</style>

	<script src="js/jquery.tache.hashchange.js" type="text/javascript"></script>
	<script src="js/jquery.ui.widget.js" type="text/javascript"></script>
	<script src="js/jquery.smoothDivScroll-1.1-min.js" type="text/javascript"></script>

	<script type="text/javascript">

		function loadContent(newParams,oldParams) {
			//make sure newParams is only text
			var re = /^[A-Za-z]+$/;
			if((newParams == "") || (!re.test(newParams)))
				file = "home.txt";
			else
				file = newParams+".txt";

			$.Tache.Get({
				type: "GET",
				url: file,
				data: "",
				success: function(msg){
					$("#content").html(msg);	
				}
			});
		}

		lastHashvalue = "";
		function checkHash(){
			//only this seems to work with ie6:
			hashlist = document.location.toString().split('#');
			if(hashlist.length > 1)
				hashvalue = hashlist[1];
			else
				hashvalue = "";

			if(hashvalue != lastHashvalue){
				loadContent(hashvalue,lastHashvalue);
				lastHashvalue = hashvalue;
			}	
		}

		$(document).ready(function(){
			$.ajaxSetup({
			  cache: true
			});
			$(window).bind('hashchange',function(){
				checkHash();
			});
			$(window).trigger('hashchange');

			//taken from http://www.smoothdivscroll.com
			// Initialize the plugin with no custom options
			$(window).load(function() {
				$("div#makeMeScrollable").smoothDivScroll({});
			});

		});

		function pageClick(page){
	 		void(open('#'+page,'_self'));
		}
	</script> 
</head>
<body>
<div align="center">
				<img src="img/icits60.png" alt="icits">
</div>
<!--
	<div id="makeMeScrollable">
		<div class="scrollingHotSpotLeft"></div>
		<div class="scrollingHotSpotRight"></div>
		<div class="scrollWrapper">
			<div class="scrollableArea">
				<img src="img/lugano1.jpg" alt="downtown">
				<a href="http://maps.google.ca/maps?q=stade+olympique+montreal&amp;client=ubuntu&amp;channel=cs&amp;fb=1&amp;gl=ca&amp;cid=0,0,3090691801685794409&amp;z=16&amp;iwloc=A">
					<img src="img/lugano2.jpg" alt="Stade Olympique">
				</a>
				<a href="http://maps.google.ca/maps?q=biosphere+montreal&amp;hl=en&amp;sll=45.558986,-73.550806&amp;sspn=0.009075,0.014205&amp;gl=ca&amp;z=14">
					<img src="img/lugano3.jpg" alt="Biosphere">
				</a>
				<a href="http://www.schwartzsdeli.com/">
					<img src="img/lugano4.jpg" alt="schwartz">
				</a>
				<a href="http://www.stviateurbagel.com/main/">
					<img src="img/lugano5.jpg" alt="bagel">
				</a>
			</div>
		</div>
	</div>
-->

<!--
	<div id="titlebox"></div>
	<div id="title">
		<div id="title1"><a onclick="pageClick(''); return false;" href="?">ICITS&nbsp;2015</a></div>
		<div id="title2">May 2-5, 2015</div>
		<div id="title3">Lugano, Switzerland</div>
	</div>
-->

	<div id="menu">
		<ul>
			<li><a onclick="pageClick('home'); return false;" href="?">Home</a></li>
			<li><a onclick="pageClick('call'); return false;" href="?page=call">Call for Papers</a></li>
			<li><a onclick="pageClick('submission'); return false;" href="?page=submission">Submission</a></li>
			<li><a onclick="pageClick('invited'); return false;" href="?page=invited">Invited Speakers</a></li>
			<li><a onclick="pageClick('papers'); return false;" href="?page=papers">Accepted Papers</a></li>
			<li><a onclick="pageClick('program'); return false;" href="?page=program">Program</a></li>
			<li><a onclick="pageClick('venue'); return false;" href="?page=venue">Venue</a></li>
			<li><a onclick="pageClick('registration'); return false;" href="?page=registration">Registration</a></li>
			<li><a onclick="pageClick('accommodation'); return false;" href="?page=accommodation">Accommodation</a></li>
			<li><a onclick="pageClick('contact'); return false;" href="?page=contact">Contact</a></li>
		</ul>
	</div>

	<div id="sponsors">
		<h4>Sponsors:</h4>
		<a href="http://www.usi.ch/"><img alt="USI" id="USI" width="150" src="img/logo-usi.gif" /></a>
		<a href="http://www.zurich.ibm.com/"><img alt="ibm" id="ibm" width="150" src="img/logo-ibm.jpg" /></a>

		<h4>In cooperation with:</h4>
		<a href="http://www.iacr.org/"><img alt="iacr" id="iacr" width="85" src="http://www.iacr.org/forms/logo/iacrlogo.gif" /></a>
	</div>

	<div id="content">
	<?php

	if( isset($_GET["page"]) && $activePages[$_GET["page"]] ){
		readfile($_GET["page"].".txt");
	}else{
		readfile("home.txt");
	}

	

	?>
	</div>
</body>
</html>
