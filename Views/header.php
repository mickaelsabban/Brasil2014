<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>EURO 2012</title>

     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     
</head>

<body>
	 	
		<header>
			<div id='wrapper'>
				<div id="lookup"><a href="logout" >Lookup</a></div>
				
				<h1>LDC 2014</h1>
				<nav>

					<ul>
						<li><a href="ranking">Classement</a></li>
						<li><a href="table">Tableau</a></li>
						<li><a href="simulation">Simulation</a></li>
						<li><a href="stat">Statistique</a></li>
						<li><a href="input">Input Prono</a></li>
						<li><a href="database">Dtb Mngmt</a></li>
						<? //if($parieur_id==1){?>
						<li><a href="delete">Delete player</a></li>
						<?//}?>
					</ul>
				</nav>
			</div>
		</header>	
		<?php
			 	if( !empty( $_REQUEST['Message'] ) )
			{
		    	echo sprintf( '<p>%s</p>', $_REQUEST['Message'] );
				echo "<div class='LogMessage'>".sprintf( '<p>%s</p>', $_REQUEST['Message'] )."</div> <!-- end div LogMessage-->";
			}
		?>
