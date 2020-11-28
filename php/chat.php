<?php 

   class Chat{

    private $id;
    private $id_user;
    private $msg;
    private $date_msg;


    public function __construct($id_user , $msg) 
    {

    	$this->set_id_user($id_user);
        $this->set_msg($msg);

    }


    public function toString(){

        return $this->get_msg();
    }

    private function set_id($id){
        $this->id = $id;
    }
    private function set_id_user($id_user){
        $this->id_user = $id_user;
    }
    private function set_msg($msg){
        $this->msg = $msg;
    }
    private function set_date_msg($date_msg){
        $this->date_msg = $date_msg;
    }

    public function get_id(){
        return $this->id ;
    }
    public function get_id_user(){
        return $this->id_user ;
    } 
    public function get_msg(){
        return $this->msg ;
    }
    public function get_date_msg(){
        return $this->date_msg ;
    }



}


?>
