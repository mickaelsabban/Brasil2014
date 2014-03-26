<?php
class Match_model {
 	public $connection;

 	function __construct(){
 		include "config.php";
 		//$db = new PDO('mysql:host=127.0.0.1;dbname=euro2012;charset=utf8', 'root', '');
 		//var_dump($db);
 		//echo "Parieur Model Constructeur \n";
 		$this->connection=$db;
 	}

 	function getGroupes($var=""){
 		if($var == "Large"){
 			$query = "SELECT min(ordre_affichage),max(ordre_affichage),Type_match,Type_match2  FROM matchs GROUP BY Type_match ORDER BY min(ordre_affichage)";
 		}else{
 			$query = "SELECT min(ordre_affichage),max(ordre_affichage),Type_match,Type_match2  FROM matchs GROUP BY CONCAT(Type_match,Type_match2) ORDER BY min(ordre_affichage)";
		}
		//echo "b1";
		//var_dump($this->connection);
		$stmt=$this->connection->query($query);
		//echo "b";
		//$myparam = $parieur_name;

		//echo "avant";
		while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
			//var_dump($row);
			$groupe = new Groupe($row->Type_match,$row->Type_match2,$row->{'min(ordre_affichage)'},$row->{'max(ordre_affichage)'});
			//echo $row->Type_match;
			//echo $row->{'min(ordre_affichage)'};
			//echo  $row->{'max(ordre_affichage)'};
			//var_dump($groupe);
			$groupes[]=$groupe;
		}
		//$groupes=$stmt->fetchAll(PDO::FETCH_OBJ);
		//$myvar= 'min(Id_match)';
		//var_dump($groupes);
		//echo "a pres </br>";
		return $groupes;
 	}

 	function getMatchs($id=NULL,$order="ordre_affichage"){
		//echo"debut22 ";
		if(!isset($id)){
			//echo "get matchs debut  ";
			$query = "SELECT ordre_affichage,equipe_1,equipe_2,score_e1,score_e2,Type_match,id_match  FROM matchs ORDER BY id_match";
		}else{
			$query = "SELECT *  FROM matchs Where Id_match=$id";
		}
		$stmt=$this->connection->query($query);
		//echo "after querry getMatchs";
		while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
			$match = new Match($row->ordre_affichage,$row->equipe_1,$row->equipe_2,$row->score_e1,$row->score_e2,$row->Type_match,$row->id_match);
			//echo $row->Type_match;
			//echo $row->{'min(ordre_affichage)'};
			//echo  $row->{'max(ordre_affichage)'};
			//var_dump($matchs);
			$matchs[$row->id_match]=$match;
		}
		//var_dump($matchs);
		//echo "a pres </br>";
		return $matchs;
	}

	function setMatchs(){
		$query = "UPDATE Matchs SET " ;
	}

	function getNextMatch(){
		//echo"debut22 ";
		$query = "SELECT ordre_affichage,equipe_1,equipe_2,score_e1,score_e2,Type_match,id_match  FROM matchs Where score_e1 IS NULL LIMIT 1";
		$stmt=$this->connection->query($query);
		//echo "after querry getMatchs";
		$row=$stmt->fetch(PDO::FETCH_OBJ);
		$match = new Match($row->ordre_affichage,$row->equipe_1,$row->equipe_2,$row->score_e1,$row->score_e2,$row->Type_match,$row->id_match);
		//echo $row->Type_match;
		//echo $row->{'min(ordre_affichage)'};
		//echo  $row->{'max(ordre_affichage)'};
		//var_dump($row);
		//$matchs[$row->id_match]=$row;
	
		//var_dump($matchs);
		return $match;
	}

	function getMatchsIds($type=""){
		$query = "SELECT min(id_match),max(id_match) FROM matchs WHERE Type_match LIKE '$type%'";
		$stmt=$this->connection->query($query);
		$res = $stmt->fetch(PDO::FETCH_OBJ);
		//var_dump($res);
		return $res;
	}

	function getCorrespondances(){
 		//echo"debut22 ";
 		
 		 	//echo "get matchs debut  ";
 		$strSQL = "SELECT ordre_affichage,Id_match FROM matchs ORDER by ordre_affichage";
 		$stmt=$this->connection->query($strSQL);
		while($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$correspondance[$row[0]]=$row[1];
		}
		return $correspondance;
	}

	function getEndTimeInput(){
	 	$query = "SELECT *  FROM Endtimeinput ORDER BY end_date";
 		$stmt=$this->connection->query($query);
 		//echo "after query get end time input";
 		while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
 			//echo "inside boucle";
 			$endTime[]=$row;
 		}
	return $endTime;
	}

}

class Groupe{
	public $name;
	public $name2;
	public $matchdebut;
	public $matchfin;
	public $visible;

	function __construct($name,$name2,$matchdebut,$matchfin){
		$this->name=$name;
		$this->name2=$name2;
		$this->matchdebut=$matchdebut;
		$this->matchfin = $matchfin;
	}
}

class Match{
	public $ordre_affichage;
	public $equipe1;
	public $equipe2;
	public $score_e1;
	public $score_e2;
	public $Type_match;
	public $id_match;
	public $visible;

	function __construct($ordre_affichage,$equipe1,$equipe2,$score_e1,$score_e2,$Type_match,$id_match){
		$this->ordre_affichage=$ordre_affichage;
		$this->equipe1=$equipe1;
		$this->equipe2=$equipe2;
		$this->score_e1 = $score_e1;
		$this->score_e2 = $score_e2;
		$this->Type_match = $Type_match;
		$this->id_match = $id_match;
	}
}

?>