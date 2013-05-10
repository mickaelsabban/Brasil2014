<?php
class Paris_model {
 	public $connection;
 	public $pointbonscore;
 	public $pointbonsens;
 	public $coefhuitieme;
 	public $coefquart;
 	public $coefdemi;
 	public $coefpetitefinale;
 	public $coeffinale;
 	public $pointsensparmatch;
	public $pointscoreparmatch;

 	function __construct(){
 		include ("config.php");
 		$this->connection=$db;
 		$this->getParisRulesConstants();
 	}

 	function getParisRulesConstants(){
 		$this->pointbonscore=4;
 		$this->pointbonsens=3;
 		$this->coefhuitieme=1;
 		$this->coefquart=1.5;
 		$this->coefdemi=2;
 		$this->coefpetitefinale=2;
 		$this->coeffinale=3;
 		$this->pointsensparmatch=28;
 		$this->pointscoreparmatch=7;
 		//$this->pointbonscore=4;
 	}

 	function getPhasesCoef(){
 		$query = "SELECT type_match,coef FROM Endtimeinput";
 		$stmt=$this->connection->query($query);
 		while($row=$stmt->fetch(PDO::FETCH_OBJ)){
 			$res[$row->type_match]=$row->coef;
 		}
 		
 		//var_dump($res);
 		return $res;
 	}

 	function getParis(){
 		$query = "SELECT * FROM Paris ORDER BY Parieur";
		$stmt=$this->connection->query($query);
		while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
			$paris[$row->parieur]=$row;
		}
		return $paris;
	}

	function getBonus(){
 		$query = "SELECT * FROM Paris ORDER BY Parieur";
		$stmt=$this->connection->query($query);
		while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
			$paris[$row->parieur]=$row;
		}
		return $paris;
	}


	function getParisTemp(){
		$query = "SELECT * FROM ParisTemp ORDER BY Parieur";
		$stmt=$this->connection->query($query);
		while ($row=$stmt->fetch(PDO::FETCH_OBJ)){
			$paris[$row->parieur]=$row;
		}
		return $paris;
	}
	function getParisbyParieur($parieur){
		$query = "SELECT * FROM Paris Where parieur = $parieur";
		$stmt=$this->connection->query($query);
		$pari=$stmt->fetch(PDO::FETCH_OBJ);
		return $pari;
	}

	function getParisTempbyParieur($parieur){
		$query = "SELECT * FROM ParisTemp Where parieur = $parieur";
		$stmt=$this->connection->query($query);
		$pari=$stmt->fetch(PDO::FETCH_OBJ);
		return $pari;
	}

	function updateParis($data){
		//var_dump($data);
		$queryUpdate = "UPDATE Paris SET ";
		foreach($data as $key=>$value){
			if($value==""){
				$value=' NULL';
			}else{
				$value="'".$value."'";
			}
			$queryUpdate = $queryUpdate .$key."=".$value.", ";
		}
		$queryUpdate = substr($queryUpdate, 0,strlen($queryUpdate)-2);
		$queryUpdate = $queryUpdate. " WHERE parieur = ".$_SESSION['Id_parieur'];

		//echo $queryUpdate;
		$stmt=$this->connection->query($queryUpdate);
	}

	function calculate_points($paris,$matchs,$stat=false){
		foreach($matchs as $match){
			if($stat){
				list($countBonSens,$countBonScore)=$this->countBonSensScoreMatch($paris,$match);
			}
			foreach($paris as $pari){
				if($stat){
					$points[$pari->parieur][$match->id_match]=strval(round($this->calculpointstat($match,$pari,$countBonSens,$countBonScore),2));
					}else{
					$points[$pari->parieur][$match->id_match]=strval($this->calculpoint($match,$pari));
				}
			}
		}
		return $points;	
	}

	function calculateTotalPoints ($points){
		foreach($points as $key=>$point){
			$totalpoints[$key]=array_sum($point);
		}
		arsort($totalpoints);
		return $totalpoints;
	}

	function countBonSensScoreMatch($paris,$match){
		//cette fonction prend en input le table des paris
		//ainsi que lobjet match en question
		//et renvoi le nombre de bon sens et le nombre de bon score
	 	$idmatch=$match->id_match;
		$Type_match=$match->Type_match;
		$score_e1=$match->score_e1;
		$score_e2=$match->score_e2;
		$countbonsens=0;
		$countbonscore=0;
		foreach($paris as $pari){
			$pari_e1 = $pari->{'nb_but_e1_m'.$idmatch};
			$pari_e2 = $pari->{'nb_but_e2_m'.$idmatch};
			if(!is_numeric($pari_e1)||!is_numeric($pari_e2)|| !is_numeric($score_e1) || !is_numeric($score_e2) ){
			}else{
				if( ( ($pari_e1>$pari_e2) && ($score_e1>$score_e2) ) || ( ($pari_e1 == $pari_e2) && ($score_e1==$score_e2) ) || ( ($pari_e1<$pari_e2) && ($score_e1<$score_e2) )){
					$countbonsens +=1; 
				}
				if(($pari_e1==$score_e1) && ($pari_e2==$score_e2)){
					$countbonscore +=1; 
				}
			}
		}
		$countbonsens = max($countbonsens,1);
		$countbonscore = max($countbonscore,1);
		return array($countbonsens,$countbonscore);	
	}

	function countBonSensScore($paris,$matchs){
	 	//Cette fonction prend en input le tableau des pairs ainsi que le tableau des matchs
	 	// et renvoi
	 	$coef=$this->getPhasesCoef();
		//echo"la2";
		foreach($paris as $pari){
			$csens=0;
			$psens=0;
			$cscore=0;
			$pscore=0;
			foreach($matchs as $match){
				list($countBonSens,$countBonScore)=$this->countBonSensScoreMatch($paris,$match);
				$idmatch=$match->id_match;
				//echo"la";
				$Type_match=$match->Type_match;
				//var_dump($coef[$Type_match]);
				$score_e1=$match->score_e1;
				$score_e2=$match->score_e2;
				$pari_e1 = $pari->{'nb_but_e1_m'.$idmatch};
				$pari_e2 = $pari->{'nb_but_e2_m'.$idmatch};
				if (is_numeric($pari_e1) && is_numeric($pari_e2) && is_numeric($score_e1) && is_numeric($score_e1)){
					if( ( ($pari_e1>$pari_e2) && ($score_e1>$score_e2) ) || ( ($pari_e1==$pari_e2) && ($score_e1==$score_e2) ) || ( ($pari_e1<$pari_e2) && ($score_e1<$score_e2) )){
						$csens +=1;
						$psens+=$this->pointsensparmatch/$countBonSens*$coef[$Type_match]; 
					}
					if(($pari_e1==$score_e1) && ($pari_e2==$score_e2)){
						$cscore +=1; 
						$pscore+=$this->pointscoreparmatch/$countBonScore*$coef[$Type_match]; 
					}
				}
			}
			$countbonsens[$pari->parieur]=$csens;
			$pointsbonsens[$pari->parieur]=round($psens,2);
			$countbonscore[$pari->parieur]=$cscore;
			$pointsbonscore[$pari->parieur]=round($pscore,2);
			//var_dump($countbonsens);
		}
		return array($countbonsens,$pointsbonsens,$countbonscore,$pointsbonscore);
	}

	function calculpoint($match, $pari,$filter=""){
		$result="";
		$coef=$this->getPhasesCoef();
		$idmatch=$match->id_match;
		$Type_match=$match->Type_match;
		$score_e1=$match->score_e1;
		$score_e2=$match->score_e2;
		$pari_e1 = $pari->{'nb_but_e1_m'.$idmatch};
		$pari_e2 = $pari->{'nb_but_e2_m'.$idmatch};
		//var_dump($pari_e2);
		//echo ($pari_e1==$score_e1 && $pari_e2==$score_e2 && is_numeric($score_e1) && is_numeric($score_e2))."\n";
		//echo (!isset($pari_e1)||!isset($pari_e2))."\n";
		if(!is_numeric($pari_e1)||!is_numeric($pari_e2)|| !is_numeric($score_e1) || !is_numeric($score_e2) ){
		}else{
			if ($pari_e1==$score_e1 && $pari_e2==$score_e2){
				$result = $this->pointbonscore*$coef[$Type_match];
				$resultscoreonly = $this->pointbonscore*$coef[$Type_match];
			}
			elseif (($pari_e1>$pari_e2 && $score_e1>$score_e2) || ($pari_e1==$pari_e2 && $score_e1==$score_e2) ||
				($pari_e1<$pari_e2 && $score_e1<$score_e2)) {
				$result = $this->pointbonsens*$coef[$Type_match];
				$resultsensonly = $this->pointbonsens*$coef[$Type_match];
			}elseif(is_numeric($score_e1) && is_numeric($score_e2)){
				$result = 0;
			}
		
		}
		//echo "result".$result;
		if($filter = "sens"){
			return $resultsensonly;
		}elseif($filter = "score"){
			return $resultscoreonly;
		}else{
			return $result;
		}
	}

	function calculpointstat($match, $pari,$countBonSens,$countBonScore){
		$result="";
		$idmatch=$match->id_match;
		$coef=$this->getPhasesCoef();
		$Type_match=$match->Type_match;
		$score_e1=$match->score_e1;
		$score_e2=$match->score_e2;
		$pari_e1 = $pari->{'nb_but_e1_m'.$idmatch};
		$pari_e2 = $pari->{'nb_but_e2_m'.$idmatch};
		//var_dump($pari_e2);
		//echo ($pari_e1==$score_e1 && $pari_e2==$score_e2 && is_numeric($score_e1) && is_numeric($score_e2))."\n";
		//echo (!isset($pari_e1)||!isset($pari_e2))."\n";


		if(!is_numeric($pari_e1)||!is_numeric($pari_e2)|| !is_numeric($score_e1) || !is_numeric($score_e2) ){
		}else{
			if ($pari_e1==$score_e1 && $pari_e2==$score_e2){
					$result = $this->pointscoreparmatch/$countBonScore*$coef[$Type_match];
			}
			if (($pari_e1>$pari_e2 && $score_e1>$score_e2) || ($pari_e1==$pari_e2 && $score_e1==$score_e2) ||
				($pari_e1<$pari_e2 && $score_e1<$score_e2)) {
					$result += $this->pointsensparmatch/$countBonSens*$coef[$Type_match];
			}elseif(is_numeric($score_e1) && is_numeric($score_e2)){
				$result = 0;
			}
		}
		//echo "result".$result;
		return $result;
	}

}