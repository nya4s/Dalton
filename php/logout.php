<?php 

session_start();

require("user.php");


require("userManager.php");




try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalton;charset=utf8', 'root', '5925c49719d5');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}




$manager = new userManager($bdd);


$user = $manager->get($_SESSION['id']);


$manager->disconnect($user);


session_destroy();


header('Location: ../Accueil.html');


?>