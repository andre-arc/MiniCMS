<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_menu extends MX_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('menu/M_menu');

    }
    
    public function getMenu($where=null){
        
        $data = $this->M_menu->get_all('', $where, '');
        foreach($data as $data);
        return $data->data_menu;    
    }
}
