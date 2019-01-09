<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends Admin_Controller {
    
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
            $this->data['js'] = get_asset('js', $this->tpl.'/global/plugins/bootstrap/js/bootstrap.min.js');
            $this->data['css'] .= get_asset('js', $this->tpl.'/global/plugins/jquery.min.js');
            $this->data['js'] .= get_other_asset('<script>var BASE_URL = "'.base_url().'";</script>');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/ckeditor/ckeditor.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/fancybox/source/jquery.fancybox.pack.js');
        
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/datatable.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/datatables.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/app.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/pages/scripts/table-datatables-managed.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/layout.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/demo.min.js');
        
    }
    
    public function index(){
        $this->content = "kategori";
        $this->data['listkategori'] = $this->M_kategori->get_all();
        $this->layout($this->tpl);
    }
    
    public function add(){
        ini_set('error_reporting', E_STRICT);
       $this->content = 'form_kategori';
       $this->data['formKategori']='';    
       $this->layout($this->tpl);
    }

    public function save(){

        $this->form_validation->set_rules('nm_kategori', 'Nama Kategori', 'trim|required');

        $sukses='';
        $result='';
        $error='';

         if($this->form_validation->run() == false){
             $error .= validation_errors();
         }
         else{
             
             $data = array(
                    'nama_kategori' => $this->input->post('nm_kategori') ,
                    'kategori_seo' => genSlug($this->input->post('nm_kategori'))
                );
             
             if($tags = str_replace(' ', '', $this->input->post('tags'))){
                 $data['tags'] = json_encode(explode(',', $tags));
             }

             if($this->input->post('submit') == 'update'){
                $id = $this->input->post('id');
                 $result = $this->M_kategori->update($data, $id);
                 if($result){
                     $sukses = "Postingan Berhasil di update";
                 }
             }

             elseif($this->input->post('submit') == 'tambah'){
                 $id = generateID('kategori', 'id_kategori');
                 $result = $this->M_kategori->insert($data);
                 if($result){
                     $sukses = "Postingan Berhasil di tambah";
                 }

             }

         }
         if($result && $error==null){
                 $this->session->set_flashdata('success', $sukses);
                 redirect('administrator/post/kategori');
             }
             else{
                 $this->session->set_flashdata('warning', $error);
                 redirect('administrator/post/kategori/add');
             }
    }


     public function edit($id){
        $result = $this->M_kategori->get($id);
        $this->content = 'form_kategori';
        $this->data['formKategori'] = $result;
        $this->layout($this->tpl);
    }

    public function delete(){
        $status = true;
        foreach($this->input->post('checkbox') as $id){
            $status = (bool)$status && (bool)$this->M_kategori->delete($id);
        }
        if($status){
            $pesan = "Postingan Berhasil di hapus";
            $this->session->set_flashdata('success', $pesan);
            redirect('administrator/post/kategori');
        }
    }
    
     public function getDropdown(){
        $data = $this->M_kategori->get_all();
        $result[0] = 'Pilih Kategori';
        foreach($data as $r):
        $result[$r->id_kategori] = $r->nama_kategori;
        endforeach;
        
        return $result;
    }
}
