<?
session_start();
include "config.php";
include "../Module/loadsessionvars.php";
include "../Module/functioneuro2012.php";
include "../Module/funcdatabase.php";

if($_POST['dtb']=="TtoP"){
	copydtbase('ParisTemp','Paris');
	include "../Module/moduleinit2.php";
}else{
	copydtbase('Paris,ParisTemp');
}
header( 'Location: '.$location)
?>