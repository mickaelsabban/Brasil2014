<?




	

	//$location = '../pronostic.php';
	//echo $location;
	
	
	list($matchs_equipe,$score)=getMatchs();
	
	$bonusTable=getBonus();

	$equipes=getEquipes();

	$Strikers=getButeurs();

	$correspondance=getcorrespondances();

	//Session Variable update;
	$_SESSION['$bonusTable']=$bonusTable;
	$_SESSION['$equipes']=$equipes;
	$_SESSION['$Strikers']=$Strikers;
	$_SESSION['$nextgametoplay']=$nextgametoplay;
	$_SESSION['$TypeNetxGame']=$TypeNetxGame;
	$_SESSION['$MatchBefore']=$MatchBefore;
	$_SESSION['$MatchAfter']=$MatchAfter;

	$_SESSION['$matchs_equipe']=$matchs_equipe;
	$_SESSION['$pointbonsens']=$pointbonsens;
	$_SESSION['$pointbonscore']=$pointbonscore;
	$_SESSION['$score']=$score;
	$_SESSION['$correspondance']=$correspondance;
	$_SESSION['$location']=$location;


	$_SESSION['$coefpoule']=$coefpoule;
	$_SESSION['$coefhuitieme']=$coefhuitieme;
	$_SESSION['$coefquart']=$coefquart;
	$_SESSION['$coefdemi']=$coefdemi;
	$_SESSION['$coefpetitefinale']=$coefpetitefinale;
	$_SESSION['$coeffinale']=$coeffinale;

	$_SESSION['$nombreMatchs']=$nombreMatchs;
	$_SESSION['$nombreMatchsPoule']=$nombreMatchsPoule;
	$_SESSION['$nombreMatchsHuitiemes']=$nombreMatchsHuitiemes;
	$_SESSION['$nombreMatchsQuarts']=$nombreMatchsQuarts;
	$_SESSION['$nombreMatchsdemi']=$nombreMatchsdemi;
	$_SESSION['$nombrematchspetitefinale']=$nombrematchspetitefinale;	
	$_SESSION['$nombrematchsfinale']=$nombrematchsfinale;

?>