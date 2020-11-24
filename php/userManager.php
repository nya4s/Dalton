<?php

class UserManager
{

  private $bdd; 
  private $nb_user;

  public function __construct($bdd)
  {
    $this->setDb($bdd);
    $this->setNbUser($this->getNbUser());
  }

  public function add(User $user)
  {

    $q = $this->bdd->prepare('INSERT INTO user(id , nom, prenom, email, pwd , date_naissance , date_inscription , adr_ip , est_connect) VALUES(:id , :nom, :prenom, :email, :pwd, :date_naissance , :date_inscription , :adr_ip , :est_connect)');

    $q->bindValue(':id', $this->nb_user + 1);

    $q->bindValue(':nom', $user->get_nom());

    $q->bindValue(':prenom', $user->get_prenom());

    $q->bindValue(':email', $user->get_email());
    
    $q->bindValue(':pwd', $user->get_pwd());

    $q->bindValue(':date_naissance', $user->get_date_naissance());


    $q->bindValue(':date_inscription', $user->get_date_inscription());



    $q->bindValue(':adr_ip' , $user->get_adr_ip());


    $q->bindValue(':est_connect' , $user->get_est_connect());


    echo $user->get_est_connect();


    $q->execute();




    $user->set_id($this->nb_user + 1);


  }

  public function delete(User $user)
  {
     $this->bdd->exec('DELETE FROM user WHERE id = '.$user->get_id());
    
  }

  public function get($id)
  {

    $q = $this->bdd->query('SELECT * FROM user WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    $user = new User($donnees['nom'], $donnees['prenom'], $donnees['email'], $donnees['pwd'], $donnees['date_naissance']);
    $user->set_id($donnees['id']);
    $user->set_date_inscription($donnees['date_inscription']);

    return $user ;

  }

  public function getList()
  {
    $users = [];

    $q = $this->bdd->query('SELECT * FROM user ORDER BY nom');

     

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {

       
       $user = new User($donnees['nom'] , $donnees['prenom'] , $donnees['email'] , $donnees['pwd'] , $donnees['date_naissance']);
       $user->set_id($donnees['id']);
       $user->set_date_inscription($donnees['date_inscription']);

       $persos[] = $user ;
    }

    return $persos;
  }

  private function getNbUser()
  {

    $q = $this->bdd->query('SELECT * FROM user');
    $compteur = 0 ;
     

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {

        $compteur ++ ;

    }

    return $compteur;
  }

  private function setNbUser($nb){
    $this->nb_user = $nb;
  }


  public function update(User $user , $idd)
  {

    $q = $this->bdd->prepare('UPDATE user SET nom = :nom, prenom = :prenom, email = :email, pwd = :pwd , adr_ip = :adr_ip , est_connect = :est_connect WHERE id = :id');

    $q->bindValue(':nom' , $user->get_nom());
    $q->bindValue(':prenom' , $user->get_prenom());
    $q->bindValue(':email', $user->get_email());
    $q->bindValue(':pwd', $user->get_pwd());
    $q->bindValue(':adr_ip', $user->get_adr_ip());
    $q->bindValue(':est_connect', $user->get_est_connect());
    $q->bindValue(':id', $idd);

    $q->execute();
  }

  public function setDb(PDO $bdd)
  {
    $this->bdd = $bdd;
  }
}