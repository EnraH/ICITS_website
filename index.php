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
  <link rel="stylesheet" href="css/style.css" />
	<?php
		if(is_int(strpos($agent, 'ipad'))){
			echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" >\n";
		}
	?>
	<title>ICITS 2015</title>


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
<div id="header">
				<img width="100%" src="img/icits60.png" alt="icits">
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
  <!--<img src="img/Logo_white_small.png">-->
		<ul>
			<li class="menu-toplevel"><a onclick="pageClick('home'); return false;" href="?">Home</a></li>
      <li class="menu-toplevel"><a onclick="pageClick('home'); return false;" href="?">Papers</a>
      <ul>
        <li class="menu-level-1"><a onclick="pageClick('call'); return false;" href="?page=call">Call for Papers</a></li>
        <li class="menu-level-1"><a onclick="pageClick('submission'); return false;" href="?page=submission">Submission</a></li>
        <li class="menu-level-1"><a onclick="pageClick('invited'); return false;" href="?page=invited">Invited Speakers</a></li>
        <li class="menu-level-1"><a onclick="pageClick('papers'); return false;" href="?page=papers">Accepted Papers</a></li>
      </ul></li>
			<li class="menu-toplevel"><a onclick="pageClick('program'); return false;" href="?page=program">Program</a></li>
			<li class="menu-toplevel"><a onclick="pageClick('venue'); return false;" href="?page=venue">Venue</a></li>
			<li class="menu-toplevel"><a onclick="pageClick('registration'); return false;" href="?page=registration">Registration</a></li>
			<li class="menu-toplevel"><a onclick="pageClick('accommodation'); return false;" href="?page=accommodation">Accommodation</a></li>
			<li class="menu-toplevel"><a onclick="pageClick('contact'); return false;" href="?page=contact">Contact</a></li>
		</ul>
<!--  <div id="menu-link">
    
  </div> 
  -->
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
	<div id="sponsors">
  <table>
    <tr>
    <td>
		Sponsors:
    </td>
    <td>
		In cooperation with:
    </td>
    </tr>
    <tr>
    <td>
		<a target="_blank" href="http://www.usi.ch/"><img alt="USI" id="USI" src="img/logo-usi.gif" /></a>
		<a target="_blank" href="http://www.zurich.ibm.com/"><img alt="ibm" id="ibm" src="img/logo-ibm.jpg" /></a>
    </td>
    <td>
		<a target="_blank" href="http://www.iacr.org/"><img alt="iacr" id="iacr" src="img/iacr.gif" /></a>
    </td>
    </tr>
    </table>
	</div>

</body>
</html>
