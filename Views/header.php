<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Latest compiled and minified CSS -->

	<title>BRASIL 2014</title>

     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script src="js/amcharts/amcharts.js" type="text/javascript"></script>
      <script src="js/amcharts/pie.js" type="text/javascript"></script>
     
</head>

<body>
	<div id="wrapper">
		<header>
			<div id="lookup"><a href="logout" >Lookup</a></div>
			<h1>Brasil 2014</h1>
			<nav>
				<ul>
					<li><a href="rules">Rules</a></li>
					<li><a href="ranking">Ranking</a></li>
					<li><a href="table">Table</a></li>
					<li><a href="simulation">Simulation</a></li>
					<li><a href="stat">Stats</a></li>
					<li><a href="input">Input Prono</a></li>
					<? //if($parieur_id==1){?>
					<li><a href="delete">Admin</a></li>
					<?//}?>
				</ul>
			</nav>
		</header>
		<div id="content" class="cfx">
			<?php
				if( !empty( $_REQUEST['Message'] ) )
				{
					echo sprintf( '<p>%s</p>', $_REQUEST['Message'] );
					echo "<div class='LogMessage'>".sprintf( '<p>%s</p>', $_REQUEST['Message'] )."</div> <!-- end div LogMessage-->";
				}
			?>
			<!-- include page -->


