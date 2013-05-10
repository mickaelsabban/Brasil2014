<?
//error_reporting(E_ERROR | E_PARSE);
//recup de la table des parieurs correspondants
	$strSQL = "SELECT * FROM Parieur";

	// Execute the query (the recordset $rs contains the result)
	//$rs = mysqli_query($link,$strSQL);//Old Version
	$stmt = $db->query($strSQL);//PDO VERSION
	//Old Version
	//calcul du nombre de parieurs
	//$NombreParieurs=mysqli_num_rows($rs); Old Version
	$NombreParieurs=$stmt->rowcount(); //PDO VERSION
	//remplissage du tableau avec les noms des parieurs
	$parieurs = null;
	for ($parieur = 1;$parieur<=$NombreParieurs;$parieur++){
		//$row = mysqli_fetch_array($rs);//Old Version
		$row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO Version
		//echo " a ".$parieur. " ".$NombreParieurs;
		$parieurs[$parieur]["id"]=$row['id_parieur'];
		
		$parieurs_transpose[$row['id_parieur']]=$parieur;

		//$parieur_id=$row['id_parieur'];

		$parieurs[$parieur]["name"]=$row['nom_parieur'];
		$parieurs[$parieur]["e-mail"]=$row['e-mail'];
		$parieurs[$parieur]["password"]=$row['password'];
	

		$rs2 = "SELECT * FROM Paris Where parieur=".$row['id_parieur'];
		//$result = mysqli_query($link,$rs2);//Old Version
		$stmt2 = $db->query($rs2);//PDO VERSION

		//$row = mysqli_fetch_array($result);//Old Version
		$row = $stmt2->fetch(PDO::FETCH_ASSOC);//PDO VERSION

		//echo $parieur_id." a".mysql_num_rows($result);
		//echo " b ".$nombreMatchs;
		//pour chaque matchs
		for($match =1; $match<=$nombreMatchs; $match++)
		{
			//on rempli le tableau des paris du parieur pour l'equipe 1 et l'equipe 2 du match en question
			$nb_buts[1][$match][$parieurs[$parieur]['id']] = $row['nb_but_e1_m'.$match];
			$nb_buts[2][$match][$parieurs[$parieur]['id']] = $row['nb_but_e2_m'.$match];
			//echo $row['nb_but_e1_m'.$match];

			//On calcul egalement les points du parieur pour ce match 
			$points [$match][$parieurs[$parieur]['id']] = strval(calculpoints($match,$parieurs[$parieur]['id']));
			//echo $points [$match][$parieur];  
			//echo"<br>";
			$points_transpose [$parieurs[$parieur]['id']][$match] = $points [$match][$parieurs[$parieur]['id']];
		}

		$parisBonus[1][$parieurs[$parieur]['id']]= $row['winner'];
		$parisBonus[2][$parieurs[$parieur]['id']]= $row['best_scorer'];
		//On calcul enfin la somme des points du parieur
		$totaljoueurpoints[$parieurs[$parieur]['id']]=totalpoints($parieurs[$parieur]['id']);	

		//compte du nombre de bons sens et de score exact avec les points associes
		$nbscoresexact[$parieurs[$parieur]['id']] = 0;
		$nbBonsens[$parieurs[$parieur]['id']] = 0;
		$pointsbonsens[$parieurs[$parieur]['id']] = 0;
		$pointsbonscore[$parieurs[$parieur]['id']] = 0;

		//preparation des tableaux pour boucler sur les differentes phases
		$arrayCoef = array($coefpoule,$coefquart,$coefdemi,$coefpetitefinale,$coeffinale);
		$arrayStartMatch = array(0,$nombreMatchsPoule,$nombreMatchsQuarts,$nombreMatchsdemi,$nombrematchspetitefinale);
		$arrayEndMatch = array($nombreMatchsPoule,$nombreMatchsQuarts,$nombreMatchsdemi,$nombrematchspetitefinale,$nombrematchsfinale);
		
		//om compte 4 phases	
		for ($i=0;$i<=4;$i++){
			$coef = $arrayCoef[$i];
			$StartMatch = $arrayStartMatch[$i];
			$EndMatch = $arrayEndMatch[$i];

			$pointsmatchspoules = array_slice($points_transpose[$parieurs[$parieur]['id']],$StartMatch,($EndMatch-$StartMatch));
			//print_r($pointsmatchspoules);
			$countedarray=array_count_values($pointsmatchspoules);
			$nbscoresexact[$parieurs[$parieur]['id']]+=$countedarray[strval($pointbonscore*$coef)];
			$nbBonsens[$parieurs[$parieur]['id']]+=$countedarray[strval($pointbonsens*$coef)]+$countedarray[strval($pointbonscore*$coef)];
			$pointsbonsens[$parieurs[$parieur]['id']] += ($countedarray[strval($pointbonsens*$coef)]+$countedarray[strval($pointbonscore*$coef)])*$pointbonsens*$coef;
			$pointsbonscore[$parieurs[$parieur]['id']] += $countedarray[strval($pointbonscore*$coef)]*($pointbonscore-$pointbonsens)*$coef;
			// if($i==1){
			// 	//echo $nbbonsens[5];
				
			// 	print_r ($pointsmatchspoules);
			// 	print_r ($countedarray);
			// 	//echo $countedarray[strval($pointbonsens*$coef)];
			// 	//echo $countedarray[strval($pointbonsens*$coef)]+$countedarray[strval($pointbonscore*$coef)];
			// }
		}


	}

	// sort the array of points
	arsort($totaljoueurpoints);

	//variable de session
	$_SESSION['$parieurs']=$parieurs;
	$_SESSION['$parieurs_transpose']=$parieurs_transpose;
	$_SESSION['$NombreParieurs']=$NombreParieurs;
	$_SESSION['$nb_buts']=$nb_buts;
	$_SESSION['$parisBonus']=$parisBonus;
	$_SESSION['$points']=$points;
	$_SESSION['$points_transpose']=$points_transpose;

	$_SESSION['$totaljoueurpoints']=$totaljoueurpoints;

	$_SESSION['$pointsbonsens']=$pointsbonsens;
	$_SESSION['$pointsbonscore']=$pointsbonscore;
	$_SESSION['$nbscoresexact']=$nbscoresexact;
	$_SESSION['$nbBonsens']=$nbBonsens;

	// Close the database connection
	//mysqli_close($link);//Old Version

	?>