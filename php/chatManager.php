<?php

class ChatManager
{

  private $bdd; 
  private $nb_msg;

  public function __construct($bdd)
  {

    $this->setDb($bdd);
    $this->setNbMsg($this->getNbMsg());

  }

  public function add(Chat $msg)
  {
    

    $q = $this->bdd->prepare('INSERT INTO chat(id , id_user, msg , date_msg) VALUES(:id , :id_user, :msg , :date_msg)');

        
    $q->bindValue(':id', $this->nb_msg + 1);

    $q->bindValue(':id_user', $msg->get_id_user());


    $q->bindValue(':msg', $msg->get_msg());
  
    $q->bindValue(':date_msg', date('Y-m-d H:i:s'));
 
    $q->execute();


  }

  public function delete(Chat $msg)
  {
     $this->bdd->exec('DELETE FROM chat WHERE $id = '.$msg->get_id());
  }

  public function get($id)
  { 

    $q = $this->bdd->query('SELECT * FROM chat WHERE id ="'.$id.'"');

    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    $msg = new Chat($donnees['id'], $donnees['id_user'] , $donnees['msg'] ,$donnees['date_msg']);    

    return $msg ;

  }

  public function getList()
  {

    $q = $this->bdd->query('SELECT * FROM chat');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {  
       $msg = new Chat($donnees['id_user'] , $donnees['msg']);  

       $msg_list[] = $msg ;
    }

    return $msg_list;
  }

  private function getNbMsg()
  {

    $q = $this->bdd->query('SELECT * FROM chat');
    $compteur = 0 ;

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
        $compteur ++ ;
    }

    return $compteur;
  }


  private function setNbMsg($nb)
  {
    $this->nb_msg = $nb;
  }


  public function update(Chat $msg_change)
  {
    $q = $this->bdd->prepare('UPDATE chat SET msg = :msg WHERE id = :id');

    $q->bindValue(':msg' , $msg_change->get_msg());

    $q->bindValue(':id' , $msg_change->get_id());

    $q->execute();
  }

  public function setDb(PDO $bdd)
  {
    $this->bdd = $bdd;
  }



}