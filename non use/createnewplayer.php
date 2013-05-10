<?
session_start();

//recup des variables de session
include "../Module/loadsessionvars.php";
include "config.php";
include "../Module/functioneuro2012.php";
include "../Module/funcdatabase.php";
//echo "ici";
include "../Module/security.php";
//recup data formulaire:
$v_name=ucfirst(trim($_POST['name']));
$v_email=$_POST['email'];
$v_password=$_POST['password'];
$v_repassword=$_POST['RePassword'];

// test si le Username est deja pris
if(userexist($v_name)){


	$mess = "Username already in use, please choose another One";
    header('Location:../login.php?Message='.$mess);
}elseif(empty($v_name)){
		$mess = 'Fini Matthieu: pas de username vide';
    header('Location:../login.php?Message='.$mess);
}else{
	//test si le password est consistent
	if ($v_password!=$v_repassword){
		echo "Veuillez verifier votre mot de passe";
		echo "<a href='../login.php' > go to login </a>";
	}else{
		$crypted_password = crypt($v_password);

		createNewParieur($v_name,$email,$crypted_password);		
		
		$_SESSION['$parieur_id']=$LastId;
		$_SESSION['$parieur_name']=$v_name;

		$mess = "Welcome ".$v_name;
	    header( 'Location: '.$location.'?Message='.$mess);	
	    //echo "<a href='pronostic.php' >, entrez sur le site </a>";

	}
}







?>