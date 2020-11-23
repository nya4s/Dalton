<?php 


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
$id = 2 ;

$req = $bdd->prepare('INSERT INTO user(nom, prenom, email, pwd, date_naissance) VALUES(:nom, :prenom, :email, :pwd, :date_naissance)');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'email' => $email,
	'pwd' => $pwd,
	'date_naissance' => $date_naissance
	));


header('Location: Acceuil.html');  



//$bdd->exec('INSERT INTO user(id , nom, prenom, email, pwd, date_naissance) VALUES(2 , {$nom} , {$prenom} , {$email} , {$pwd}, {$date_naissance} ') or die(print_r($bdd->errorInfo()));

//$reponse = $bdd->query('SELECT * FROM user') or die(print_r($bdd->errorInfo()));



?>