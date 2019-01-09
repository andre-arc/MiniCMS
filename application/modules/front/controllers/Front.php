<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends MY_Controller {

	public function __construct(){
        parent::__construct();
        
            $this->tpl = 'frontend';
            $this->data['list_menu'] = Modules::run('menu/front_menu/getMenu', array('aktif'=>'Y'));
            
            $this->data['css'] = get_other_asset('<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Glegoo:400,700%7CRoboto+Condensed:300italic,400italic,700italic,400,300,700">');
            $this->data['css'] .= get_asset('css', $this->tpl.'/icons/devsolution-and/icons.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/icons/glyphicons/style.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/icons/font-awesome/new/font-awesome-4.2.0/css/font-awesome.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/plugins/bootstrap/css/bootstrap.min.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/plugins/slider/js-image-slider.css');
            $this->data['css'] .= get_asset('js', $this->tpl.'/plugins/slider/js-image-slider.js');
            $this->data['css'] .= get_asset('css', $this->tpl.'/css/style.css');
            $this->data['css'] .= get_asset('css', 'backend/global/plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/zenburn.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/css/responsive.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/plugins/mfp/jquery.mfp.css');
            $this->data['css'] .= get_asset('css', $this->tpl.'/plugins/owlcarousel/owl.carousel.min.css');
         
         
//         -----------------------------------------------------------------------------------------------------------------------------------
            $this->data['js'] = get_asset('js', $this->tpl.'/plugins/jquery/dist/jquery.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/plugins/modernizr/modernizr-2.7.1.min.js');
            $this->data['js'] .= get_asset('js', 'backend/global/plugins/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js');
        
            $this->data['js'] .= get_asset('js', $this->tpl.'/js/devsolution.scripts.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/js/devsolution.plugins.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/js/devsolution.setup.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/plugins/gmap/gmap3.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/plugins/mfp/jquery.mfp-0.9.9.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/plugins/owlcarousel/owl.carousel.min.js');
        
            $this->data['js'] .= get_asset('js', $this->tpl.'/plugins/isotope/jquery.isotope.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/plugins/twitter/tweetie.min.js');
        
//         -----------------------------------------------------------------------------------------------------------------------------------        
            $this->data['list_category'] = Modules::run('post/front_post/getKategori');
            $this->data['recent_post'] = Modules::run('post/front_post/getPost', 5, null,'post.date_created DESC');
            $this->data['popular_post'] = Modules::run('post/front_post/getPost', 5, null,'post.date_created DESC');
            
            $this->load->library("pagination");
    }
    
    public function index(){
        $pagination = $this->init_pagination();
        $jumlah_data = count( Modules::run('post/front_post/getPost'));
        $pagination['base_url'] = base_url();
        $pagination['total_rows'] = $jumlah_data;
        $pagination['uri_segment'] = 1;
        $page_num = $this->uri->segment($pagination['uri_segment']);

        $offset = ($page_num == 1 || $page_num == null || !is_numeric($page_num)) ? 0 : ($page_num * $pagination['per_page']) - $pagination['per_page'];

        $this->pagination->initialize($pagination);
        $this->content = "home";
        $limit = array($pagination['per_page'], $offset);
        $this->data['list_post'] = Modules::run('post/front_post/getPost', $limit, null,'post.date_created DESC');
        $this->data['list_slide'] = Modules::run('slide/front_slide/getSlide');
        $this->data['title'] = getParams("site_title")." - ".getParams("site_tag");
        $this->layout($this->tpl);
    }
    
    public function post($title){
        $this->data['js'] .= get_other_asset('<script>hljs.initHighlightingOnLoad();</script>');
        $this->data['js'] .= get_other_asset('<script id="dsq-count-scr" src="//dreanlab.disqus.com/count.js" async></script>');
        $this->data['post_data'] = Modules::run('post/front_post/getDetailPost', $title);
        $this->data['title'] = getParams("site_title")." - ".$this->data['post_data']->judul;
        hits_counter($this->data['post_data']->id_berita);
        $this->content = "detail_post";
        $this->layout($this->tpl);
    }
    
    public function kategori($ktg){
        $pagination = $this->init_pagination();
        $jumlah_data = count( Modules::run('post/front_post/getPost', '', array("nama_kategori"=>$ktg)));
		$pagination['base_url'] = base_url().'kategori/'.$ktg.'/';
		$pagination['total_rows'] = $jumlah_data;
        $pagination['uri_segment'] = 3;
        
        $page_num = $this->uri->segment($pagination['uri_segment']);
        
        $offset = ($page_num == 1 || $page_num == null || !is_numeric($page_num)) ? 0 : ($page_num * $pagination['per_page']) - $pagination['per_page'];
        
		$this->pagination->initialize($pagination);
        $this->content = "detail_kategori";
        
        $limit = array($pagination['per_page'], $offset);
        $where = array("nama_kategori"=>$ktg);
        $this->data['list_post'] = Modules::run('post/front_post/getPost', $limit, $where,'post.date_created DESC');
        
        $this->data['kategori'] = $ktg;
        $this->data['title'] = getParams("site_title")." - ".ucwords($ktg);
        $this->layout($this->tpl);
    }
    
    public function cari(){
        $this->data['js'] .= get_other_asset("<script>(function() {var cx = '007989641350952278037:ivjjnud1owc';var gcse = document.createElement('script');gcse.type = 'text/javascript';gcse.async = true;gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(gcse, s);})();</script>");
        $this->data['title'] = "Pencarian : ".ucwords($this->input->get('s'));
        $this->content = "cari";
        $this->layout($this->tpl);
    }
    
    public function tags(){
        if($this->input->get('t')){
            $tag = $this->input->get('t');
            $listpost = array();
            foreach(Modules::run('post/front_post/getPost') as $r){
                if(in_array($tag, json_decode($r->tags))){
                    $listpost[] = $r;
                }
            }
           $this->data['list_post'] = (object) $listpost;
           $this->data['title'] = getParams("site_title")." - "."Tag : ".$this->input->get('t');    
           $this->content = "tag";
           $this->layout($this->tpl);
        }
    }
    
    protected function init_pagination(){
            $pagination['per_page'] = 5;
            $pagination['use_page_numbers'] = TRUE;

            $pagination['full_tag_open'] = "<ul>";
            $pagination['full_tag_close'] = "</ul>";

            $pagination['first_tag_open'] = '<li>';
            $pagination['first_tag_close'] = '</li>';

            $pagination['cur_tag_open'] = '<li><a class="active" href="#">';
            $pagination['cur_tag_close'] = '</a></li>';

             $pagination['num_tag_open'] = '<li>';
            $pagination['num_tag_close'] = '</li>';

            $pagination['prev_link'] = '<i class="fa fa-angle-left"></i>';
            $pagination['prev_tag_open'] = '<li>';
            $pagination['prev_tag_close'] = '</li>';

            $pagination['next_link'] = '<i class="fa fa-angle-right"></i>';
            $pagination['next_tag_open'] = '<li>';
            $pagination['next_tag_close'] = '</li>';
        
            return $pagination;
    }
    
    public function tes(){
        echo Modules::run('menu/front_menu/getMenu', array('aktif'=>'Y'));
        echo $this->db->last_query();
    }
}
