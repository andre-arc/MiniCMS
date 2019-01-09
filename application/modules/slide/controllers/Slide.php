<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends Admin_Controller {
    
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
            $this->data['css'] .= get_asset('css', $this->tpl.'/global/plugins/fancybox/source/jquery.fancybox.css');
        
            $this->data['css'] .= get_asset('js', $this->tpl.'/global/plugins/jquery.min.js');
         
         
//         -----------------------------------------------------------------------------------------------------------------------------------
            $this->data['js'] = get_asset('js', $this->tpl.'/global/plugins/bootstrap/js/bootstrap.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/fancybox/source/jquery.fancybox.pack.js');
            $this->data['js'] .= get_other_asset('<script>var BASE_URL = "'.base_url().'";</script>');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/ckeditor/ckeditor.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/datatable.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/datatables.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/app.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/pages/scripts/table-datatables-managed.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/layout.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/demo.min.js');
            $this->data['js'] .= get_other_asset('<script>$(".iframe-btn").fancybox({ "width" : 900, "height" : 550, "type" : "iframe", "autoSize" : false });</script>');
            $this->data['js'] .= get_other_asset('<script>function responsive_filemanager_callback(field_id){ console.log(field_id); var url=jQuery("#"+field_id).val(); $("#img_preview").attr("src",url); parent.$.fancybox.close();');


    }
    
    public function index(){
        $this->content = "slide";
        $this->data['listslide'] = $this->M_slide->get_all('',null,'','', 'urutan ASC');
        $this->layout($this->tpl);
    }
    
    public function add(){
        ini_set('error_reporting', E_STRICT);
       $this->content = 'form_slide';
       $this->data['formSlide']='';    
       $this->layout($this->tpl);
    }

    public function save(){

        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('caption', 'Caption', 'trim');
        $this->form_validation->set_rules('gambar', 'Gambar', 'trim|required');
        $this->form_validation->set_rules('link', 'Link', 'trim|required');
        $this->form_validation->set_rules('order', 'Urutan', 'trim|required');

        $sukses='';
        $result='';
        $error='';

         if($this->form_validation->run() == false){
             $error .= validation_errors();
         }
         else{
             
             $data = array(
                    'judul' => $this->input->post('judul') ,
                    'caption' => $this->input->post('caption') ,
                    'gambar' => $this->input->post('gambar') ,
                    'link' => $this->input->post('link'),
                    'urutan' => $this->input->post('order')
                );
             
                if($this->input->post('submit') == 'update'){
                    $id = $this->input->post('id');
                     $result = $this->M_slide->update($data, $id);
                     if($result){
                         $sukses = "Slide Berhasil di update";
                     }
                 }

                 elseif($this->input->post('submit') == 'tambah'){
                     
                    $jml = count($this->M_slide->get_all('', array('urutan', $data['urutan'])));
                    if($jml == 0){
                         $id = generateID('slide');
                         $data['id'] = $id;
                         $result = $this->M_slide->insert($data);
                         if($result){
                             $sukses = "Slide Berhasil di tambah";
                         }
                        else{
                            var_dump($this->db->error());
                        }
                     }
                     else{$error .= "Duplikasi No Urut Slide<br>";}
                       
                  }

         }

         if($result && $error==null){
                 $this->session->set_flashdata('success', $sukses);
                 redirect('administrator/slide');
             }
             else{
                 $this->session->set_flashdata('warning', $error);
                 redirect('administrator/slide/add');
             }
    }


     public function edit($id){
        $result = $this->M_slide->get($id);
        $this->content = 'form_slide';
        $this->data['formSlide'] = $result;
        $this->layout($this->tpl);
    }

    public function delete(){
        $status = true;
        foreach($this->input->post('checkbox') as $id){
            $status = (bool)$status && (bool)$this->M_slide->delete($id);
        }
        if($status){
            $pesan = "Postingan Berhasil di hapus";
            $this->session->set_flashdata('success', $pesan);
            redirect('administrator/slide');
        }
    }
    
}
?>