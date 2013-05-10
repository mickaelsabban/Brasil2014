<?php
	function calculpoints($match, $joueur){
		global $nb_buts, $score,$coefpoule,$coefhuitieme,$coefquart,$coefdemi,$coefpetitefinale,$coeffinale;
		global $nombreMatchsPoule,$nombreMatchsHuitiemes,$nombreMatchsQuarts,$nombreMatchsdemi,$nombrematchspetitefinale,$nombrematchsfinale;
		global$pointbonsens,$pointbonscore;
		$result="";
		if(!is_numeric($nb_buts[1][$match][$joueur])||!is_numeric($nb_buts[2][$match][$joueur]) ){

		}else{
			if ($nb_buts[1][$match][$joueur]==$score[1][$match] && $nb_buts[2][$match][$joueur]==$score[2][$match] &&
				is_numeric($score[1][$match]) && is_numeric($score[2][$match])){
				$result = $pointbonscore;
			}
			elseif (($nb_buts[1][$match][$joueur]>$nb_buts[2][$match][$joueur] && $score[1][$match]>$score[2][$match] &&
				 is_numeric($score[1][$match]) && is_numeric($score[2][$match])) ||
				($nb_buts[1][$match][$joueur]==$nb_buts[2][$match][$joueur] && $score[1][$match]==$score[2][$match]&& 
					is_numeric($score[1][$match]) && is_numeric($score[2][$match]) &&
					is_numeric($nb_buts[1][$match][$joueur]) && is_numeric($nb_buts[2][$match][$joueur])) ||
				($nb_buts[1][$match][$joueur]<$nb_buts[2][$match][$joueur] && $score[1][$match]<$score[2][$match] && 
					is_numeric($score[1][$match]) && is_numeric($score[2][$match]))){
				$result = $pointbonsens;
			}elseif(is_numeric($score[1][$match]) && is_numeric($score[2][$match])){
				$result = 0;
			}
		
			if ($match>$nombreMatchsPoule && $match<=$nombreMatchsHuitiemes){
				$result=$result*$coefhuitieme;
			}elseif($match>$nombreMatchsHuitiemes && $match<=$nombreMatchsQuarts){
				$result=$result*$coefquart;
			}elseif($match>$nombreMatchsQuarts && $match<=$nombreMatchsdemi){
				$result=$result*$coefdemi;
			}elseif($match>$nombreMatchsdemi && $match<=$nombrematchspetitefinale){
				$result=$result*$coefpetitefinale;
			}elseif($match>$nombrematchspetitefinale && $match<=$nombrematchsfinale){
				$result=$result*$coeffinale;
			}
		}
		return $result;
	}
	function calculpointbonus ($bonus,$joueurs){
		//global $parisbonus;$bonustable;$coefbonus;
			$calculpointbonus=0;
			//if ($parisbonus[$bonus][$parieur] == $bonustable[$bonus]){
			//	$calculpointbonus = $coefbonus[$bonus];
			//}
			return $calculpointbonus;
	}
	function totalpoints($joueur){
		global $nombreMatchs, $points;
		$totalpoint=0;
		for ($match = 1;$match <= $nombreMatchs; $match++){
			$totalpoint += $points[$match][$joueur];
			//echo $totalpoint." ";
		}
		for ($bonus = 1;$bonus<=$nombreBonus; $bonus++){
			$totalpoint += $calculpointbonus($bonus,$joueur);
		}

		return $totalpoint;
	}



?>