<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
         $this->data['css'] = get_other_asset('<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />');
        $this->data['css'] .= get_asset('css', 'backend/global/plugins/bootstrap/css/bootstrap.min.css');
        $this->data['css'] .= get_asset('css', 'backend/global/css/components.min.css');
        $this->data['css'] .= get_asset('css', 'backend/pages/css/login.min.css');
        
        
    }

	public function index()
	{
		$this->content = 'form_login';
        $this->layout('login');
	}
    
    public function proses(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $sukses='';
        $result='';
        $error='';

         if($this->form_validation->run() == false){
             echo $error .= validation_errors();
         }
        else{
             $username = addslashes($this->input->post('username'));
            $password = addslashes($this->input->post('password'));

            if(empty($username) || empty($password)){
                $this->session->set_flashdata('pesan', 'Username/Password kosong');
                redirect('administrator/login', 'location');
            }

            $login = $this->M_login->cek_login($username, $password);
            if($this->M_login->loggedin() == true){
                redirect('administrator/dashboard', 'location');
            }
            else{
                $this->session->set_flashdata('pesan', 'Username/Password Salah');
                redirect('administrator/login', 'location');
            }
        }
        
       
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('administrator/login');
    }
    
    public function tes(){
        $encrypt = encrypt('admin');
        $decrypt = decrypt($encrypt);
        
        echo $encrypt."<br>";
        echo $decrypt;
    }
}
