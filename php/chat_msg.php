

<?php

session_start();


require("user.php"); 
require("userManager.php");

require("chat.php"); 

require("chatManager.php");


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalton;charset=utf8', 'root', '5925c49719d5');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());

}



        $manager = new chatManager($bdd);




    if(isset($_POST['msg']) && $_POST['msg'] != ""){

        


        $chat = new Chat($_SESSION['id'] , $_POST['msg']);

      
        $manager->add($chat);

        echo 'success';

        
    }

    if(isset($_POST['charger'])){

        $arr = $manager->getList(); 
        $arr_return ;

        for($i = 0 ; $i < sizeof($arr) ; $i ++){

            $arr_return[$i] = $arr[$i]->toString();     
        }

        echo json_encode($arr_return) ;

        }

        

    




//echo 'test';

		?>


