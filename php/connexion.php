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



$email = $_GET['email'];
$pwd = $_GET['pwd'];



$manager = new userManager($bdd);
$reponse = $bdd->query('SELECT * FROM user WHERE email="'.$email.'"') or die(print_r($bdd->errorInfo()));
$donnees = $reponse->fetch(PDO::FETCH_ASSOC);


if($donnees == NULL){
    echo 'ERREUR : cette adresse email nexiste pas' ;

    echo '<meta http-equiv="Refresh" content="2;URL=../connexion.html">';

    session_destroy();

    
}
else if($donnees != NULL && $pwd != $donnees['pwd']){

    echo 'ERREUR : mauvais identifiants' ;

    echo '<meta http-equiv="Refresh" content="2;URL=../connexion.html">';

    session_destroy();

}
else if($donnees != NULL && $pwd == $donnees['pwd']){

    $_SESSION['id'] = $donnees['id'];
    $_SESSION['est_connect'] = 1 ;
    $_SESSION['est_admin'] = $donnees['est_admin'];

    $manager->connect($manager->get($donnees['id']));

    echo 'Connexion ...' ;

    echo '<meta http-equiv="Refresh" content="2;URL=../Accueil.html">';

}
















        






?>
