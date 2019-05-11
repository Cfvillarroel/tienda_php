<?php
    include_once('includes/config.php');
    class Model{
        protected $db;
        public function __construct(){
            $this->db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if($this->db->connect_error){
                echo 'Error de conexión'.$this->db->connect_error;
                return;
            }
            $this->db->set_charset(DB_CHARSET);
        }
    }

?>