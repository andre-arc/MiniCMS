<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends Admin_Controller {
    
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
            $this->data['js'] .= get_other_asset('<script>$(".iframe-btn").fancybox({ "width" : 900, "height" : 550, "type" : "iframe", "autoSize" : false });</script>');
            $this->data['js'] .= get_other_asset('<script>function responsive_filemanager_callback(field_id){ console.log(field_id); var url=jQuery("#"+field_id).val(); $("#img_preview").attr("src",url); parent.$.fancybox.close();');


    }
    
    public function index(){
        $this->content = "post";
        $this->data['listpost'] = $this->M_post->get_all();
        $this->layout($this->tpl);
    }
    
    public function add(){
        ini_set('error_reporting', E_STRICT);
       $this->content = 'form_post';
       $this->data['listkategori'] = Modules::run("post/kategori/getDropdown");
       $this->data['formPost']='';    
       $this->layout($this->tpl);
    }

    public function save(){

        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Isi', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('tags', 'Tags', 'trim');
        $this->form_validation->set_rules('readmore', 'Text Readmore', 'trim|required');

        $sukses='';
        $result='';
        $error='';

         if($this->form_validation->run() == false){
             $error .= validation_errors();
         }
         else{
             
             $data = array(
                    'judul' => $this->input->post('judul') ,
                    'judul_seo' => genSlug($this->input->post('judul')),
                    'readmore' => $this->input->post('readmore'),
                    'id_kategori' => $this->input->post('kategori'),
                    'isi_berita' => $this->input->post('editor1'),
                    'gambar' => $this->input->post('gambar')
                );
             
             if($tags = str_replace(' ', '', $this->input->post('tags'))){
                 $data['tags'] = json_encode(explode(',', $tags));
             }

             if($this->input->post('submit') == 'update'){
                $id = $this->input->post('id');
                 $result = $this->M_post->update($data, $id);
                 if($result){
                     $sukses = "Postingan Berhasil di update";
                 }
             }

             elseif($this->input->post('submit') == 'tambah'){
                 $id = generateID('post', 'id_berita');
                 $data['id_berita'] = $id;
                 $data['username'] = $this->session->userdata('username');
                 $result = $this->M_post->insert($data);
                 if($result){
                     $sukses = "Postingan Berhasil di tambah";
                 }

             }

         }
         if($result && $error==null){
                 $this->session->set_flashdata('success', $sukses);
                 redirect('administrator/post');
             }
             else{
                 $this->session->set_flashdata('warning', $error);
                 redirect('administrator/post/add');
             }
    }


     public function edit($id){
        $result = $this->M_post->get($id);
        $this->data['listkategori'] = Modules::run("post/kategori/getDropdown");
        $this->content = 'form_post';
        $this->data['formPost'] = $result;
        $this->layout($this->tpl);
    }

    public function delete(){
        $status = true;
        foreach($this->input->post('checkbox') as $id){
            $status = (bool)$status && (bool)$this->M_post->delete($id);
        }
        if($status){
            $pesan = "Postingan Berhasil di hapus";
            $this->session->set_flashdata('success', $pesan);
            redirect('administrator/post');
        }
    }
    
     public function getDropdown(){
        $data = $this->M_post->get_all();
        $result[0] = 'Pilih Postingan';
        foreach($data as $r):
        $result[$r->id_berita] = $r->judul;
        endforeach;
        
        return $result;
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