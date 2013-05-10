<?php
session_start();
//echo "je suis ici";	
//include "functionEURO2012.php";
//recup des variables de session
include "Module/loadsessionvars.php";
//echo "je suis la";
include "Module/security.php";
check_admin($parieur_id);
include "header.php";
?>

<form action="Controller/copydtbase.php" method="POST" id="insert">
	<input type= "radio" name="dtb" value="PtoT"> From Prod to Temp
	<input type= "radio" name="dtb" value="TtoP"> From Temp to Prod
	<div><input type="submit" class="button" id="signup" value="Go!"></div>

</form>
