<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_post extends MX_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('post/M_post');
        $this->load->model('post/M_kategori');

    }
    
    public function getPost($limit='',$where=null, $order_by=''){
        $join = array('table_name' => 'kategori',
                      'foreign_key' => 'post.id_kategori=kategori.id_kategori');
        $data = $this->M_post->get_all('', $where, '', $limit, $order_by, '', $join);
        return $data;    
    }
    
    public function getDetailPost($title){
         $join = array('table_name' => 'kategori',
                      'foreign_key' => 'post.id_kategori=kategori.id_kategori');
        
        $where=array('judul_seo'=>$title);
        $data = $this->M_post->get_all('', $where, '', '', '', '', $join);
        foreach($data as $data);
        
        return $data;
    }
    
    public function getKategori(){
        $data = $this->M_kategori->get_all();
        return $data;
    }
}
