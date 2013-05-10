<?php
session_start();
      include "../Module/functioneuro2012.php";
      include "config.php";
      //recup des variables de session
      include "../Module/loadsessionvars.php";
      

//Get data in local variable
$v_name=ucfirst($_POST['name']);
$v_email=$_POST['email'];
$v_winner=$_POST['Winner'];
$v_bestscorer=$_POST['Best_Striker']; 

//$queryParieur = "insert into Parieur(nom_parieur) values('$v_name')";

//$query1="insert into Paris(parieur,winner,best_scorer";
//$query2 = ") values('$parieur_id','$v_winner','$v_bestscorer'";
//$query3 = ")";
$queryUpdate = "UPDATE ParisTemp SET ";
//echo $MatchAfter;;
for ($match=$MAtchBefore+1;$match<=$MatchAfter;$match++){
	// creating local variable
	$paris[1][$match]=$_POST['nb_but_e1_m'.$match];
	$paris[2][$match]=$_POST['nb_but_e2_m'.$match];

	//updating sql queries
	//$query1 = $query1 . ",nb_but_e1_m".$match.",nb_but_e2_m".$match;
	//$query2 = $query2 . ",'".$paris[1][$match]."','".$paris[2][$match]."'";
      if ($paris[1][$match]!=""){
            $queryUpdate = $queryUpdate . "nb_but_e1_m".$match." = ".$paris[1][$match].", ";
      }     
      if($paris[2][$match]!=""){
            $queryUpdate = $queryUpdate ."nb_but_e2_m".$match. " = ".$paris[2][$match]. ", ";
      }
}

//creation of the Query to insert new player
$//query = $query1.$query2.$query3;

//make sure next parieur has the id of the previosu one +1 by setting auto increment
$queryautoincrement2 = "ALTER TABLE ParisTemp AUTO_INCREMENT = " .($parieur_id-1);

//echo ($queryUpdate);
$queryUpdate = substr($queryUpdate, 0,strlen($queryUpdate)-2);
$queryUpdate = $queryUpdate. " WHERE parieur = ".$parieur_id;

$db->query($queryUpdate);

include "../Module/moduleupdatetemp.php"; 
header( 'Location: '.$location)
?>

<a href="../pronostic.php" > go back to main </a>
