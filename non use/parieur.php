<?php
include ('Models/parieur.php');
class Parieur {
	
	public $id_parieur;
	public $nom_parieur="";
	public $email="";
	public $password="";
	private $p_model;

	function __construct(){
		$this->p_model = new Parieur_model();
	}
	
	function import($object){
		foreach (get_object_vars($object) as $key => $value) {
            $this->$key = $value;
        }
	}

	function create($name,$email,$password){
		//echo "</br> doudou </br>";
		//echo " ici ";
	  	$result=$this->p_model->createNewParieur($name,$email,$password);
	  	//echo "</br> rowcount".$result->rowcount();
	    
	}
	
	// Check if Parieur exist by returning true or false
	function parieurexist($name){
		//echo "</br> doudou </br>";
		//echo " ici ";
	  	$result=$this->p_model->getParieurInfo($name);
	  	//echo "</br> rowcount".$result->rowcount();
	    if($result->rowcount()>0){
	    	return true;
	  	}else{
	    	return false;
	  	}
	}

	
	 //Get info of a specifik parieur
	function getParieurInfo($name){

		/*$db = new PDO('mysql:host=localhost;dbname=euro2012;charset=utf8', 'root', 'root');
		$sth = $db->prepare("SELECT * FROM Parieur where nom_parieur = 'Mika'");
		$sth->execute();

		$result = $sth->fetchAll(PDO::FETCH_CLASS, "Parieur");
		var_dump($result);
		echo "</br> ".$result[0]->nom_parieur;
		*/
		$result=$this->p_model->getParieurInfo($name);
		//var_dump($result);
		$user=$result->fetchAll(PDO::FETCH_CLASS,"Parieur");
		$user=$user[0];
		//($this);
		//$user=$user[0];
		//echo "</br>";
		//($user);
		//$boby = new Parieur();
		//var_dump($user);
		$this->import($user);
        //var_dump($this);
		//echo "getParieurInfo controller2 ".$user->nom_parieur."</br>";
		//return $user;
	}
	 


	function validate($name,$email,$password,$repassword){
		$result_validate_name=$this->validate_name($name);
		//echo "name valid->".($result_validate_name!==true)."</br>";
		if($result_validate_name !== true){
			//echo"</br>  je devrais pas voir ca </br>".($result_validate_name != true);
			return $result_validate_name;
			exit();
		}//echo"validate after name".$email;
		$result_validate_email = $this->validate_email($email);
		//echo "email valid->".$result_validate_email;
		if($result_validate_email !== true){
			return $result_validate_email;
		}
		$result_validate_password = $this->validate_password($password,$repassword);
		if($result_validate_password !== true){
			return $result_validate_password;
		}
		return true;
		//$this->validate_email($email);
		//$this->validate_password($password);
	}


	function validate_name($name){
		//echo"validate _name ".$this->_name." et ".$_name;
		$name=trim($name);

		//var_dump($this->$name);
		$this->nom_parieur=ucfirst(filter_var($name,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW));
		//$this->name=ucfirst(filter_var($name,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW));
		if(empty($this->nom_parieur)){
			//echo "false";
			return "error 201";
		}elseif ($this->parieurexist($name)) {
			return "error 204";
		}else{
			return true;
		}
	}

	function validate_email($email){
		//echo " la  validate email " ;
		$this->email=$email;
		$temp_email=filter_var($email,FILTER_VALIDATE_EMAIL);
		$this->email=filter_var($email,FILTER_SANITIZE_EMAIL);
		//var_dump ($this->$email);
		//var_dump ($temp_email);
		//$this->name=ucfirst(filter_var($name,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW));
		if(empty($temp_email)){
			//echo "false";
			return "error 202";
		}else{
			//echo "true";
			$this->email=$temp_email;
			return true;
		}
	}

	function validate_password($password,$repassword){
		//echo"la  ";
		$p1 =trim($password);
		$p2 =trim($repassword);
		
		//var_dump ($this->$email);
		//var_dump ($temp_email);
		//$this->name=ucfirst(filter_var($name,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW));
		if(empty($p1)||empty($p2)||($p1!=$p2)){
			//echo "false";
			return "error 203";
		}else{
			$this->password = crypt($passowrd);
			return true;
		}
		
	}
	
}


?>