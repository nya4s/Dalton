<?php 

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


$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$email = $_GET['email'];
$pwd = $_GET['pwd'];
$date_naissance = $_GET['date'];





$user = new User($nom , $prenom , $email , $pwd , $date_naissance);
$manager = new userManager($bdd);





$manager->add($user); //Ajouter un user



?>