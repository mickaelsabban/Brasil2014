<?php
new Pronostic();
class Pronostic {

	function __construct(){
		//session_start();
			//echo " ici ";
			$this->view();
	}

	function view(){
		//session_start();

		//echo "a";
		include "Views/header.php";
		include "Views/pronostic_view.php";
	}


}

?>