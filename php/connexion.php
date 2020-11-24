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






$email = $_GET['email'];
$pwd = $_GET['pwd'];


/* GETLIST


$arr = $manager->getList();


for($i = 0 ; $i < sizeof($arr) ; $i ++){
	
	$arr[$i]->toString();
	echo '<br>' . '<br>' ;
}
*/


$manager = new userManager($bdd);
$reponse = $bdd->query('SELECT * FROM user WHERE email="'.$email.'"') or die(print_r($bdd->errorInfo()));
$donnees = $reponse->fetch(PDO::FETCH_ASSOC);

if($pwd == $donnees['pwd']){




	$user = new User($donnees['nom'] , $donnees['prenom'] , $donnees['email'] , $donnees['pwd'] , $donnees['date_naissance']);
    $user->set_id($donnees['id']);
    $user->set_date_inscription($donnees['date_inscription']);
    $user->set_est_connect(1);

    $user->toString();

    $manager->update($user , $user->get_id());

}
else{
	echo 'ERREUR';
}










        






?>
