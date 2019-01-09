<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends Admin_Controller {
    
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
        
            $this->data['css'] .= get_asset('js', $this->tpl.'/global/plugins/jquery.min.js');
         
         
//         -----------------------------------------------------------------------------------------------------------------------------------
            $this->data['js'] = get_asset('js', $this->tpl.'/global/plugins/bootstrap/js/bootstrap.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/global/scripts/app.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/layout.min.js');
            $this->data['js'] .= get_asset('js', $this->tpl.'/layouts/layout/scripts/demo.min.js');

    }
    
    public function index(){
        $this->content = "media";
        $this->data['iframe'] = Modules::run('media/filemanager');
        $this->layout($this->tpl);
    }
    
    public function filemanager($key=''){
       $url = $key == '' ? base_url().'filemanager/dialog.php?type=0' : base_url().'filemanager/dialog.php?type=0&key='.$key ;
        $iframe = "<iframe scrolling='off' frameborder='0' src='$url' width='1200' height='600' align='middle'></iframe>";
        return $iframe;
    }


    
}
?>