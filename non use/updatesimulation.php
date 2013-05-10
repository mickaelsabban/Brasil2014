<?
session_start();
include "config.php";
include "../Module/loadsessionvars.php";
include "../Module/functioneuro2012.php";
include "../Module/funcdatabase.php";
//echo "reset ->".$_POST['reset'];
if(isset($_POST['reset'])){
	//echo "reset";
	//reset des scores des matchs from dt
	list ($_SESSION['$matchs_equipes'],$_SESSION['$score']) = getMatchs();
	header('Location: ../simulation.php');
	exit();
}else{
	//echo "a".$_POST['matchdebut'];
	for($match = $_POST['matchdebut'] ; $match <= $_POST['matchfin']; $match++){
		//$_POST['score_1_'.$match];
		$score[1][$match] = $_POST['score_e1_m'.$match];
		$score[2][$match] = $_POST['score_e2_m'.$match];
	}
	$_SESSION['$score']=$score;
	//print_r($_SESSION['$score']);
	include "../Module/moduleupdatesimulation.php";
	//echo $location;
	
		header('Location: '.$location);
	
}

?>