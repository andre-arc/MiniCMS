<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {
    
     public function __construct(){
        parent::__construct();
        
            $this->tpl = 'backend';
        
             $this->data['css'] = get_other_asset('<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />');
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/bootstrap/css/bootstrap.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/font-awesome/css/font-awesome.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/simple-line-icons/simple-line-icons.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/css/components.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/css/plugins.min.css');
            
            $this->data['css'] .= get_asset('css', $this->tpl.'/layouts/layout/css/layout.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/layouts/layout/css/themes/darkblue.min.css');
         
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/datatables/datatables.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/jquery.dataTables.css');
         
         
//         -----------------------------------------------------------------------------------------------------------------------------------
            $this->data['js'] = get_asset('js', $this->tpl.'/global/plugins/jquery.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/bootstrap/js/bootstrap.min.js');
        
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/datatable.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/datatables.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/app.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/pages/scripts/table-datatables-managed.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/layout.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/demo.min.js');
            $this->data['js'] .= get_other_asset('<script >$(document).ready(function(){$(".showPassword").click(function(){if($(this).is(":checked")){$(".pass").prop("type","text");}else{$(".pass").prop("type","password");}});});</script>');

    }
    
    public function index(){
        $this->content = "user";
        $this->data['listuser'] = $this->M_user->get_all();
        $this->layout($this->tpl);
    }
    
    public function add(){
        ini_set('error_reporting', E_STRICT);
       $this->content = 'form_user';
        
       $this->data['formPass'] = array(
                                    'pass' => array('Password',''),
                                    'pass_confirm' => array('Konfirmasi Password','')
                                    );
        $this->data['level']  = array(
                                        0 => '--Pilih Level Akses--',
                                      'admin' => 'admin',
                                      'user' => 'user');
           
       $this->data['formUser']='';    
       $this->layout($this->tpl);
    }

    public function save(){

        $this->form_validation->set_rules('username', 'Username', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');

        $sukses='';
        $result='';
        $error='';

         if($this->form_validation->run() == false){
             $error .= validation_errors();
         }
         else{
             
             $data = array(
                     'nama_lengkap' => $this->input->post('nama'),
                     'level' => $this->input->post('level'),
                     'email' => $this->input->post('email'),
                     'aktif' => 'Y'
                );

             if($this->input->post('submit') == 'update'){
                 $id = $this->input->post('id');
                 $pass_old = $this->input->post('pass_old');
                 $pass_new = $this->input->post('pass_new');
                 $confirm = $this->input->post('pass_confirm');
                 
               if($pass_new != null){
                     $cek = $this->db->query("select password from users where username='$id'");
                     $r = $cek->row();
                     $pass = $this->fungsi->decrypt($r->password);

                    if($pass_new === $confirm && $pass_old === $pass){
                        $data['password'] = $this->fungsi->encrypt($pass_new);
                     }else{
                         $result &= false;
                         $error .= 'Password Tidak Sama Dengan Konfirmasi Password';
                     }
                 }
                 
                 $result = $this->M_user->update($data, $id);
                 if($result){
                     $sukses = "User Berhasil di update";
                 }
             }

             elseif($this->input->post('submit') == 'tambah'){
                 $pass = $this->input->post('pass');
                 $confirm = $this->input->post('pass_confirm');
                 
                 
                if($pass === $confirm){
                    $data['username'] = $this->input->post('username');
                    $data['password'] = encrypt($pass);
                    
                     $result = $this->M_user->insert($data);
                     if($result){
                         $sukses = "User Berhasil di tambah";
            
                 }else{
                     $result &= false;
                     $error .= 'Password Tidak Sama Dengan Konfirmasi Password';
                 }

             }

         }
             
         }
             if($result && $error==null){
                 $this->session->set_flashdata('success', $sukses);
                 redirect('administrator/user');
             }
             else{
                 $this->session->set_flashdata('warning', $error);
                 redirect('administrator/user/add');
             }
    }


     public function edit($id){
        $result = $this->M_user->get($id);
         $pass = decrypt($result->password);
         
         $this->data['formPass'] = array(
                                        'pass_old' => array('Password Lama', $pass),
                                        'pass_new' => array('Password Baru',''),
                                        'pass_confirm' => array('Konfirmasi Password','')
                                        );
          $this->data['level']  = array(
                                        0 => '--Pilih Level Akses--',
                                      'admin' => 'admin',
                                      'user' => 'user');
        $this->content = 'form_user';
        $this->data['formUser'] = $result;
        $this->layout($this->tpl);
    }

    public function delete(){
        $status = true;
        foreach($this->input->post('checkbox') as $id){
            $status = (bool)$status && (bool)$this->M_user->delete($id);
        }
        if($status){
            $pesan = "User Berhasil di hapus";
            $this->session->set_flashdata('success', $pesan);
            redirect('administrator/user');
        }
    }
    
    public function tes(){
        $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
        $newurl = str_replace("index.php","", $_SERVER['SCRIPT_NAME']);
        
        echo "$http" . $_SERVER['SERVER_NAME'] . "" . $newurl;
    }
    
}
?>