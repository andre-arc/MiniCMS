<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_slide extends MX_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('slide/M_slide');

    }
    
    public function getSlide(){
        
        $data = $this->M_slide->get_all();
        return $data;    
    }
}
