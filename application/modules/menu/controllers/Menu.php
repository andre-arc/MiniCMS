<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Admin_Controller {
    
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
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/jquery-nestable/jquery.nestable.css');
            $this->data['css'] .= get_other_asset('<script type="text/javascript">$("body").on("hidden.bs.modal", ".modal", function () {$(this).removeData("bs.modal"); });$.fn.modal.Constructor.prototype.enforceFocus = function() {};</script>');
            $this->data['css'] .= get_asset('js', $this->tpl.'/global/plugins/jquery.min.js');
         
         
//         -----------------------------------------------------------------------------------------------------------------------------------
            $this->data['js'] = get_asset('js', $this->tpl.'/global/plugins/bootstrap/js/bootstrap.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/jquery-nestable/jquery.nestable.js');
        
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/datatable.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/datatables.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/app.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/pages/scripts/table-datatables-managed.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/layout.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/demo.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/pages/scripts/ui-nestable.min.js');
            $this->data['js'] .= get_other_asset(' <script>function removeList(btn){ var list = btn.parentNode.parentNode.parentNode;list.parentNode.removeChild(list);var data = window.JSON.stringify($(".dd").nestable("serialize"));$("#nestable_list_1_output").val(data);}</script>');
    }
    
    public function index(){
        $this->content = "menu";
        $this->data['listmenu'] = $this->M_menu->get_all();
        $this->layout($this->tpl);
    }
    
    public function add(){
        ini_set('error_reporting', E_STRICT);
       $this->content = 'form_menu';
       $this->data['formMenu']='';    
       $this->layout($this->tpl);
    }

    public function save(){

         $this->form_validation->set_rules('nm_menu', 'Nama Menu', 'trim|required');
         $this->form_validation->set_rules('data_menu', 'Data Menu', 'trim');

        $sukses='';
        $result='';
        $error='';

         if($this->form_validation->run() == false){
             $error .= validation_errors();
         }
         else{
             
             $data = array(
                    'nama_menu' => $this->input->post('nm_menu') ,
                    'data_menu' => $this->input->post('data_menu')
                );

             if($this->input->post('submit') == 'update'){
                $id = $this->input->post('id');
                 $result = $this->M_menu->update($data, $id);
                 if($result){
                     $sukses = "Menu Berhasil di update";
                 }
             }

             elseif($this->input->post('submit') == 'simpan'){
                 $id = generateID('menu');
                 $data['id'] = $id;
                 $data['aktif'] = 'Y';
                 $result = $this->M_menu->insert($data);
                 if($result){
                     $sukses = "Menu Berhasil di tambah";
                 }
             }
         }
         if($result && $error==null){
                 $this->session->set_flashdata('success', $sukses);
                 redirect('administrator/menu');
             }
             else{
                 $this->session->set_flashdata('warning', $error);
                 redirect('administrator/menu/add');
             }
    }


     public function edit($id){
        $result = $this->M_menu->get($id);
        $this->content = 'form_menu';
        $this->data['formMenu'] = $result;
        $this->layout($this->tpl);
    }

    public function delete(){
        $status = true;
        foreach($this->input->post('checkbox') as $id){
            $status = (bool)$status && (bool)$this->M_menu->delete($id);
        }
        if($status){
            $pesan = "Menu Berhasil di hapus";
            $this->session->set_flashdata('success', $pesan);
            redirect('administrator/menu');
        }
    }
    
     public function modal_menu(){
        $this->load->view('menu/modal_menu');
    }
    
    public function menutype(){
        if($this->input->post('item')){
            $item = $this->input->post('item');
            switch($item){
                //case "page" : $this->data['list_item'] = $this->M_menu->list_page();break;
                case "post" : $this->data['list_item'] = Modules::run('post/getDropdown');break;
                case "kategori" : $this->data['list_item'] = Modules::run('post/kategori/getDropdown');break;    
                    
            }
            $this->data['label'] = $item;
        }
         $this->load->view('menu/item_menu', $this->data);
    }
    
    public function tes(){
//        $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
//        $newurl = str_replace("index.php","", $_SERVER['SCRIPT_NAME']);
//        
//        echo "$http" . $_SERVER['SERVER_NAME'] . "" . $newurl;
        echo json_encode($_SESSION);
        echo $_SESSION['RFM_UNLOCK'];
        
    }
    
}
?>