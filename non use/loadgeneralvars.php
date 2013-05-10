	<?

	$coefpoule='1';
	$coefhuitieme='1';
	$coefquart='1.5';
	$coefdemi ='2';
	$coefpetitefinale='2';
	$coeffinale='3';

	$location='../pronostic.php';

	$nombreMatchsPoule=getNombreMatchs('Poule');
	$nombreMatchsHuitiemes =$nombreMatchsPoule + getNombreMatchs('Huitieme');
	$nombreMatchsQuarts = $nombreMatchsHuitiemes+ getNombreMatchs('Quart');
	$nombreMatchsdemi = $nombreMatchsQuarts+ getNombreMatchs('Semi');
	$nombrematchspetitefinale =$nombreMatchsdemi+ getNombreMatchs('LFinal');
	$nombrematchsfinale=$nombrematchspetitefinale+ getNombreMatchs('Final');

	$nombreMatchs= getNombreMatchs();

	$pointbonsens='3';
	$pointbonscore='4';

?>