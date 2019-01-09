<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends MY_Model {
    
    public function __construct(){
        parent::__construct();
        $this->primary_key = 'username';
    } 
}
?>