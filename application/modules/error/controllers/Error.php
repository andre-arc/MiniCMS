<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends MY_Controller {

	public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['title'] = "Halaman tidak Ditemukan - ".getParams("site_title");
        $this->load->view("error/index", $this->data);
    }
}