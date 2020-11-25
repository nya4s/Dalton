<?php 

session_start();


require("user.php");
require("userManager.php");

$oldpwd = $_GET['oldpwd'];
$newpwd = $_GET['newpwd'];
$newpwdconfirm = $_GET['newpwdconfirm'];
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$email= $_GET['email'];


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




if($_GET['changer1'] == NULL){
	


    if($oldpwd == $user->get_pwd() && $newpwd == $newpwdconfirm){

        $user->set_pwd($newpwd);
        $manager->update($user , $user->get_id());
  
        echo 'Changements effectués' ;
        echo '<meta http-equiv="Refresh" content="2;URL=gestion_compte.php">';

    }

    else{
		echo 'ERREUR' ;

        echo '<meta http-equiv="Refresh" content="2;URL=gestion_compte.php">';

    }

}
else if($_GET['changer1'] != NULL && $_GET['changer2'] == NULL){


	$user->set_nom($nom);
 	 
	$user->set_prenom($prenom);
	$user->set_email($email);


	$manager->update($user , $user->get_id());

	echo 'Changements effectués' ;
    echo '<meta http-equiv="Refresh" content="2;URL=gestion_compte.php">';

}










?>