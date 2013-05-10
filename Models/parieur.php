<?php
 class Parieur_model {
 	public $connection;

 	function __construct(){
 		include "config.php";
 		//$db = new PDO('mysql:host=127.0.0.1;dbname=euro2012;charset=utf8', 'root', '');

 		//echo "Parieur Model Constructeur \n";
 		$this->connection=$db;
 		//var_dump($this->connection);
 	}

	function getParieurInfo($parieur_name=""){
		//echo "getParieur Info Model </br>";
		//global $db;
		//var_dump($this->connection);
		$query = "SELECT * FROM Parieur WHERE nom_parieur = ?";
		//echo "b1";
		$stmt=$this->connection->prepare($query);
		//echo "b";
		$myparam = $parieur_name;
		$stmt->bindValue(1, $parieur_name, PDO::PARAM_STR);
		$stmt->execute();
		//echo "avant";
		//$user=$stmt->fetchAll(PDO::FETCH_CLASS, "Parieur");
		//var_dump($user);
		//echo "a pres </br>";
		return $stmt;
	}

	function getParieurInfobyID($parieur_id){
		//echo "getParieur Info Model </br>";
		//global $db;
		//var_dump($this->connection);
		$query = "SELECT * FROM Parieur WHERE id_parieur = $parieur_id";
		//echo "b1";
		$stmt=$this->connection->query($query);
		$res=$stmt->fetch(PDO::FETCH_OBJ);
		//echo "b";
		//$myparam = $parieur_name;
		//$stmt->bindValue(1, $parieur_name, PDO::PARAM_STR);
		//$stmt->execute();
		//echo "avant";
		//$user=$stmt->fetchAll(PDO::FETCH_CLASS, "Parieur");
		//var_dump($user);
		//echo "a pres </br>";
		return $res;
	}

	function getParieurs(){
		$query = "SELECT * FROM Parieur";
		$stmt=$this->connection->query($query);
		while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
			$parieurs[$row->id_parieur]=$row;
		}
		return $parieurs;
	}

	function getNombreParieurs(){
		//global $db;
		$query = "SELECT * FROM Parieur";
		$stmt=$this->connection->query($query);
		$nb = $stmt->rowcount();
		return $nb;
	}

	function createNewParieur($name, $email, $password){
		//global $db;

		$query = "insert into Parieur (nom_parieur,email,password) values(:name,:email,:crypted_password)";
		$InsertPAris = "insert into Paris (parieur) values (:id_parieur)";
		$InsertParisTemp = "insert into ParisTemp (parieur) values (:id_parieur)";

		$queryautoincrement1 = "ALTER TABLE Parieur AUTO_INCREMENT = 1";
		$stmt=$this->connection->query($queryautoincrement1);
		//echo "a";

		$stmt=$this->connection->prepare($query);
		//echo $name. " et mail".$email." et pwd".$password;
		$stmt->execute(array(':name' => $name, ':email' => $email,':crypted_password' => $password));
		//echo "vous etes ici";
		$LastId = $this->connection->LastInsertId();
		
		$stmt=$this->connection->prepare($InsertPAris);
		$stmt->execute(array(':id_parieur' => $LastId));
		$stmt=$this->connection->prepare($InsertParisTemp);
		$stmt->execute(array(':id_parieur' => $LastId));
		//echo $name. " et mail".$email." et pwd".$password;
		return $LastId;
	}

	function deleteParieur($id_parieur){
		$queryParieur = "DELETE FROM Parieur where id_parieur =? ";
		$queryParis = "DELETE FROM Paris where parieur =? ";
		$queryParisTemp = "DELETE FROM ParisTemp where parieur =? ";

		$stmt1=$this->connection->prepare($queryParieur);
		$stmt2=$this->connection->prepare($queryParis);
		$stmt3=$this->connection->prepare($queryParisTemp);


		$stmt1->execute(array($id_parieur));
		$stmt2->execute(array($id_parieur));
		$stmt3->execute(array($id_parieur));
	}

	/*function parieurTranspose($parieurs){
		foreach($parieurs as $key =>$parieur){
			$par[$parieur->id_parieur]=$key;
		}
		//var_dump($par);
		return $par;
	}*/

 }



?>