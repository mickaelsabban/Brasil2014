<?
error_reporting(E_ERROR | E_PARSE);
$nbBonsens=$_SESSION['$nbBonsens'];
$nbscoresexact=$_SESSION['$nbscoresexact'];
 
 //tableu des points par parieur
  $pointsbonsens=$_SESSION['$pointsbonsens'];
  $pointsbonscore=$_SESSION['$pointsbonscore'];

  //double representant le nombre de point en cas de:
  $pointbonscore=$_SESSION['$pointbonscore'];
  $pointbonsens=$_SESSION['$pointbonsens'];

$totaljoueurpoints=$_SESSION['$totaljoueurpoints'];

$points_transpose=$_SESSION['$points_transpose'];
$points=$_SESSION['$points'];
$parisBonus=$_SESSION['$parisBonus'];
$nb_buts=$_SESSION['$nb_buts'];
$nb_buts_temp=$_SESSION['$nb_buts_temp'];

//echo "vous etes ici";
//Pour tout les parieurs on va remplir le tableaux de leur paris
	//for($parieur = 1; $parieur <= $NombreParieurs; $parieur++){
		$parieur = $parieur_id;
		$rs2 = "SELECT * FROM ParisTemp Where parieur=$parieur";

		$stmt = $db->query($rs2);
		//echo $stmt->rowcount();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);//Old Version
		//echo "vous etes ici";

		//echo $nombreMatchs;
		//pour chaque matchs
		for($match =1; $match<=$nombreMatchs; $match++){
			//on rempli le tableau des paris du parieur pour l'equipe 1 et l'equipe 2 du mtch en questio
			$nb_buts_temp[1][$match][$parieur] = $row['nb_but_e1_m'.$match];
			$nb_buts_temp[2][$match][$parieur] = $row['nb_but_e2_m'.$match];
			//On calcul egalement les points du parieur pour ce match 	
			//$points [$match][$parieur] = calculpoints($match,$parieur);
			//$points_transpose [$parieur][$match] = $points [$match][$parieur];
		}

		$parisBonusTemp[1][$parieur]= $row['winner'];
		$parisBonusTemp[2][$parieur]= $row['best_scorer'];
		//On calcul enfin la somme des points du parieur
		//$totaljoueurpoints[$parieur]=totalpoints($parieur);	

		/*
		//compte du nombre de bons sens et de score exact avec les points associes
		$nbscoresexact[$parieur] = 0;
		$nbBonsens[$parieur] = 0;
		$pointsbonsens[$parieur] = 0;
		$pointsbonscore[$parieur] = 0;

		//preparation des tableaux pour boucler sur les differentes phases
		$arrayCoef = array($coefpoule,$coefquart,$coefdemi,$coefpetitefinale,$coeffinale);
		$arrayStartMatch = array(0,$nombreMatchsPoule,$nombreMatchsQuarts,$nombreMatchsdemi,$nombrematchspetitefinale);
		$arrayEndMatch = array($nombreMatchsPoule,$nombreMatchsQuarts,$nombreMatchsdemi,$nombrematchspetitefinale,$nombrematchsfinale);
		
		//on compte 4 phases	
		for ($i=0;$i<=4;$i++){
			$coef = $arrayCoef[$i];
			$StartMatch = $arrayStartMatch[$i];
			$EndMatch = $arrayEndMatch[$i];

			$pointsmatchspoules = array_slice($points_transpose[$parieur],$StartMatch,($EndMatch-$StartMatch));
			$countedarray=array_count_values($pointsmatchspoules);
			$nbscoresexact[$parieur]+=$countedarray[strval($pointbonscore*$coef)];
			$nbBonsens[$parieur]+=$countedarray[strval($pointbonsens*$coef)]+$countedarray[strval($pointbonscore*$coef)];
			$pointsbonsens[$parieur] += ($countedarray[strval($pointbonsens*$coef)]+$countedarray[strval($pointbonscore*$coef)])*$pointbonsens*$coef;
			$pointsbonscore[$parieur] += $countedarray[strval($pointbonscore*$coef)]*($pointbonscore-$pointbonsens)*$coef;
		}
	//}

	// sort the array of points
	arsort($totaljoueurpoints);
	*/
	$_SESSION['$nb_buts']=$nb_buts;
	$_SESSION['$nb_buts_temp']=$nb_buts_temp;
	$_SESSION['$parisBonus']=$parisBonus;
	$_SESSION['$points']=$points;
	$_SESSION['$points_transpose']=$points_transpose;

	$_SESSION['$totaljoueurpoints']=$totaljoueurpoints;

	$_SESSION['$pointsbonsens']=$pointsbonsens;
	$_SESSION['$pointsbonscore']=$pointsbonscore;
	$_SESSION['$nbscoresexact']=$nbscoresexact;
	$_SESSION['$nbBonsens']=$nbBonsens;
	
	

	?>