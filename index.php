<?php

$activePages = array(
"home" => true, 
"call" => true, 
"submission" => true, 
"invited" => true, 
"venue" => true, 
"papers" => true, 
"program" => true, 
"abstracts" => true, 
"invited-abstracts" => true, 
"registration" => true, 
"accommodation" => true, 
"contact" => true,
"instructions" => true);


?>
<!DOCTYPE HTML>
<html xmlns:og="http://ogp.me/ns#" >
<head>
  <meta property="og:image" content="http://icits2015.net/img/Screenshot1.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<title>ICITS 2015</title>
</head>
<body>
<div id="header">
				<img src="img/Logo_white.png"  alt="icits">
</div>

	<div id="menu">
		<ul>
			<li class="menu-toplevel"><a onclick="pageClick('home'); return false;" href="?">Home</a></li>
      <li class="menu-toplevel"><a onclick="pageClick('call'); return false;" href="?page=call">Papers</a>
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
    <td>		Sponsors:
    </td>
    <td>
		In cooperation with:
    </td>
    </tr>
    <tr>
    <td>
		<a target="_blank" href="http://www.usi.ch/"><img alt="USI" id="USI" src="img/logo-usi.png" /></a>
		<a target="_blank" href="http://www.nccr-qsit.ethz.ch/"><img alt="QSIT" id="QSIT" src="img/logo-qsit.gif" /></a>
    </td>
    <td>
		<a target="_blank" href="http://www.iacr.org/"><img alt="iacr" id="iacr" src="img/iacr.gif" /></a>
    </td>
    </tr>
    </table>
	</div>

</body>
</html>
