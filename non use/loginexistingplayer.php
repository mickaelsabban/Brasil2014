<?
session_start();

//recup des variables de session
include "../Module/loadsessionvars.php";
include "config.php";
include "../Module/functioneuro2012.php";
include "../Module/functiondatabase.php";


include "../Module/moduleinit2.php";


//echo " loginexisting ".$parieur_id;


//recup data formulaire
$v_name=ucfirst($_POST['name']);
$v_password=$_POST['password'];

//$salt='$2a$07$maistuvasbieng';

//cryptage

//$crypted_password = crypt("$1$wrgxWXxd$SRIsY/hHD8K4JKT9GdIOE/","$1$wrgxWXxd$SRIsY/hHD8K4JKT9GdIOE/");
//echo $crypted_password;
//echo"<br>";

$crypted_password = crypt($v_password);


//$double_password = crypt($v_password,$crypted_password);

//recherche dans la base si le joueur existe
foreach($parieurs as $num=>$table){

	// echo $table["name"]."   ".$table["password"];
	// echo"<br>";
	// echo crypt($v_password,$table["password"]);
	// echo"<br>";
	

	if($table["name"] == $v_name && $table["password"] == crypt($v_password,$table["password"])){
		//echo "Welcome ".$table['name']." number".$num;
		$parieur_name =  $table['name'];
		$parieur_id = $table['id'];
		$_SESSION['$parieur_id']=$parieur_id;
		$_SESSION['$parieur_name']=$parieur_name;
		include "../Module/moduleupdatetemp.php";
		header( 'Location: '.$location ) ;
	}elseif($table["name"] == $v_name ){
		$parieur_name =  $table['name'];
	}
}
//echo $parieur_name;
//echo $parieur_id;
if ($parieur_name==null ){
	$mess = "We cant find you.Please create a new player or try again";
    header( 'Location:../login.php?Message='.$mess);
}elseif($parieur_id==null){
	$mess = "Wrong Password, please try again";
    header( 'Location: ../login.php?Message='.$mess);	
}


?>