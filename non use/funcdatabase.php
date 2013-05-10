<?
	function resetAutoIncrement(){
		global $db;
		$queryautoincrement1 = "ALTER TABLE Parieur AUTO_INCREMENT = 1";
		$stmt=$db->query($queryautoincrement1);

	}
	
	function getBonus(){
		global $db;
		$strSQL = "SELECT * FROM Bonus";
		$stmt = $db->query($strSQL); // PDO VERSION
		while($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$bonusTable[$row[0]]=$row[1];
		}
		return $bonusTable;
	}

	function getEquipes(){
		global $db;
		$strSQL = "SELECT * FROM Equipes";
		$stmt = $db->query($strSQL);
		while($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$equipes[$row[0]]=$row[1];
		}
		return $equipes;
	}

	function getButeurs(){
		global $db;
		$strSQL = "SELECT * FROM Buteurs";
		$stmt = $db->query($strSQL);
		while($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$Strikers[$row[0]]=$row[1];
		}
		return $Strikers;
	}

	function getCorrespondances(){
		global $db;
		$strSQL = "SELECT ordre_affichage,Id_match FROM matchs ORDER by ordre_affichage";
		$stmt = $db->query($strSQL);
		while($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$correspondance[$row[0]]=$row[1];
		}
		return $correspondance;
	}
	
	function getMatchs(){
		global $db;
		$strSQL = "SELECT * FROM matchs";
		//echo $db;
		$stmt = $db->query($strSQL); //PDO Version
		//print_r($db->errorInfo());
		$nombreMatchs = $stmt->rowCount(); // PDO version
		$nextgametoplay=0;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$matchs_equipe[1][$row['Id_match']]=$row['equipe_1'];
			$matchs_equipe[2][$row['Id_match']]=$row['equipe_2'];
			$score[1][$row['Id_match']] = $row['score_e1'];
			$score[2][$row['Id_match']] = $row['score_e2'];
		}
		return array($matchs_equipe,$score);
	}

	function getParieurInfo($parieur_name=""){
		global $db;
		$query = "SELECT * FROM Parieur WHERE nom_parieur = ?";
		//echo "b1";
		$stmt=$db->prepare($query);
		//echo "b";
		$myparam = $parieur_name.'%';
		$stmt->bindValue(1, $parieur_name, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt;
	}

	function userexist($name){
	  //echo "a";
	  $result=getparieurInfo($name);
	  if($result->rowcount()>0){
	    return true;
	  }else{
	    return false;
	  }
	}

	function copydtbase($from,$to){
		global $db;
		$Query1 = "Truncate Table $to";
		$Query2="Insert Into $to Select * From $from";
		$db->query($Query1);
		$db->query($Query2);

	}

	function getNombreParieurs(){
		global $db;
		$query = "SELECT * FROM Parieur";
		$stmt = $db->quer($query);
		$nb = $stmt->rowcount();
		return $nb;
	}

	function createNewParieur($name, $email, $password){
		global $db;
		$query = "insert into Parieur (nom_parieur,email,password) values(:name,:email,:crypted_password)";
		$InsertPAris = "insert into Paris (parieur) values (:id_parieur)";
		$InsertParisTemp = "insert into ParisTemp (parieur) values (:id_parieur)";

		resetAutoincrement();

		$stmt=$db->prepare($query);
		$stmt->execute(array(':name' => $name, ':email' => $email,':crypted_password' => $password));
		$LastId = $db->LastInsertId();
		//echo "vous etes ici";
		$stmt=$db->prepare($InsertPAris);
		$stmt->execute(array(':id_parieur' => $LastId));
		$stmt=$db->prepare($InsertParisTemp);
		$stmt->execute(array(':id_parieur' => $LastId));

	}

	function getNombreMatchs($type=""){
		global $db;
		$query = "SELECT Type_match FROM matchs WHERE Type_match LIKE '$type%'";
		$stmt = $db->query($query);
		$nb = $stmt->rowcount();
		return $nb;
	}

	function updateSimulation($parieur){
		global $db;
		$rs2 = "SELECT * FROM ParisTemp Where parieur=$parieur";

	}

?>