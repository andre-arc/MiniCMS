<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_post extends MY_Model {
    
    public function __construct(){
        parent::__construct();
        $this->primary_key = 'id_berita';
    }
}
?>