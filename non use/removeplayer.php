<?php
session_start();
      include "../Module/functioneuro2012.php";
      include "config.php";
      include "../Module/security.php";
      //recup des variables de session
      $parieurs = $_SESSION['$parieurs'];
      $totaljoueurpoints = $_SESSION['$totaljoueurpoints'];
      $NombreParieurs=$_SESSION['$NombreParieurs'];
      $nbBonsens=$_SESSION['$nbBonsens'];
      $nbscoresexact=$_SESSION['$nbscoresexact'];
      $pointsbonsens=$_SESSION['$pointsbonsens'];
      $pointsbonscore=$_SESSION['$pointsbonscore'];
      $nextgametoplay=$_SESSION['$nextgametoplay'];
      $nb_buts=$_SESSION['$nb_buts'];
      $matchs_equipe=$_SESSION['$matchs_equipe'];
      $parisBonus=$_SESSION['$parisBonus'];
      $nombreMatchsPoule=$_SESSION['$nombreMatchsPoule'];
      $nombreMatchsQuarts=$_SESSION['$nombreMatchsQuarts'];


// contact to database
//connection to database local
/*mysql_connect("localhost", "root", "root") or die (mysql_error ());
mysql_select_db("euro2012") or die(mysql_error());
*/


//connection to database a2 hosting
/*mysql_connect("localhost", "leasabba", "facilemika55") or die (mysql_error ());
mysql_select_db("leasabba_euro2012") or die(mysql_error());
*/
 



//Get data in local variable
$v_playerid=$_POST['player_id'];

$queryParieur = "Delete from Parieur where id_parieur =? ";
$queryParis = "Delete from Paris where parieur =? ";
$queryParisTemp = "Delete from ParisTemp where parieur =? ";

$stmt1=$db->prepare($queryParieur);
$stmt2=$db->prepare($queryParis);
$stmt3=$db->prepare($queryParisTemp);


$stmt1->execute(array($v_playerid));
$stmt2->execute(array($v_playerid));
$stmt3->execute(array($v_playerid));


//Sql Querry

//mysqli_query($link,$queryParieur)  or die(mysqli_error());//Old Version
//mysqli_query($link,$queryParis)  or die(mysqli_error());//Old version

include "../Module/moduleinit1.php";
include "../Module/moduleinit2.php";

$mess = "Joueur supprime";
    header( 'Location: ../deleteplayer.php?Message='.$mess);
?>
<br>
<a href="pronostic.php" > go back to main </a>
