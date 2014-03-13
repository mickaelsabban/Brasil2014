<?php
//echo"la";
//header('Location: Controllers/parieur.php');
include('Controllers/parieur.php');
$page = $_GET['page'];
$parieur = new Parieur($page);

?>