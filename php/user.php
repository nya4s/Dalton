<?php 

   class User{

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $pwd;
    private $date_naissance;
    private $date_inscription;
    private $adr_ip;
    private $est_connect;
    private $est_admin;

    public function __construct($nom , $prenom , $email , $pwd  , $date_naissance) 
    {

    	$this->set_nom($nom);
    	$this->set_prenom($prenom);
    	$this->set_email($email);
    	$this->set_pwd($pwd);
    	$this->set_date_naissance($date_naissance);
        $this->set_date_inscription(date('Y-m-d H:i:s'));
        $this->set_adr_ip($_SERVER['REMOTE_ADDR']);
        $this->set_est_connect(0);
    
    }


    public function toString(){
    	echo 'Id : ' . $this->get_id()  . '<br>' . 'Nom : ' . $this->get_nom() . '<br>' .'Prenom : ' . $this->get_prenom() . '<br>' .'Email : ' . $this->get_email() . '<br>' .'Password : ' . $this->get_pwd() . '<br>' .'Date de naissance : ' . $this->get_date_naissance() . '<br>' .'Date d\'inscription : ' . $this->get_date_inscription()
            . '<br>' . 'Adresse IP : ' . $this->get_adr_ip() . '<br>' . 'Connecté : ' . $this->get_est_connect();
    }

    public function get_id(){
        return $this->id ;
    }

    public function get_nom(){
        return $this->nom ;
    }

    public function get_prenom(){
        return $this->prenom ;
    }

    public function get_email(){
        return $this->email ;
    }

    public function get_pwd(){
        return $this->pwd ;
    }

    public function get_date_naissance(){
        return $this->date_naissance ;
    }

    public function get_date_inscription(){
        return $this->date_inscription ;
    }
    public function get_adr_ip(){
        return $this->adr_ip;
    }
    public function get_est_connect(){
        return $this->est_connect;
    }
    public function get_est_admin(){
        return $this->est_admin;
    }

    public function set_id($id){
        $this->id = $id ;
    }

    public function set_nom($nom){
        $this->nom = $nom ;
    }

    public function set_prenom($prenom){
        $this->prenom = $prenom ;
    }

    public function set_email($email){
        $this->email = $email ;
    }

    public function set_pwd($pwd){
        $this->pwd = $pwd ;
    }

    private function set_date_naissance($date_naissance){
        $this->date_naissance = $date_naissance ;
    }

    public function set_date_inscription($date_inscription){
        $this->date_inscription = $date_inscription ;
    }

    private function set_adr_ip($adr){
        $this->adr_ip = $adr ;
    }

    public function set_est_connect($connect){
        $this->est_connect = $connect ;
    }
    private function set_est_admin($admin){
        $this->est_admin = $admin ;
    }
}


?>
