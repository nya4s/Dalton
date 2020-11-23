<?php 


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalton;charset=utf8', 'root', '5925c49719d5');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$email = $_GET['email'];
$pwd = $_GET['pwd'];



$reponse = $bdd->query('SELECT * FROM user') or die(print_r($bdd->errorInfo()));

while($val = $reponse->fetch()){

	echo $val['nom'] + '\n';
	echo $val['prenom'];
}


?>
