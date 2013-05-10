<?
class Match_model{

	function __construct(){
		include "config.php";
 		$this->connection=$db;
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

	
}

?>