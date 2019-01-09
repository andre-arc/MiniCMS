<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{  
     //set the class variable.
   var $template  = array();
   var $data      = array();
   var $tpl;     
    
    public function __construct()
    {
        parent::__construct();
        
        $module = $this->router->fetch_module();
        $model = "M_".strtolower(get_class($this));
        
        if(file_exists(APPPATH . "modules/$module/models/$model.php")){
            $this->load->model($module."/".$model);
        }
//        else{
//            echo $model." not Found";
//        }
    }
    
    
   //Load layout    
   public function layout($tpl = "frontend") {
     // making temlate and send data to view.
    $this->tpl = $tpl;   
    switch($tpl) :
       case "frontend" : $this->layout_frontend();break;
       case "backend" : $this->layout_backend();break;
       case "login" : $this->layout_login();break;
    endswitch;
        
    $this->load->view($this->tpl.'/index', $this->template);   
   }
    
    protected function layout_login(){
     $this->template['header']   = $this->load->view($this->tpl.'/header', $this->data, true);
     $this->template['content'] = $this->load->view($this->content, $this->data, true);   
     $this->template['footer'] = $this->load->view($this->tpl.'/footer', $this->data, true);
    }
    
    protected function layout_backend(){
     $this->data['modal'] = $this->load->view($this->tpl.'/modal', '', true);    
     $this->template['header']   = $this->load->view($this->tpl.'/header', $this->data, true);
     $this->template['sidebar']  = $this->load->view($this->tpl.'/sidebar', $this->data, true);
     $this->template['content'] = $this->load->view($this->content, $this->data, true);   
     $this->template['footer'] = $this->load->view($this->tpl.'/footer', $this->data, true);
    }
    
    protected function layout_frontend(){
     $this->data['menu']  = $this->load->view($this->tpl.'/menu', $this->data, true);
     $this->data['sidebar'] = $this->load->view($this->tpl.'/sidebar', '', true);    
     $this->template['header']   = $this->load->view($this->tpl.'/header', $this->data, true);
     $this->template['content'] = $this->load->view($this->content, $this->data, true);   
     $this->template['footer'] = $this->load->view($this->tpl.'/footer', $this->data, true);
    }
 }

class Admin_Controller extends MY_Controller
{  
    public function __construct()
    {
        parent::__construct();
        
        $ci =& get_instance();
		$ci->load->model('login/M_login');
        
            if ($ci->M_login->loggedin() == FALSE) {
                redirect('administrator/login');
                exit();
            }

    }
    
}
    
?>