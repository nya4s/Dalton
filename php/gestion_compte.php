

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



if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3800)) {
    
    $manager->disconnect($user);
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp



if($_SESSION['est_connect'] == 1 && $_SESSION['est_admin'] == 0){

	
echo


'<!DOCTYPE html>

<html>

	<head>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="test.js"></script>


		<link rel="stylesheet" type="text/css" href="../css/nav.css">
        <meta charset="utf-8">

		<title>
			Gestion de compte
		</title>

	</head>

	<body>

		
		<div>
			
		<header>
    <div id="Entete">
        <nav>
            <div>
                <a href="./Accueuil.html">Accueil</a>
                
            </div><!--
	 --><div>
            <a href="./facts.html">Presse</a>
        </div><!--
	 --><div>
             <a href="./news.html">Nous rejoindre</a>
            <div class="submenu">
                <div>
                    <a href="Métier1.html">Commercial</a>
                </div>
                <div>
                    <a href="Métier2.html">Développer web</a>
                </div>
                 <div>
                    <a href="Métier3.html">Opticient</a>
                </div>
            </div>
        </div>
          <div>
                <a href="./Équipe.html">Équipe</a>
                
            </div>
	 <div>
           <a href="./contact.html">Contact</a>
            
        </div>
        <div>
           <a href="./FAQ.html">FAQ</a>
            
        </div>
        </nav>
    </div>
</header>

		</div>


		<div>
		<form action="change.php" method="get">
			<fieldset><legend>Informations personnelles</legend>

                <div>
				<label for="nom">Nom:</label>
				<input id="nom" name="nom" type="text" value="' . $user->get_nom() . '" required>
			    </div>

				<div>
				<label for="prenom">Prenom:</label>
				<input id="prenom" name="prenom" type="text" value="' . $user->get_prenom() . '" required>
			    </div>

			    <div>
				<label for="email">Email:</label>
				<input id="email" name="email" type="email" value="' . $user->get_email() . '" required>
				</div>


		        <input id="envoi1" type="submit" name ="changer1" value="Changer">

				
			</fieldset>

		
		</form>
		</div>


		


		<div>
		<form action="change.php" method="get">
			<fieldset><legend>Changer de mot de passe</legend>

                <div>
				<label for="oldpwd">Ancien mot de passe:</label>
				<input id="oldpwd" name="oldpwd" type="password" required>
			    </div>

				<div>
				<label for="newpwd">Nouveau mot de passe:</label>
				<input id="newpwd" name="newpwd" type="password" required>
			    </div>

			    <div>
				<label for="newpwdconfirm">Confirmer le nouveau mot de passe:</label>
				<input id="newpwdconfirm" name="newpwdconfirm" type="password" required>
				</div>


		        <input id="envoi2" type="submit" name ="changer2" value="Changer">

				
			</fieldset>

		
		</form>
		</div>



		<form action="logout.php" method="get">

		<input id="envoi" type="submit" value="Deconnexion">

		</form>

		<div id="t">

		</div>

          

	</body>

</html>';



}
else if($_SESSION['est_connect'] == 1 && $_SESSION['est_admin'] == 1){


	echo 


'<!DOCTYPE html>

<html>



	<head>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="test.js"></script>


		<link rel="stylesheet" type="text/css" href="../css/nav.css">
		<link rel="stylesheet" type="text/css" href="../css/gestion_compte.css">
        <meta charset="utf-8">

		<title>
			Admin
		</title>

	</head>

	<body>

		
		<div>
			
		<header>
    <div id="Entete">
        <nav>
            <div>
                <a href="./Accueuil.html">Accueil</a>
                
            </div><!--
	 --><div>
            <a href="./facts.html">Presse</a>
        </div><!--
	 --><div>
             <a href="./news.html">Nous rejoindre</a>
            <div class="submenu">
                <div>
                    <a href="Métier1.html">Commercial</a>
                </div>
                <div>
                    <a href="Métier2.html">Développer web</a>
                </div>
                 <div>
                    <a href="Métier3.html">Opticient</a>
                </div>
            </div>
        </div>
          <div>
                <a href="./Équipe.html">Équipe</a>
                
            </div>
	 <div>
           <a href="./contact.html">Contact</a>
            
        </div>
        <div>
           <a href="./FAQ.html">FAQ</a>
            
        </div>
        </nav>
    </div>
</header>

		</div>

				<div>
		<form action="change.php" method="get">
			<fieldset><legend>Informations personnelles</legend>

                <div>
				<label for="nom">Nom:</label>
				<input id="nom" name="nom" type="text" value="' . $user->get_nom() . '" required>
			    </div>

				<div>
				<label for="prenom">Prenom:</label>
				<input id="prenom" name="prenom" type="text" value="' . $user->get_prenom() . '" required>
			    </div>

			    <div>
				<label for="email">Email:</label>
				<input id="email" name="email" type="email" value="' . $user->get_email() . '" required>
				</div>


		        <input id="envoi1" type="submit" name ="changer1" value="Changer">

				
			</fieldset>

		
		</form>
		</div>

		<div>
		<form action="change.php" method="get">
			<fieldset><legend>Changer de mot de passe</legend>

                <div>
				<label for="oldpwd">Ancien mot de passe:</label>
				<input id="oldpwd" name="oldpwd" type="password" required>
			    </div>

				<div>
				<label for="newpwd">Nouveau mot de passe:</label>
				<input id="newpwd" name="newpwd" type="password" required>
			    </div>

			    <div>
				<label for="newpwdconfirm">Confirmer le nouveau mot de passe:</label>
				<input id="newpwdconfirm" name="newpwdconfirm" type="password" required>
				</div>


		        <input id="envoi2" type="submit" name ="changer2" value="Changer">

				
			</fieldset>

		
		</form>
		</div>





        <form action="logout.php" method="get">

		<input id="envoi" type="submit" value="Deconnexion">

		</form>


        <div id="chat">
	    <input id="envoi_msg" type="submit" value="Envoyer">
		<input id="msg" type="text" required>

		<div id="messages">
		</div>

		

		</div>
		




		

 </body>

</html> ' ;




$arr = $manager->getList(); 



for($i = 0 ; $i < sizeof($arr) ; $i ++){

	 echo '<div class="user">';

	
	 $arr[$i]->toString();

	 echo '</div>'; 

	}
}
else{

     echo 'PAS CONNECTE';
}


		?>

