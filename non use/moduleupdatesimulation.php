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

	//echo $NombreParieurs;
	for($parieur = 1; $parieur <= $NombreParieurs; $parieur++){

		for($match =$matchdebut; $match<=$matchfin; $match++){

			//On calcul les points du parieur pour ce match 
			//echo $match;	
			$points [$match][$parieur] = calculpoints($match,$parieur);
			//echo $points [$match][$parieur];  
			//echo"<br>";
			$points_transpose [$parieur][$match] = $points [$match][$parieur];
		}

	//	$parisBonus[1][$parieur]= $row['winner'];
	//	$parisBonus[2][$parieur]= $row['best_scorer'];
		//On calcul enfin la somme des points du parieur
		$totaljoueurpoints[$parieur]=totalpoints($parieur);	

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
	}

	// sort the array of points
	arsort($totaljoueurpoints);

	$_SESSION['$nb_buts']=$nb_buts;
	$_SESSION['$nb_buts']=$nb_buts;
	$_SESSION['$parisBonus']=$parisBonus;
	$_SESSION['$points']=$points;
	$_SESSION['$points_transpose']=$points_transpose;

	$_SESSION['$totaljoueurpoints']=$totaljoueurpoints;

	$_SESSION['$pointsbonsens']=$pointsbonsens;
	$_SESSION['$pointsbonscore']=$pointsbonscore;
	$_SESSION['$nbscoresexact']=$nbscoresexact;
	$_SESSION['$nbBonsens']=$nbBonsens;
	
	

	?>