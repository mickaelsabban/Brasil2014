<?php

	// Connect to database server
	//demander switch 
	//connection to database local
	/*mysql_connect("localhost", "root", "root") or die (mysql_error ());
	mysql_select_db("euro2012") or die(mysql_error());
	*/
	
	//connection to database a2 hosting
	/*mysql_connect("localhost", "leasabba", "facilemika55") or die (mysql_error ());
	mysql_select_db("leasabba_euro2012") or die(mysql_error());
	//*/
	//$link=mysqli_connect("localhost", "root", "root","euro2012");
try{
	$db = new PDO('mysql:host=localhost;dbname=Brasil2014;charset=utf8', 'root', 'root');
	// PROD
	//$db = new PDO('mysql:host=localhost;dbname=leasabba_euro2012;charset=utf8', 'leasabba', 'facilemika55');
	// Easyphp

	//$db = new PDO('mysql:host=127.0.0.1;dbname=Brasil2014;charset=utf8', 'root', '');
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
?>